<?php
    namespace projetoTechfit;
    require_once __DIR__ . "\\..\\..\\backend\\connTables.php";
    $id = $_GET['id'];
    $connAulas = new ConnTables("aulas");
    $connUnidade = new ConnTables("unidades");
    echo "
    <script>
    document.addEventListener('DOMContentLoaded', function () {

        const select = document.getElementById('menu-tipo');
        const blocos = document.querySelectorAll('.tipo-aula');

        // esconder todas as aulas no início
        blocos.forEach(div => div.style.display = 'none');

        // evento para mudar
        select.addEventListener('change', function () {
            const valor = this.value; // nome da aula (ex: 'Musculação')

            blocos.forEach(div => {
                if (div.id === valor) {
                    div.style.display = 'block';   // mostrar apenas a selecionada
                } else {
                    div.style.display = 'none';    // esconder todas as outras
                }
            });
        });

    });
    </script>
    "
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css"> <link rel="shortcut icon" href="/Arquivos/LogoTechFit-removebg-preview.png" type="image/x-icon">
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
       <div class="container">
           <div class="area_pesquisa">
                <div class="barra_pesquisa">
                    <label for="menu-tipo">Escolha a aula</label>
                    <select id="menu-tipo" name="menu-tipo" required>
                        <option value="">selecione a aula</option>
                        <?php foreach($connAulas->selectUnique('tipo_aula',"","","tipo_aula") as $dados): ?>
                            <option value="<?=$dados['tipo_aula']?>"><?=$dados['tipo_aula']?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
       
            <?php foreach($connAulas->selectUnique('tipo_aula',"","","tipo_aula") as $dados): ?>
            <div id="<?=$dados['tipo_aula']?>" class="tipo-aula">
                <h2><?=$dados['tipo_aula']?></h2>
                <?php foreach($connAulas->select() as $dadosA): ?>
                <?php foreach($connUnidade->select() as $dadosU): ?>
                <?php if($dados['tipo_aula'] == $dadosA['tipo_aula']): ?>
                <?php if($dadosA['id_unidade'] == $dadosU['id_unidade']): ?>
                <div class="unidade"> <!--estado="SP" cidade="Limeira" -->
                    <img src="/Arquivos/Imagem-Academia-Real.png" alt="Logo-Panobianco">
                    <div class="local">
                        <h3><?=$dadosU['nome_unidade']?></h3>
                        <a href="https://www.google.com/maps/place/Panobianco+Academia+-+Limeira+Centro/@-22.5845224,-47.4216592,15z/data=!4m6!3m5!1s0x94c881c0034f9deb:0xc9dfce08a61d0952!8m2!3d-22.5845224!4d-47.4216592!16s%2Fg%2F11fmz_qxs7?authuser=2&entry=ttu">Localização</a>
                        <p><?=$dadosA['descricao_aula']?></p>
                        <button onclick="inscrever('?id=<?=$id?>')">Inscrever-se</button>
                    </div>
                </div>
                <?php endif ?>
                <?php endif ?>
                <?php endforeach ?>
                <?php endforeach ?>
            </div>
            <?php endforeach ?>
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
