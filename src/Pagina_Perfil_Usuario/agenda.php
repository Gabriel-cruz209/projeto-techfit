<?php
  namespace projetoTechfit;
  require_once __DIR__ . "\\..\\..\\backend\\connTables.php";
  $id = $_GET['id'];
  $connInscrevem = new ConnTables("inscrevem");
  $connUnidade = new ConnTables("unidades");
  $connAulas = new ConnTables("aulas");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Agendamento - TECHFIT</title>
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
    <div class="lista-aulas">
    <?php foreach($connInscrevem->select() as $dados): ?>
    <?php if($dados['id_aluno'] == $id): ?>
    <?php foreach($connAulas->select() as $dadosA): ?>
    <?php if($dados['id_aula'] == $dadosA['id_aula']): ?>
    <?php foreach($connUnidade->select() as $dadosU): ?>
    <?php if($dadosA['id_unidade'] == $dadosU['id_unidade']): ?>
      <div class="item-aula">
          <div class="tipo-aula"><?=$dadosA['tipo_aula']?></div>
          <div class="unidade"><?=$dadosU['nome_unidade']?></div>

          <div class="descricao">
              <?=$dadosA['descricao_aula']?>
          </div>

          <div class="data-aula"><?=$dadosA['data_aula']?></div>
      </div>
    <?php endif ?>
    <?php endforeach?>
    <?php endif ?>
    <?php endforeach?>
    <?php else: ?>
        <p><span>O aluno</span>não se inscreveu em nenhuma aula</p>
    <?php endif ?>
    <?php endforeach?>
    </div>
  </main>

  <footer class="pf-footer">
    <small>© TECHFIT</small>
  </footer>

  <script src="/src/js/app.js"></script>
</body>

</html>