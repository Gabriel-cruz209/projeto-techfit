const forms = document.querySelectorAll(".form_validacao");

forms.forEach(form => {

    form.addEventListener("submit", function (e) {

        const campos = form.querySelectorAll("input");

        for (let campo of campos) {

            if (campo.id == "cpf" && !regex_cpf.test(campo.value)) {
                e.preventDefault();
                alert("CPF inválido! Formato correto: xxx.xxx.xxx-xx");
                campo.focus();
                return;
            }

            if (campo.id == "cep" && !regex_cep.test(campo.value)) {
                e.preventDefault();
                alert("CEP inválido! Formato correto: xxxxx-xxx");
                campo.focus();
                return;
            }

            if (campo.id == "telefone" && !regex_telefone.test(campo.value)) {
                e.preventDefault();
                alert("Telefone inválido! Formato correto: (xx)xxxxx-xxxx");
                campo.focus();
                return;
            }

            if (campo.id == "num_cartao" && !regex_numero_cartao.test(campo.value)) {
                e.preventDefault();
                alert("Número de cartão inválido! Formato correto: xxxx xxxx xxxx xxxx");
                campo.focus();
                return;
            }

            if (campo.id == "ccv_cartao" && !regex_ccv_cartao.test(campo.value)) {
                e.preventDefault();
                alert("CCV inválido! Formato correto: xxx");
                campo.focus();
                return;
            }

            if (campo.id == "val_cartao" && !regex_validade_cartao.test(campo.value)) {
                e.preventDefault();
                alert("Validade inválida! Formato: xx/xx");
                campo.focus();
                return;
            }

            if (campo.id == "email_funcionario" && !regex_email_funcionario.test(campo.value)) {
                e.preventDefault();
                alert("O domínio obrigatoriamente deve ser techfit.com");
                campo.focus();
                return;
            }

        }
    });
});