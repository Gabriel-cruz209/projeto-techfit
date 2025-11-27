<?php
    namespace projetoTechfit;
    require_once __DIR__ . "\\..\\..\\backend\\connTables.php";
    require_once __DIR__ . "\\..\\..\\backend\\valorTable.php";
    $tables = new ValorTable();
    $conn = new ConnTables("alunos");
    $conn2 = new ConnTables('unidades');
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $alunos = $tables->getAlunos();
        $alunos['nome_aluno'] = $_POST['nome_aluno'];
        $alunos['cpf_aluno'] = $_POST['cpf_aluno'];
        $alunos['cep_aluno'] = $_POST['cep_aluno'];
        $alunos['data_nascimento_aluno'] = $_POST['data_nascimento'];
        $alunos['email_aluno'] = $_POST['email_aluno'];
        $alunos['telefone_aluno'] = $_POST['telefone_aluno'];
        $alunos['senha_aluno'] = $_POST['senha_aluno'];
        $alunos['id_unidade'] = $_POST['id_unidade'];
        $conn->insert($alunos);
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
        <img src="../../Arquivos/LogoTechFit-removebg-preview.png" alt="Logo-Academia">
        <h1>TECHFIT</h1>
        <button onclick="login()"><img src="../../Arquivos/saida.png" alt="Botao-saida"></button>
    </header>

    <main class="container-cadastro">
        
        <h2>Cadastro</h2>

        <form method="POST">

            <div class="form-group">
                <label for="aluno">Nome do Aluno</label>
                <input type="text" id="aluno" name="nome_aluno" required>
            </div>

            <div class="form-group">
                <label for="cepAluno">Endereço - CEP</label>
                <input type="text" id="cepAluno" name="cep_aluno" maxlength="9" required>
            </div>

            <div class="form-group">
                <label for="dataNascimento">Data de Nascimento</label>
                <input type="date" id="dataNascimento" name="data_nascimento" required>
            </div>

            <div class="form-group">
                <label for="cpfAluno">CPF</label>
                <input type="text" id="cpfAluno" name="cpf_aluno" maxlength="14" required>
            </div>

            <div class="form-group">
                <label for="telefoneAluno">Telefone</label>
                <input type="text" id="telefoneAluno" name="telefone_aluno" maxlength="15" required>
            </div>

            <div class="form-group">
                <label for="emailAluno">Email</label>
                <input type="email" id="emailAluno" name="email_aluno" required>
            </div>

            <div class="form-group">
                <select name="id_unidade" id="id_unidade" required>
                    <option value="">Selecione a unidade</option>

                    <?php foreach ($conn2->select() as $unidade): ?>
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

        <p><a href="../Pagina_Login/index.php">Já Possui Cadastro</a></p>
        <p><a href="#">Esqueci minha senha</a></p>
    </main>
    <script src="script.js" defer></script>
</body>

</html>
