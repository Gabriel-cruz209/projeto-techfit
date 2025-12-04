<?php

namespace projetoTechfit;

require_once __DIR__ . "\\..\\..\\backend\\connTables.php";

$alunoTable = new ConnTables("Alunos");
$funcTable  = new ConnTables("Funcionarios");
$aulaTable  = new ConnTables("Aulas");
$unidTable  = new ConnTables("Unidades");

$alunos = $alunoTable->select();
$funcionarios = $funcTable->select();
$aulas = $aulaTable->select();
$unidades = $unidTable->select();
$id = $_GET['id'];
$msg = "";

/* ---------------------- EDITAR ALUNO ----------------------- */
if (isset($_POST["action"]) && $_POST["action"] === "editar_aluno") {
    $id = $_POST["id_aluno"];

    $alunoTable->update("id_aluno", $id, [
        "nome_aluno" => $_POST["nome_aluno"],
        "cpf_aluno" => $_POST["cpf_aluno"],
        "email_aluno" => $_POST["email_aluno"],
        "telefone_aluno" => $_POST["telefone_aluno"],
        "data_nascimento_aluno" => $_POST["data_nascimento_aluno"],
        "cep_aluno" => $_POST["cep_aluno"],
        "senha_aluno" => $_POST["senha_aluno"],
        "id_unidade" => $_POST["id_unidade"]
    ]);

    $msg = "Aluno atualizado com sucesso!";
    $alunos = $alunoTable->select();
}

/* ---------------------- EDITAR FUNCIONÁRIO ----------------------- */
if (isset($_POST["action"]) && $_POST["action"] === "editar_funcionario") {
    $id = $_POST["id_funcionario"];

    $funcTable->update("id_funcionario", $id, [
        "nome_funcionario" => $_POST["nome_funcionario"],
        "cpf_funcionario" => $_POST["cpf_funcionario"],
        "email_funcionario" => $_POST["email_funcionario"],
        "telefone_funcionario" => $_POST["telefone_funcionario"],
        "data_nascimento_funcionario" => $_POST["data_nascimento_funcionario"],
        "cep_funcionario" => $_POST["cep_funcionario"],
        "tipo_funcionario" => $_POST["tipo_funcionario"],
        "senha_funcionario" => $_POST["senha_funcionario"],
        "id_unidade" => $_POST["id_unidade_funcionario"]
    ]);

    $msg = "Funcionário atualizado com sucesso!";
    $funcionarios = $funcTable->select();
}

/* ---------------------- EDITAR AULA ----------------------- */
function convertDate($data)
{
    if (!empty($data) && strpos($data, "T") !== false) {
        return str_replace("T", " ", $data) . ":00";
    }
    return $data;
}

if (isset($_POST["action"]) && $_POST["action"] === "editar_aula") {
    $id = $_POST["id_aula"];

    $aulaTable->update("id_aula", $id, [
        "tipo_aula" => $_POST["tipo_aula"],
        "data_aula" => convertDate($_POST["data_aula"]),
        "id_unidade" => $_POST["id_unidade_aula"],
        "descricao_aula" => $_POST["descricao_aula"]
    ]);

    $msg = "Aula atualizada com sucesso!";
    $aulas = $aulaTable->select();
}

if (isset($_POST["deletar_aluno_id"])) {
    $id = $_POST["deletar_aluno_id"];
    $delete['whereValue'] = $id;
    $alunoTable->delete($delete, "id_aluno");
    $msg = "Aluno deletado com sucesso!";
    $alunos = $alunoTable->select();
}

if (isset($_POST["deletar_funcionario_id"])) {
    $id = $_POST["deletar_funcionario_id"];
    $delete['whereValue'] = $id;
    $funcTable->delete($delete, "id_funcionario");
    $msg = "funcionario deletado com sucesso!";
    $funcionarios = $funcTable->select();
}

if (isset($_POST["deletar_aula_id"])) {
    $id = $_POST["deletar_aula_id"];
    $delete['whereValue'] = $id;
    $aulaTable->delete($delete, "id_aula");
    $msg = "aula deletado com sucesso!";
    $aulas = $aulaTable->select();
}

/* ---------------------- PEGAR ITEM PARA EDIÇÃO ----------------------- */



$alunoParaEditar = null;
$funcParaEditar = null;
$aulaParaEditar = null;

if (isset($_POST["editar_aluno_id"])) {
    foreach ($alunos as $a) {
        if ($a["id_aluno"] == $_POST["editar_aluno_id"]) {
            $alunoParaEditar = $a;
            break;
        }
    }
}

if (isset($_POST["editar_funcionario_id"])) {
    foreach ($funcionarios as $f) {
        if ($f["id_funcionario"] == $_POST["editar_funcionario_id"]) {
            $funcParaEditar = $f;
            break;
        }
    }
}

if (isset($_POST["editar_aula_id"])) {
    foreach ($aulas as $au) {
        if ($au["id_aula"] == $_POST["editar_aula_id"]) {
            $aulaParaEditar = $au;
            break;
        }
    }
}

function dtLocal($dt)
{
    return str_replace(" ", "T", substr($dt, 0, 16));
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechFit - Relatórios</title>
    <link rel="shortcut icon" href="/Arquivos/LogoTechFit-removebg-preview.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <div class="logo-academia">
            <img src="/Arquivos/LogoTechFit-removebg-preview.png" alt="Logo-Academia">
            <h1>TECHFIT</h1>
        </div>

        <div class="secoes">
            <?php
                include_once __DIR__ . "\\..\\..\\utilitarios\\secaoAdm.php"
            ?>
        </div>

        <div class="func-perfil" id="func-perfil">
            <div class="perfil">
                <img class="botaoPerfil" id="botaoPerfil" src="/Arquivos/perfil-removebg-preview.png" alt="Foto_Perfil">
            </div>
            <div class="secoes-perfil" id="menuPerfil">
                <ul>
                    <?php
                    include_once __DIR__ . "\\..\\..\\utilitarios\\perfilAdm.php"
                    ?>
                </ul>
            </div>
        </div>
    </header>
    <div class="corpo">
    <div class="Filtro">
        <div class="sec">
            <button onclick="location.href='#ALUNO'">ALUNO</button>
            <button onclick="location.href='#AULA'">AULA</button>
            <button onclick="location.href='#FUNCIONARIO'">FUNCIONARIO</button>
            <button onclick="location.href='#EDIT'">EDITAR</button>
        </div>
    </div>
    <main>
        <h2><?= $msg ?></h2>
        <!-- ================= FORM EDITAR ALUNO ================== -->
        <?php if ($alunoParaEditar): ?>
            <form method="POST" id="EDIT">
                <input type="hidden" name="action" value="editar_aluno">
                <input type="hidden" name="id_aluno" value="<?= $alunoParaEditar["id_aluno"] ?>">

                <h3>Editar Aluno</h3>

                <label>Nome:</label>
                <input type="text" name="nome_aluno" value="<?= $alunoParaEditar["nome_aluno"] ?>">

                <label>CPF:</label>
                <input type="text" name="cpf_aluno" value="<?= $alunoParaEditar["cpf_aluno"] ?>">

                <label>Email:</label>
                <input type="email" name="email_aluno" value="<?= $alunoParaEditar["email_aluno"] ?>">

                <label>Telefone:</label>
                <input type="text" name="telefone_aluno" value="<?= $alunoParaEditar["telefone_aluno"] ?>"><br>

                <label>Data Nascimento:</label>
                <input type="date" name="data_nascimento_aluno" value="<?= $alunoParaEditar["data_nascimento_aluno"] ?>">

                <label>CEP:</label>
                <input type="text" name="cep_aluno" value="<?= $alunoParaEditar["cep_aluno"] ?>">

                <label>Senha:</label>
                <input type="password" name="senha_aluno" value="<?= $alunoParaEditar["senha_aluno"] ?>">

                <br>
                <label>Unidade:</label>
                <select name="id_unidade">
                    <?php foreach ($unidades as $u): ?>
                        <option value="<?= $u["id_unidade"] ?>" <?= $u["id_unidade"] == $alunoParaEditar["id_unidade"] ? "selected" : "" ?>>
                            <?= $u["nome_unidade"] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <br>

                <button>Salvar</button>
            </form>



            <!-- ================= FORM EDITAR FUNCIONÁRIO ================== -->
        <?php elseif ($funcParaEditar): ?>
            <form method="POST" id="EDIT">
                <input type="hidden" name="action" value="editar_funcionario">
                <input type="hidden" name="id_funcionario" value="<?= $funcParaEditar["id_funcionario"] ?>">

                <h3>Editar Funcionário</h3>

                <label>Nome:</label>
                <input type="text" name="nome_funcionario" value="<?= $funcParaEditar["nome_funcionario"] ?>">

                <label>CPF:</label>
                <input type="text" name="cpf_funcionario" value="<?= $funcParaEditar["cpf_funcionario"] ?>">

                <label>Email:</label>
                <input type="email" name="email_funcionario" value="<?= $funcParaEditar["email_funcionario"] ?>">

                <label>Telefone:</label>
                <input type="text" name="telefone_funcionario" value="<?= $funcParaEditar["telefone_funcionario"] ?>"><br>

                <label>Data Nascimento:</label>
                <input type="date" name="data_nascimento_funcionario" value="<?= $funcParaEditar["data_nascimento_funcionario"] ?>">

                <label>CEP:</label>
                <input type="text" name="cep_funcionario" value="<?= $funcParaEditar["cep_funcionario"] ?>">

                <label>Tipo Funcionário:</label>
                <input type="text" name="tipo_funcionario" value="<?= $funcParaEditar["tipo_funcionario"] ?>">

                <label>Senha:</label>
                <input type="password" name="senha_funcionario" value="<?= $funcParaEditar["senha_funcionario"] ?>">

                <label>Unidade:</label>
                <select name="id_unidade_funcionario">
                    <?php foreach ($unidades as $u): ?>
                        <option value="<?= $u["id_unidade"] ?>" <?= $u["id_unidade"] == $funcParaEditar["id_unidade"] ? "selected" : "" ?>>
                            <?= $u["nome_unidade"] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <br>

                <button>Salvar</button>
            </form>



            <!-- ================= FORM EDITAR AULA ================== -->
        <?php elseif ($aulaParaEditar): ?>
            <form method="POST" id="EDIT">
                <input type="hidden" name="action" value="editar_aula">
                <input type="hidden" name="id_aula" value="<?= $aulaParaEditar["id_aula"] ?>">

                <h3>Editar Aula</h3>

                <label>Tipo de Aula:</label>
                <input type="text" name="tipo_aula" value="<?= $aulaParaEditar["tipo_aula"] ?>">

                <label>Data Hora:</label>
                <input type="datetime-local" name="data_aula" value="<?= dtLocal($aulaParaEditar["data_aula"]) ?>">

                <label>Unidade:</label>
                <select name="id_unidade_aula">
                    <?php foreach ($unidades as $u): ?>
                        <option value="<?= $u["id_unidade"] ?>" <?= $u["id_unidade"] == $aulaParaEditar["id_unidade"] ? "selected" : "" ?>>
                            <?= $u["nome_unidade"] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <br>

                <label>Descrição:</label>
                <input type="text" name="descricao_aula" value="<?= $aulaParaEditar["descricao_aula"] ?>">
                <br>
                <button>Salvar</button>
            </form>
        <?php endif; ?>


        <!-- ================= TABELAS ================== -->
        <div id="ALUNO">
            <h2>Lista de Alunos</h2>
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Ação</th>
                </tr>

                <?php foreach ($alunos as $a): ?>
                    <tr>
                        <td><?= $a["id_aluno"] ?></td>
                        <td><?= $a["nome_aluno"] ?></td>
                        <td><?= $a["cpf_aluno"] ?></td>
                        <td><?= $a["email_aluno"] ?></td>
                        <td><?= $a["telefone_aluno"] ?></td>
                        <td>
                            <form method="POST">
                                <input type="hidden" name="editar_aluno_id" value="<?= $a["id_aluno"] ?>">
                                <button onclick="location.href='#EDIT'">Editar</button>
                            </form>
                            <form method="POST" onsubmit="return confirm('Tem certeza que deseja DELETAR o aluno <?= $a['nome_aluno'] ?>?');">
                                <input type="hidden" name="deletar_aluno_id" value="<?= $a["id_aluno"] ?>">
                                <button>Deletar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>

        <div id="FUNCIONARIO">
            <h2>Lista de Funcionários</h2>
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Tipo</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Ação</th>
                </tr>

                <?php foreach ($funcionarios as $f): ?>
                    <tr>
                        <td><?= $f["id_funcionario"] ?></td>
                        <td><?= $f["nome_funcionario"] ?></td>
                        <td><?= $f["tipo_funcionario"] ?></td>
                        <td><?= $f["email_funcionario"] ?></td>
                        <td><?= $f["telefone_funcionario"] ?></td>
                        <td>
                            <form method="POST">
                                <input type="hidden" name="editar_funcionario_id" value="<?= $f["id_funcionario"] ?>">
                                <button onclick="location.href='#EDIT'">Editar</button>
                            </form>
                            <form method="POST" onsubmit="return confirm('Tem certeza que deseja DELETAR o funcionario <?= $f['nome_funcionario'] ?>?');">
                                <input type="hidden" name="deletar_funcioario_id" value="<?= $f["id_funcionario"] ?>">
                                <button>Deletar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <div id="AULA">
            <h2>Lista de Aulas</h2>
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Tipo</th>
                    <th>Data</th>
                    <th>Unidade</th>
                    <th>Ação</th>
                </tr>

                <?php foreach ($aulas as $au): ?>
                    <tr>
                        <td><?= $au["id_aula"] ?></td>
                        <td><?= $au["tipo_aula"] ?></td>
                        <td><?= $au["data_aula"] ?></td>
                        <td><?= $au["id_unidade"] ?></td>
                        <td>
                            <form method="POST">
                                <input type="hidden" name="editar_aula_id" value="<?= $au["id_aula"] ?>">
                                <button onclick="location.href='#EDIT'">Editar</button>
                            </form>
                            <form method="POST" onsubmit="return confirm('Tem certeza que deseja DELETAR a Aula <?= $au['tipo_aula'] ?>?');">
                                <input type="hidden" name="deletar_aula_id" value="<?= $au["id_aula"] ?>">
                                <button>Deletar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </main></div>
    <footer id="tabela-web-footer">
        <?php
        include_once __DIR__ . "\\..\\..\\utilitarios\\footer.php"
        ?>
    </footer>
    <script src="/src/js/app.js"></script>
</body>

</html>