<?php
    namespace projetoTechfit;
    require_once __DIR__ . "\\..\\backend\\connTables.php";
    $connAluno = new ConnTables("alunos");
    $dados = $connAluno->select();
    foreach($dados as $dado) {
        if($dado['id_aluno']==$id){
            $aluno = $dado;
        }
    }
    
?>
<li class="info-usuario">
    <span>Usuário</span>
    <strong><?= $aluno['nome_aluno'] ?></strong>
</li>
<hr>
<li><a href="/src/Pagina_Perfil_Usuario/index.php?id=<?=$id?>"><i class="fas fa-user"></i> Perfil</a></li>
<li><a href="/src/Pagina_Inicial_Aluno/index.php?id=<?=$id?>"><i class="fa-solid fa-house"></i> Home </a></li>
<li><a href="/src/Pagina_Perfil_Usuario/avaliacao.php?id=<?=$id?>"><i class="fa-solid fa-user-doctor"></i> Avaliação Fisica</a></li>
<li><a href="/src/Pagina_Perfil_Usuario/agendamento.php?id=<?=$id?>"><i class="fa-regular fa-calendar-days"></i> Agendamento</a></li>
<li><a href="/src/tela_inicial_web/index.php?id=<?=$id?>"><i class="fas fa-sign-out-alt"></i> Sair</a></li>