<?php
    namespace projetoTechfit;
    require_once __DIR__ . "\\..\\..\\backend\\connTables.php";
    require_once __DIR__ . "\\..\\..\\backend\\valorTable.php";
    $id = $_GET['id'];
    $connInscrevem = new ConnTables("inscrevem");
    $connAluno = new ConnTables("alunos");
    $connAulas = new ConnTables("aulas");
    $aluno;
    foreach($connAluno->select() as $dados){
        if($dados['id_aluno'] == $id){
            $aluno = $dados;
        }
    }
    foreach($connAulas->selectUnique("","","tipo_aula") as $dados){
        echo $dados['id_aula'];
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>TechFit - Inscrição</title>
</head>
<body>
    <header>
        <img src="/Arquivos/LogoTechFit-removebg-preview.png" alt="Logo TechFit">
        <h1>TECHFIT</h1>
        <button onclick="voltar()"><img class="volta" src="/Arquivos/de-volta__1_-removebg-preview.png" alt="Botao-voltar"></button>
    </header>
    <main>
        <div class="container">
            <form id="inscricao" class="form-inscricao" method="POST">
                <h2>Inscrição em Aula</h2>

                <label for="nome_aluno">Nome completo</label>
                <input id="nome" name="nome_aluno" type="text" value="<?=$aluno['nome_aluno']?>" readonly="true" required>

                <label for="email_aluno">E-mail</label>
                <input id="email_aluno" name="email_aluno" type="email" value="<?=$aluno['email_aluno']?>" readonly="true" required>

                <label for="telefone_aluno">Telefone</label>
                <input id="telefone_aluno" name="telefone_aluno" type="tel" value="<?=$aluno['telefone_aluno']?>" readonly="true" required>

                <label for="aula">Escolha a aula</label>
                <select id="aula" name="aula" required>
                    <option value="">selecione a aula</option>
                    <?php foreach($connAulas->select() as $dados): ?>
                        <option value="<?=$dados['id_aula']?>"><?=$dados['tipo_aula']?></option>
                    <?php endforeach ?>
                </select>

                <label for="data">Data preferida</label>
                <input id="data" name="data" type="date">

                <button type="submit" class="btn-enviar">Enviar inscrição</button>
            </form>
        </div>
    </main>
        <script src="/src/js/app.js"></script>
    </body>
</html>
