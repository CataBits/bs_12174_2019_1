<?php

// Tratando o título da página
if ($titulo == "") {
    $titulo = "GatosDeRua .::. Bichanos da madrugada";
} else {
    $titulo = "{$titulo} .::. GatosDeRua";
}

// Tratando o CSS adicional
if ($css == "") {
    $css = null;
} else {
    $css = "<link rel=\"stylesheet\" href=\"{$css}\">\n";
}

// Tratando o JavaScript adicional, incluído em "_footer.php"
if ($js == "") {
    $js = null;
} else {
    $js = "<script src=\"{$js}\"></script>";
}

?><!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/global.css">
    <?php echo $css ?>
    <link rel="stylesheet" href="/css/all.min.css">
    <title><?php echo $titulo ?></title>
</head>
<body>
<a id="topo"></a>

<div class="wrap">

    <header class="header">
        <a href="/"><img src="/img/logo02.png" alt="GatosDeRua"></a>
        <h1>GatosDeRua<small>Bichanos da madrugada</small></h1>
    </header>

    <nav class="nav">
        <a href="/" title="Página inicial"><i class="fas fa-fw fa-home"></i></a>
        <div id="menulinks">
            <a <?php echo ($menu == "artigos") ? 'class="active"' : null ?> href="/artigos.php"><i class="fas fa-fw fa-pen-nib"></i> Artigos</a>
            <a <?php echo ($menu == "contatos") ? 'class="active"' : null ?> href="/contatos.php"><i class="fas fa-fw fa-mail-bulk"></i> Contatos</a>
            <a <?php echo ($menu == "sobre") ? 'class="active"' : null ?> href="/sobre.php"><i class="fas fa-fw fa-info-circle"></i> Sobre</a>
            <a <?php echo ($menu == "procurar") ? 'class="active"' : null ?> href="/procurar.php" title="Procurar"><i class="fas fa-fw fa-search"></i><span>&nbsp;Procurar</span></a>
        </div>
        <a href="#menu" id="menu" title="Mostra / Oculta menu"><i class="fas fa-fw fa-bars"></i></a>
    </nav>

    <main class="main">

<!-- O CONTEÚDO DA PÁGINA COMEÇA AQUI -->

     