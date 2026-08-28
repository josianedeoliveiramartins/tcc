<?php
include('conexao.php');

$dimensoes   = $_POST['dimensoes'];
$altura      = $_POST['altura_modulo'];
$angulo      = $_POST['angulo_corte'];
$especies    = $_POST['especies_recomendadas'];
$descricao   = $_POST['descricao'];

$sql = "INSERT INTO caixas (dimensoes, altura_modulo, angulo_corte, especies_recomendadas, descricao)
        VALUES ('$dimensoes', '$altura', '$angulo', '$especies', '$descricao')";

if (mysqli_query($conexao, $sql)) {
    header("Location: index.php"); // volta para a página principal
    exit;
} else {
    echo "Erro: " . mysqli_error($conexao);
}
?>
