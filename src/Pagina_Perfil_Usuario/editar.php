<?php

namespace projetoTechfit;

require_once __DIR__ . "\\..\\..\\backend\\connTables.php";
require_once __DIR__ . "\\..\\..\\backend\\valorTable.php";
$connAluno = new ConnTables("alunos");
$connUnidade = new ConnTables('unidades');
$connPlano = new ConnTables('planos');
$connPagamento = new ConnTables("pagamentos");
$table = new ValorTable();
$id = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if ($_POST['senha'] == $_POST['Csenha']) {
    $aluno = $table->getAlunos();
    $aluno['id_aluno'] = $id;
    $aluno['cep_aluno'] = $_POST['cep'];
    $aluno['cpf_aluno'] = $_POST['cpf'];
    $aluno['email_aluno'] = $_POST['email'];
    $aluno['nome_aluno'] = $_POST['nome'];
    $aluno['telefone_aluno'] = $_POST['telefone'];
    $aluno['senha_aluno'] = $_POST['senha'];
    $aluno['id_unidade'] = $_POST['unidade'];
    $aluno['id_plano'] = $_POST['id_plano'];
    $connAluno->update('id_aluno', $id, $aluno);
    $pagamentos = $table->getPagamentos();
    $pagamentos['id_aluno'] = $id;
    $pagamentos['numero_cartao_pagamento'] = $_POST['numero_cartao_pagamento'];
    $pagamentos['nome_cartao_pagamento'] = $_POST['nome_cartao_pagamento'];
    $pagamentos['ccv_cartao_pagamento'] = $_POST['ccv_cartao_pagamento'];
    $pagamentos['validade_cartao_pagamento'] = $_POST['validade_cartao_pagamento'];
    $connPagamento->update('id_aluno', $id, $pagamentos);
    echo "
      <script>
        setTimeout(function() {
            Perfil('?id=$id');
        }, 3000);
      </script>
      ";
  }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Editar Perfil - TECHFIT</title>
</head>

<body>
  <header>
    <div class="logo-academia">
      <img src="/Arquivos/LogoTechFit-removebg-preview.png" alt="Logo-Academia">
      <h1>TECHFIT</h1>
    </div>

    <div class="secoes">
      <?php
      include_once __DIR__ . "\\..\\..\\utilitarios\\secaoUsuario.php"
      ?>
    </div>

    <div class="func-perfil" id="func-perfil">
      <div class="perfil">
        <img class="botaoPerfil" id="botaoPerfil" src="/Arquivos/perfil-removebg-preview.png" alt="Foto_Perfil">
      </div>
      <div class="secoes-perfil" id="menuPerfil">
        <ul>
          <?php
          include_once __DIR__ . "\\..\\..\\utilitarios\\perfil.php"
          ?>
        </ul>
      </div>
    </div>

  </header>

  <main class="pf-main">
    <section class="form-edit">
      <h2>Editar Perfil</h2>
      <form id="form_validacao" method="POST">
        <?php foreach($connAluno->select() as $dados):?>
          <?php if($dados['id_aluno'] == $id): ?>

            <label for="nome">Nome</label>
            <input id="nome" name="nome" type="text" value="<?= $dados['nome_aluno'] ?>" required>

            <label for="email">Email</label>
            <input id="email" name="email" type="email" value="<?= $dados['email_aluno'] ?>" required>

            <label for="telefone">Telefone</label>
            <input id="telefone" name="telefone" type="text" value="<?= $dados['telefone_aluno'] ?>" required>

            <label for="cpf">CPF</label>
            <input id="cpf" name="cpf" type="text" value="<?= $dados['cpf_aluno'] ?>" required>

            <label for="cep">CEP</label>
            <input id="cep" name="cep" type="text" value="<?= $dados['cep_aluno'] ?>">

            <!-- SELEÇÃO DE UNIDADE -->
            <label for="unidade">Unidade</label>
            <select id="unidade" name="unidade" required>
              <option value="<?= $dados['id_unidade'] ?>">Unidade atual</option>

              <?php foreach ($connUnidade->select() as $uni): ?>
                <option value="<?= $uni['id_unidade'] ?>">
                  <?= $uni['nome_unidade'] ?>
                </option>
              <?php endforeach; ?>
            </select>

            <!-- SELEÇÃO DE PLANO -->
            <label for="planoAluno">Plano</label>
            <select name="id_plano" id="id_plano" required>
              <option value="<?= $dados['id_plano'] ?>">Plano atual</option>

              <?php foreach ($connPlano->select() as $plano): ?>
                <option value="<?= $plano['id_plano'] ?>">
                  <?= $plano['nome_plano'] ?> - R$ <?= $plano['valor_plano'] ?>
                </option>
              <?php endforeach; ?>
            </select>

            <!-- DADOS DO CARTÃO -->
            <h3>Informações do Cartão</h3>

            
            <label for="numero_cartao_pagamento">Número do cartão</label>
            <input id="numero_cartao_pagamento" name="numero_cartao_pagamento"
              type="text" maxlength="16"
              value="<?= $dadosPagamento['numero_cartao_pagamento'] ?? '' ?>" required>

            <label for="nome_cartao_pagamento">Nome no cartão</label>
            <input id="nome_cartao_pagamento" name="nome_cartao_pagamento"
              type="text" value="<?= $dadosPagamento['nome_cartao_pagamento'] ?? '' ?>" required>

            <label for="ccv_cartao_pagamento">CCV</label>
            <input id="ccv_cartao_pagamento" name="ccv_cartao_pagamento"
              type="text" maxlength="3"
              value="<?= $dadosPagamento['ccv_cartao_pagamento'] ?? '' ?>" required>

            <label for="validade_cartao_pagamento">Validade</label>
            <input id="validade_cartao_pagamento" name="validade_cartao_pagamento"
              type="month" value="<?= $dadosPagamento['validade_cartao_pagamento'] ?? '' ?>" required>


            <!-- SENHAS -->
            <label for="senha">Senha</label>
            <input id="senha" name="senha" type="password" value="<?= $dados['senha_aluno'] ?>">

            <label for="Csenha">Confirmar senha</label>
            <input id="Csenha" name="Csenha" type="password" value="<?= $dados['senha_aluno'] ?>">

            <button class="btn" type="submit">Salvar Alterações</button>

          <?php endif ?>
        <?php endforeach; ?>
      </form>
    </section>
  </main>

  <footer class="pf-footer">
    <small>© TECHFIT</small>
  </footer>
  <script src="/src/js/app.js"></script>
  <script src="../js/regex.js"></script>
  <script src="../js/validacoes.js"></script>
</body>

</html>