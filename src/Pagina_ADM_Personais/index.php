<?php
    namespace projetoTechfit;
    require_once __DIR__ . "\\..\\..\\backend\\connTables.php";
    $connFuncionario = new ConnTables("funcionarios");
    $connCriam = new ConnTables("criam");

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
                    <?php
                        include_once __DIR__ . "\\..\\..\\utilitarios\\perfilAdm.php"
                    ?>
                </ul>
            </div>
        </div>
    </header>
    <main>
        <div class="container-personais">
            <h2>Instrutores / Personal Trainers</h2>
            <div class="lista-personais">
                <?php foreach($connFuncionario->select() as $dados): ?>
                <?php $aluno = ['whereValue' => $dados['id_funcionario']];?>
                <article class="personal">
                    <img src="/Arquivos/perfil-removebg-preview.png" alt="Personal">
                    <h3><?=$dados['nome_funcionario']?></h3>
                    <?php foreach($connCriam->selectUnique('COUNT(*) as total','id_funcionario = :whereValue','','','',$aluno) as $dado):?>
                    <p>Quantidade de aulas: <?=$dado['total']?></p>
                    <?php endforeach ?>
                </article>
                <?php endforeach ?>
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
