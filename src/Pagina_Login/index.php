<?php
namespace projetoTechfit;
require_once __DIR__ . "\\..\\..\\backend\\connTables.php";

$connAluno = new ConnTables("alunos");
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $dados = $connAluno->select();

    foreach($dados as $dado) {
        if($dado['email_aluno'] == $email){
            if($dado['senha_aluno'] == $senha){
                echo "
                <h1>Esta indo</h1>
                <script>
                setTimeout(function() {
                inicio('?id={$dado['id_aluno']}')
                },3000)
                </script>";
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
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="../../utilitarios/padrao.css">
</head>
<body>
    <div class="login-container">
        <div class="logo">
            <img src="../../Arquivos/LogoTechFit-removebg-preview.png" alt="TechFit Logo">
            <h1>TechFit</h1>
        </div>
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
        </form>
    </div>
    <script src="../js/app.js"></script>
    
</body>
</html>
