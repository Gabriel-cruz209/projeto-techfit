<?php
    namespace projetoTechfit;
    require_once __DIR__ . "\\..\\backend\\connTables.php";
    $connFuncionario =new ConnTables("funcionarios");
    $funcionario;
    foreach($connFuncionario->select() as $dados) {
        if($dados['id_funcionario'] ==$id){
            $funcionario = $dados;
        }
    }
?>
<li class="info-usuario">
    <span>Usuário</span>
    <p><strong><?=$funcionario['nome_funcionario']?></strong></p>
</li>
<hr>
<li><a onclick="Perfil('?id=<?=$id?>')" style="cursor: pointer;"><i class="fas fa-user"></i> Perfil</a></li>
<li><a onclick="inicioAdm('?id=<?=$id?>')" style="cursor: pointer;"><i class="fa-solid fa-house"></i> Home </a></li>
<li><a onclick="inicioWeb('')" style="cursor: pointer;"><i class="fas fa-sign-out-alt"></i> Sair</a></li>