<?php

namespace projetoTechfit;

require_once __DIR__ . "\\..\\..\\backend\\connTables.php";

$id = $_GET['id'];

try {
    $alunoTable = new ConnTables("Alunos");
    $alunos = $alunoTable->select();
} catch (\PDOException $e) {
    $alunos = [];
    $erroAlunos = "Erro ao buscar Alunos: " . $e->getMessage();
}

try {
    $funcionarioTable = new ConnTables("Funcionarios");
    $funcionarios = $funcionarioTable->select(); 
} catch (\PDOException $e) {
    $funcionarios = [];
    $erroFuncionarios = "Erro ao buscar Funcionários: " . $e->getMessage();
}

try {
    $aulaTable = new ConnTables("Aulas");
    $aulas = $aulaTable->select();
} catch (\PDOException $e) {
    $aulas = [];
    $erroAulas = "Erro ao buscar Aulas: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>TechFit - Relatórios</title>
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
                    <li class="info-usuario">
                        <span>Usuário</span>
                        <strong>Gabriel Soares</strong>
                    </li>
                    <hr>
                    <li><a href="/src/Pagina_Perfil_Usuario/index.php"><i class="fas fa-user"></i> Perfil</a></li>
                    <li><a href="/src/Pagina_ADM_inicio/index.php"><i class="fa-solid fa-house"></i> Home </a></li>
                    <li><a href="/src/Pagina_Perfil_Usuario/avaliacao.php"><i class="fa-solid fa-user-doctor"></i> Avaliação Fisica</a></li>
                    <li><a href="/src/Pagina_Perfil_Usuario/agendamento.php"><i class="fa-regular fa-calendar-days"></i> Agendamento</a></li>
                    <li><a href="/src/tela_inicial_web/index.php"><i class="fas fa-sign-out-alt"></i> Sair</a></li>
                </ul>
            </div>
        </div>
    </header>
    <main>
        <div class="container-relatorios">
            <h2>Relatórios</h2>
            <div class="cards">
                <div class="card">
                    <h3>Inscrições (Hoje)</h3>
                    <p class="big">24</p>
                </div>
                <div class="card">
                    <h3>Aulas Lotadas</h3>
                    <p class="big">3</p>
                </div>
                <div class="card">
                    <h3>Novos Alunos (Semana)</h3>
                    <p class="big">56</p>
                </div>
            </div>

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
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($alunos)): 
                            foreach ($alunos as $aluno): 
                        ?>
                            <tr>
                                <td><?php echo htmlspecialchars($aluno['id_aluno']); ?></td>
                                <td><?php echo htmlspecialchars($aluno['nome_aluno']); ?></td>
                                <td><?php echo htmlspecialchars($aluno['cpf_aluno']); ?></td>
                                <td><?php echo htmlspecialchars($aluno['email_aluno']); ?></td>
                                <td><?php echo htmlspecialchars($aluno['telefone_aluno']); ?></td>
                                <td><?php echo htmlspecialchars($aluno['data_nascimento_aluno']); ?></td>
                                <td><?php echo htmlspecialchars($aluno['cep_aluno']); ?></td>
                                <td><?php echo htmlspecialchars($aluno['id_unidade']); ?></td>
                            </tr>
                        <?php 
                            endforeach;
                        else:
                        ?>
                            <tr>
                                <td colspan="8">Nenhum aluno encontrado no banco de dados.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>

        
        <div class="tabela-rel">
            <h3>Lista de Funcionários (Personais)</h3>
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
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($funcionarios)): 
                            foreach ($funcionarios as $func): 
                        ?>
                            <tr>
                                <td><?php echo htmlspecialchars($func['id_funcionario']); ?></td>
                                <td><?php echo htmlspecialchars($func['nome_funcionario']); ?></td>
                                <td><?php echo htmlspecialchars($func['tipo_funcionario']); ?></td>
                                <td><?php echo htmlspecialchars($func['email_funcionario']); ?></td>
                                <td><?php echo htmlspecialchars($func['telefone_funcionario']); ?></td>
                                <td><?php echo htmlspecialchars($func['data_nascimento_funcionario']); ?></td>
                                <td><?php echo htmlspecialchars($func['id_unidade']); ?></td>
                            </tr>
                        <?php 
                            endforeach;
                        else:
                        ?>
                            <tr>
                                <td colspan="7">Nenhum funcionário encontrado no banco de dados.</td>
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
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($aulas)): 
                            foreach ($aulas as $aula): 
                        ?>
                            <tr>
                                <td><?php echo htmlspecialchars($aula['id_aula']); ?></td>
                                <td><?php echo htmlspecialchars($aula['tipo_aula']); ?></td>
                                <td><?php echo htmlspecialchars($aula['data_aula']); ?></td>
                                <td><?php echo htmlspecialchars($aula['id_unidade']); ?></td>
                                <td><?php echo htmlspecialchars($aula['descricao_aula']); ?></td>
                            </tr>
                        <?php 
                            endforeach;
                        else:
                        ?>
                            <tr>
                                <td colspan="4">Nenhuma aula encontrada no banco de dados.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
        </div>
    </main>
    <footer id="tabela-web-footer">
        <?php
            include_once __DIR__ . "\\..\\..\\utilitarios\\footer.php"
        ?>
    </footer>
    <script src="/src/js/app.js"></script>
</body>

</html>