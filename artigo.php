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

// Montando a query
$sql = <<<SQL

SELECT 
    id_artigo, data, titulo, texto, autor_id,
    DATE_FORMAT(data, '%d/%m/%Y') AS databr,
    autor.*
FROM artigo
INNER JOIN autor ON autor_id = id_autor
WHERE id_artigo = '{$id}' 
    AND artigo.status = 'ativo'
;

SQL;

//exit($sql);

// Executa a query
$res = $conn->query($sql);

// Se tentar acessar um registro inesistente
if ( $res->num_rows != 1 ) header ('Location: artigos.php');

// Obter os dados
$data = $res->fetch_assoc();

// Atualiza título da página
$titulo = $data['titulo'];

// Gerar a view do artigo
$artigo = <<<ART

    {$data['texto']}

ART;

// Subtítulo do artigo
$subtitulo = <<<HTML

    Por <a href="{$data['site']}" target="_blank">{$data['nometela']}</a> em {$data['databr']}.

HTML;

/**********************************************/
/* Códigos em PHP desta página terminam aqui! */
/**********************************************/

// Carrega o cabeçalho da página.
require ('_header.php');

?>

<h2><?php echo $data['titulo'] ?></h2>
<p><?php echo $subtitulo ?></p>
<div><?php echo $artigo ?></div>

<?php

// Carrega o rodapé da página.
require ('_footer.php');

?>