<?php

// Configuração inicial da página.
require('_config.php');

// Título "desta" página.
$titulo = "Artigos";

// CSS "desta" página.
$css = "/css/artigos.css";

// JavaScript "desta" página.
$js = "";

// Menu ativo "desta" página.
$menu = "artigos";

/*********************************************/
/* Códigos em PHP desta página começam aqui! */
/*********************************************/

// "Declarando" variáveis
$lista_artigos = '';

// Ler os artigos do DB
$sql = <<<SQL

SELECT id_artigo, thumbnail, titulo, resumo
    FROM artigo
WHERE
    status = 'ativo'
ORDER BY data DESC;

SQL;

// Debug exit($sql);

$res = $conn->query($sql);

while ( $data = $res->fetch_assoc() ) :

    // print_r($data);

    $lista_artigos .= <<<TEXTO

<div class="artigo">
    <a href="/artigo.php?id={$data['id_artigo']}">
        <img src="{$data['thumbnail']}" alt="{$data['titulo']}">
        <h3>{$data['titulo']}</h3>
    </a>
        <span>
            {$data['resumo']}
            <small>
            <a href="/artigo.php?id={$data['id_artigo']}">
                Ler mais...
            </a>
            </small>
        </span>
</div>    

TEXTO;

// print_r($lista_artigos);

endwhile;

/**********************************************/
/* Códigos em PHP desta página terminam aqui! */
/**********************************************/

// Carrega o cabeçalho da página.
require ('_header.php');

?>

<h2>Artigos</h2>
<p>Mais recentes primeiro.</p>
<?php echo $lista_artigos ?> 

<?php

// Carrega o rodapé da página.
require ('_footer.php');

?>