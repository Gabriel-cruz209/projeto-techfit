/* app.js - Arquivo único compilado de scripts das páginas */

/* --- Utilitários globais (menu perfil / navegação) --- */
document.addEventListener("DOMContentLoaded", function () {
  const botaoPerfil = document.getElementById("botaoPerfil");
  const menuPerfil = document.getElementById("menuPerfil");
  if (botaoPerfil && menuPerfil) {
    botaoPerfil.addEventListener("click", function (e) {
      e.stopPropagation();
      menuPerfil.classList.toggle("show");
    });
    window.addEventListener("click", function (event) {
      if (
        !botaoPerfil.contains(event.target) &&
        !menuPerfil.contains(event.target)
      ) {
        if (menuPerfil.classList.contains("show"))
          menuPerfil.classList.remove("show");
      }
    });
  }
});

// Seleção cadastros
function sec(secao) {
  document.getElementById("Unidade").classList.add("hidden");
  document.getElementById("Aluno").classList.add("hidden");
  document.getElementById("Comunicado").classList.add("hidden");
  document.getElementById("Aulas").classList.add("hidden");
  document.getElementById("Funcionario").classList.add("hidden");
  document.getElementById("AvFisica").classList.add("hidden");
  document.getElementById("Planos").classList.add("hidden");

  document.getElementById(secao).classList.remove("hidden");
}

function s(secao) {
  document.getElementById("AULA").classList.add("hidden");
  document.getElementById("ALUNO").classList.add("hidden");
  document.getElementById("FUNCIONARIO").classList.add("hidden");
  document.getElementById("PLANO").classList.add("hidden");
  document.getElementById("PAGAMENTO").classList.add("hidden");
  document.getElementById("UNIDADE").classList.add("hidden");

  document.getElementById(secao).classList.remove("hidden");
}

/* Navegação comum (ajuste para apontar para as páginas em .php) */
function aula(link) {
  window.location.href = `/src/Pagina_Aluno_Aulas/index.php${link}`;
}
function inicio(link) {
  window.location.href = `/src/Pagina_Inicial_Aluno/index.php${link}`;
}
function comunicados(link) {
  window.location.href = `/src/Pagina_Aluno_Comunidados/index.php${link}`;
}
function cadastro(link) {
  window.location.href = `/src/Pagina_Cadastro/index.php${link}`;
}
function relatorios(link) {
  window.location.href = `/src/Pagina_ADM_Relatorios/index.php${link}`;
}
function personais(link) {
  window.location.href = `/src/Pagina_ADM_Personais/index.php${link}`;
}
function Perfil(link) {
  window.location.href = `/src/Pagina_Perfil_Usuario/index.php${link}`;
}
function agenda(link) {
  window.location.href = `/src/Pagina_Perfil_Usuario/agenda.php${link}`;
}
function Avaliacao(link) {
  window.location.href = `/src/Pagina_Perfil_Usuario/avaliacao.php${link}`;
}
function Editar(link) {
  window.location.href = `/src/Pagina_Perfil_Usuario/editar.php${link}`;
}
function login(link) {
  window.location.href = `/src/Pagina_Login/index.php${link}`;
}
function inicioAdm(link) {
  window.location.href = `/src/Pagina_ADM_inicio/index.php${link}`;
}
function plano(link) {
  window.location.href = `/src/Pagina_Perfil_Usuario/planos.php${link}`;
}
function cadastroAdm(link) {
  window.location.href = `/src/Pagina_ADM_Cadastros/index.php${link}`;
}
function inscrever(link) {
  window.location.href = `/src/Pagina_Inscrição_Aula/index.php${link}`;
}
function inicioWeb(link) {
  window.location.href = `../../index.php${link}`;
}
function voltar(link) {
  window.history.back();
}


/* Funções de autenticação / cadastro simples (mock) */
function acessoLogin() {
  const usuario =
    document.getElementById("usuario") &&
    document.getElementById("usuario").value.trim();
  const senha =
    document.getElementById("senhausuario") &&
    document.getElementById("senhausuario").value;
  if (
    (typeof usuario === "undefined" || !usuario) &&
    (typeof senha === "undefined" || !senha)
  ) {
    // pode estar sendo chamado de outras páginas; apenas não faz nada
  }
  if (usuario === "" || senha === "") {
    alert("Preencha usuário e senha.");
    return;
  }
  window.location.href = "/src/Pagina_Inicial_Aluno/index.php";
}

function acessoCadastroSimples() {
  const nome =
    document.getElementById("aluno") &&
    document.getElementById("aluno").value.trim();
  const senha =
    document.getElementById("senhaAluno") &&
    document.getElementById("senhaAluno").value;
  const csenha =
    document.getElementById("CsenhaAluno") &&
    document.getElementById("CsenhaAluno").value;
  if (!nome || !senha || !csenha) {
    alert("Preencha todos os campos.");
    return;
  }
  if (senha !== csenha) {
    alert("As senhas não coincidem.");
    return;
  }
  alert("Cadastro realizado com sucesso! Faça login.");
  window.location.href = "/src/Pagina_Login/index.php";
}

/* --- Código específico de Página: Filtros de aulas (Pagina_Aluno_Aulas) --- */
document.addEventListener("DOMContentLoaded", function () {
  const filtroTipo = document.getElementById("menu-tipo");
  const filtroRegiao = document.getElementById("pes_estado");
  const filtroCidade = document.getElementById("pes_cidade");
  const containerBoxe = document.getElementById("boxe");
  const containerZumba = document.getElementById("zumba");
  const containerMuaythai = document.getElementById("muaythay");
  const todosContainers = [
    containerBoxe,
    containerZumba,
    containerMuaythai,
  ].filter(Boolean);
  if (todosContainers.length > 0) {
    function aplicarFiltros() {
      const tipoSelecionado = filtroTipo ? filtroTipo.value : "";
      const termoRegiao = filtroRegiao
        ? filtroRegiao.value.toLowerCase().trim()
        : "";
      const termoCidade = filtroCidade
        ? filtroCidade.value.toLowerCase().trim()
        : "";
      let containerAtivo = null;
      todosContainers.forEach((container) => {
        if (container.id === tipoSelecionado) {
          container.classList.remove("hidden");
          containerAtivo = container;
        } else {
          container.classList.add("hidden");
        }
      });
      if (containerAtivo) {
        const unidades = containerAtivo.querySelectorAll(".unidade");
        unidades.forEach((unidade) => {
          const itemRegiao = (
            unidade.getAttribute("estado") || ""
          ).toLowerCase();
          const itemCidade = (
            unidade.getAttribute("cidade") || ""
          ).toLowerCase();
          const matchRegiao = itemRegiao.includes(termoRegiao);
          const matchCidade = itemCidade.includes(termoCidade);
          if (matchRegiao && matchCidade) unidade.classList.remove("hidden");
          else unidade.classList.add("hidden");
        });
      }
    }
    if (filtroTipo) filtroTipo.addEventListener("change", aplicarFiltros);
    if (filtroRegiao) filtroRegiao.addEventListener("input", aplicarFiltros);
    if (filtroCidade) filtroCidade.addEventListener("input", aplicarFiltros);
    aplicarFiltros();
  }
});

/* --- Curtidas (Pagina_Aluno_Comunidados) --- */
function curtir(buttonElement) {
  if (!buttonElement) return;
  const cardFooter = buttonElement.parentElement;
  const contagemEl = cardFooter.querySelector(".contador-curtidas");
  let contagem = parseInt((contagemEl && contagemEl.dataset.count) || "0");
  const foiCurtido = buttonElement.classList.toggle("curtido");
  const icone = buttonElement.querySelector("i");
  if (foiCurtido) {
    contagem++;
    if (icone) {
      icone.classList.remove("far");
      icone.classList.add("fas");
    }
  } else {
    contagem--;
    if (icone) {
      icone.classList.remove("fas");
      icone.classList.add("far");
    }
  }
  if (contagemEl) {
    contagemEl.textContent = `Curtidas: ${contagem}`;
    contagemEl.dataset.count = contagem;
  }
}



// pagina Cadastro, escolha usuario pagamento
document.addEventListener("DOMContentLoaded", function() {

    const select = document.getElementById("select_plano");
    const mensagemDiv = document.getElementById("mensagem_plano");

    function mostrarMensagem() {

        // Evita duplicar a mensagem
        if (mensagemDiv.innerHTML.trim() !== "") return;

        mensagemDiv.innerHTML = `
            <p style="margin-top: 8px; color: #ffffffff; font-size: 14px; background-color: #f00; border-radius: 16px; text-align: center;">
              Complete o cadastro do pagamento no seu perfil para confirmar a sua assinatura!!!
          </p>
        `;
    }

    select.addEventListener("focus", mostrarMensagem);

    select.addEventListener("change", mostrarMensagem);

    window.addEventListener("DOMContentLoaded", mostrarMensagem);
});
      
document.getElementById("pesquisa").addEventListener("input", function () {
    let filtro = this.value.toLowerCase();

    const abas = ["ALUNO"];

    let abaAtiva = abas.find(aba => {
        let div = document.getElementById(aba);
        return div && div.style.display !== "none";
    });

    if (!abaAtiva) return;

    let tabela = document.querySelector(`#${abaAtiva} table`);
    if (!tabela) return;

    let linhas = tabela.querySelectorAll("tr:not(:first-child)");

    linhas.forEach(linha => {
        let texto = linha.textContent.toLowerCase();
        linha.style.display = texto.includes(filtro) ? "" : "none";
    });
});

document.getElementById("pesquisa2").addEventListener("input", function () {
    let filtro = this.value.toLowerCase();

    const abas = ["FUNCIONARIO"];

    let abaAtiva = abas.find(aba => {
        let div = document.getElementById(aba);
        return div && div.style.display !== "none";
    });

    if (!abaAtiva) return;

    let tabela = document.querySelector(`#${abaAtiva} table`);
    if (!tabela) return;

    let linhas = tabela.querySelectorAll("tr:not(:first-child)");

    linhas.forEach(linha => {
        let texto = linha.textContent.toLowerCase();
        linha.style.display = texto.includes(filtro) ? "" : "none";
    });
});

document.getElementById("pesquisa3").addEventListener("input", function () {
    let filtro = this.value.toLowerCase();

    const abas = ["AULA"];

    let abaAtiva = abas.find(aba => {
        let div = document.getElementById(aba);
        return div && div.style.display !== "none";
    });

    if (!abaAtiva) return;

    let tabela = document.querySelector(`#${abaAtiva} table`);
    if (!tabela) return;

    let linhas = tabela.querySelectorAll("tr:not(:first-child)");

    linhas.forEach(linha => {
        let texto = linha.textContent.toLowerCase();
        linha.style.display = texto.includes(filtro) ? "" : "none";
    });
});

document.getElementById("pesquisa4").addEventListener("input", function () {
    let filtro = this.value.toLowerCase();

    const abas = ["UNIDADE"];

    let abaAtiva = abas.find(aba => {
        let div = document.getElementById(aba);
        return div && div.style.display !== "none";
    });

    if (!abaAtiva) return;

    let tabela = document.querySelector(`#${abaAtiva} table`);
    if (!tabela) return;

    let linhas = tabela.querySelectorAll("tr:not(:first-child)");

    linhas.forEach(linha => {
        let texto = linha.textContent.toLowerCase();
        linha.style.display = texto.includes(filtro) ? "" : "none";
    });
});

document.getElementById("pesquisa5").addEventListener("input", function () {
    let filtro = this.value.toLowerCase();

    const abas = ["PLANO"];

    let abaAtiva = abas.find(aba => {
        let div = document.getElementById(aba);
        return div && div.style.display !== "none";
    });

    if (!abaAtiva) return;

    let tabela = document.querySelector(`#${abaAtiva} table`);
    if (!tabela) return;

    let linhas = tabela.querySelectorAll("tr:not(:first-child)");

    linhas.forEach(linha => {
        let texto = linha.textContent.toLowerCase();
        linha.style.display = texto.includes(filtro) ? "" : "none";
    });
});

document.getElementById("pesquisa6").addEventListener("input", function () {
    let filtro = this.value.toLowerCase();

    const abas = ["PAGAMENTO"];

    let abaAtiva = abas.find(aba => {
        let div = document.getElementById(aba);
        return div && div.style.display !== "none";
    });

    if (!abaAtiva) return;

    let tabela = document.querySelector(`#${abaAtiva} table`);
    if (!tabela) return;

    let linhas = tabela.querySelectorAll("tr:not(:first-child)");

    linhas.forEach(linha => {
        let texto = linha.textContent.toLowerCase();
        linha.style.display = texto.includes(filtro) ? "" : "none";
    });
});