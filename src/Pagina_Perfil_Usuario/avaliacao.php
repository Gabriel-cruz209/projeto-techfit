<?php
  namespace projetoTechfit;
  require_once __DIR__ . "\\..\\..\\backend\\connTables.php";
  $id = $_GET['id'];
  $connAvaliacao = new ConnTables("avaliacao_fisicas");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Avaliação Física - TECHFIT</title>
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
    <section class="avaliacoes-list">
      <h2>Minhas Avaliações</h2>

      <table id="tabela-avaliacoes" class="tabela-avaliacoes">
        <thead>
          <tr>
            <th>Data</th>
            <th>Tipo</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($connAvaliacao->select() as $dados): ?>
          <?php if($dados['id_aluno'] == $id): ?>
          <tr>
            <td>
              <?=$dados['data_avaliacao']?>
            </td>
            <td>
              <?=$dados['tipo_avalicao']?>
            </td>
          </tr>
          <?php endif ?>
        <?php endforeach ?>
        </tbody>
      </table>
    </section>
  </main>

  <footer class="pf-footer">
    <small>© TECHFIT</small>
  </footer>

  <script src="/src/js/app.js"></script>
</body>
</html>
