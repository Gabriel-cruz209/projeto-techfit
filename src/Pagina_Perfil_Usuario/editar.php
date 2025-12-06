<?php
  namespace projetoTechfit;
  require_once __DIR__ . "\\..\\..\\backend\\connTables.php";
  require_once __DIR__ . "\\..\\..\\backend\\valorTable.php";
  $connAluno = new ConnTables("alunos");
  $table = new ValorTable() ;
  $id = $_GET['id'];
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if($_POST['senha'] == $_POST['Csenha']){
      $aluno = $table->getAlunos();
      $aluno['id_aluno'] = $id;
      $aluno['cep_aluno'] = $_POST['cep'];
      $aluno['cpf_aluno'] = $_POST['cpf'];
      $aluno['email_aluno'] = $_POST['email'];
      $aluno['nome_aluno'] = $_POST['nome'];
      $aluno['telefone_aluno'] = $_POST['telefone'];
      $aluno['senha_aluno'] = $_POST['senha'];
      $connAluno->update('id_aluno',$id,$aluno);
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
      <form id="form_validacao" method="POST">
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

        <label for="senha">Senha</label>
        <input id="senha" name="senha" type="password" value="<?=$dados['senha_aluno']?>">

        <label for="Csenha">Confirmar senha</label>
        <input id="Csenha" name="Csenha" type="password" value="<?=$dados['senha_aluno']?>">

        <button class="btn" type="submit">Salvar Alterações</button>
        <?php endif ?>
        <?php endforeach ?>
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
