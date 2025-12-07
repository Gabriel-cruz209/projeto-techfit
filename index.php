<?php
    namespace projetoTechfit;
    require_once __DIR__ . "\\backend\\connTables.php";
    $connPlano = new ConnTables("planos");
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechFit</title>
    <link rel="shortcut icon" href="./Arquivos/LogoTechFit-removebg-preview.png" type="image/x-icon">
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="/utilitarios/padrao.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="logo"  style="cursor: pointer" onclick="window.location.href='#'">   
                <img src="../../Arquivos/LogoTechFit-removebg-preview.png" alt="Logo da TechFit">
                <p>TECHFIT</p>    
            </div>
            <div class="conteudo">
                <nav class="menu">
                    <a href="#contatos">Contatos</a>
                </nav>
                <button onclick="login('')">Login</button>
                <button onclick="cadastro('')">Inscrever-se</button>
            </div>
        </div>
    </header>
    <main>
        <section class="imagem">
            <p>Precisão em cada movimento</p>
            <button onclick="window.location.href = '#planos'">ESCOLHER PLANOS</button>
        </section>
        <section class="vazio1"></section>
        <section class="apresentacao">
            <div class="container">
                <div class="logo"  style="cursor: pointer" onclick="window.location.href='#'">
                    <img src="../../Arquivos/LogoTechFit-removebg-preview.png" alt="Logo da TechFit">
                    <p>TECHFIT</p>
                </div>
                <div class="cards">
                    <article class="card">
                        <h2>Localização</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem earum saepe quae facere possimus quo officia aspernatur esse culpa placeat quisquam eum nam libero id temporibus nemo eius rem! Quos?</p>
                    </article>
                    <article class="card">
                        <h2>Sobre Nós</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem earum saepe quae facere possimus quo officia aspernatur esse culpa placeat quisquam eum nam libero id temporibus nemo eius rem! Quos?</p>
                    </article>
                    <article class="card">
                        <h2>O que Oferecemos</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem earum saepe quae facere possimus quo officia aspernatur esse culpa placeat quisquam eum nam libero id temporibus nemo eius rem! Quos?</p>
                    </article>
                </div>
            </div>
        </section>
        <section class="vazio2"></section>
        <section id="planos" class="planos">
            <div class="container">
                <h2>Planos</h2>
                <div class="cards">
                    <?php foreach($connPlano->select() as $dados): ?>
                    <?php $descricaos = explode(",",$dados['descricao_plano']) ?>
                    <div class="card">
                        <div class="card-content">
                            <div class="title">
                                <h1><?=$dados['nome_plano']?></h1>
                                <h3>DNA - TechFit</h3>
                            </div>
                            <div class="content">
                               <ul class="beneficios">
                                    <?php foreach($descricaos as $descricao): ?>
                                    <li class="item"><?=trim($descricao)?></li>
                                    <?php endforeach ?>
                                </ul>
                                <div class="price-details">
                                    <p class="price">
                                        <span>
                                            R$
                                        </span>
                                        <?=$dados['valor_plano']?>
                                    </p>
                                    <button onclick="cadastro('?id_plano=<?=$dados['id_plano']?>')">Assinar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ?>
                </div>
            </div>
        </section>
    </main>
    <footer id="contatos">
        <div class="container">
            <div class="logo" style="cursor: pointer" onclick="window.location.href='#'">   
                <img src="../../Arquivos/LogoTechFit-removebg-preview.png" alt="Logo da TechFit">
                <p>TECHFIT</p>
            </div>
            <div class="info-contato">
                <nav class="redes-sociais">
                    <a href="https://www.instagram.com" target="_blank">Instagram</a>
                    <a href="https://www.facebook.com" target="_blank">Facebook</a>
                </nav>
                <h4>(19) 99999-9999</h4>
                <h4>TECHFIT ACADEMIA</h4>
            </div>
        </div>
    </footer>
    <script src="/src/js/app.js"></script>
</body>
</html>
