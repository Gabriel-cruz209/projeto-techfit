<?php
  namespace projetoTechfit;
  require_once __DIR__ . "\\..\\..\\backend\\connTables.php";
  $aluno;
  $unidade;
  $plano;
  $connAluno = new ConnTables("alunos");
  $connUnidade = new ConnTables("unidades");
  $connPlano = new ConnTables("planos");
  $dadosP = $connPlano->select();
  $dadosU = $connUnidade->select();
  $dados = $connAluno->select();
  $id = $_GET['id'];
  $aluno = '';
  $unidade ='';
  $plano= '';
  foreach($dados as $dado) {
    if($dado['id_aluno'] == $id){
      $aluno = $dado;
      foreach($dadosU as $dadoU ){
        if($dado['id_unidade']==$dadoU['id_unidade']){
          $unidade = $dadoU;
        }
      }
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
  <title>Perfil - TECHFIT</title>
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
    <section class="perfil-card">
      <img class="avatar" src="/Arquivos/perfil-removebg-preview.png" alt="Foto do usuário">
      <h2 id="usuario-nome"><?=$aluno['nome_aluno']?></h2>
      <p id="usuario-email"><?=$aluno['email_aluno']?></p>

      <div class="acoes">
        <a class="btn" href="editar.php?id=<?=$id?>">Editar Perfil</a>
        <a class="btn" href="avaliacao.php?id=<?=$id?>">Minhas Avaliações</a>
      </div>
    </section>

    <section class="info-card">
      <h3>Informações</h3>
      <ul>
        <li><strong>CPF:</strong> <span id="usuario-cpf"><?=$aluno['cpf_aluno']?></span></li>
        <li><strong>Telefone:</strong> <span id="usuario-tel"><?=$aluno['telefone_aluno']?></span></li>
        <li><strong>Unidade:</strong> <span id="usuario-unidade"></span><?=$unidade['nome_unidade']?></li>
        <?php if($plano): ?>
        <li><strong>Plano:</strong><span id="usuario-plano"></span><?=$plano['nome_plano']?></li>
        <?php else: ?>
        <li><strong>Plano:</strong><span id="usuario-plano"></span>Nenhum plano selecionado</li>
        <?php endif ?>
      </ul>
    </section>
  </main>

  <footer class="pf-footer">
    <small>© TECHFIT</small>
  </footer>

  <script src="/src/js/app.js"></script>
</body>
</html>
