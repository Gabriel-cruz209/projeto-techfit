<?php
    namespace projetoTechfit;
    require_once __DIR__ . "\\..\\..\\backend\\connTables.php";
    $id = $_GET['id'];
    $connComunicados = new ConnTables("comunicados");

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="/Arquivos/LogoTechFit-removebg-preview.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechFit</title>
</head>
<body>
    <!-- HEADER -->
    <header>
        <div class="logo-academia">
            <img src="/Arquivos/LogoTechFit-removebg-preview.png" alt="Logo-Academia">
            <h1>TECHFIT</h1>
        </div>
        
        <div class="secoes">
            <?php 
                include_once __DIR__ . "\\..\\..\\utilitarios\\secao.php"
            ?>
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

    <!-- MAIN -->
    <main>
        <h2>Comunicados</h2>

        <!-- COMUNICADOS IMPORTANTES -->
        <div class="forma_comu">
            <h3>Importantes</h3>
            <div class="forma_local">
                <?php foreach($connComunicados->select() as $dados): ?>
                <?php if($dados['tipo_comunicado'] == 'importante'): ?>
                <div class="forma_unidade">
                    <h4><?=$dados['titulo_comunicado']?></h4>
                    <p><?=$dados['informacao_comunicado']?></p>
                    <hr>
                    <div class="sub-info">
                        <button class="botao-curtir" onclick="curtir(this)"><i class="far fa-heart"></i></button>
                        <span class="contador-curtidas" data-count="0">Curtidas: 0</span>
                    </div>
                </div>
                <?php endif ?>
                <?php endforeach ?>
            </div>
        </div>

        <!-- PARCERIAS -->
        <div class="forma_comu">
            <h3>Parcerias</h3>
            <div class="forma_local">
                <?php foreach($connComunicados->select() as $dados): ?>
                <?php if($dados['tipo_comunicado'] == 'parceria'): ?>
                <div class="forma_unidade">
                    <h4><?=$dados['titulo_comunicado']?></h4>
                    <p><?=$dados['informacao_comunicado']?></p>
                    <hr>
                    <div class="sub-info">
                        <button class="botao-curtir" onclick="curtir(this)"><i class="far fa-heart"></i></button>
                        <span class="contador-curtidas" data-count="0">Curtidas: 0</span>
                    </div>
                </div>
                <?php endif ?>
                <?php endforeach ?>
            </div>
        </div>

        <!-- COMUNICADOS RECENTES -->
         <div class="forma_comu">
            <h3>Recentes</h3>
            <div class="forma_local">
                <?php foreach($connComunicados->select() as $dados): ?>
                <?php if($dados['tipo_comunicado'] == 'geral'): ?>
                <div class="forma_unidade">
                    <h4><?=$dados['titulo_comunicado']?></h4>
                    <p><?=$dados['informacao_comunicado']?></p>
                    <hr>
                    <div class="sub-info">
                        <button class="botao-curtir" onclick="curtir(this)"><i class="far fa-heart"></i></button>
                        <span class="contador-curtidas" data-count="0">Curtidas: 0</span>
                    </div>
                </div>
                <?php endif ?>
                <?php endforeach ?>
            </div>
        </div>

    </main>

    <!-- FOOTER -->
    <footer id="tabela-web-footer">
        <?php
            include_once __DIR__ . "\\..\\..\\utilitarios\\footer.php"
        ?>
    </footer>

    <script src="/src/js/app.js"></script>

</body>
</html>
