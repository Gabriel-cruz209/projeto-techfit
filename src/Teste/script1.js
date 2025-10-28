// Espera o HTML ser carregado completamente
document.addEventListener('DOMContentLoaded', function() {

    // --- LÓGICA DO MENU PERFIL (Seu código original) ---
    const botaoPerfil = document.getElementById('botaoPerfil');
    const menuPerfil = document.getElementById('menuPerfil');

    if (botaoPerfil && menuPerfil) { // Boa prática: verificar se os elementos existem
        botaoPerfil.addEventListener('click', function() {
            menuPerfil.classList.toggle('show');
        });

        window.addEventListener('click', function(event) {
            if (!botaoPerfil.contains(event.target) && !menuPerfil.contains(event.target)) {
                if (menuPerfil.classList.contains('show')) {
                    menuPerfil.classList.remove('show');
                }
            }
        });
    }

    // --- NOVA LÓGICA DO CARROSSEL ---
    // Seleciona TODOS os carrosséis da página
    const carousels = document.querySelectorAll('.carousel-wrapper');

    carousels.forEach(wrapper => {
        const track = wrapper.querySelector('.carousel-track');
        const prevBtn = wrapper.querySelector('.carousel-btn.prev');
        const nextBtn = wrapper.querySelector('.carousel-btn.next');
        const cards = track.querySelectorAll('.card-comunicado');

        if (!track || !prevBtn || !nextBtn || cards.length === 0) {
            // Se algum elemento essencial faltar, pula este carrossel
            return;
        }

        // Função para atualizar o estado (habilitado/desabilitado) dos botões
        function updateButtonState() {
            const scrollLeft = track.scrollLeft;
            const scrollWidth = track.scrollWidth;
            const clientWidth = track.clientWidth;

            // Desabilita o botão 'prev' se estiver no início
            prevBtn.disabled = scrollLeft <= 0;

            // Desabilita o botão 'next' se estiver no fim (com uma pequena margem de erro)
            nextBtn.disabled = scrollLeft >= (scrollWidth - clientWidth - 5);
        }

        // Evento de clique para o botão 'próximo'
        nextBtn.addEventListener('click', () => {
            // Calcula o quanto rolar (largura do card + gap)
            const cardWidth = cards[0].offsetWidth;
            const gap = parseInt(window.getComputedStyle(track).gap) || 20;
            const scrollAmount = cardWidth + gap;
            
            track.scrollBy({ left: scrollAmount, behavior: 'smooth' });
        });

        // Evento de clique para o botão 'anterior'
        prevBtn.addEventListener('click', () => {
            const cardWidth = cards[0].offsetWidth;
            const gap = parseInt(window.getComputedStyle(track).gap) || 20;
            const scrollAmount = cardWidth + gap;

            track.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
        });

        // Atualiza os botões sempre que o usuário rolar (inclusive após o clique)
        track.addEventListener('scroll', updateButtonState);

        // Atualiza os botões no carregamento da página
        updateButtonState();
    });

}); // Fim do 'DOMContentLoaded'


// --- FUNÇÕES DE NAVEGAÇÃO (Seu código original) ---
function aula(){
    window.location.href="/src/Pagina_Aluno_Aulas/index.html"
}

function inicio(){
    window.location.href="/src/Pagina_Inicial_Aluno/index.html"
}

function comunicados(){
    window.location.href="/src/Pagina_Aluno_Comunicados/index.html"
}


// --- NOVA FUNÇÃO CURTIR (Melhorada) ---
// Esta função é chamada pelo 'onclick="curtir(this)"' no HTML
function curtir(buttonElement) {
    // Encontra o span do contador dentro do mesmo 'card-footer'
    const cardFooter = buttonElement.parentElement;
    const contagemEl = cardFooter.querySelector('.contador-curtidas');
    
    // Pega a contagem atual do atributo 'data-count'
    let contagem = parseInt(contagemEl.dataset.count || '0');
    
    // Alterna a classe 'curtido' no botão
    const foiCurtido = buttonElement.classList.toggle('curtido');
    
    // Encontra o ícone do coração
    const icone = buttonElement.querySelector('i');

    if (foiCurtido) {
        // Se foi curtido
        contagem++;
        icone.classList.remove('far'); // Remove o ícone de contorno
        icone.classList.add('fas');    // Adiciona o ícone sólido
    } else {
        // Se foi descurtido
        contagem--;
        icone.classList.remove('fas');    // Remove o ícone sólido
        icone.classList.add('far');     // Adiciona o ícone de contorno
    }

    // Atualiza o texto e o atributo data-count
    contagemEl.textContent = `Curtidas: ${contagem}`;
    contagemEl.dataset.count = contagem;
}