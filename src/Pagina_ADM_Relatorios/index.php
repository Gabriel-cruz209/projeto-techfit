<?php

namespace projetoTechfit;

require_once __DIR__ . "/../../backend/connTables.php";
require_once __DIR__ . "/../../backend/valorTable.php"; 

$id = $_GET['id'] ?? null;
$registroParaEdicao = null;
$tabelaEmEdicao = null;
$idRegistro = null;
$erroProcessamento = null; 


$connAluno = new ConnTables('alunos');
$connUnidade = new ConnTables('unidades');
$connFuncionario = new ConnTables("funcionarios");
$connAulas = new ConnTables("aulas");

if (isset($_GET['action']) && $_GET['action'] === 'edit' && isset($_GET['table']) && isset($_GET['id_registro'])) {
    $tabelaEmEdicao = $_GET['table'];
    $idRegistro = $_GET['id_registro'];

    try {
        $connTabela = new ConnTables($tabelaEmEdicao);
        $idCampo = '';

        switch ($tabelaEmEdicao) {
            case 'alunos':
                $idCampo = 'id_aluno';
                break;
            case 'funcionarios':
                $idCampo = 'id_funcionario';
                break;
            case 'aulas':
                $idCampo = 'id_aula';
                break;
            default:
                $idCampo = '';
                break;
        }

        if ($idCampo) {
            $resultado = $connTabela->selectUnique("{$idCampo} = :id_registro", "", "1", [':id_registro' => $idRegistro]);
            if (!empty($resultado)) {
                $registroParaEdicao = $resultado[0];
            }
        }
    } catch (\PDOException $e) {
    }
}


$alunos = [];
$funcionarios = [];
$aulas = [];
$erroAlunos = null;
$erroFuncionarios = null;
$erroAulas = null;

try {
    $alunoTable = new ConnTables("Alunos");
    $alunos = $alunoTable->select();
} catch (\PDOException $e) {
    $erroAlunos = "Erro ao buscar Alunos: " . $e->getMessage();
}

try {
    $funcionarioTable = new ConnTables("Funcionarios");
    $funcionarios = $funcionarioTable->select();
} catch (\PDOException $e) {
    $erroFuncionarios = "Erro ao buscar Funcionários: " . $e->getMessage();
}

try {
    $aulaTable = new ConnTables("Aulas");
    $aulas = $aulaTable->select();
} catch (\PDOException $e) {
    $erroAulas = "Erro ao buscar Aulas: " . $e->getMessage();
}


if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'] ?? null;
    $table = new ValorTable(); 

    if (strpos($action, 'update_') === 0) {
        $tabelaAlvo = str_replace('update_', '', $action);
        $connAlvo = new ConnTables($tabelaAlvo);
        $whereField = '';
        $idValue = $_POST['id_registro'] ?? null;

        $valores = [];
        switch ($tabelaAlvo) {
            case 'alunos':
                $whereField = 'id_aluno';
                $valores = $table->getAlunos();
                $valores['nome_aluno'] = $_POST['nome_aluno'] ?? null;
                $valores['data_nascimento_aluno'] = $_POST['data_nascimento_aluno'] ?? null;
                $valores['cpf_aluno'] = $_POST['cpf_aluno'] ?? null;
                $valores['telefone_aluno'] = $_POST['telefone_aluno'] ?? null;
                $valores['email_aluno'] = $_POST['email_aluno'] ?? null;
                $valores['cep_aluno'] = $_POST['cep_aluno'] ?? null;
                $valores['id_unidade'] = $_POST['id_unidade'] ?? null;
                break;
            case 'funcionarios':
                $whereField = 'id_funcionario';
                $valores = $table->getFuncionarios();
                $valores['cep_funcionario'] = $_POST['cep_funcionario'] ?? null;
                $valores['cpf_funcionario'] = $_POST['cpf_funcionario'] ?? null;
                $valores['data_nascimento_funcionario'] = $_POST['data_nascimento_funcionario'] ?? null;
                $valores['email_funcionario'] = $_POST['email_funcionario'] ?? null;
                $valores['telefone_funcionario'] = $_POST['telefone_funcionario'] ?? null;
                $valores['id_unidade'] = $_POST['id_unidade'] ?? null;
                $valores['nome_funcionario'] = $_POST['nome_funcionario'] ?? null;
                $valores['tipo_funcionario'] = $_POST['tipo_funcionario'] ?? null;
                break;
            case 'aulas':
                $whereField = 'id_aula';
                $valores = $table->getAulas();
                $valores['data_aula'] = $_POST['data_aula'] ?? null;
                $valores['descricao_aula'] = $_POST['descricao_aula'] ?? null;
                $valores['id_unidade'] = $_POST['id_unidade'] ?? null;
                $valores['tipo_aula'] = $_POST['tipo_aula'] ?? null;
                break;
        }

        if ($whereField && $idValue) {
            try {
                $connAlvo->update($whereField, $idValue, $valores);
                header("Location: " . strtok($_SERVER["REQUEST_URI"], '?'));
                exit();
            } catch (\PDOException $e) {
                $erroProcessamento = "Erro ao atualizar registro na tabela '{$tabelaAlvo}': " . $e->getMessage();
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="style.css"> 
    <title>TechFit - Relatórios</title>
</head>

<body>
    <header>
        <div class="logo-academia">
            <img src="https://placehold.co/60x60/3498db/ffffff?text=TF" alt="Logo-Academia">
            <h1>TECHFIT</h1>
        </div>

        <div class="secoes">
            <?php
            include_once __DIR__ . "/../../utilitarios/secaoAdm.php";
            ?>
        </div>

        <div class="func-perfil" id="func-perfil">
            <div class="perfil">
                <img class="botaoPerfil" id="botaoPerfil" src="https://placehold.co/40x40/2ecc71/ffffff?text=P" alt="Foto_Perfil">
            </div>
            <div class="secoes-perfil" id="menuPerfil">
                <ul>
                    <li class="info-usuario">
                        <span>Usuário</span>
                        <strong>Gabriel Soares</strong>
                    </li>
                    <hr>
                    <li><a href="/src/Pagina_Perfil_Usuario/index.php"><i class="fas fa-user"></i> Perfil</a></li>
                    <li><a href="/src/Pagina_ADM_inicio/index.php"><i class="fa-solid fa-house"></i> Home</a></li>
                    <li><a href="/src/Pagina_Perfil_Usuario/avaliacao.php"><i class="fa-solid fa-user-doctor"></i> Avaliação Física</a></li>
                    <li><a href="/src/Pagina_Perfil_Usuario/agendamento.php"><i class="fa-regular fa-calendar-days"></i> Agendamento</a></li>
                    <li><a href="/src/tela_inicial_web/index.php"><i class="fas fa-sign-out-alt"></i> Sair</a></li>
                </ul>
            </div>
        </div>
    </header>
    <main>
        <div class="container-relatorios">
            <h2>Gestão de Dados</h2>
            
            <?php if (isset($erroProcessamento)): ?>
                <p class="error" style="color: red; padding: 10px; border: 1px solid red; background-color: #fee;"><?php echo $erroProcessamento; ?></p>
            <?php endif; ?>

            <div class="tabela-rel">
                <h3>Lista de Alunos</h3>
                <?php if (isset($erroAlunos)): ?>
                    <p class="error"><?php echo $erroAlunos; ?></p>
                <?php else: ?>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>CPF</th>
                                <th>E-mail</th>
                                <th>Telefone</th>
                                <th>Data Nasc.</th>
                                <th>CEP</th>
                                <th>ID Unidade</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($alunos)):
                                foreach ($alunos as $aluno):
                            ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($aluno['id_aluno'] ?? ''); ?></td>
                                        <td><?php echo htmlspecialchars($aluno['nome_aluno'] ?? ''); ?></td>
                                        <td><?php echo htmlspecialchars($aluno['cpf_aluno'] ?? ''); ?></td>
                                        <td><?php echo htmlspecialchars($aluno['email_aluno'] ?? ''); ?></td>
                                        <td><?php echo htmlspecialchars($aluno['telefone_aluno'] ?? ''); ?></td>
                                        <td><?php echo htmlspecialchars($aluno['data_nascimento_aluno'] ?? ''); ?></td>
                                        <td><?php echo htmlspecialchars($aluno['cep_aluno'] ?? ''); ?></td>
                                        <td><?php echo htmlspecialchars($aluno['id_unidade'] ?? ''); ?></td>
                                        <td>
                                            <a href="?action=edit&table=alunos&id_registro=<?php echo htmlspecialchars($aluno['id_aluno'] ?? ''); ?>" class="btn-edit">Editar</a>
                                            <form method="POST" action="deletar_aluno.php" style="display:inline;">
                                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($aluno['id_aluno'] ?? ''); ?>">
                                                <button type="submit" class="btn-delete">Excluir</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php
                                endforeach;
                            else:
                                ?>
                                <tr>
                                    <td colspan="9">Nenhum aluno encontrado no banco de dados.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>


            <div class="tabela-rel">
                <h3>Lista de Funcionários</h3>
                <?php if (isset($erroFuncionarios)): ?>
                    <p class="error"><?php echo $erroFuncionarios; ?></p>
                <?php else: ?>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Tipo</th>
                                <th>E-mail</th>
                                <th>Telefone</th>
                                <th>Data Nasc.</th>
                                <th>ID Unidade</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($funcionarios)):
                                foreach ($funcionarios as $func):
                            ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($func['id_funcionario'] ?? ''); ?></td>
                                        <td><?php echo htmlspecialchars($func['nome_funcionario'] ?? ''); ?></td>
                                        <td><?php echo htmlspecialchars($func['tipo_funcionario'] ?? ''); ?></td>
                                        <td><?php echo htmlspecialchars($func['email_funcionario'] ?? ''); ?></td>
                                        <td><?php echo htmlspecialchars($func['telefone_funcionario'] ?? ''); ?></td>
                                        <td><?php echo htmlspecialchars($func['data_nascimento_funcionario'] ?? ''); ?></td>
                                        <td><?php echo htmlspecialchars($func['id_unidade'] ?? ''); ?></td>
                                        <td>
                                            <a href="?action=edit&table=funcionarios&id_registro=<?php echo htmlspecialchars($func['id_funcionario'] ?? ''); ?>" class="btn-edit">Editar</a>
                                            <form method="POST" action="deletar_funcionario.php" style="display:inline;">
                                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($func['id_funcionario'] ?? ''); ?>">
                                                <button type="submit" class="btn-delete">Excluir</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php
                                endforeach;
                            else:
                                ?>
                                <tr>
                                    <td colspan="8">Nenhum funcionário encontrado no banco de dados.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>


            <div class="tabela-rel">
                <h3>Aulas Disponíveis</h3>
                <?php if (isset($erroAulas)): ?>
                    <p class="error"><?php echo $erroAulas; ?></p>
                <?php else: ?>
                    <table>
                        <thead>
                            <tr>
                                <th>ID Aula</th>
                                <th>Tipo de Aula</th>
                                <th>Data/Hora</th>
                                <th>ID Unidade</th>
                                <th>Descrição</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($aulas)):
                                foreach ($aulas as $aula):
                            ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($aula['id_aula'] ?? ''); ?></td>
                                        <td><?php echo htmlspecialchars($aula['tipo_aula'] ?? ''); ?></td>
                                        <td><?php echo htmlspecialchars($aula['data_aula'] ?? ''); ?></td>
                                        <td><?php echo htmlspecialchars($aula['id_unidade'] ?? ''); ?></td>
                                        <td><?php echo htmlspecialchars($aula['descricao_aula'] ?? ''); ?></td>
                                        <td>
                                            <a href="?action=edit&table=aulas&id_registro=<?php echo htmlspecialchars($aula['id_aula'] ?? ''); ?>" class="btn-edit">Editar</a>
                                            <form method="POST" action="deletar_aula.php" style="display:inline;">
                                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($aula['id_aula'] ?? ''); ?>">
                                                <button type="submit" class="btn-delete">Excluir</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php
                                endforeach;
                            else:
                                ?>
                                <tr>
                                    <td colspan="6">Nenhuma aula encontrada no banco de dados.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </div>
        
        <div id="edit-modal" class="modal-overlay" style="display: <?php echo $registroParaEdicao ? 'flex' : 'none'; ?>;">
            <div class="modal-content">
                <h3>Editar Registro de <?php echo ucfirst($tabelaEmEdicao ?? ''); ?> (ID: <?php echo htmlspecialchars($idRegistro ?? ''); ?>)</h3>
                
                <form method="POST" action="">
                    <input type="hidden" name="action" value="update_<?php echo htmlspecialchars($tabelaEmEdicao ?? ''); ?>">
                    <input type="hidden" name="id_registro" value="<?php echo htmlspecialchars($idRegistro ?? ''); ?>">

                    <?php if ($tabelaEmEdicao === 'alunos' && $registroParaEdicao): ?>
                        <label for="nome_aluno">Nome:</label>
                        <input type="text" id="nome_aluno" name="nome_aluno" value="<?php echo htmlspecialchars($registroParaEdicao['nome_aluno'] ?? ''); ?>" required>
                        
                        <label for="email_aluno">E-mail:</label>
                        <input type="email" id="email_aluno" name="email_aluno" value="<?php echo htmlspecialchars($registroParaEdicao['email_aluno'] ?? ''); ?>" required>

                        <label for="telefone_aluno">Telefone:</label>
                        <input type="text" id="telefone_aluno" name="telefone_aluno" value="<?php echo htmlspecialchars($registroParaEdicao['telefone_aluno'] ?? ''); ?>">
                        
                        <label for="data_nascimento_aluno">Data Nasc.:</label>
                        <input type="date" id="data_nascimento_aluno" name="data_nascimento_aluno" value="<?php echo htmlspecialchars($registroParaEdicao['data_nascimento_aluno'] ?? ''); ?>">

                        <label for="cpf_aluno">CPF:</label>
                        <input type="text" id="cpf_aluno" name="cpf_aluno" value="<?php echo htmlspecialchars($registroParaEdicao['cpf_aluno'] ?? ''); ?>">

                        <label for="cep_aluno">CEP:</label>
                        <input type="text" id="cep_aluno" name="cep_aluno" value="<?php echo htmlspecialchars($registroParaEdicao['cep_aluno'] ?? ''); ?>">

                        <label for="id_unidade">ID Unidade:</label>
                        <input type="text" id="id_unidade" name="id_unidade" value="<?php echo htmlspecialchars($registroParaEdicao['id_unidade'] ?? ''); ?>">

                    <?php elseif ($tabelaEmEdicao === 'funcionarios' && $registroParaEdicao): ?>
                        <label for="nome_funcionario">Nome:</label>
                        <input type="text" id="nome_funcionario" name="nome_funcionario" value="<?php echo htmlspecialchars($registroParaEdicao['nome_funcionario'] ?? ''); ?>" required>
                        
                        <label for="email_funcionario">E-mail:</label>
                        <input type="email" id="email_funcionario" name="email_funcionario" value="<?php echo htmlspecialchars($registroParaEdicao['email_funcionario'] ?? ''); ?>" required>
                        
                        <label for="tipo_funcionario">Tipo:</label>
                        <select id="tipo_funcionario" name="tipo_funcionario" required>
                            <option value="Personal" <?php echo (isset($registroParaEdicao['tipo_funcionario']) && $registroParaEdicao['tipo_funcionario'] === 'Personal') ? 'selected' : ''; ?>>Personal</option>
                            <option value="Administrador" <?php echo (isset($registroParaEdicao['tipo_funcionario']) && $registroParaEdicao['tipo_funcionario'] === 'Administrador') ? 'selected' : ''; ?>>Administrador</option>
                        </select>
                        
                        <label for="telefone_funcionario">Telefone:</label>
                        <input type="text" id="telefone_funcionario" name="telefone_funcionario" value="<?php echo htmlspecialchars($registroParaEdicao['telefone_funcionario'] ?? ''); ?>">
                        
                        <label for="data_nascimento_funcionario">Data Nasc.:</label>
                        <input type="date" id="data_nascimento_funcionario" name="data_nascimento_funcionario" value="<?php echo htmlspecialchars($registroParaEdicao['data_nascimento_funcionario'] ?? ''); ?>">

                        <label for="cpf_funcionario">CPF:</label>
                        <input type="text" id="cpf_funcionario" name="cpf_funcionario" value="<?php echo htmlspecialchars($registroParaEdicao['cpf_funcionario'] ?? ''); ?>">

                        <label for="cep_funcionario">CEP:</label>
                        <input type="text" id="cep_funcionario" name="cep_funcionario" value="<?php echo htmlspecialchars($registroParaEdicao['cep_funcionario'] ?? ''); ?>">

                        <label for="id_unidade_func">ID Unidade:</label>
                        <input type="text" id="id_unidade_func" name="id_unidade" value="<?php echo htmlspecialchars($registroParaEdicao['id_unidade'] ?? ''); ?>">

                    <?php elseif ($tabelaEmEdicao === 'aulas' && $registroParaEdicao): ?>
                        <label for="tipo_aula">Tipo de Aula:</label>
                        <input type="text" id="tipo_aula" name="tipo_aula" value="<?php echo htmlspecialchars($registroParaEdicao['tipo_aula'] ?? ''); ?>" required>

                        <label for="data_aula">Data/Hora:</label>
                        <input type="text" id="data_aula" name="data_aula" value="<?php echo htmlspecialchars($registroParaEdicao['data_aula'] ?? ''); ?>" placeholder="Ex: YYYY-MM-DD HH:MM:SS" required>
                        
                        <label for="descricao_aula">Descrição:</label>
                        <input type="text" id="descricao_aula" name="descricao_aula" value="<?php echo htmlspecialchars($registroParaEdicao['descricao_aula'] ?? ''); ?>">
                        
                        <label for="id_unidade_aula">ID Unidade:</label>
                        <input type="text" id="id_unidade_aula" name="id_unidade" value="<?php echo htmlspecialchars($registroParaEdicao['id_unidade'] ?? ''); ?>">

                    <?php else: ?>
                        <p>Nenhum registro encontrado para edição.</p>
                    <?php endif; ?>

                    <div class="modal-actions">
                        <button type="button" class="btn-cancelar" onclick="fecharModal()">Cancelar</button>
                        <?php if ($registroParaEdicao): ?>
                            <button type="submit" class="btn-salvar">Salvar Alterações</button>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>

    </main>
    <footer id="tabela-web-footer">
        <?php
        include_once __DIR__ . "/../../utilitarios/footer.php";
        ?>
    </footer>
    <script src="/src/js/app.js"></script>
    <script>
        document.getElementById('botaoPerfil').addEventListener('click', function() {
            var menu = document.getElementById('menuPerfil');
            menu.classList.toggle('active');
        });

        function fecharModal() {
            document.getElementById('edit-modal').style.display = 'none';
            window.location.href = window.location.pathname;
        }

        <?php if ($registroParaEdicao): ?>
            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById('edit-modal').style.display = 'flex';
            });
        <?php endif; ?>
    </script>
</body>

</html>