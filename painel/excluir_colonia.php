<?php
include('conexao.php');

// Recebe o ID pela URL
$id = intval($_GET['id']); // garante que seja número

if ($id > 0) {
    // Executa a exclusão
    $sql = "DELETE FROM colonias WHERE id = $id";
    if (mysqli_query($conexao, $sql)) {
        // Redireciona de volta para a listagem
        header("Location: listar_colonias.php");
        exit;
    } else {
        echo "Erro ao excluir: " . mysqli_error($conexao);
    }
} else {
    echo "ID inválido.";
}
?>
