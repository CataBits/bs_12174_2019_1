<?php

// PHP em UTF-8
header("Content-type: text/html; charset=utf-8");

/***** Conexão com MySQL *****/
if ( $_SERVER['SERVER_NAME'] != 'localhost' ) { // Se não estamos no XAMPP:
    $conn = new mysqli('', '', '', '');         // Dados obtidos do provedor
} else {                                        // Se estamos na Internet:
    $conn = new mysqli('localhost', 'root', '', 'gatosderua'); // Obtidos do XAMPP
}

// Mostra erros de conexão
if ($conn->connect_error) 
    die("Falha na conexão com o DB: " . $conn->connect_error);
?>