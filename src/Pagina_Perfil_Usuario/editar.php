<?php

namespace projetoTechfit;

error_reporting(0);
require_once __DIR__ . "\\..\\..\\backend\\connTables.php";
require_once __DIR__ . "\\..\\..\\backend\\valorTable.php";
$connAluno = new ConnTables("alunos");
$connUnidade = new ConnTables('unidades');
$connPlano = new ConnTables('planos');
$connPagamento = new ConnTables("pagamento");
$connAssinam = new ConnTables("assinam");
$table = new ValorTable();
$id = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if ($_POST['senha'] == $_POST['Csenha']) {
    $assina = $table->getAssinam();
    $aluno = $table->getAlunos();
    $aluno['id_aluno'] = $id;
    $aluno['cep_aluno'] = $_POST['cep'];
    $aluno['cpf_aluno'] = $_POST['cpf'];
    $aluno['email_aluno'] = $_POST['email'];
    $aluno['nome_aluno'] = $_POST['nome'];
    $aluno['telefone_aluno'] = $_POST['telefone'];
    $aluno['senha_aluno'] = $_POST['senha'];
    $aluno['id_unidade'] = $_POST['unidade'];
    $aluno['id_plano'] = $_POST['id_plano'];
    
    $connAluno->update('id_aluno', $id, $aluno);
    $pagamentos = $table->getPagamentos();
    if($_POST['action'] == 'inserir') {
      $pagamentos['id_aluno'] = $id;
      $pagamentos['numero_cartao_pagamento'] = $_POST['numero_cartao_pagamento'];
      $pagamentos['nome_cartao_pagamento'] = $_POST['nome_cartao_pagamento'];
      $pagamentos['ccv_cartao_pagamento'] = $_POST['ccv_cartao_pagamento'];
      $pagamentos['validade_cartao_pagamento'] = $_POST['validade_cartao_pagamento'];
      $connPagamento->insert($pagamentos);
    }
    if($_POST['action'] == 'atualizar'){
      $pagamentos['id_aluno'] = $id;
      $pagamentos['numero_cartao_pagamento'] = $_POST['numero_cartao_pagamento'];
      $pagamentos['nome_cartao_pagamento'] = $_POST['nome_cartao_pagamento'];
      $pagamentos['ccv_cartao_pagamento'] = $_POST['ccv_cartao_pagamento'];
      $pagamentos['validade_cartao_pagamento'] = $_POST['validade_cartao_pagamento'];
      $connPagamento->update('id_aluno', $id, $pagamentos);
    }
    
    if($connAssinam->selectUnique("","id_plano = :id_plano","","","",['id_plano'=>$_POST['id_plano']])[0]) {
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
    } else {
      $assina['id_plano'] = $_POST['id_plano'];
      foreach($connPagamento->select() as $dados) {
        if($dados['id_aluno'] == $id) {
          $assina['id_pagamento'] = $dados['id_pagamento'];
          $connAssinam->insert($assina);
        }
      }
    }
   
    
    echo "
      <script>
        setTimeout(function() {
            Perfil('?id=$id');
        }, 3000);
      </script>
      ";
  }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../Arquivos/LogoTechFit-removebg-preview.png" type="image/x-icon">
  <link rel="stylesheet" href="style.css">
  <title>Editar Perfil - TECHFIT</title>
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

  <main class="pf-main">
    <section class="form-edit">
      <h2>Editar Perfil</h2>
      <form class="form_validacao" method="POST">
        <?php foreach($connAluno->select() as $dados):?>
          <?php if($dados['id_aluno'] == $id): ?>

            <label for="nome">Nome</label>
            <input id="nome" name="nome" type="text" value="<?=$dados['nome_aluno']?>" required>

            <label for="email">Email</label>
            <input id="email" name="email" type="email" value="<?=$dados['email_aluno']?>" required>

            <label for="telefone">Telefone</label>
            <input id="telefone" name="telefone" type="text" value="<?=$dados['telefone_aluno']?>" required>

            <label for="cpf">CPF</label>
            <input id="cpf" name="cpf" type="text" value="<?=$dados['cpf_aluno']?>" required>

            <label for="cep">CEP</label>
            <input id="cep" name="cep" type="text" value="<?=$dados['cep_aluno']?>">

            <!-- SELEÇÃO DE UNIDADE -->
            <label for="unidade">Unidade</label>
            <select id="unidade" name="unidade" required>

              <?php foreach ($connUnidade->select() as $uni): ?>
                <?php if($dados['id_unidade'] == $uni['id_unidade']): ?>
                <option value="<?=$uni['id_unidade']?>" selected>
                  <?=$uni['nome_unidade']?>
                </option>
                <?php else: ?>
                <option value="<?=$uni['id_unidade']?>">
                  <?=$uni['nome_unidade']?>
                </option>
                <?php endif ?>
              <?php endforeach; ?>
            </select>

            <!-- SELEÇÃO DE PLANO -->
            <label for="planoAluno">Plano</label>
            <select name="id_plano" id="id_plano" required>
              <option value="" selected>
                Nenhum plano selecionado!
              </option>
              <?php foreach ($connPlano->select() as $plano): ?>
                <?php if($dados['id_plano'] == $plano['id_plano']): ?>
                <option value="<?=$plano['id_plano']?>" selected>
                  <?=$plano['nome_plano']?> - R$ <?=$plano['valor_plano']?>
                </option>
                <?php else: ?>
                
                <option value="<?=$plano['id_plano']?>">
                  <?=$plano['nome_plano']?> - R$ <?=$plano['valor_plano']?>
                </option>
                <?php endif ?>
              <?php endforeach; ?>
            </select>

            <!-- DADOS DO CARTÃO -->
            <h3>Informações do Cartão</h3>
            <?php if($connPagamento->selectUnique("","id_aluno=:id_aluno","","","",['id_aluno' => $id])): ?>
            <?php foreach($connPagamento->select() as $dadosP): ?>
            <?php if($dadosP['id_aluno'] == $id): ?>
             <input type="hidden" name="action" value="atualizar">
            <label for="num_cartao">Número do Cartão</label>
            <input id="num_cartao" type="text" name="numero_cartao_pagamento" maxlength="19" value="<?=$dadosP['numero_cartao_pagamento']?>" required>

            <label>Nome Impresso no Cartão</label>
            <input type="text" name="nome_cartao_pagamento" value="<?=$dadosP['nome_cartao_pagamento']?>" required>

            <label for="val_cartao">Validade</label>
            <input id="val_num" type="text" name="validade_cartao_pagamento" maxlength="5" value="<?=$dadosP['validade_cartao_pagamento']?>" required>
            
            <label for="ccv_cartao">CCV</label>
            <input id="ccv_cartao" type="text" name="ccv_cartao_pagamento" maxlength="4" value="<?=$dadosP['ccv_cartao_pagamento']?>" required>
            <?php endif ?>
            <?php endforeach ?>
            <?php else: ?>
            <input type="hidden" name="action" value="inserir">
            <label for="num_cartao">Número do Cartão</label>
            <input id="num_cartao" type="text" name="numero_cartao_pagamento" maxlength="19" placeholder="0000 0000 0000 0000" required>

            <label>Nome Impresso no Cartão</label>
            <input type="text" name="nome_cartao_pagamento" required>

            <label for="val_cartao">Validade</label>
            <input id="val_num" type="text" name="validade_cartao_pagamento" maxlength="5" placeholder="MM/AA" required>
            
            <label for="ccv_cartao">CCV</label>
            <input id="ccv_cartao" type="text" name="ccv_cartao_pagamento" maxlength="4" required>
            <?php endif ?>
            <!-- SENHAS -->
            <label for="senha">Senha</label>
            <input id="senha" name="senha" type="password" value="<?=$dados['senha_aluno']?>">

            <label for="Csenha">Confirmar senha</label>
            <input id="Csenha" name="Csenha" type="password" value="<?=$dados['senha_aluno']?>">

            <button class="btn" type="submit">Salvar Alterações</button>

          <?php endif ?>
        <?php endforeach; ?>
      </form>
    </section>
  </main>

  <footer class="pf-footer">
    <small>© TECHFIT</small>
  </footer>
  <script src="/src/js/app.js"></script>
  <script src="../js/regex.js"></script>
  <script src="../js/validacoes.js"></script>
</body>

</html>