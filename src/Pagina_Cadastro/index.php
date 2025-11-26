<?php

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - TechFit</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="../../utilitarios/padrao.css">
</head>
<body>
    <div class="cadastro-container">
        <div class="logo">
            <img src="../../Arquivos/LogoTechFit-removebg-preview.png" alt="TechFit Logo">
            <h1>Crie sua conta</h1>
        </div>
        <form id="cadastro-form">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="tel" id="telefone" name="telefone">
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>
            </div>
            <button type="submit">Cadastrar</button>
        </form>
    </div>
    <script src="./script.js"></script>
</body>
</html>
<?php

?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="../../Arquivos/LogoTechFit-removebg-preview.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechFit</title>
</head>

<body>
    <header>
        <img src="../../Arquivos/LogoTechFit-removebg-preview.png" alt="Logo-Academia">
        <h1>TECHFIT</h1>
        <button onclick="login()"><img src="../../Arquivos/saida.png" alt="Botao-saida"></button>
    </header>

    <main>
        <div class="container-cadastro">
            <h2>Cadastro</h2>
            <div class="form-group">
                <h3>Nome do Aluno</h3>
                <input type="text" id="aluno">
            </div>
            <div class="form-group">
                <h3>Endereço - CEP</h3>
                <input type="text" id="cepAluno">
            </div>
            <div class="form-group">
                <h3>Data de Nascimento</h3>
                <input type="date" id="dataNascimento">
            </div>
            <div class="form-group">
                <h3>CPF</h3>
                <input type="number" id="cpfAluno">
            </div>
            <div class="form-group">
                <h3>Criar Senha</h3>
                <input type="password" id="senhaAluno">
            </div>
            <div class="form-group">
                <h3>Confirmar Senha</h3>
                <input type="password" id="CsenhaAluno">
            </div>
            <button onclick="acessoLogin()">Acessar</button>
            <p><a href="../Pagina_Login/index.php">Já Possui Cadastro</a></p>
            <p><a href="">Esqueci minha senha</a></p>
        </div>
    </main>
    <script src="script.js" defer></script>
</body>

</html>
