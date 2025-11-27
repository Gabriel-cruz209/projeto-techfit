
<?php

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>TechFit - Relatórios</title>
</head>
<body>
    <header>
        <div class="logo-academia">
            <img src="/Arquivos/LogoTechFit-removebg-preview.png" alt="Logo-Academia">
            <h1>TECHFIT</h1>
        </div>
        
        <div class="secoes">
            <button onclick="inicioAdm()">Inicio</button>
            <button onclick="cadastroAdm()">Cadastros</button>
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
        <div class="container-relatorios">
            <h2>Relatórios</h2>
            <div class="cards">
                <div class="card">
                    <h3>Inscrições (Hoje)</h3>
                    <p class="big">24</p>
                </div>
                <div class="card">
                    <h3>Aulas Lotadas</h3>
                    <p class="big">3</p>
                </div>
                <div class="card">
                    <h3>Novos Alunos (Semana)</h3>
                    <p class="big">56</p>
                </div>
            </div>

            <section class="tabela-rel">
                <h3>Últimas inscrições</h3>
                <table>
                    <thead>
                        <tr><th>Nome</th><th>Aula</th><th>Data</th><th>Unidade</th></tr>
                    </thead>
                    <tbody>
                        <tr><td>Maria Silva</td><td>Yoga</td><td>22/11/2025</td><td>Limeira</td></tr>
                        <tr><td>João Souza</td><td>Spinning</td><td>21/11/2025</td><td>Piracicaba</td></tr>
                    </tbody>
                </table>
            </section>
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
