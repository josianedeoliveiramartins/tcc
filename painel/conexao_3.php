<?php
header('Content-Type: text/html; charset=utf-8');

// Configurações do banco
define('HOST', 'localhost');
define('USUARIO', 'u948351601_coop');
define('SENHA', 'CEEDOu948351601');
define('DB', 'u948351601_coop');

// Conexão
$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB);

if (!$conexao) {
    die('Não foi possível conectar: ' . mysqli_connect_error());
}

// Forçar UTF-8 na conexão
mysqli_set_charset($conexao, "utf8");
?>
