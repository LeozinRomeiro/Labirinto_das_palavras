<?php
$host = 'localhost';
$db = 'db_labirinto_das_palavras';
$user = 'root_lerzin';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die('Erro na conexão com o banco de dados: ' . $conn->connect_error);
}
?>


