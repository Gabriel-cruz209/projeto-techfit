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
<li><a onclick="Perfil('?id=<?=$id?>')" style="cursor: pointer;"><i class="fas fa-user"></i> Perfil</a></li>
<li><a onclick="inicio('?id=<?=$id?>')" style="cursor: pointer;"><i class="fa-solid fa-house"></i> Home </a></li>
<li><a onclick="Avaliacao('?id=<?=$id?>')" style="cursor: pointer;"><i class="fa-solid fa-user-doctor"></i> Avaliação Fisica</a></li>
<li><a onclick="Agendamento('?id=<?=$id?>')" style="cursor: pointer;"><i class="fa-regular fa-calendar-days"></i> Agendamento</a></li>
<li><a onclick="inicioWeb('')" style="cursor: pointer;"><i class="fas fa-sign-out-alt"></i> Sair</a></li>