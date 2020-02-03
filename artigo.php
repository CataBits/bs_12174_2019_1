<?php

// Configuração inicial da página.
require('_config.php');

// Título "desta" página.
$titulo = "Artigo";

// CSS "desta" página.
$css = "/css/artigos.css";

// JavaScript "desta" página.
$js = "";

// Menu ativo "desta" página.
$menu = "artigos";

/*********************************************/
/* Códigos em PHP desta página começam aqui! */
/*********************************************/

// Obtendo o Id do artigo da URL
$id = ( isset($_GET['id']) ) ? intval($_GET['id']) : 0;

// Se o ID não for informado, redireciona para 'artigos.php'
if ( $id == 0 ) header ('Location: artigos.php');

/**********************************************/
/* Códigos em PHP desta página terminam aqui! */
/**********************************************/

// Carrega o cabeçalho da página.
require ('_header.php');

?>



<?php

// Carrega o rodapé da página.
require ('_footer.php');

?>