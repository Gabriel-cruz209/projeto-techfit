// Script mínimo para a página de Login
function acessoLogin(){
    const usuario = document.getElementById('usuario').value.trim();
    const senha = document.getElementById('senhausuario').value;
    if(!usuario || !senha){
        alert('Preencha usuário e senha.');
        return;
    }
    // autenticação simples de exemplo (remover em produção)
    // redireciona para a página inicial do aluno
    window.location.href = '/src/Pagina_Inicial_Aluno/index.html';
}
