/* app.js - Arquivo único compilado de scripts das páginas */

/* --- Utilitários globais (menu perfil / navegação) --- */
document.addEventListener('DOMContentLoaded', function() {
  const botaoPerfil = document.getElementById('botaoPerfil');
  const menuPerfil = document.getElementById('menuPerfil');
  if (botaoPerfil && menuPerfil) {
    botaoPerfil.addEventListener('click', function(e){
      e.stopPropagation();
      menuPerfil.classList.toggle('show');
    });
    window.addEventListener('click', function(event){
      if (!botaoPerfil.contains(event.target) && !menuPerfil.contains(event.target)) {
        if (menuPerfil.classList.contains('show')) menuPerfil.classList.remove('show');
      }
    });
  }
});

/* Navegação comum (ajuste para apontar para as páginas em .php) */
function aula(){ window.location.href = '/src/Pagina_Aluno_Aulas/index.php' }
function inicio(){ window.location.href = '/src/Pagina_Inicial_Aluno/index.php' }
function comunicados(){ window.location.href = '/src/Pagina_Aluno_Comunidados/index.php' }
function cadastro(){ window.location.href = '/src/Pagina_Cadastro/index.php' }
function relatorios(){ window.location.href = '/src/Pagina_ADM_Relatorios/index.php' }
function personais(){ window.location.href = '/src/Pagina_ADM_Personais/index.php' }
function Perfil(){ window.location.href = '/src/Pagina_Perfil_Usuario/index.php' }
function Agendamento(){ window.location.href = '/src/Pagina_Perfil_Usuario/agendamento.php' }
function Avaliacao(){ window.location.href = '/src/Pagina_Perfil_Usuario/avaliacao.php' }
function Editar(){ window.location.href = '/src/Pagina_Perfil_Usuario/editar.php' }
function login(){ window.location.href = '/src/tela_inicial_web/index.php' }
function voltar(){ window.history.back() }

/* Funções de autenticação / cadastro simples (mock) */
function acessoLogin() {
  const usuario = document.getElementById('usuario') && document.getElementById('usuario').value.trim();
  const senha = document.getElementById('senhausuario') && document.getElementById('senhausuario').value;
  if ((typeof usuario === 'undefined' || !usuario) && (typeof senha === 'undefined' || !senha)) {
    // pode estar sendo chamado de outras páginas; apenas não faz nada
  }
  if (usuario === '' || senha === '') { alert('Preencha usuário e senha.'); return }
  window.location.href = '/src/Pagina_Inicial_Aluno/index.php';
}

function acessoCadastroSimples(){
  const nome = document.getElementById('aluno') && document.getElementById('aluno').value.trim();
  const senha = document.getElementById('senhaAluno') && document.getElementById('senhaAluno').value;
  const csenha = document.getElementById('CsenhaAluno') && document.getElementById('CsenhaAluno').value;
  if(!nome || !senha || !csenha){ alert('Preencha todos os campos.'); return }
  if(senha !== csenha){ alert('As senhas não coincidem.'); return }
  alert('Cadastro realizado com sucesso! Faça login.');
  window.location.href = '/src/Pagina_Login/index.php';
}

/* --- Código específico de Página: Filtros de aulas (Pagina_Aluno_Aulas) --- */
document.addEventListener('DOMContentLoaded', function(){
  const filtroTipo = document.getElementById('menu-tipo');
  const filtroRegiao = document.getElementById('pes_estado');
  const filtroCidade = document.getElementById('pes_cidade');
  const containerBoxe = document.getElementById('boxe');
  const containerZumba = document.getElementById('zumba');
  const containerMuaythai = document.getElementById('muaythay');
  const todosContainers = [containerBoxe, containerZumba, containerMuaythai].filter(Boolean);
  if (todosContainers.length > 0) {
    function aplicarFiltros(){
      const tipoSelecionado = filtroTipo ? filtroTipo.value : '';
      const termoRegiao = filtroRegiao ? filtroRegiao.value.toLowerCase().trim() : '';
      const termoCidade = filtroCidade ? filtroCidade.value.toLowerCase().trim() : '';
      let containerAtivo = null;
      todosContainers.forEach(container => {
        if (container.id === tipoSelecionado) { container.classList.remove('hidden'); containerAtivo = container } else { container.classList.add('hidden') }
      });
      if (containerAtivo) {
        const unidades = containerAtivo.querySelectorAll('.unidade');
        unidades.forEach(unidade => {
          const itemRegiao = (unidade.getAttribute('estado')||'').toLowerCase();
          const itemCidade = (unidade.getAttribute('cidade')||'').toLowerCase();
          const matchRegiao = itemRegiao.includes(termoRegiao);
          const matchCidade = itemCidade.includes(termoCidade);
          if (matchRegiao && matchCidade) unidade.classList.remove('hidden'); else unidade.classList.add('hidden');
        });
      }
    }
    if (filtroTipo) filtroTipo.addEventListener('change', aplicarFiltros);
    if (filtroRegiao) filtroRegiao.addEventListener('input', aplicarFiltros);
    if (filtroCidade) filtroCidade.addEventListener('input', aplicarFiltros);
    aplicarFiltros();
  }
});

/* --- Curtidas (Pagina_Aluno_Comunidados) --- */
function curtir(buttonElement){
  if(!buttonElement) return;
  const cardFooter = buttonElement.parentElement;
  const contagemEl = cardFooter.querySelector('.contador-curtidas');
  let contagem = parseInt(contagemEl && contagemEl.dataset.count || '0');
  const foiCurtido = buttonElement.classList.toggle('curtido');
  const icone = buttonElement.querySelector('i');
  if (foiCurtido){ contagem++; if(icone){ icone.classList.remove('far'); icone.classList.add('fas'); } }
  else { contagem--; if(icone){ icone.classList.remove('fas'); icone.classList.add('far'); } }
  if(contagemEl){ contagemEl.textContent = `Curtidas: ${contagem}`; contagemEl.dataset.count = contagem }
}

/* --- Perfil: formulários (Pagina_Perfil_Usuario) --- */
document.addEventListener('DOMContentLoaded', function(){
  const formEditar = document.getElementById('form-editar');
  if(formEditar){ formEditar.addEventListener('submit', function(e){ e.preventDefault(); alert('Alterações salvas (mock). Integre com backend para persistir.'); window.location.href = 'index.php'; }) }
  const formAvaliacao = document.getElementById('form-avaliacao');
  if(formAvaliacao){ formAvaliacao.addEventListener('submit', function(e){ e.preventDefault(); alert('Avaliação agendada (mock).'); }) }
  const formAg = document.getElementById('form-agendamento');
  if(formAg){ formAg.addEventListener('submit', function(e){ e.preventDefault(); alert('Agendamento realizado (mock).'); }) }
});

/* --- Inscrição Aula: formulário local (Pagina_Inscrição_Aula) --- */
document.addEventListener('DOMContentLoaded', function(){
  const form = document.getElementById('inscricao');
  if(form){
    form.addEventListener('submit', function(e){
      e.preventDefault();
      const nome = document.getElementById('nome') && document.getElementById('nome').value.trim();
      const aula = document.getElementById('aula') && document.getElementById('aula').value;
      if(!nome || !aula){ alert('Por favor preencha seu nome e selecione uma aula.'); return }
      alert('Inscrição enviada!\nNome: ' + nome + '\nAula: ' + aula);
      form.reset();
    });
  }
});

/* Fim de app.js */
