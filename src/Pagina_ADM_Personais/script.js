function inicio(){
    window.location.href="/src/Pagina_Inicial_Aluno/index.php"
}
function cadastro(){
    window.location.href="/src/Pagina_Cadastro/index.php"
}
function relatorios(){
    window.location.href="/src/Pagina_ADM_Relatorios/index.php"
}

// futuras funções para visualizar agenda ou editar personal
document.addEventListener('DOMContentLoaded', function() {

    // Pega os elementos que demos 'id' lá no HTML
    const botaoPerfil = document.getElementById('botaoPerfil');
    const menuPerfil = document.getElementById('menuPerfil');

    // Adiciona um "ouvinte de evento" de clique no botão do perfil
    botaoPerfil.addEventListener('click', function() {
        // A cada clique, ele adiciona ou remove a classe 'show' do menu.
        // É isso que faz o menu aparecer e desaparecer.
        menuPerfil.classList.toggle('show');
    });

    // Adiciona um "ouvinte" na janela inteira para fechar o menu se clicar fora
    window.addEventListener('click', function(event) {
        // Verifica se o alvo do clique NÃO é o botão E NÃO está dentro do menu
        if (!botaoPerfil.contains(event.target) && !menuPerfil.contains(event.target)) {
            // Se o menu estiver visível (tiver a classe 'show'), remove a classe para escondê-lo.
            if (menuPerfil.classList.contains('show')) {
                menuPerfil.classList.remove('show');
            }
        }
    });

});

function aula(){
    window.location.href="/src/Pagina_Aluno_Aulas/index.php"
}

function cadastro(){
    window.location.href="/src/Pagina_ADM_Cadastros/index.php"
}

function relatorios(){
    window.location.href="/src/Pagina_ADM_Relatorios/index.php"
}

function personais(){
    window.location.href="/src/Pagina_ADM_Personais/index.php"
}

function inicio(){
    window.location.href="/src/Pagina_ADM_inicio/index.php"
}
