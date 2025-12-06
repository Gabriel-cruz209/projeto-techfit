
const form = document.getElementById("form_validacao");

form.addEventListener("submit", function (e) {

    const campos = form.querySelectorAll("input");
    console.log(campos)
    for (let campo of campos) {
        
        if (campo.id == "cpf" && !regex_cpf.test(campo.value)) {
            e.preventDefault();
            alert("CPF inválido!");
            campo.focus();
            return;
        }

        if (campo.id == "cep" && !regex_cep.test(campo.value)) {
            e.preventDefault();
            alert("CEP inválido!");
            campo.focus();
            return;
        }

        if (campo.id == "telefone" && !regex_telefone.test(campo.value)) {
            e.preventDefault();
            alert("Telefone inválido!");
            campo.focus();
            return;
        }
    }
});
