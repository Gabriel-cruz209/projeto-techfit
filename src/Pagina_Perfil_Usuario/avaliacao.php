
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
            <th>Detalhes</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>24/10/2025</td>
            <td>Inicial</td>
            <td>Peso: 78kg - Altura: 1.80m</td>
          </tr>
          <tr>
            <td>15/08/2025</td>
            <td>Desenvolvimento</td>
            <td>Progresso: +3kg força</td>
          </tr>
        </tbody>
      </table>

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
