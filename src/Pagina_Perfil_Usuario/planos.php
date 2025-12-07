<?php

namespace projetoTechfit;
use DateTime;
require_once __DIR__ . "\\..\\..\\backend\\connTables.php";
$plano;
$aluno;
$connAluno = new ConnTables("alunos");
$connPlano = new ConnTables("planos");
$connAssinam = new ConnTables("assinam");
$connPagamento = new ConnTables("pagamento");
$id = $_GET['id'];
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    foreach($connAssinam->select() as $dados) {
        if($_POST['id_plano'] !== $dados['id_plano']) {
            $assina['id_plano'] = $_POST['id_plano'];
            foreach($connPagamento->select() as $dadosP) {
                if($dadosP['id_aluno'] == $id) {
                    $connAssinam->update('id_pagamento',$dadosP['id_pagamento'],$assina);
                }
            }   
        }
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>TECHFIT</title>
</head>

<body>
    <header>
        <div class="logo-academia">
            <img src="/Arquivos/LogoTechFit-removebg-preview.png" alt="Logo-Academia">
            <h1>TECHFIT</h1>
        </div>

        <div class="secoes">
            <?php
            include_once __DIR__ . "\\..\\..\\utilitarios\\secaoUsuario.php"
            ?>
        </div>

        <div class="func-perfil" id="func-perfil">
            <div class="perfil">
                <img class="botaoPerfil" id="botaoPerfil" src="/Arquivos/perfil-removebg-preview.png" alt="Foto_Perfil">
            </div>
            <div class="secoes-perfil" id="menuPerfil">
                <ul>
                    <?php
                    include_once __DIR__ . "\\..\\..\\utilitarios\\perfil.php"
                    ?>
                </ul>
            </div>
        </div>

    </header>

    <main>
        <main>

            <h2>Altere seu Plano</h2>

            <form method="POST" action="processarPlano.php">

                <div class="planos">
                    <?php foreach($connPlano->select() as $dados): ?>
                    <?php 
                    $duracao = $dados['duracao_plano'];

                    $dataInicio = new DateTime(); 
                    $dataVencimento = (clone $dataInicio)->modify("+$duracao days"); 
                    ?>
                    <label class="plano">
                        <input type="radio" name="plano" value="<?=$dados['id_plano']?>">
                        <h3><?=$dados['nome_plano']?></h3>
                        <p>R$ <?=$dados['preco_plano']?> / <?=$dataVencimento->format('m');?> <?php if($dataVencimento->format('m') == 1){echo "mês";}  else {echo "meses";} ?></p>
                    </label>
                    <?php endforeach ?>
                </div>

                <h2>Dados do Cartão</h2>

                <div class="cartao-form">
                    <?php if($connPagamento->selectUnique("","id_aluno = :id_aluno","","","",['id_aluno'=>$id])): ?>
                    <?php foreach($connPagamento->select() as $dados): ?>
                    <?php if($dados['id_aluno'] == $id): ?>
                    <input type="hidden" name="id_pagamento" value="<?=$dados['id_pagamento']?>">
                    <label for="num_cartao">Número do Cartão</label>
                    <input id="num_cartao" type="text" name="numero_cartao_pagamento" maxlength="19" value="<?=$dados['numero_cartao_pagamento']?>" required>

                    <label>Nome Impresso no Cartão</label>
                    <input type="text" name="nome_cartao_pagamento" value="<?=$dados['nome_cartao_pagamento']?>" required>

                    <label for="val_cartao">Validade</label>
                    <input id="val_num" type="text" name="validade_cartao_pagamento" maxlength="5" value="<?=$dados['validade_cartao_pagamento']?>" required>
                    
                    <label for="ccv_cartao">CCV</label>
                    <input id="ccv_cartao" type="text" name="ccv_cartao_pagamento" maxlength="4" value="<?=$dados['ccv_cartao_pagamento']?>" required>
                    
                    <?php endif ?>
                    <?php endforeach ?>
                    <?php else: ?>
                        <p>Não há nenhuma forma de pagamento cadastrada</p>
                    <?php endif ?>
                </div>

                <button type="submit" class="btn-finalizar">Confirmar Plano</button>

            </form>

        </main>
    </main>
    <footer class="pf-footer">
        <small>© TECHFIT</small>
    </footer>
    <script src="/src/js/app.js"></script>
</body>

</html>