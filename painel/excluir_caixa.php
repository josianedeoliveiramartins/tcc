<?php
include('conexao.php');

$id = intval($_GET['id']);

$sql = "DELETE FROM caixas WHERE id=$id";

if (mysqli_query($conexao, $sql)) {
    header("Location: colonias.php");
    exit;
} else {
    echo "Erro ao excluir: " . mysqli_error($conexao);
}
?>
