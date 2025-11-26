// Script mínimo para a página de Cadastro
function acessoLogin() {
    const nome = document.getElementById('aluno').value.trim();
    const senha = document.getElementById('senhaAluno').value;
    const csenha = document.getElementById('CsenhaAluno').value;
    if (!nome || !senha || !csenha) {
        alert('Preencha todos os campos.');
        return;
    }
    if (senha !== csenha) {
        alert('As senhas não coincidem.');
        return;
    }
    // Simular criação de conta e redirecionar para login
    alert('Cadastro realizado com sucesso! Faça login.');
    window.location.href = '/src/Pagina_Login/index.php';
}

// função auxiliar usada por botões de topo
function login() {
    // leva à tela inicial (ajuste se quiser outro destino)
    window.location.href = '../tela_inicial_web/index.php';
}