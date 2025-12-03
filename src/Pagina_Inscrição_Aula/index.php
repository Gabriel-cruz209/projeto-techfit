<?php
namespace projetoTechfit;
    require_once __DIR__ . "\\..\\..\\backend\\connTables.php";
    require_once __DIR__ . "\\..\\..\\backend\\valorTable.php";
    $id = $_GET['id'];
    $tipoAula = $_GET['ta'];
    $connInscrevem = new ConnTables("inscrevem");
    $connAluno = new ConnTables("alunos");
    $connAulas = new ConnTables("aulas");
    $aluno;
    foreach($connAluno->select() as $dados){
        if($dados['id_aluno'] == $id){
            $aluno = $dados;
        }
    }
    echo "
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const aula = document.getElementById('aula');
            const data = document.getElementById('data');
            const dataList = document.getElementById('data-list');

            dataList.style.display = 'none';

            // salva todas as opções originais
            const opcoesOriginais = Array.from(data.options);

            function filtrarAulas() {
                const aulaSelecionada = aula.value;

                // se for vazio, esconder
                if (aulaSelecionada === '') {
                    dataList.style.display = 'none';
                    data.innerHTML = '';
                    return;
                }

                // mostrar
                dataList.style.display = 'flex';

                // limpar opções
                data.innerHTML = '';

                // recolocar apenas as válidas
                opcoesOriginais.forEach(opt => {
                    if (opt.dataset.aula === aulaSelecionada) {
                        data.appendChild(opt);
                    }
                });
            }

            // chama ao mudar o select
            aula.addEventListener('change', filtrarAulas);

            // chama também ao carregar a página (para valores pré-setados)
            filtrarAulas();
        });  
    </script>
    ";
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $table = new ValorTable();
        $inscricao = $table->getInscrevem();
        $inscricao['id_aluno'] = $id;
        $inscricao['id_aula'] = $_POST['data'];
        $connInscrevem->insert($inscricao);
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
        <button onclick="aula('?id=<?=$id?>')"><img class="volta" src="/Arquivos/de-volta__1_-removebg-preview.png" alt="Botao-voltar"></button>
    </header>
    <main>
        <div class="container">
            <form id="inscricao" class="form-inscricao" method="POST" action="#">
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
                    <?php foreach($connAulas->selectUnique('tipo_aula',"","","tipo_aula") as $dados): ?>
                        <?php if($dados['tipo_aula']== $tipoAula): ?>
                            <option value="<?=$dados['tipo_aula']?>" selected><?=$dados['tipo_aula']?></option>
                        <?php else: ?>
                            <option value="<?=$dados['tipo_aula']?>"><?=$dados['tipo_aula']?></option>
                        <?php endif ?>
                    <?php endforeach ?>
                </select>
                <div id="data-list">
                    <label for="data">Escolha a Data</label>
                    <select id="data" name="data" required>
                        <option value="">selecione a data</option>
                        <?php foreach($connAulas->select() as $dados): ?>
                            <option data-aula="<?=$dados['tipo_aula']?>"value="<?=$dados['id_aula']?>"><?=$dados['data_aula']?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                

                <button type="submit" class="btn-enviar">Enviar inscrição</button>
            </form>
        </div>
    </main>
        <script src="/src/js/app.js"></script>
    </body>
</html>