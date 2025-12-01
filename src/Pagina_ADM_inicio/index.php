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
    <title>TechFit - Administrativo</title>
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
                    <?php
                        include_once __DIR__ . "\\..\\..\\utilitarios\\perfilAdm.php"
                    ?>
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
        <?php
            include_once __DIR__ . "\\..\\..\\utilitarios\\footer.php"
        ?>
    </footer>

    <script src="/src/js/app.js"></script>
</body>
</html>
