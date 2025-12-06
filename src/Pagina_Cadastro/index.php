<?php

namespace projetoTechfit;

require_once __DIR__ . "\\..\\..\\backend\\connTables.php";
require_once __DIR__ . "\\..\\..\\backend\\valorTable.php";

$tables = new ValorTable();
$connAluno = new ConnTables("alunos");
$connUnidade = new ConnTables('unidades');
$connPlano = new ConnTables('planos');
$connPagamento = new ConnTables("pagamentos");

$msg = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // ALUNO
    $alunos = $tables->getAlunos();
    $alunos['nome_aluno'] = $_POST['nome_aluno'];
    $alunos['cpf_aluno'] = $_POST['cpf_aluno'];
    $alunos['cep_aluno'] = $_POST['cep_aluno'];
    $alunos['data_nascimento_aluno'] = $_POST['data_nascimento'];

    // Verificar email duplicado
    foreach ($connAluno->select() as $dados) {
        if ($dados['email_aluno'] == $_POST['email_aluno']) {
            $msg = "<p class='alert-in'>Email já cadastrado</p>";
        }
    }

    $alunos['email_aluno'] = $_POST['email_aluno'];
    $alunos['telefone_aluno'] = $_POST['telefone_aluno'];
    $alunos['senha_aluno'] = $_POST['senha_aluno'];
    $alunos['id_unidade'] = $_POST['id_unidade'];
    $alunos['id_plano'] = $_POST['id_plano']; // AQUI ESTAVA DANDO ERRO — AGORA FUNCIONA

    // PAGAMENTO
    $pagamentos = $tables->getPagamentos();
    $pagamentos['numero_cartao_pagamento'] = $_POST['numero_cartao_pagamento'];
    $pagamentos['nome_cartao_pagamento'] = $_POST['nome_cartao_pagamento'];
    $pagamentos['ccv_cartao_pagamento'] = $_POST['ccv_cartao_pagamento'];
    $pagamentos['validade_cartao_pagamento'] = $_POST['validade_cartao_pagamento'];

    // Se não houve erro até agora
    if ($msg == '') {

        if ($_POST['senha_aluno'] == $_POST['confirmar_senha']) {

            // Insere aluno
            $connAluno->insert($alunos);

            // Insere pagamento
            $connPagamento->insert($pagamentos);

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
        <button onclick="login('')"><img src="../../Arquivos/saida.png" alt="Botao-saida"></button>
    </header>

    <main class="container-cadastro">

        <h2>Cadastro</h2>

        <form method="POST">

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
                <input type="date" name="data_nascimento" required>
            </div>

            <div class="form-group">
                <label>CPF</label>
                <input type="text" name="cpf_aluno" maxlength="14" required>
            </div>

            <div class="form-group">
                <label>Telefone</label>
                <input type="number" name="telefone_aluno" maxlength="15" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email_aluno" required>
            </div>

            <div class="form-group">
                <label>Unidade</label>
                <select name="id_unidade" required>
                    <option value="">Selecione a unidade</option>
                    <?php foreach ($connUnidade->select() as $u): ?>
                        <option value="<?= $u['id_unidade'] ?>">
                            <?= $u['nome_unidade'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label>Plano</label>
                <select name="id_plano" required>
                    <option value="">Selecione o Plano</option>

                    <?php foreach ($connPlano->select() as $plano): ?>
                        <option value="<?= $plano['id_plano'] ?>">
                            <?= $plano['nome_plano'] ?> — R$ <?= $plano['valor_plano'] ?>
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

            <h2>Cadastro Forma de Pagamento</h2>

            <div class="form-group">
                <label>Número do Cartão</label>
                <input type="text" name="numero_cartao_pagamento" maxlength="19" placeholder="0000 0000 0000 0000" required>
            </div>

            <div class="form-group">
                <label>Nome Impresso no Cartão</label>
                <input type="text" name="nome_cartao_pagamento" required>
            </div>

            <div class="form-group">
                <label>Validade</label>
                <input type="text" name="validade_cartao_pagamento" maxlength="5" placeholder="MM/AA" required>
            </div>

            <div class="form-group">
                <label>CCV</label>
                <input type="text" name="ccv_cartao_pagamento" maxlength="4" required>
            </div>

            <button type="submit">Cadastrar</button>
        </form>

        <p><a onclick="login('')">Já Possui Cadastro</a></p>
        <?= $msg ?>
    </main>

    <script src="../js/app.js"></script>
</body>

</html>
