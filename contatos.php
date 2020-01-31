<?php

// Configuração inicial da página
require ('_config.php');

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

/********************************************/
/* Códigos em PHP desta página entram aqui! */
/********************************************/

// Preparando variáveis
$nome = $email = $assunto = $mensagem = $erro = $msgErro = $msgOk = "";

// Se o formulário foi enviado:
if ( isset($_POST['enviado']) ) :

    // Lendo  e filtrando o "nome"
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);

    // Lendo e filtrando o "e-mail"
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

    // Lendo  e filtrando o "assunto"
    $assunto = filter_input(INPUT_POST, 'assunto', FILTER_SANITIZE_STRING);

    // Lendo  e filtrando a "mensagem"
    $mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_STRING);

endif;

/**********************************************/
/* Códigos em PHP desta página terminam aqui! */
/**********************************************/

// Carrega o cabeçalho da página
require ('_header.php');

?>

<div class="row">
    <div class="col1">

        <h2>Faça Contato Conosco</h2>
        <p>Preencha o formulário para entrar em contato com a equipe do site.</p>

        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" name="contatos" id="contatos" method="post" accept-charset="utf-8">
            <input type="hidden" name="enviado" value="ok">
    
            <p>
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" placeholder="Seu nome completo..." value="Joca da Silva">
            </p>
            <p>
                <label for="email">E-mail:</label>
                <input type="text" name="email" id="email" placeholder="usuario@provedor.com" value="joca@silva.com">
            </p>
            <p>
                <label for="assunto">Assunto:</label>
                <input type="text" name="assunto" id="assunto" placeholder="Assunto do seu contato." value="Assuntos do Joca">
            </p>
            <p>
                <label for="mensagem">Mensagem:</label>
                <textarea name="mensagem" id="mensagem" placeholder="Sua mensagem.">Mensagem do Joca. Blá blá blá.</textarea>
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