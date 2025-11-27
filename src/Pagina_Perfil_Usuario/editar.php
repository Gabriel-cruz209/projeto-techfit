<?php

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="../../utilitarios/padrao.css">
</head>
<body>
    <main>
        <section class="editar-perfil">
            <h1>Editar Perfil</h1>
            <form id="form-editar">
                <label>Nome:</label>
                <input type="text" name="nome" id="nome" required>
                <label>Email:</label>
                <input type="email" name="email" id="email" required>
                <label>Telefone:</label>
                <input type="tel" name="telefone" id="telefone">
                <label>CPF:</label>
                <input type="text" name="cpf" id="cpf">
                <button type="submit">Salvar Alterações</button>
            </form>
        </section>
    </main>
    <script src="./script.js"></script>
</body>
</html>
<?php

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
            <button onclick="Perfil()">Perfil</button>
            <button onclick="Avaliacao()">Avaliacaos</button>
            <button onclick="Editar()">Editar</button>
            <button onclick="Agendamento()">Agendamento</button>
        </div>

        <div class="func-perfil" id="func-perfil">
            <div class="perfil">
                <img class="botaoPerfil" id="botaoPerfil" src="/Arquivos/perfil-removebg-preview.png" alt="Foto_Perfil">
            </div>
            <div class="secoes-perfil" id="menuPerfil">
                <ul>
                    <li class="info-usuario">
                        <span>Usuário</span>
                        <strong>Gabriel Soares</strong>
                    </li>
                    <hr>
                    <li><a href="#"><i class="fas fa-user"></i> Perfil</a></li>
                    <li><a href="#"><i class="fa-solid fa-user-doctor"></i> Avaliação Fisica</a></li>
                    <li><a href="#"><i class="fa-regular fa-calendar-days"></i> Agendamento</a></li>
                    <li><a href="#"><i class="fas fa-sign-out-alt"></i> Sair</a></li>
                </ul>
            </div>
        </div>

    </header>

  <main class="pf-main">
    <section class="form-edit">
      <h2>Editar Perfil</h2>
      <form id="form-editar">
        <label for="nome">Nome</label>
        <input id="nome" name="nome" type="text" value="Gabriel Soares" required>

        <label for="email">Email</label>
        <input id="email" name="email" type="email" value="gabriel@example.com" required>

        <label for="telefone">Telefone</label>
        <input id="telefone" name="telefone" type="text" value="(19)99999-9999" required>

        <label for="cpf">CPF</label>
        <input id="cpf" name="cpf" type="text" value="000.000.000-00" required>

        <label for="cep">CEP</label>
        <input id="cep" name="cep" type="text" value="13040-001">

        <label for="senha">Senha</label>
        <input id="senha" name="senha" type="password" placeholder="Nova senha">

        <button class="btn" type="submit">Salvar Alterações</button>
      </form>
    </section>
  </main>

  <footer class="pf-footer">
    <small>© TECHFIT</small>
  </footer>

    <script src="/src/js/app.js"></script>
</body>
</html>
