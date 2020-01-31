<?php

// Título "desta" página. Se vazio ("") usa o título da "index.php"
$titulo = "Faça Contato";

// CSS "desta" página. Ex.: "/css/template.css"
$css = "/css/contatos.css";

// JavaScript "desta" página. Ex.: "/js/template.js"
$js = "/js/contatos.js";

// Menu ativo "desta" página
/*
    Valores possíveis: "", "artigos", "contatos", "sobre" e "procurar".
    Qualquer outro valor = "".
*/
$menu = "contatos";

// Carrega o cabeçalho da página
require ('_header.php');

?>

<div class="row">
    <div class="col1">

        <h2>Faça Contato Conosco</h2>
        <p>Preencha o formulário para entrar em contato com a equipe do site.</p>

        <form action="/processa.php" name="contatos" id="contatos" method="post">
    
            <p>
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" placeholder="Seu nome completo...">
            </p>
            <p>
                <label for="email">E-mail:</label>
                <input type="email" name="email" id="email" placeholder="usuario@provedor.com">
            </p>
            <p>
                <label for="assunto">Assunto:</label>
                <input type="text" name="assunto" id="assunto" placeholder="Assunto do seu contato.">
            </p>
            <p>
                <label for="mensagem">Mensagem:</label>
                <textarea name="mensagem" id="mensagem" placeholder="Sua mensagem."></textarea>
            </p>
            <p>
                <label></label>
                <button type="submit">Enviar Mensagem</button>
                <small>&larr; Clique no botão somente uma vez.</small>
            </p>

        </form>

    </div>
    <div class="col2">

        <h3>Mais contatos</h3>
        <img src="/img/social01.png" alt="Mais contatos">
        <p>Você também pode falar conosco pelas principais redes sociais.</p>
        <ul>
            <li><a href="http://facebook.com/" target="_blank"><i class="fab fa-fw fa-facebook-square"></i> Facebook</a></li>
            <li><a href="http://twitter.com/" target="_blank"><i class="fab fa-fw fa-twitter-square"></i> Twitter</a></li>
            <li><a href="http://instagram.com/" target="_blank"><i class="fab fa-fw fa-instagram"></i> Instagram</a></li>
            <li><a href="http://youtube.com/" target="_blank"><i class="fab fa-fw fa-youtube-square"></i> Youtube</a></li>
            <li><a href="http://linkedin.com/" target="_blank"><i class="fab fa-fw fa-linkedin"></i> Linkedin</a></li>
            <li><a href="http://github.com/" target="_blank"><i class="fab fa-fw fa-github-square"></i> GitHub</a></li>
        </ul>

    </div>
</div>

<?php

// Carrega o rodapé da página
require ('_footer.php');

?>