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

// Correção para caracteres acentuados no MySQL
// ATENÇÃO! Não se esqueça de sempre criar bases de dados no formato "utf8_general_ci"
$conn->query('SET NAMES utf8');
$conn->query('SET character_set_connection=utf8');
$conn->query('SET character_set_client=utf8');
$conn->query('SET character_set_results=utf8');

// MySQL com nomes de dias da semana e meses em português
$conn->query('SET GLOBAL lc_time_names = pt_BR');
$conn->query('SET lc_time_names = pt_BR');
?>