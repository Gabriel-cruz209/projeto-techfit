<?php

namespace projetoTechfit;

require_once __DIR__ . "\\..\\..\\backend\\connTables.php";
require_once __DIR__ . "\\..\\..\\backend\\valorTable.php";

$tables = new ValorTable();
$connAluno = new ConnTables("alunos");
$connUnidade = new ConnTables('unidades');
$connPlano = new ConnTables('planos');
$id_plano = '';
if ($_GET) {
    $id_plano = $_GET['id_plano'];
}

$msg = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // ALUNO
    $alunos = $tables->getAlunos();
    $alunos['nome_aluno'] = $_POST['nome_aluno'];
    $alunos['cpf_aluno'] = $_POST['cpf_aluno'];
    $alunos['cep_aluno'] = $_POST['cep_aluno'];
    $alunos['data_nascimento_aluno'] = $_POST['data_nascimento'];

    if ($connAluno->selectUnique("", "email_aluno = :email", "", "", "", ['email' => $_POST['email_aluno']])) {
        $msg = "<p class='alert-in'>Email já cadastrado</p>";
    }
    if ($connAluno->selectUnique("", "cpf_aluno = :cpf", "", "", "", ['cpf' => $_POST['cpf_aluno']])) {
        $msg = "<p class='alert-in'>CPF já cadastrado</p>";
    }
    $alunos['email_aluno'] = $_POST['email_aluno'];
    $alunos['telefone_aluno'] = $_POST['telefone_aluno'];
    $alunos['senha_aluno'] = $_POST['senha_aluno'];
    $alunos['id_unidade'] = $_POST['id_unidade'];
    $alunos['id_plano'] = $_POST['id_plano'];



    // Se não houve erro até agora
    if ($msg == '') {

        if ($_POST['senha_aluno'] == $_POST['confirmar_senha']) {
            // Insere aluno
            $connAluno->insert($alunos);


            $msg = "<h1 class='go'></h1>
                <script>
                    setTimeout(function() {
                        login('')
                    }, 3000)
                </script>";
        } else {
            $msg = "<p class='alert-in'>Senha e confirmar senha precisam ser iguais</p>";
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
        <img src="../../Arquivos/LogoTechFit-removebg-preview.png" alt="Logo-Academia" style="cursor: pointer" onclick="inicioWeb('../../index.php')">
        <h1>TECHFIT</h1>
        <button onclick="inicioWeb('')"><img src="../../Arquivos/saida.png" alt="Botao-saida"></button>
    </header>

    <div class="corpo">
        <main class="container-cadastro">
            <h2>Cadastro</h2>
            <div class="in">
                <div class="left">


                    <form class="form_validacao" method="POST">

                        <div class="form-group">
                            <label>Nome do Aluno</label>
                            <input type="text" name="nome_aluno" required>
                        </div>

                        <div class="form-group">
                            <label>Endereço - CEP</label>
                            <input type="text" name="cep_aluno" maxlength="9" required>
                        </div>

                        <div class="form-group">
                            <label>Data de Nascimento</label>
                            <input type="date" name="data_nascimento" max="2011-01-01" required>
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
                            <label>Email</label>
                            <input type="email" name="email_aluno" required>
                        </div>
                </div>
                <div class="rigth">

                    <div class="form-group">
                        <label>Unidade</label>
                        <select id="select_unidade" name="id_unidade" required>
                            <option value="">Selecione a unidade</option>
                            <?php foreach ($connUnidade->select() as $u): ?>
                                <option value="<?= $u['id_unidade'] ?>">
                                    <?= $u['nome_unidade'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>



                    <div class="form-group">
                        <label>Criar Senha</label>
                        <input type="password" name="senha_aluno" required>
                    </div>

                    <div class="form-group">
                        <label>Confirmar Senha</label>
                        <input type="password" name="confirmar_senha" required>
                    </div>

                    <div class="form-group">
                        <label>Plano</label>
                        <select id="select_plano" name="id_plano">
                            <option value="">Selecione o Plano</option>

                            <?php foreach ($connPlano->select() as $plano): ?>
                                <?php if ($plano['id_plano'] == $id_plano):  ?>
                                    <option value="<?= $plano['id_plano'] ?>" selected>
                                        <?= $plano['nome_plano'] ?> — R$ <?= $plano['valor_plano'] ?>
                                    </option>
                                <?php else: ?>
                                    <option value="<?= $plano['id_plano'] ?>">
                                        <?= $plano['nome_plano'] ?> — R$ <?= $plano['valor_plano'] ?>
                                    </option>
                                <?php endif ?>
                            <?php endforeach; ?>

                        </select>
                        <div id="mensagem_plano"></div>
                    </div>
                    <button type="submit">Cadastrar</button>
                    </form>

                    <p><a onclick="login('')">Já Possui Cadastro</a></p>
                    <?= $msg ?>
                </div>
            </div>
        </main>
    </div>
    <script src="../js/app.js"></script>
    <script src="../js/regex.js"></script>
    <script src="../js/validacoes.js"></script>
</body>

</html>