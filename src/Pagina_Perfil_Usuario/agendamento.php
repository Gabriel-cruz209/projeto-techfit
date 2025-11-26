<?php

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamento</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="../../utilitarios/padrao.css">
</head>
<body>
    <main>
        <section class="agendamento">
            <h1>Agendar Aula</h1>
            <form id="form-agendamento">
                <label>Aula:</label>
                <select name="aula">
                    <option>Musculação</option>
                    <option>Zumba</option>
                </select>
                <label>Data/Hora:</label>
                <input type="datetime-local" name="data_hora">
                <button type="submit">Agendar</button>
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
  <title>Agendamento - TECHFIT</title>
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
    <section class="agendamento">
      <h2>Agendar Aula / Sessão</h2>
      <form id="form-agendamento">
        <label for="tipo_ag">Tipo</label>
        <select id="tipo_ag" name="tipo_ag">
          <option value="musculacao">Musculação</option>
          <option value="funcional">Funcional</option>
          <option value="yoga">Yoga</option>
          <option value="pilates">Pilates</option>
        </select>

        <label for="data_ag">Data e hora</label>
        <input id="data_ag" name="data_ag" type="datetime-local" required>

        <label for="observacao">Observação</label>
        <textarea id="observacao" name="observacao" rows="3"></textarea>

        <button class="btn" type="submit">Agendar</button>
      </form>
    </section>
  </main>

  <footer class="pf-footer">
    <small>© TECHFIT</small>
  </footer>

  <script src="script.js"></script>
</body>
</html>
