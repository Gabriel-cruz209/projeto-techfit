
const form = document.getElementById("form_validacao");

form.addEventListener("submit", function (e) {

    const campos = form.querySelectorAll("input");

    for (let campo of campos) {
        
        if (campo.name === "cpf" && !regexCPF.test(campo.value)) {
            e.preventDefault();
            alert("CPF inválido!");
            campo.focus();
            return;
        }

        if (campo.name === "cep" && !regexCEP.test(campo.value)) {
            e.preventDefault();
            alert("CEP inválido!");
            campo.focus();
            return;
        }

        if (campo.name === "telefone" && !regexTelefone.test(campo.value)) {
            e.preventDefault();
            alert("Telefone inválido!");
            campo.focus();
            return;
        }
    }
});
