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

function aula(){
    window.location.href="/src/Pagina_Aluno_Aulas/index.html"
}

function inicio(){
    window.location.href="/src/Pagina_Inicial_Aluno/index.html"
}

function comunicados(){
    window.location.href="/src/Pagina_Aluno"
}

function curtir(){
    const contagem = document.getElementById('funcCurti').value;
    if(contagem == 0){
        document.getElementById("contadorCurtidas").innerHTML = `Curtidas: ${contagem + 1}`
        return;
    }
    else if (contagem == 1){
        document.getElementById("contadorCurtidas").innerHTML = `Curtidas: ${contagem - 1}`
        return;
    }
    else{
        document.getElementById("contadorCurtidas").innerHTML= `Error`
    }
}

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