<?php

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Usuário</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="../../utilitarios/padrao.css">
</head>
<body>
    <header>
        <div class="header-content">
            <div class="logo">
                <img src="../../Arquivos/LogoTechFit-removebg-preview.png" alt="Logo TechFit">
                <p>TECHFIT</p>
            </div>
        </div>
    </header>
    <main>
        <section class="perfil-card">
            <img src="../../Arquivos/avatar.png" alt="Avatar" class="avatar">
            <h2 id="usuario-nome">Nome do Usuário</h2>
            <p id="usuario-email">email@example.com</p>
            <div class="info-card">
                <p><strong>CPF:</strong> <span id="usuario-cpf">000.000.000-00</span></p>
                <p><strong>Telefone:</strong> <span id="usuario-telefone">(19) 99999-9999</span></p>
            </div>
            <div class="acoes">
                <a href="./editar.php">Editar Perfil</a>
                <a href="./avaliacao.php">Avaliações</a>
                <a href="./agendamento.php">Agendar Aula</a>
            </div>
        </section>
    </main>
    <script src="/src/js/app.js"></script>
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
  <title>Perfil - TECHFIT</title>
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
    <section class="perfil-card">
      <img class="avatar" src="/Arquivos/perfil-removebg-preview.png" alt="Foto do usuário">
      <h2 id="usuario-nome">Gabriel Soares</h2>
      <p id="usuario-email">gabriel@example.com</p>

      <div class="acoes">
        <a class="btn" href="editar.php">Editar Perfil</a>
        <a class="btn" href="avaliacao.php">Minhas Avaliações</a>
      </div>
    </section>

    <section class="info-card">
      <h3>Informações</h3>
      <ul>
        <li><strong>CPF:</strong> <span id="usuario-cpf">000.000.000-00</span></li>
        <li><strong>Telefone:</strong> <span id="usuario-tel">(19)99999-9999</span></li>
        <li><strong>Unidade:</strong> <span id="usuario-unidade">TECHFIT Campinas Norte</span></li>
      </ul>
    </section>
  </main>

  <footer class="pf-footer">
    <small>© TECHFIT</small>
  </footer>

  <script src="/src/js/app.js"></script>
</body>
</html>
