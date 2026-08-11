<?php
header('Content-Type: text/html; charset=utf-8');

define('HOST', 'localhost');
define('USUARIO', 'root');
define('SENHA', '');
define('DB', '3k2026_games');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar');

// Forçar UTF-8 na conexão
mysqli_set_charset($conexao, "utf8");
?>
