<?php
    namespace projetoTechfit;
    $id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>TechFit - Personais</title>
</head>
<body>
    <header>
        <div class="logo-academia">
            <img src="/Arquivos/LogoTechFit-removebg-preview.png" alt="Logo-Academia">
            <h1>TECHFIT</h1>
        </div>
        
        <div class="secoes">
            <?php
                include_once __DIR__ . "\\..\\..\\utilitarios\\secaoAdm.php"
            ?>
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
                    <li><a href="/src/Pagina_ADM_inicio/index.php"><i class="fa-solid fa-house"></i> Home </a></li>
                    <li><a href="/src/Pagina_Perfil_Usuario/avaliacao.php"><i class="fa-solid fa-user-doctor"></i> Avaliação Fisica</a></li>
                    <li><a href="/src/Pagina_Perfil_Usuario/agendamento.php"><i class="fa-regular fa-calendar-days"></i> Agendamento</a></li>
                    <li><a href="/src/tela_inicial_web/index.php"><i class="fas fa-sign-out-alt"></i> Sair</a></li>
                </ul>
            </div>
        </div>
    </header>
    <main>
        <div class="container-personais">
            <h2>Instrutores / Personal Trainers</h2>
            <div class="lista-personais">
                <article class="personal">
                    <img src="/Arquivos/perfil-removebg-preview.png" alt="Personal">
                    <h3>Lucas Pereira</h3>
                    <p>Especialidade: Musculação / Treino funcional</p>
                    <button onclick="agendaPr()">Ver agenda</button>
                </article>
                <article class="personal">
                    <img src="/Arquivos/perfil-removebg-preview.png" alt="Personal">
                    <h3>Ana Costa</h3>
                    <p>Especialidade: Pilates / Reabilitação</p>
                    <button onclick="agendaPr()">Ver agenda</button>
                </article>
            </div>
        </div>
    </main>
    <footer id="tabela-web-footer">
        <div class="coluna-informacao">
            <img src="../../Arquivos/LogoTechFit-removebg-preview.png" alt="logo-techfit">
            <h4 class="logo">TECHFIT</h4>
        </div>
        <div class="coluna-informacao">
            <a href=""><h4><i class="fa-brands fa-instagram"></i>techfit@gmail.com</h4></a>
        </div>
        <div class="coluna-informacao">
            <a href=""><h4><i class="fa-solid fa-phone"></i>(19)99999-9999</h4></a>
        </div>
        <div class="coluna-informacao">
            <a href="" target="_blank"><h4><i class="fa-brands fa-facebook"></i>TECHFITACADEMIA</h4></a>
        </div>
    </footer>
    <script src="/src/js/app.js"></script>
</body>
</html>
