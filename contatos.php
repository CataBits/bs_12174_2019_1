<?php

// Configuração inicial da página.
require ('_config.php');

// Título "desta" página.
$titulo = "Faça Contato";

// CSS "desta" página.
$css = "/css/contatos.css";

// JavaScript "desta" página.
$js = "/js/contatos.js";

// Menu ativo "desta" página.
$menu = "contatos";

/********************************************/
/* Códigos em PHP desta página entram aqui! */
/********************************************/

// Preparando variáveis
$nome = $email = $assunto = $mensagem = $erro = $msgErro = $msgOk = "";

// Se o formulário foi enviado:
if ( isset($_POST['enviado']) ) : // Procure pelo 'endif' abaixo!!!

    // Lendo  e filtrando o "nome"
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);

    // Lendo e filtrando o "e-mail"
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

    // Lendo  e filtrando o "assunto"
    $assunto = filter_input(INPUT_POST, 'assunto', FILTER_SANITIZE_STRING);

    // Lendo  e filtrando a "mensagem"
    $mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_STRING);

    // LEMBRETE! //
    /* Gravar os dados já sanitizados nos respectivos campos de formulário... */

    // Validando 'nome'.
    if ( strlen($nome) < 2 ) {
        $erro .= '<li>Seu nome está muito curto.</li>';
    }

    // Validando e-mail. Note o uso de "!" para inverter a lógica.
    if ( !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
        $erro .= '<li>Seu e-mail parece estar incorreto.</li>';
    }

    // Validando 'assunto'.
    if ( strlen($assunto) < 4 ) {
        $erro .= '<li>O assunto está muito curto.</li>';
    }

    // Validando 'mesagem'.
    if ( strlen($mensagem) < 4 ) {
        $erro .= '<li>A mensagem está muito curta.</li>';
    }

    // Processar erros
    if ( $erro != '' ) :

        // Formatando uma mensagem de erro usando 'HEREDOC'
        $msgErro = <<<MENSAGEM

<div class="msgErro">
        <h3>Oooops!!!</h3>
        <p>Ocorrem erros que impedem o envio do seu contato:</p>
        <ul>{$erro}</ul>
        <p>Por favor, corrija os erros e tente novamente...
</div>

MENSAGEM;

    else :

        // Preparando para gravar no DB
        $sql = <<<SQL

INSERT INTO contatos 
    (nome, email, assunto, mensagem)
VALUES
    ('{$nome}', '{$email}', '{$assunto}', '{$mensagem}')
;

SQL;

        // Gravar no DB
        $conn->query($sql);

        // Obtendo só o primeiro nome do remetente
        $partes = explode (' ', $nome);

        // Gerando feedback
        $msgOk = <<<MENSAGEM

<div class="msgOk">
    <h3>Olá {$partes[0]}!</h3>
    <blockquote>Seu contato foi enviado para a equipe do GatosDeRua.</blockquote>
    <blockquote>Se necessário, em breve, responderemos.</blockquote>
    <p><em>Obrigado...</em></p>
    <p><a href="/"><i class="fas fa-fw fa-home"></i> Página Inicial</a></p>
</div>

MENSAGEM;

    endif;

endif; // Fecha o 'if' aberto lá em cima!

/**********************************************/
/* Códigos em PHP desta página terminam aqui! */
/**********************************************/

// Carrega o cabeçalho da página
require ('_header.php');

?>

<div class="row">
    <div class="col1">

        <h2>Faça Contato Conosco</h2>

        <?php if ( $msgOk == '' ): ?>

        <p>Preencha o formulário para entrar em contato com a equipe do site.</p>

        <?php echo $msgErro ?>

        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" name="contatos" id="contatos" method="post" accept-charset="utf-8">

            <?php // Campo oculto usado para saber quando o form foi enviado ?>
            <input type="hidden" name="enviado" value="ok">
    
            <p>
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" placeholder="Seu nome completo..." value="<?php echo $nome ?>">
            </p>
            <p>
                <label for="email">E-mail:</label>
                <input type="text" name="email" id="email" placeholder="usuario@provedor.com" value="<?php echo $email ?>">
            </p>
            <p>
                <label for="assunto">Assunto:</label>
                <input type="text" name="assunto" id="assunto" placeholder="Assunto do seu contato." value="<?php echo $assunto ?>">
            </p>
            <p>
                <label for="mensagem">Mensagem:</label>
                <textarea name="mensagem" id="mensagem" placeholder="Sua mensagem."><?php echo $mensagem ?></textarea>
            </p>
            <p>
                <label></label>
                <button type="submit">Enviar Mensagem</button>
                <small>&larr; Clique no botão somente uma vez.</small>
            </p>

        </form>

        <?php
    
        else:
        
            echo $msgOk;

        endif;

        ?>

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