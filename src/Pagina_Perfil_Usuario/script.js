document.addEventListener('DOMContentLoaded', ()=>{
  // formulário de editar perfil
  const formEditar = document.getElementById('form-editar');
  if(formEditar){
    formEditar.addEventListener('submit', (e)=>{
      e.preventDefault();
      alert('Alterações salvas (mock). Integre com backend para persistir.');
      window.location.href = 'index.php';
    });
  }

  const formAvaliacao = document.getElementById('form-avaliacao');
  if(formAvaliacao){
    formAvaliacao.addEventListener('submit', (e)=>{
      e.preventDefault();
      alert('Avaliação agendada (mock).');
    });
  }

  const formAg = document.getElementById('form-agendamento');
  if(formAg){
    formAg.addEventListener('submit', (e)=>{
      e.preventDefault();
      alert('Agendamento realizado (mock).');
    });
  }
});


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

function Perfil(){
    window.location.href="/src/Pagina_Perfil_Usuario/index.php"
}

function Agendamento(){
    window.location.href="/src/Pagina_Perfil_Usuario/agendamento.php"
}

function Avaliacao(){
    window.location.href="/src/Pagina_Perfil_Usuario/avaliacao.php"
}

function Editar(){
    window.location.href="/src/Pagina_Perfil_Usuario/editar.php"
}