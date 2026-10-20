<?php
header('Content-Type: text/html; charset=utf-8');

// Configurações do banco
define('HOST', 'localhost');
define('USUARIO', 'root');
define('SENHA', '');
define('DB', 'coopceedo');

// Conexão
$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB);

if (!$conexao) {
    die('Não foi possível conectar: ' . mysqli_connect_error());
}

// Forçar UTF-8 na conexão
mysqli_set_charset($conexao, "utf8");
?>
