// script.js

// Espera o documento HTML ser totalmente carregado antes de executar o código
document.addEventListener('DOMContentLoaded', function() {

    // Pega os elementos do HTML pelos seus IDs
    const profileIcon = document.getElementById('profileIcon');
    const dropdownMenu = document.getElementById('dropdownMenu');

    // 1. Ação para ABRIR/FECHAR o menu ao clicar no ícone
    profileIcon.addEventListener('click', function() {
        // Adiciona ou remove a classe 'show' do menu
        dropdownMenu.classList.toggle('show');
    });

    // 2. Ação para FECHAR o menu se o usuário clicar FORA dele
    window.addEventListener('click', function(event) {
        // Verifica se o clique NÃO foi no ícone e NÃO foi dentro do menu
        if (!profileIcon.contains(event.target) && !dropdownMenu.contains(event.target)) {
            // Se o menu estiver visível ('show'), ele remove a classe para escondê-lo
            if (dropdownMenu.classList.contains('show')) {
                dropdownMenu.classList.remove('show');
            }
        }
    });

});