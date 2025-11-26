<?php

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aulas - Aluno</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="../../utilitarios/padrao.css">
</head>
<body>
    <main>
        <section class="aulas">
            <h1>Aulas disponíveis</h1>
            <div class="lista-aulas">
                <div class="aula">Zumba - 10:00</div>
                <div class="aula">Musculação - 12:00</div>
            </div>
        </section>
    </main>
</body>
</html>
<?php

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
        <div class="logo-academia">
            <img src="/Arquivos/LogoTechFit-removebg-preview.png" alt="Logo-Academia">
            <h1>TECHFIT</h1>
        </div>
        
        <div class="secoes">
            <button onclick="inicio()">Inicio</button>
            <button onclick="aula()">Aulas</button>
            <button onclick="comunicados()">Comunicados</button>
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
       <div class="container">
           <div class="area_pesquisa">
                <div class="barra_pesquisa">
                    <label for="menu-tipo"><i class="fa-solid fa-dumbbell"></i></label>
                    <select id="menu-tipo" name="menu-tipo">
                        <option value="boxe">Boxe</option>
                        <option value="zumba">Zumba</option>
                        <option value="muaythay">Muay Thay</option>
                    </select>
                </div>
                <div class="barra_pesquisa">
                    <label for="pes_estado"><i class="fa-solid fa-location-dot"></i></label>
                    <input type="text" id="pes_estado" name="pes_estado" placeholder="Região (Estado)">
                </div>
                <div class="barra_pesquisa">
                    <label for="pes_cidade"><i class="fa-solid fa-city"></i></label>
                    <input type="text" id="pes_cidade" name="pes_cidade" placeholder="Unidade (Cidade)">
                </div>
            </div>
       
       
            <div id="boxe" class="tipo-aula">
                <h2>BOXE</h2>
                <div class="unidade" estado="SP" cidade="Limeira">
                    <img src="/Arquivos/Imagem-Academia-Real.png" alt="Logo-Panobianco">
                    <div class="local">
                        <h3>Unidade Limeira - SP</h3>
                        <a href="https://www.google.com/maps/place/Panobianco+Academia+-+Limeira+Centro/@-22.5845224,-47.4216592,15z/data=!4m6!3m5!1s0x94c881c0034f9deb:0xc9dfce08a61d0952!8m2!3d-22.5845224!4d-47.4216592!16s%2Fg%2F11fmz_qxs7?authuser=2&entry=ttu">Localização</a>
                        <p>Descrição da aula de Boxe em Limeira. Lorem ipsum dolor sit amet...</p>
                        <button onclick="inscrever()">Inscrever-se</button>
                    </div>
                </div>
                <div class="unidade" estado="SP" cidade="Piracicaba">
                    <img src="/Arquivos/Imagem-Academia-Real.png" alt="Logo-Panobianco">
                    <div class="local">
                        <h3>Unidade Piracicaba - SP</h3>
                        <a href="https://www.google.com/maps/place/Panobianco+Academia+-+Limeira+Centro/@-22.5845224,-47.4216592,15z/data=!4m6!3m5!1s0x94c881c0034f9deb:0xc9dfce08a61d0952!8m2!3d-22.5845224!4d-47.4216592!16s%2Fg%2F11fmz_qxs7?authuser=2&entry=ttu">Localização</a>
                        <p>Descrição da aula de Boxe em Piracicaba. Lorem ipsum dolor sit amet...</p>
                        <button onclick="inscrever()">Inscrever-se</button>
                    </div>
                </div>
            </div>

            <div id="zumba" class="tipo-aula hidden">
                <h2>ZUMBA</h2>
                <div class="unidade" estado="SP" cidade="Limeira">
                    <img src="/Arquivos/Imagem-Academia-Real.png" alt="Logo-Panobianco">
                    <div class="local">
                        <h3>Unidade Limeira - SP </h3>
                        <a href="https://www.google.com/maps/place/Panobianco+Academia+-+Limeira+Centro/@-22.5845224,-47.4216592,15z/data=!4m6!3m5!1s0x94c881c0034f9deb:0xc9dfce08a61d0952!8m2!3d-22.5845224!4d-47.4216592!16s%2Fg%2F11fmz_qxs7?authuser=2&entry=ttu">Localização</a>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Harum modi, enim eveniet sunt, alias velit voluptates, nobis labore impedit dolorum minus quam sapiente dolores natus...</p>
                        <button onclick="inscrever()">Inscrever-se</button>
                    </div>
                </div>
                <div class="unidade" estado="MG" cidade="Belo Horizonte">
                    <img src="/Arquivos/Imagem-Academia-Real.png" alt="Logo-Panobianco">
                    <div class="local">
                        <h3>Unidade Belo Horizonte - MG</h3>
                        <a href="https://www.google.com/maps/place/Panobianco+Academia+-+Limeira+Centro/@-22.5845224,-47.4216592,15z/data=!4m6!3m5!1s0x94c881c0034f9deb:0xc9dfce08a61d0952!8m2!3d-22.5845224!4d-47.4216592!16s%2Fg%2F11fmz_qxs7?authuser=2&entry=ttu">Localização</a>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Harum modi, enim eveniet sunt, alias velit voluptates, nobis labore impedit dolorum minus quam sapiente dolores natus...</p>
                        <button onclick="inscrever()">Inscrever-se</button>
                    </div>
                </div>
            </div>

            <div id="muaythay" class="tipo-aula hidden">
                <h2>MUAY THAY</h2>
                <div class="unidade" estado="SP" cidade="Campinas">
                    <img src="/Arquivos/Imagem-Academia-Real.png" alt="Unidade-MuayThay">
                    <div class="local">
                        <h3>Unidade Campinas - SP</h3>
                        <a href="https://www.google.com/maps/place/Panobianco+Academia+-+Limeira+unidade+jd+ouro+verde/@-22.5935294,-47.4293426,13z/data=!4m10!1m2!2m1!1slimeira+localiza%C3%A7%C3%A3o+panobianco!3m6!1s0x94c881c0034f9deb:0xc9dfce08a61d0952!8m2!3d-22.5845224!4d-47.4216592!15sCiBsaW1laXJhIGxvY2FsaXphw6fDo28gcGFub2JpYW5jbyIDiAEBkgEDZ3ltqgFoCg0vZy8xMWgzdmR6NDkyEAEqDiIKcGFub2JpYW5jbygMMh8QASIbmITxjk8T4BAel7NwWC6woxmCL6rxI3CdE4-xMiQQAiIgbGltZWlyYSBsb2NhbGl6YcOnw6NvIHBhbm9iaWFuY2_gAQA!16s%2Fg%2F11fmz_qxs7?authuser=2&entry=ttu&g_ep=EgoyMDI1MTAwOC4wIKXMDSoASAFQAw%3D%3D">Localização</a>
                        <p>Descrição Muay Thay Campinas. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Harum modi, enim eveniet sunt...</p>
                        <button onclick="inscrever()">Inscrever-se</button>
                    </div>
                </div>
                <div class="unidade" estado="RJ" cidade="Rio de Janeiro">
                    <img src="/Arquivos/Imagem-Academia-Real.png" alt="Unidade-MuayThay">
                    <div class="local">
                        <h3>Unidade Rio de Janeiro - RJ</h3>
                        <a href="https://www.google.com/maps/place/Panobianco+Academia+-+Limeira+unidade+jd+ouro+verde/@-22.5935294,-47.4293426,13z/data=!4m10!1m2!2m1!1slimeira+localiza%C3%A7%C3%A3o+panobianco!3m6!1s0x94c881c0034f9deb:0xc9dfce08a61d0952!8m2!3d-22.5845224!4d-47.4216592!15sCiBsaW1laXJhIGxvY2FsaXphw6fDo28gcGFub2JpYW5jbyIDiAEBkgEDZ3ltqgFoCg0vZy8xMWgzdmR6NDkyEAEqDiIKcGFub2JpYW5jbygMMh8QASIbmITxjk8T4BAel7NwWC6woxmCL6rxI3CdE4-xMiQQAiIgbGltZWlyYSBsb2NhbGl6YcOnw6NvIHBhbm9iaWFuY2_gAQA!16s%2Fg%2F11fmz_qxs7?authuser=2&entry=ttu&g_ep=EgoyMDI1MTAwOC4wIKXMDSoASAFQAw%3D%3D">Localização</a>
                        <p>Descrição Muay Thay RJ. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Harum modi, enim eveniet sunt...</p>
                        <button onclick="inscrever()">Inscrever-se</button>
                    </div>
                </div>
                <div class="unidade" estado="SP" cidade="São Paulo">
                    <img src="/Arquivos/Imagem-Academia-Real.png" alt="Unidade-MuayThay">
                    <div class="local">
                        <h3>Unidade São Paulo - SP</h3>
                        <a href="https://www.google.com/maps/place/Panobianco+Academia+-+Limeira+unidade+jd+ouro+verde/@-22.5935294,-47.4293426,13z/data=!4m10!1m2!2m1!1slimeira+localiza%C3%A7%C3%A3o+panobianco!3m6!1s0x94c881c0034f9deb:0xc9dfce08a61d0952!8m2!3d-22.5845224!4d-47.4216592!15sCiBsaW1laXJhIGxvY2FsaXphw6fDo28gcGFub2JpYW5jbyIDiAEBkgEDZ3ltqgFoCg0vZy8xMWgzdmR6NDkyEAEqDiIKcGFub2JpYW5jbygMMh8QASIbmITxjk8T4BAel7NwWC6woxmCL6rxI3CdE4-xMiQQAiIgbGltZWlyYSBsb2NhbGl6YcOnw6NvIHBhbm9iaWFuY2_gAQA!16s%2Fg%2F11fmz_qxs7?authuser=2&entry=ttu&g_ep=EgoyMDI1MTAwOC4wIKXMDSoASAFQAw%3D%3D">Localização</a>
                        <p>Descrição Muay Thay SP. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Harum modi, enim eveniet sunt...</p>
                        <button onclick="inscrever()">Inscrever-se</button>
                    </div>
                </div>
            </div>

        </div> </main>
    <footer id="tabela-web-footer">
        <div class="coluna-informacao">
            <img src="../../Arquivos/LogoTechFit-removebg-preview.png" alt="logo-techfit">
            <h4 class="logo">TECHFIT</h4>
        </div>
        <div class="coluna-informacao">
            <h4><i class="fa-brands fa-instagram"></i>techfit@gmail.com</h4>
        </div>
        <div class="coluna-informacao">
            <h4><i class="fa-solid fa-phone"></i>(19)99999-9999</h4>
        </div>
        <div class="coluna-informacao">
            <h4><i class="fa-brands fa-facebook"></i>TECHFITACADEMIA</h4>
        </div>
    </footer>
    <script src="script.js"></script> </body>
</html>
