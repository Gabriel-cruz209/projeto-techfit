
<?php

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
                    <li><a href="/src/Pagina_Perfil_Usuario/index.php"><i class="fas fa-user"></i> Perfil</a></li>
                    <li><a href="/src/Pagina_Inicial_Aluno/index.php"><i class="fa-solid fa-house"></i> Home </a></li>
                    <li><a href="/src/Pagina_Perfil_Usuario/avaliacao.php"><i class="fa-solid fa-user-doctor"></i> Avaliação Fisica</a></li>
                    <li><a href="/src/Pagina_Perfil_Usuario/agendamento.php"><i class="fa-regular fa-calendar-days"></i> Agendamento</a></li>
                    <li><a href="/src/tela_inicial_web/index.php"><i class="fas fa-sign-out-alt"></i> Sair</a></li>
                </ul>
            </div>
        </div>

    </header>

  <main class="pf-main">
    <section class="avaliacoes-list">
      <h2>Minhas Avaliações</h2>
      <ul id="lista-avaliacoes">
        <li>24/10/2025 - Inicial - <em>Peso: 78kg - Altura: 1.80m</em></li>
        <li>15/08/2025 - Desenvolvimento - <em>Progresso: +3kg força</em></li>
      </ul>

      <h3>Agendar nova avaliação</h3>
      <form id="form-avaliacao">
        <label for="data_av">Data e hora</label>
        <input id="data_av" name="data_av" type="datetime-local" required>

        <label for="tipo_av">Tipo</label>
        <select id="tipo_av" name="tipo_av">
          <option value="inicial">Inicial</option>
          <option value="desenvolvimento">Desenvolvimento</option>
        </select>

        <button class="btn" type="submit">Agendar Avaliação</button>
      </form>
    </section>
  </main>

  <footer class="pf-footer">
    <small>© TECHFIT</small>
  </footer>

  <script src="/src/js/app.js"></script>
</body>
</html>
