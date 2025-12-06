<?php

namespace projetoTechfit;

require_once __DIR__ . "\\..\\..\\backend\\connTables.php";
$plano;
$aluno;
$connAluno = new ConnTables("alunos");
$connPlanos = new ConnTables("planos");
$dadosP = $connPlanos->select();
$dados = $connAluno->select();
$id = $_GET['id'];

foreach($dados as $dado) {
    if($dado['id_aluno'] == $id){
      $aluno = $dado;
      foreach($dadosP as $dadoP){
        if($dado['id_plano']==$dadoP['id_plano']){
          $plano = $dadoP;
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

                    <label class="plano">
                        <input type="radio" name="plano" value="mensal">
                        <h3>Mensal</h3>
                        <p>R$ 79,90 / mês</p>
                    </label>

                    <label class="plano">
                        <input type="radio" name="plano" value="trimestral">
                        <h3>Trimestral</h3>
                        <p>R$ 199,90 / 3 meses</p>
                    </label>

                    <label class="plano">
                        <input type="radio" name="plano" value="anual">
                        <h3>Anual</h3>
                        <p>R$ 699,90 / ano</p>
                    </label>

                </div>

                <h2>Dados do Cartão</h2>

                <div class="cartao-form">

                    <label>Número do Cartão</label>
                    <input type="text" name="numero_cartao" placeholder="0000 0000 0000 0000" required>

                    <label>Nome no Cartão</label>
                    <input type="text" name="nome_cartao" placeholder="Ex: João Silva" required>

                    <div class="linha">
                        <div style="flex:1;">
                            <label>Validade</label>
                            <input type="text" name="validade" placeholder="MM/AA" required>
                        </div>

                        <div style="flex:1;">
                            <label>CVV</label>
                            <input type="text" name="cvv" placeholder="000" required>
                        </div>
                    </div>

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