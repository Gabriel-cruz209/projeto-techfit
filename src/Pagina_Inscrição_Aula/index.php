<?php

namespace projetoTechfit;

require_once __DIR__ . "/../../backend/connTables.php";
require_once __DIR__ . "/../../backend/valorTable.php"; 

$aulasDisponiveis = [];
$mensagem = null;
$connAulas = new ConnTables("Aulas");

try {
    $aulasDisponiveis = $connAulas->select();
} catch (\PDOException $e) {
    $mensagem = ['type' => 'error', 'text' => "Erro ao carregar aulas: " . $e->getMessage()];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? null;
    $id_aula = $_POST['aula'] ?? null;

    if (!$email || !$id_aula) {
        $mensagem = ['type' => 'error', 'text' => "Por favor, preencha o e-mail e selecione a aula."];
    } else {
        try {
            $connAluno = new ConnTables('Alunos');
            $aluno = $connAluno->selectUnique("email_aluno = :email", "", "1", [':email' => $email]);
            $id_aluno = $aluno[0]['id_aluno'] ?? null;

            if ($id_aluno) {
                $connInscreve = new ConnTables('Inscrevem');
                
                $dadosInscricao = [
                    'id_aluno' => $id_aluno,
                    'id_aula' => $id_aula
                ];
                
                $connInscreve->insert($dadosInscricao);
                $mensagem = ['type' => 'success', 'text' => "Inscrição na aula realizada com sucesso!"];
            } else {
                $mensagem = ['type' => 'error', 'text' => "Aluno não encontrado. Verifique o e-mail."];
            }
        } catch (\PDOException $e) {
            if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
                $mensagem = ['type' => 'warning', 'text' => "Você já está inscrito nesta aula."];
            } else {
                $mensagem = ['type' => 'error', 'text' => "Erro ao processar a inscrição: " . $e->getMessage()];
            }
        }
    }
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
            <form id="inscricao" class="form-inscricao" method="POST" action="">
                <h2>Inscrição em Aula</h2>

                <?php if ($mensagem): ?>
                    <div class="message-box message-<?php echo $mensagem['type']; ?>">
                        <?php echo $mensagem['text']; ?>
                    </div>
                <?php endif; ?>

                <label for="nome">Nome completo</label>
                <input id="nome" name="nome" type="text" placeholder="Seu nome" required>

                <label for="email">E-mail (Usado para identificar o aluno)</label>
                <input id="email" name="email" type="email" placeholder="seu@exemplo.com" required>

                <label for="telefone">Telefone</label>
                <input id="telefone" name="telefone" type="tel" placeholder="(xx) xxxxx-xxxx">

                <label for="aula">Escolha a aula</label>
                <select id="aula" name="aula" required>
                    <option value="">-- selecione --</option>
                    <?php 
                    if (!empty($aulasDisponiveis)) {
                        foreach ($aulasDisponiveis as $aula) {
                            $nome_aula = htmlspecialchars($aula['tipo_aula'] ?? 'Aula');
                            $data_aula = htmlspecialchars($aula['data_aula'] ?? '');
                            $id_aula = htmlspecialchars($aula['id_aula'] ?? '');
                            echo "<option value=\"{$id_aula}\">{$nome_aula} - {$data_aula}</option>";
                        }
                    } else {
                        echo "<option value=\"\" disabled>Nenhuma aula disponível</option>";
                    }
                    ?>
                </select>

                <label for="data">Data preferida</label>
                <input id="data" name="data" type="date" disabled>

                <button type="submit" class="btn-enviar">Enviar inscrição</button>
            </form>
        </div>
    </main>
    <script>
        function voltar(){
            window.history.back();
        }
    </script>
    <style>
        .message-box {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid;
            font-weight: bold;
        }
        .message-success {
            background-color: #d4edda;
            color: #155724;
            border-color: #c3e6cb;
        }
        .message-error {
            background-color: #f8d7da;
            color: #721c24;
            border-color: #f5c6cb;
        }
        .message-warning {
            background-color: #fff3cd;
            color: #856404;
            border-color: #ffeeba;
        }
    </style>
    <footer>
        <?php
            include_once __DIR__ . "/../../utilitarios/footer.php"
        ?>
    </footer>
        <script src="/src/js/app.js"></script>
    </body>
</html>