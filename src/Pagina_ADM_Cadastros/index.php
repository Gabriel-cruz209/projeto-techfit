<?php

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADM - Cadastros</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="../../utilitarios/padrao.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <img src="../../Arquivos/LogoTechFit-removebg-preview.png" alt="logo">
                <p>TECHFIT</p>
            </div>
        </div>
    </header>
    <main>
        <section class="cadastros">
            <div class="form-container">
                <div class="menu-cadastros">
                    <button onclick="sec('Unidade')">Unidades</button>
                    <button onclick="sec('Funcionario')">Funcionários</button>
                    <button onclick="sec('Aluno')">Alunos</button>
                    <button onclick="sec('Comunicado')">Comunicados</button>
                    <button onclick="sec('Aulas')">Aulas</button>
                    <button onclick="sec('AvFisica')">Avaliação Física</button>
                </div>
                <div id="Unidade" class="cadastro-form">
                    <h2>Cadastro de Unidades</h2>
                    <form id="form-unidades">
                        <label>Nome:</label>
                        <input type="text" name="nome" required>
                        <label>Endereco:</label>
                        <input type="text" name="endereco">
                        <label>Cidade:</label>
                        <input type="text" name="cidade">
                        <label>Estado:</label>
                        <input type="text" name="estado">
                        <label>Telefone:</label>
                        <input type="text" name="telefone">
                        <button type="submit">Salvar Unidade</button>
                    </form>
                </div>
                <div id="Funcionario" class="cadastro-form" style="display:none;">
                    <h2>Cadastro de Funcionários</h2>
                    <form id="form-funcionarios">
                        <label>Nome:</label>
                        <input type="text" name="nome" required>
                        <label>CPF:</label>
                        <input type="text" name="cpf">
                        <label>Telefone:</label>
                        <input type="text" name="telefone">
                        <label>Cargo:</label>
                        <input type="text" name="cargo">
                        <button type="submit">Salvar Funcionário</button>
                    </form>
                </div>
                <div id="Aluno" class="cadastro-form" style="display:none;">
                    <h2>Cadastro de Alunos</h2>
                    <form id="form-alunos">
                        <label>Nome:</label>
                        <input type="text" name="nome" required>
                        <label>CPF:</label>
                        <input type="text" name="cpf">
                        <label>Telefone:</label>
                        <input type="text" name="telefone">
                        <label>Data de Nascimento:</label>
                        <input type="date" name="data_nasc">
                        <button type="submit">Salvar Aluno</button>
                    </form>
                </div>
                <div id="Comunicado" class="cadastro-form" style="display:none;">
                    <h2>Cadastro de Comunicados</h2>
                    <form id="form-comunicados">
                        <label>Título:</label>
                        <input type="text" name="titulo" required>
                        <label>Descrição:</label>
                        <textarea name="descricao"></textarea>
                        <button type="submit">Publicar Comunicado</button>
                    </form>
                </div>
                <div id="Aulas" class="cadastro-form" style="display:none;">
                    <h2>Cadastro de Aulas</h2>
                    <form id="form-aulas">
                        <label>Título:</label>
                        <input type="text" name="titulo" required>
                        <label>Descrição:</label>
                        <textarea name="descricao"></textarea>
                        <label>Data/Hora:</label>
                        <input type="datetime-local" name="data_hora">
                        <button type="submit">Salvar Aula</button>
                    </form>
                </div>
                <div id="AvFisica" class="cadastro-form" style="display:none;">
                    <h2>Cadastro de Avaliação Física</h2>
                    <form id="form-avaliacoes">
                        <label>Aluno ID:</label>
                        <input type="number" name="aluno_id" required>
                        <label>Altura:</label>
                        <input type="text" name="altura">
                        <label>Peso:</label>
                        <input type="text" name="peso">
                        <label>IMC:</label>
                        <input type="text" name="imc">
                        <button type="submit">Salvar Avaliação</button>
                    </form>
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>TECHFIT</title>
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
        <section class="cadastros">
            <h2>Cadastros</h2>

            <div class="selecao">
                <button onclick="sec('Unidade')">Unidade</button>
                <button onclick="sec('Funcionario')">Funcionario</button>
                <button onclick="sec('Aluno')">Aluno</button>
                <button onclick="sec('Comunicado')">Comunicado</button>
                <button onclick="sec('Aulas')">Aula</button>
                <button onclick="sec('AvFisica')">Av.Fisica</button>
            </div>

            <div class="form-container">
                <div class="hidden" id="Unidade">
                <form id="form-unidades" class="cadastro-form" method="post" action="#">
                    <h3>Unidades</h3>
                    <label for="nome_unidade">Nome da Unidade</label>
                    <input type="text" id="nome_unidade" name="nome_unidade" required>

                    <label for="cep_unidade">CEP</label>
                    <input type="text" id="cep_unidade" name="cep_unidade" placeholder="00000-000" required>

                    <button type="submit">Cadastrar Unidade</button>
                </form>
                </div>

                <div class="hidden" id="Funcionario">
                <form id="form-funcionarios" class="cadastro-form" method="post" action="#">
                    <h3>Funcionários</h3>
                    <label for="nome_funcionario">Nome</label>
                    <input type="text" id="nome_funcionario" name="nome_funcionario" required>

                    <label for="data_nascimento_funcionario">Data de Nascimento</label>
                    <input type="date" id="data_nascimento_funcionario" name="data_nascimento_funcionario" required>

                    <label for="email_funcionario">Email</label>
                    <input type="email" id="email_funcionario" name="email_funcionario" required>

                    <label for="telefone_funcionario">Telefone</label>
                    <input type="text" id="telefone_funcionario" name="telefone_funcionario" required>

                    <label for="tipo_funcionario">Tipo</label>
                    <input type="text" id="tipo_funcionario" name="tipo_funcionario" required>

                    <label for="senha_funcioanrio">Senha</label>
                    <input type="password" id="senha_funcioanrio" name="senha_funcioanrio" required>

                    <label for="cpf_funcionario">CPF</label>
                    <input type="text" id="cpf_funcionario" name="cpf_funcionario" required>

                    <label for="id_unidade_func">ID da Unidade</label>
                    <input type="number" id="id_unidade_func" name="id_unidade" min="1" required>

                    <label for="cep_funcionario">CEP</label>
                    <input type="text" id="cep_funcionario" name="cep_funcionario" required>

                    <button type="submit">Cadastrar Funcionário</button>
                </form></div>

                <div class="hidden" id="Aluno">
                <form id="form-alunos" class="cadastro-form" method="post" action="#">
                    <h3>Alunos</h3>
                    <label for="nome_aluno">Nome</label>
                    <input type="text" id="nome_aluno" name="nome_aluno" required>

                    <label for="data_nascimento_aluno">Data de Nascimento</label>
                    <input type="date" id="data_nascimento_aluno" name="data_nascimento_aluno" required>

                    <label for="cpf_aluno">CPF</label>
                    <input type="text" id="cpf_aluno" name="cpf_aluno" required>

                    <label for="telefone_aluno">Telefone</label>
                    <input type="text" id="telefone_aluno" name="telefone_aluno" required>

                    <label for="email_aluno">Email</label>
                    <input type="email" id="email_aluno" name="email_aluno" required>

                    <label for="senha_aluno">Senha</label>
                    <input type="password" id="senha_aluno" name="senha_aluno" required>

                    <label for="cep_aluno">CEP</label>
                    <input type="text" id="cep_aluno" name="cep_aluno" required>

                    <label for="id_unidade_aluno">ID da Unidade</label>
                    <input type="number" id="id_unidade_aluno" name="id_unidade" min="1" required>

                    <button type="submit">Cadastrar Aluno</button>
                </form></div>

                <div class="hidden" id="Comunicado">
                <form id="form-comunicados" class="cadastro-form" method="post" action="#">
                    <h3>Comunicados</h3>
                    <label for="titulo_comunicado">Título</label>
                    <input type="text" id="titulo_comunicado" name="titulo_comunicado" required>

                    <label for="informacao_comunicado">Informação</label>
                    <textarea id="informacao_comunicado" name="informacao_comunicado" rows="3" required></textarea>

                    <button type="submit">Cadastrar Comunicado</button>
                </form></div>

                <div class="hidden" id="Aulas">
                <form id="form-aulas" class="cadastro-form" method="post" action="#">
                    <h3>Aulas</h3>
                    <label for="data_aula">Data e Hora</label>
                    <input type="datetime-local" id="data_aula" name="data_aula" required>

                    <label for="tipo_aula">Tipo de Aula</label>
                    <input type="text" id="tipo_aula" name="tipo_aula" required>

                    <label for="id_aluno_aula">ID do Aluno</label>
                    <input type="number" id="id_aluno_aula" name="id_aluno" min="1" required>

                    <button type="submit">Cadastrar Aula</button>
                </form></div>

                <div class="hidden" id="AvFisica">
                <form id="form-avaliacoes" class="cadastro-form" method="post" action="#">
                    <h3>Avaliação Física</h3>
                    <label for="data_avaliacao">Data e Hora</label>
                    <input type="datetime-local" id="data_avaliacao" name="data_avaliacao" required>

                    <label for="tipo_avalicao">Tipo de Avaliação</label>
                    <input type="text" id="tipo_avalicao" name="tipo_avalicao" required>

                    <label for="id_aluno_avaliacao">ID do Aluno</label>
                    <input type="number" id="id_aluno_avaliacao" name="id_aluno" min="1" required>

                    <button type="submit">Cadastrar Avaliação</button>
                </form></div>
            </div>
        </section>
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
