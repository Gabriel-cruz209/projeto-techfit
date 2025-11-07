// script.js

// Espera o HTML ser carregado completamente
document.addEventListener('DOMContentLoaded', function() {

    // --- 1. CÓDIGO DO MENU DE PERFIL ---
    const botaoPerfil = document.getElementById('botaoPerfil');
    const menuPerfil = document.getElementById('menuPerfil');

    if (botaoPerfil && menuPerfil) {
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

    // --- 2. NOVO SISTEMA DE FILTRO UNIFICADO ---
    
    // Pega todos os elementos de controle do filtro
    const filtroTipo = document.getElementById('menu-tipo');
    const filtroRegiao = document.getElementById('pes_estado');
    const filtroCidade = document.getElementById('pes_cidade');

    // Pega os contêineres principais das aulas
    const containerBoxe = document.getElementById('boxe');
    const containerZumba = document.getElementById('zumba');
    const containerMuaythai = document.getElementById('muaythay');
    
    // Coloca todos os containers em um array para facilitar
    const todosContainers = [containerBoxe, containerZumba, containerMuaythai].filter(Boolean); // .filter(Boolean) remove qualquer um que for nulo

    // Função única que roda todos os filtros
    function aplicarFiltros() {
        
        // Pega os valores atuais dos filtros (em minúsculas e sem espaços)
        const tipoSelecionado = filtroTipo.value; // ex: "boxe"
        const termoRegiao = filtroRegiao.value.toLowerCase().trim();
        const termoCidade = filtroCidade.value.toLowerCase().trim();

        let containerAtivo = null;

        // 1. Filtro de TIPO DE AULA (Mostra o container principal)
        todosContainers.forEach(container => {
            if (container.id === tipoSelecionado) {
                container.classList.remove('hidden');
                containerAtivo = container; // Armazena qual container está visível
            } else {
                container.classList.add('hidden');
            }
        });

        // 2. Filtro de REGIAO e CIDADE (Filtra as unidades DENTRO do container ativo)
        if (containerAtivo) {
            
            // Pega todas as unidades APENAS do container que está visível
            const unidadesParaFiltrar = containerAtivo.querySelectorAll('.unidade');
            
            unidadesParaFiltrar.forEach(unidade => {
                
                // Pega os dados da unidade direto do HTML (usando getAttribute)
                // O '|| '' ' garante que não dê erro se o atributo não existir
                const itemRegiao = (unidade.getAttribute('estado') || '').toLowerCase();
                const itemCidade = (unidade.getAttribute('cidade') || '').toLowerCase();

                // Verifica se os termos de busca estão incluídos nos dados da unidade
                const matchRegiao = itemRegiao.includes(termoRegiao);
                const matchCidade = itemCidade.includes(termoCidade);

                // Mostra ou esconde a unidade individual
                if (matchRegiao && matchCidade) {
                    unidade.classList.remove('hidden');
                } else {
                    unidade.classList.add('hidden');
                }
            });
        }
    }

    // 3. Adiciona os "ouvintes" de evento
    // Qualquer mudança em qualquer um dos 3 filtros chama a mesma função
    if (filtroTipo) {
        filtroTipo.addEventListener('change', aplicarFiltros);
    }
    if (filtroRegiao) {
        filtroRegiao.addEventListener('input', aplicarFiltros);
    }
    if (filtroCidade) {
        filtroCidade.addEventListener('input', aplicarFiltros);
    }

    // 4. Roda o filtro UMA VEZ quando a página carrega
    // Isso garante que apenas as aulas de "Boxe" (o padrão) apareçam
    aplicarFiltros();

});


// --- 3. FUNÇÕES DE NAVEGAÇÃO (Mantidas) ---

function aula(){
    window.location.href="/src/Pagina_Aluno_Aulas/index.html"
}

function inicio(){
    window.location.href="/src/Pagina_Inicial_Aluno/index.html"
}

function comunicados(){
    window.location.href="/src/Pagina_Aluno_Comunidados/index.html"
}