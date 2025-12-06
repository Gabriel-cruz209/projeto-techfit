<?php

namespace projetoTechfit;

require_once __DIR__ . "\\..\\..\\backend\\connTables.php";
require_once __DIR__ . "\\..\\..\\backend\\valorTable.php";
$tables = new ValorTable();
$connAluno = new ConnTables("alunos");
$connUnidade = new ConnTables('unidades');

$msg = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $alunos = $tables->getAlunos();
    $alunos['nome_aluno'] = $_POST['nome_aluno'];
    $alunos['cpf_aluno'] = $_POST['cpf_aluno'];
    $alunos['cep_aluno'] = $_POST['cep_aluno'];
    $alunos['data_nascimento_aluno'] = $_POST['data_nascimento'];
    foreach($connAluno->select() as $dados){
        if($dados['email_aluno'] == $_POST['email_aluno']){
            $msg = "<p class='alert-in'>Email ja cadastrado</p>";
        }
    }
    $alunos['email_aluno'] = $_POST['email_aluno'];
    $alunos['telefone_aluno'] = $_POST['telefone_aluno'];
    $alunos['senha_aluno'] = $_POST['senha_aluno'];
    $alunos['id_unidade'] = $_POST['id_unidade'];
    if($msg == ''){
        if ($_POST['senha_aluno'] == $_POST['confirmar_senha']) {
            $connAluno->insert($alunos);
            $msg = "<h1 class='go'></h1>
                        <script>
                        setTimeout(function() {
                        login('')
                        },3000)
                        </script>";
        } else {
            $msg = "<p class='alert-in'>Senha e confirmar senha tem que ser iguais</p>";
        }
    }
}
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
        <img src="../../Arquivos/LogoTechFit-removebg-preview.png" alt="Logo-Academia style="cursor: pointer" onclick="inicioWeb('')('../../index.php')" >
        <h1>TECHFIT</h1>
        <button onclick="login('')"><img src="../../Arquivos/saida.png" alt="Botao-saida"></button>
    </header>

    <main class="container-cadastro">

        <h2>Cadastro</h2>

        <form id="form_validacao" method="POST">

            <div class="form-group">
                <label for="aluno">Nome do Aluno</label>
                <input type="text" id="aluno" name="nome_aluno" required>
            </div>

            <div class="form-group">
                <label for="cepAluno">Endereço - CEP</label>
                <input type="text" id="cep" name="cep_aluno" maxlength="9" required>
            </div>

            <div class="form-group">
                <label for="dataNascimento">Data de Nascimento</label>
                <input type="date" id="dataNascimento" name="data_nascimento" required>
            </div>

            <div class="form-group">
                <label for="cpf">CPF</label>
                <input type="text" id="cpf" name="cpf_aluno" maxlength="14" required>
            </div>

            <div class="form-group">
                <label for="telefoneAluno">Telefone</label>
                <input type="text" id="telefone" name="telefone_aluno" maxlength="15" required>
            </div>

            <div class="form-group">
                <label for="emailAluno">Email</label>
                <input type="email" id="emailAluno" name="email_aluno" required>
            </div>

            <div class="form-group">
                <label for="unidadeAluno">Unidade</label><br>
                <select name="id_unidade" id="id_unidade" required>
                    <option value="">Selecione a unidade</option>

                    <?php foreach ($connUnidade->select() as $unidade): ?>
                        <option value="<?= $unidade['id_unidade'] ?>">
                            <?= $unidade['nome_unidade'] ?>
                        </option>
                    <?php endforeach; ?>

                </select>
            </div>

            <div class="form-group">
                <label for="senhaAluno">Criar Senha</label>
                <input type="password" id="senhaAluno" name="senha_aluno" required>
            </div>

            <div class="form-group">
                <label for="CsenhaAluno">Confirmar Senha</label>
                <input type="password" id="CsenhaAluno" name="confirmar_senha" required>
            </div>
            <button type="submit">Cadastrar</button>
        </form>
        <p><a onclick="login('')">Já Possui Cadastro</a></p>
        <?= $msg ?>
    </main>
    <script src="../js/app.js"></script>
    <script src="../js/regex.js"></script>
    <script src="../js/validacoes.js"></script>
</body>

</html>