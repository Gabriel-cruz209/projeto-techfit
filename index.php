<?php

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
                <button onclick="cadastro()">Inscrever-se</button>
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
                    <div class="card">
                        <div class="card-content">
                            <div class="title">
                                <h1>BASICO</h1>
                                <h3>Para começar</h3>
                            </div>
                            <div class="content">
                               <ul class="beneficios">
                                    <li class="item">Acesso livre à unidade local</li>
                                    <li class="item">Treinos básicos com acompanhamento inicial</li>
                                    <li class="item">Horário livre em período comercial</li>
                                    <li class="item">Acesso aos equipamentos principais</li>
                                    <li class="item">Avaliação física inicial gratuita</li>
                                </ul>
                                <div class="price-details">
                                    <p class="price">
                                        <span>
                                            R$
                                        </span>
                                        69,99
                                    </p>
                                    <button>Assinar</button>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <div class="title">
                                <h1>AVANÇADO</h1>
                                <h3>Para disfrutar da academia</h3>
                            </div>
                            <div class="content">
                               <ul class="beneficios">
                                    <li class="item">Acesso a todas as unidades TechFit</li>
                                    <li class="item">Treinos personalizados com acompanhamento mensal</li>
                                    <li class="item">Consultoria nutricional online</li>
                                    <li class="item">Participação em aulas coletivas exclusivas</li>
                                    <li class="item">Descontos em suplementos e produtos parceiros</li>
                                    <li class="item">Prioridade no agendamento de horários</li>
                                </ul>
                                <div class="price-details">
                                    <p class="price">
                                        <span>
                                            R$
                                        </span>
                                        105,99
                                    </p>
                                    <button>Assinar</button>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <div class="title">
                                <h1>FAMILIA</h1>
                                <h3>Para toda familia</h3>
                            </div>
                            <div class="content">
                                <ul class="beneficios">
                                    <li class="item">Plano compartilhado para até 4 pessoas</li>
                                    <li class="item">Acesso total a todas as unidades</li>
                                    <li class="item">Treinos personalizados para cada membro</li>
                                    <li class="item">Consultoria nutricional familiar</li>
                                    <li class="item">Descontos em planos anuais e eventos TechFit</li>
                                    <li class="item">Acesso ilimitado a aulas coletivas</li>
                                    <li class="item">Área exclusiva de lazer e descanso</li>
                                </ul>
                                <div class="price-details">
                                    <p class="price">
                                        <span>
                                            R$
                                        </span>
                                        149,99
                                    </p>
                                    <button>Assinar</button>
                                </div>
                            </div>
                        </div>
                    </div>
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
