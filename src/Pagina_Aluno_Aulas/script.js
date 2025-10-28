// script.js

// Espera o HTML ser carregado completamente
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

function Unidade(secao) {
    document.getElementById('boxe').classList.add('hidden');
    document.getElementById('zumba').classList.add('hidden');
    document.getElementById('muaythay').classList.add('hidden');


    document.getElementById(secao).classList.remove('hidden');
}

function aula(){
    window.location.href="/src/Pagina_Aluno_Aulas/index.html"
}

function inicio(){
    window.location.href="/src/Pagina_Inicial_Aluno/index.html"
}

function comunicados(){
    window.location.href="/src/Pagina_Aluno_Comunicados/"
}