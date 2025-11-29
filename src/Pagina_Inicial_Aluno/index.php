<?php
    namespace projetoTechfit;
    require_once __DIR__ . "\\..\\..\\backend\\connTables.php";
    $aluno;
    $connAluno = new ConnTables("alunos");
    $connComunicados = new ConnTables("comunicados");
    $id = $_GET['id'];
    $dados = $connAluno->select();
    foreach($dados as $dado) {
        if($dado['id_aluno']== $id){
            $aluno = $dado;
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="/Arquivos/LogoTechFit-removebg-preview.png" type="image/x-icon">
    <link rel="shortcut icon" href="/Arquivos/LogoTechFit-removebg-preview.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechFit</title>
</head>
<body>
    <header>
        <div class="logo-academia" style="cursor: pointer" onclick="inicioWeb('')('../../index.php')">
            <img src="../../Arquivos/LogoTechFit-removebg-preview.png" alt="Logo da TechFit">
            <p>TECHFIT</p>
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
    <main>
        <h1>Bem Vindo a TechFit</h1>
        <div class="forma_comu">
            <h2>Comunicados</h2>
            <h3>Importantes</h3>
            <div class="forma_local">
                <?php if(!empty($connComunicados->select())): ?>
                    <?php foreach($connComunicados->select() as $comunicado): ?>
                    <div class="forma_unidade">
                        <h4><?= $comunicado['titulo_comunicado']; ?></h4>
                        <p><?= $comunicado['informacao_comunicado']; ?></p>
                        <hr>
                        <div class="sub-info">
                            <button class="botao-curtir" onclick="curtir(this)"><i class="far fa-heart"></i></button>
                            <span class="contador-curtidas" data-count="0">Curtidas: 0</span>
                        </div>
                    </div>
                    <?php endforeach ?>
                    <?php else: ?>
                        <p>Não há nenhum comunicado importante</p>
                    <?php endif ?>
            </div>
        </div>
        
    </main>
    <footer id="tabela-web-footer">
        <div class="coluna-informacao" style="cursor: pointer" onclick="inicioWeb('')('../../index.php')">   
            <img src="../../Arquivos/LogoTechFit-removebg-preview.png" alt="Logo da TechFit">
            <p>TECHFIT</p>
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