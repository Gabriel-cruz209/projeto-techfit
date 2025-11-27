<?php

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - TechFit</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="../../utilitarios/padrao.css">
</head>
<body>
    <div class="login-container">
        <div class="logo">
            <img src="../../Arquivos/LogoTechFit-removebg-preview.png" alt="TechFit Logo">
            <h1>TechFit</h1>
        </div>
        <form id="login-form">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>
            </div>
            <button type="submit">Entrar</button>
        </form>
    </div>
    <script src="./script.js"></script>
</body>
</html>
