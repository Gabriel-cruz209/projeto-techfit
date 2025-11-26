// Script mínimo para a página de Login
function acessoLogin() {
    const usuario = document.getElementById('usuario').value.trim();
    const senha = document.getElementById('senhausuario').value;
    if (!usuario || !senha) {
        alert('Preencha usuário e senha.');
        return;
    }
    // autenticação simples de exemplo (remover em produção)
    // redireciona para a página inicial do aluno
    window.location.href = '/src/Pagina_Inicial_Aluno/index.php';
}

// função auxiliar usada por botões de topo
function login() {
    // leva à tela inicial (ajuste se quiser outro destino)
    window.location.href = '../tela_inicial_web/index.php';
}