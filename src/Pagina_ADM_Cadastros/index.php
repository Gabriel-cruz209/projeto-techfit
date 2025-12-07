<?php

namespace projetoTechfit;

require_once __DIR__ . "\\..\\..\\backend\\connTables.php";
require_once __DIR__ . "\\..\\..\\backend\\valorTable.php";
$id = $_GET['id'];

$connAluno = new ConnTables('alunos');
$connUnidade = new ConnTables('unidades');
$connFuncionario = new ConnTables("funcionarios");
$connPlano = new ConnTables("planos");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    switch ($_POST['action']) {
        case 'aulas':
            $connCriam = new ConnTables("criam");
            $connAulas = new ConnTables("aulas");
            $table = new ValorTable();
            $aula = $table->getAulas();
            $aula['data_aula'] = $_POST['data_aula'];
            $aula['descricao_aula'] = $_POST['descricao_aula'];
            $aula['id_unidade'] = $_POST['id_unidade'];
            $aula['tipo_aula'] = $_POST['tipo_aula'];
            $connAulas->insert($aula);


            $aulaCadastrada = $connAulas->selectUnique("", "", "id_aula DESC", "1")[0];
            $cria = $table->getCriam();
            $cria['id_aula'] = $aulaCadastrada['id_aula'];
            $cria['id_funcionario'] = $_POST['id_funcionario'];
            $connCriam->insert($cria);

            break;
        case 'comunicados':
            $connComunicados = new ConnTables("comunicados");
            $connComentam = new ConnTables("comentam");
            $table = new ValorTable();
            $comunicado = $table->getComunicados();
            $comunicado['informacao_comunicado'] = $_POST['informacao_comunicado'];
            $comunicado['tipo_comunicado'] = $_POST['tipo_comunicado'];
            $comunicado['titulo_comunicado'] = $_POST['titulo_comunicado'];
            $connComunicados->insert($comunicado);

            $comunicadoCadastrado = $connComunicados->selectUnique("", "", "id_comunicado DESC", "1")[0];
            $Comenta = $table->getComentam();
            $Comenta['id_comunicado'] = $comunicadoCadastrado['id_comunicado'];
            $Comenta['id_funcionario'] = $_POST['id_funcionario'];
            $connComentam->insert($Comenta);
            break;
        case 'avaliacao':
            $connFazem = new ConnTables("fazem");
            $connAvaliacao = new ConnTables("avaliacao_fisicas");
            $table = new ValorTable();
            $avaliacao = $table->getAvaliacao_fisicas();
            $avaliacao['data_avaliacao'] = $_POST['data_avaliacao'];
            $avaliacao['tipo_avalicao'] = $_POST['tipo_avalicao'];
            $avaliacao['id_aluno'] = $_POST['id_aluno'];
            $connAvaliacao->insert($avaliacao);

            $avaliacaoCadastrado = $connAvaliacao->selectUnique("", "", "id_avaliacao DESC", "1")[0];
            $faze = $table->getFazem();
            $faze['id_avaliacao'] = $avaliacaoCadastrado['id_avaliacao'];
            $faze['id_funcionario'] = $_POST['id_funcionario'];
            $connFazem->insert($faze);
            break;
        case 'alunos':
            if ($_POST['senha_aluno'] == $_POST['Csenha_aluno']) {
                $table = new ValorTable();
                $aluno = $table->getAlunos();
                $aluno['nome_aluno'] = $_POST['nome_aluno'];
                $aluno['data_nascimento_aluno'] = $_POST['data_nascimento_aluno'];
                $aluno['cpf_aluno'] = $_POST['cpf_aluno'];
                $aluno['telefone_aluno'] = $_POST['telefone_aluno'];
                $aluno['email_aluno'] = $_POST['email_aluno'];
                $aluno['senha_aluno'] = $_POST['senha_aluno'];
                $aluno['cep_aluno'] = $_POST['cep_aluno'];
                $aluno['id_unidade'] = $_POST['id_unidade'];
                $aluno['id_plano'] = 0;
                $connAluno->insert($aluno);
            }
            break;
        case 'funcionarios':
            if ($_POST['senha_funcionario'] == $_POST['Csenha_funcionario']) {
                $table = new ValorTable();
                $funcionario = $table->getFuncionarios();
                $funcionario['cep_funcionario'] = $_POST['cep_funcionario'];
                $funcionario['cpf_funcionario'] = $_POST['cpf_funcionario'];
                $funcionario['data_nascimento_funcionario'] = $_POST['data_nascimento_funcionario'];
                $funcionario['email_funcionario'] = $_POST['email_funcionario'];
                $funcionario['telefone_funcionario'] = $_POST['telefone_funcionario'];
                $funcionario['id_unidade'] = $_POST['id_unidade'];
                $funcionario['nome_funcionario'] = $_POST['nome_funcionario'];
                $funcionario['senha_funcionario'] = $_POST['senha_funcionario'];
                $funcionario['tipo_funcionario'] = $_POST['tipo_funcionario'];
                $connFuncionario->insert($funcionario);
            }
            break;
        case 'unidades':
            $table = new ValorTable();
            $unidade = $table->getUnidades();
            $unidade['cep_unidade'] = $_POST['cep_unidade'];
            $unidade['nome_unidade'] = $_POST['nome_unidade'];
            $connUnidade->insert($unidade);
            break;
        case 'planos':
            $table = new ValorTable();
            $plano = $table->getPlanos();
            $plano['nome_plano'] = $_POST['nome_plano'];
            $plano['preco_plano'] = $_POST['valor_plano'];
            $plano['duracao_plano'] = $_POST['duracao_plano'];
            $plano['descricao_plano'] = $_POST['descricao_plano'];
            $connPlano->insert($plano);
            break;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/Arquivos/LogoTechFit-removebg-preview.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <title>TECHFIT</title>
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
    <main>
        <section class="cadastros">
            <h2>Cadastros</h2>

            <div class="selecao">
                <button onclick="sec('Unidade')">Unidade</button>
                <button onclick="sec('Funcionario')">Funcionario</button>
                <button onclick="sec('Aluno')">Aluno</button>
                <button onclick="sec('Comunicado')">Comunicado</button>
                <button onclick="sec('Aulas')">Aula</button>
                <button onclick="sec('AvFisica')">Av.Fisica</button>
                <button onclick="sec('Planos')">Planos</button>
            </div>

            <div class="form-container">
                <div class="hidden" id="Unidade">
                    <form class="cadastro-form form_validacao" method="post" action="#">
                        <input type="hidden" name="action" value="unidades">
                        <h3>Unidades</h3>
                        <label for="nome_unidade">Nome da Unidade</label>
                        <input type="text" id="nome_unidade" name="nome_unidade" required>

                        <label for="cep">CEP</label>
                        <input type="text" id="cep" name="cep_unidade" placeholder="00000-000" required>

                        <button type="submit">Cadastrar Unidade</button>
                    </form>
                </div>

                <div class="hidden" id="Funcionario">
                    <form class="cadastro-form form_validacao" method="POST" action="#">
                        <input type="hidden" name="action" value="funcionarios">
                        <h3>Funcionários</h3>
                        <label for="nome_funcionario">Nome</label>
                        <input type="text" id="nome_funcionario" name="nome_funcionario" required>

                        <label for="data_nascimento_funcionario">Data de Nascimento</label>
                        <input type="date" id="data_nascimento_funcionario" name="data_nascimento_funcionario" required>

                        <label for="email_funcionario">Email</label>
                        <input type="email" id="email_funcionario" name="email_funcionario" required>

                        <label for="telefone">Telefone</label>
                        <input type="text" id="telefone" name="telefone_funcionario" required>

                        <label for="tipo_funcionario">Tipo</label>
                        <input type="text" id="tipo_funcionario" name="tipo_funcionario" required>

                        <label for="senha_funcionario">Senha</label>
                        <input type="password" id="senha_funcionario" name="senha_funcionario" required>

                        <label for="Csenha_funcionario">Confirmar Senha</label>
                        <input type="password" id="Csenha_funcionario" name="Csenha_funcionario" required>

                        <label for="cpf">CPF</label>
                        <input type="text" id="cpf" name="cpf_funcionario" required>

                        <label for="id_unidade">Unidade</label>
                        <select name="id_unidade" id="id_unidade" required>
                            <option value="">Selecione a unidade</option>

                            <?php foreach ($connUnidade->select() as $unidade): ?>
                                <option value="<?=$unidade['id_unidade']?>">
                                    <?= $unidade['nome_unidade'] ?>
                                </option>
                            <?php endforeach; ?>

                        </select>

                        <label for="cep_funcionario">CEP</label>
                        <input type="text" id="cep" name="cep_funcionario" required>

                        <button type="submit">Cadastrar Funcionário</button>
                    </form>
                </div>

                <div class="hidden" id="Aluno">
                    <form class="cadastro-form form_validacao" method="POST" action="#">
                        <input type="hidden" name="action" value="alunos">
                        <h3>Alunos</h3>
                        <label for="nome_aluno">Nome</label>
                        <input type="text" id="nome_aluno" name="nome_aluno" required>

                        <label for="data_nascimento_aluno">Data de Nascimento</label>
                        <input type="date" id="data_nascimento_aluno" name="data_nascimento_aluno" required>

                        <label for="cpf">CPF</label>
                        <input type="text" id="cpf" name="cpf_aluno" required>

                        <label for="telefone_aluno">Telefone</label>
                        <input type="text" id="telefone" name="telefone_aluno" required>

                        <label for="email_aluno">Email</label>
                        <input type="email" id="email_aluno" name="email_aluno" required>

                        <label for="senha_aluno">Senha</label>
                        <input type="password" id="senha_aluno" name="senha_aluno" required>

                        <label for="Csenha_aluno">Confirmar Senha</label>
                        <input type="password" id="Csenha_aluno" name="Csenha_aluno" required>

                        <label for="cep">CEP</label>
                        <input type="text" id="cep" name="cep_aluno" required>
                        
                        <label for="id_unidade">Unidade</label>
                        <select name="id_unidade" id="id_unidade" required>
                            <option value="">Selecione a unidade</option>

                            <?php foreach ($connUnidade->select() as $unidade): ?>
                                <option value="<?=$unidade['id_unidade']?>">
                                    <?= $unidade['nome_unidade'] ?>
                                </option>
                            <?php endforeach; ?>

                        </select>

                        <button type="submit">Cadastrar Aluno</button>
                    </form>
                </div>

                <div class="hidden" id="Comunicado">
                    <form id="form-comunicados" class="cadastro-form" method="POST" action="#">
                        <input type="hidden" name="action" value="comunicados">
                        <h3>Comunicados</h3>
                        <label for="titulo_comunicado">Título</label>
                        <input type="text" id="titulo_comunicado" name="titulo_comunicado" required>

                        <select name="tipo_comunicado" id="tipo_comunicado">
                            <option value="">Selecione o tipo de comunicado</option>

                            <option value="parceria">Parceria</option>
                            <option value="importante">Importante</option>
                            <option value="geral">Geral</option>
                        </select>

                        <label for="informacao_comunicado">Informação</label>
                        <textarea id="informacao_comunicado" name="informacao_comunicado" rows="3" required></textarea>

                        <label for="id_funcionario">Personal</label>
                        <select name="id_funcionario" id="id_funcionario" required>
                            <option value="">Selecione o Personal Responsável</option>

                            <?php foreach ($connFuncionario->select() as $funcionario): ?>
                                <?php if ($funcionario['tipo_funcionario'] == 'personal'): ?>
                                    <option value="<?=$funcionario['id_funcionario']?>">
                                        <?= $funcionario['nome_funcionario'] ?>
                                    </option>
                                <?php else: ?>
                                    <p>Não há nenhum personal cadastrado</p>
                                <?php endif ?>
                            <?php endforeach; ?>

                        </select>

                        <button type="submit">Cadastrar Comunicado</button>
                    </form>
                </div>

                <div class="hidden" id="Aulas">
                    <form id="form-aulas" class="cadastro-form" method="POST" action="#">
                        <input type="hidden" name="action" value="aulas">
                        <h3>Aulas</h3>
                        <label for="data_aula">Data e Hora</label>
                        <input type="datetime-local" name="data_aula" required>

                        <label for="tipo_aula">Tipo de Aula</label>
                        <select name="tipo_aula">
                            <option value="">Selecione o tipo de aula</option>

                            <option value="bike_cross">Bike Cross</option>
                            <option value="spinning">Spinning</option>
                            <option value="pilates">Pilates</option>
                            <option value="cross_training">Cross Training</option>
                            <option value="zumba">Zumba</option>
                            <option value="boxe">Boxe</option>
                            <option value="funcional">Funcional</option>
                        </select>

                        <label for="id_unidade">Unidade</label>
                        <select name="id_unidade" id="id_unidade" required>
                            <option value="">Selecione a unidade</option>

                            <?php foreach ($connUnidade->select() as $unidade): ?>
                                <option value="<?= $unidade['id_unidade'] ?>">
                                    <?= $unidade['nome_unidade'] ?>
                                </option>
                            <?php endforeach; ?>

                        </select>

                        <label for="descricao_aula">Descricao Aula</label>
                        <input type="text" id="tipo_aula" name="descricao_aula" required>

                        <label for="id_funcionario">Personal</label>
                        <select name="id_funcionario" id="id_funcionario" required>
                            <option value="">Selecione o Personal Responsável</option>

                            <?php foreach ($connFuncionario->select() as $funcionario): ?>
                                <?php if ($funcionario['tipo_funcionario'] == 'personal'): ?>
                                    <option value="<?=$funcionario['id_funcionario']?>">
                                        <?= $funcionario['nome_funcionario'] ?>
                                    </option>
                                <?php else: ?>
                                    <p>Não há nenhum personal cadastrado</p>
                                <?php endif ?>
                            <?php endforeach; ?>

                        </select>

                        <button type="submit">Cadastrar Aula</button>
                    </form>
                </div>

                <div class="hidden" id="AvFisica">
                    <form id="form-avaliacoes" class="cadastro-form" method="POST" action="#">
                        <input type="hidden" name="action" value="avaliacao">
                        <h3>Avaliação Física</h3>
                        <label for="data_avaliacao">Data e Hora</label>
                        <input type="datetime-local" id="data_avaliacao" name="data_avaliacao" required>

                        <label for="tipo_avalicao">Tipo de Avaliação</label>
                        <input type="text" id="tipo_avalicao" name="tipo_avalicao" required>

                        <label for="id_aluno">Aluno</label>
                        <select name="id_aluno" id="id_aluno" required>
                            <option value="">Selecione o Aluno</option>

                            <?php foreach ($connAluno->select() as $aluno): ?>
                                <option value="<?=$aluno['id_aluno']?>">
                                    <?= $aluno['nome_aluno'] ?>
                                </option>
                            <?php endforeach; ?>

                        </select>

                        <label for="id_funcionario">Personal</label>
                        <select name="id_funcionario" id="id_funcionario" required>
                            <option value="">Selecione o Personal Responsável</option>

                            <?php foreach ($connFuncionario->select() as $funcionario): ?>
                                <?php if ($funcionario['tipo_funcionario'] == 'personal'): ?>
                                    <option value="<?= $funcionario['id_funcionario'] ?>">
                                        <?= $funcionario['nome_funcionario'] ?>
                                    </option>
                                <?php else: ?>
                                    <p>Não há nenhum personal cadastrado</p>
                                <?php endif ?>
                            <?php endforeach; ?>

                        </select>

                        <button type="submit">Cadastrar Avaliação</button>
                    </form>
                </div>

                <div class="hidden" id="Planos">
                    <form id="form-planos" class="cadastro-form" method="POST" action="#">
                        <input type="hidden" name="action" value="planos">
                        <h3>Dados do Plano</h3>

                        <label for="nome_plano">Nome do Plano</label>
                        <input
                            type="text"
                            id="nome_plano"
                            name="nome_plano"
                            placeholder="Ex: Plano Premium"
                            maxlength="100"
                            required>

                        <label for="valor_plano">Valor do Plano (R$)</label>
                        <input
                            type="number"
                            id="valor_plano"
                            name="valor_plano"
                            step="0.01"
                            placeholder="Ex: 99.90"
                            required>

                        <label for="duracao_plano">Duração do plano em dias</label>
                        <input type="number" id="duracao_plano" name="duracao_plano" required>

                        <label for="descricao_plano">Descrição do Plano (Escreva entre virgulas)</label>
                        <input
                            id="descricao_plano"
                            name="descricao_plano"
                            maxlength="200"
                            placeholder="Descreva o plano..."
                            required>
                        <button type="submit">Cadastrar Plano</button>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <footer id="tabela-web-footer">
        <?php
        include_once __DIR__ . "\\..\\..\\utilitarios\\footer.php"
        ?>
    </footer>

    <script src="/src/js/app.js"></script>
    <script src="../js/regex.js"></script>
    <script src="../js/validacoes.js"></script>
</body>

</html>