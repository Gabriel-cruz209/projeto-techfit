<?php

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADM - Início</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="../../utilitarios/padrao.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <img src="../../Arquivos/LogoTechFit-removebg-preview.png" alt="Logo TechFit">
                <p>TECHFIT</p>
            </div>
        </div>
    </header>
    <main>
        <section class="dashboard">
            <div class="container">
                <h1>Painel Administrativo</h1>
                <div class="cards">
                    <div class="card">Usuários: 120</div>
                    <div class="card">Aulas Hoje: 8</div>
                    <div class="card">Funcionários: 15</div>
                </div>
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
    <title>TechFit - Administrativo</title>
</head>
<body>
    <header>
        <div class="logo-academia">
            <img src="/Arquivos/LogoTechFit-removebg-preview.png" alt="Logo-Academia">
            <h1>TECHFIT</h1>
        </div>
        
        <div class="secoes">
            <button onclick="inicio()">Inicio</button>
            <button onclick="cadastro()">Cadastros</button>
            <button onclick="relatorios()">relatorios</button>
            <button onclick="personais()">personal</button>
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
                    <li><a href="/src/tela_inicial_web/index.php"><i class="fas fa-sign-out-alt"></i> Sair</a></li>
                </ul>
            </div>
        </div>
    </header>
    <main>
        <div class="adm-dashboard">
            <div class="cards">
                <div class="card">
                    <h3>Usuários</h3>
                    <p class="big">1.234</p>
                </div>
                <div class="card">
                    <h3>Aulas</h3>
                    <p class="big">26</p>
                </div>
                <div class="card">
                    <h3>Relatórios</h3>
                    <p class="big">Ver</p>
                    <a class="link-card" href="/src/Pagina_ADM_Relatorios/index.php">Abrir</a>
                </div>
                <div class="card">
                    <h3>Personais</h3>
                    <p class="big">8</p>
                    <a class="link-card" href="/src/Pagina_ADM_Personais/index.php">Abrir</a>
                </div>
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
