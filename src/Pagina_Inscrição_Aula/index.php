<?php

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscrição em Aula</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="../../utilitarios/padrao.css">
</head>
<body>
    <main>
        <section class="inscricao">
            <h1>Inscrever em Aula</h1>
            <form id="form-inscricao">
                <label>Aula:</label>
                <select name="aula">
                    <option>Zumba</option>
                    <option>Musculação</option>
                </select>
                <button type="submit">Inscrever</button>
            </form>
        </section>
    </main>
</body>
</html>
<?php

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>TechFit - Inscrição</title>
</head>
<body>
    <header>
        <img src="/Arquivos/LogoTechFit-removebg-preview.png" alt="Logo TechFit">
        <h1>TECHFIT</h1>
        <button onclick="voltar()"><img class="volta" src="/Arquivos/de-volta__1_-removebg-preview.png" alt="Botao-voltar"></button>
    </header>
    <main>
        <div class="container">
            <form id="inscricao" class="form-inscricao">
                <h2>Inscrição em Aula</h2>

                <label for="nome">Nome completo</label>
                <input id="nome" name="nome" type="text" placeholder="Seu nome" required>

                <label for="email">E-mail</label>
                <input id="email" name="email" type="email" placeholder="seu@exemplo.com" required>

                <label for="telefone">Telefone</label>
                <input id="telefone" name="telefone" type="tel" placeholder="(xx) xxxxx-xxxx">

                <label for="aula">Escolha a aula</label>
                <select id="aula" name="aula" required>
                    <option value="">-- selecione --</option>
                    <option value="musculacao">Musculação</option>
                    <option value="yoga">Yoga</option>
                    <option value="spinning">Spinning</option>
                    <option value="pilates">Pilates</option>
                    <option value="hiit">HIIT</option>
                </select>

                <label for="data">Data preferida</label>
                <input id="data" name="data" type="date">

                <button type="submit" class="btn-enviar">Enviar inscrição</button>
            </form>
        </div>
    </main>
    <script>
        function voltar(){
            // volta para a página anterior no histórico
            window.history.back();
        }

        document.getElementById('inscricao').addEventListener('submit', function(e){
            e.preventDefault();
            const nome = document.getElementById('nome').value.trim();
            const aula = document.getElementById('aula').value;
            if(!nome || !aula){
                alert('Por favor preencha seu nome e selecione uma aula.');
                return;
            }
            // aqui você pode enviar os dados para um servidor via fetch
            alert('Inscrição enviada!\nNome: ' + nome + '\nAula: ' + aula);
            this.reset();
        });
    </script>
    <footer></footer>
</body>
</html>
