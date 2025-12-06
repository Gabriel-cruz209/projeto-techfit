<?php

namespace projetoTechfit;

require_once __DIR__ . "\\..\\..\\backend\\connTables.php";

$msg = '';
$connAluno = new ConnTables("alunos");
$connFuncionario = new ConnTables("funcionarios");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $dados = $connAluno->select();
    if (strpos($email, "@techfit.com") !== false) {
        $dadosF = $connFuncionario->select();
        foreach ($dadosF as $dadoF) {
            if ($dadoF['email_funcionario'] == $email) {
                if ($dadoF['senha_funcionario'] == $senha) {
                    $msg = "
                    <h1 class='go'></h1>
                    <script>
                    setTimeout(function() {
                    inicioAdm('?id={$dadoF['id_funcionario']}')
                    },3000)
                    </script>";
                }
                else {
                    $msg = "<p class='alert-in'>Senha ou Email Incorreto</p>";
                }
            }
        }
    } else {
        foreach ($dados as $dado) {
            if ($dado['email_aluno'] == $email) {
                if ($dado['senha_aluno'] == $senha) {
                    $msg = "
                    <h1 class='go'></h1>
                    <script>
                    setTimeout(function() {
                    inicio('?id={$dado['id_aluno']}')
                    },3000)
                    </script>";
                }
                else {
                   $msg = "<p class='alert-in'>Senha ou Email Incorreto</p>"; 
                }
            }
        }
    }
} 


?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - TechFit</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <img src="../../Arquivos/LogoTechFit-removebg-preview.png" alt="TechFit Logo" style="cursor: pointer" onclick="inicioWeb('../../index.php')" >
        <h1>TECHFIT</h1>
    </header>
    <main class="container-login">
        <h2>Login</h2>
        <form id="login-form" method="POST">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" name="senha" required>
            </div>
            <button type="submit">Entrar</button>
            <br>
        </form>
        <p><a onclick="cadastro('')">Não possui Cadastro</a></p>
        <?=  $msg ?>
    </main>
    <script src="../js/app.js"></script>

</body>

</html>