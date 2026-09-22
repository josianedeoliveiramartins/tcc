<?php
include('conexao.php');

$id                 = intval($_POST['id']);
$dimensoes          = trim($_POST['dimensoes']);
$altura_modulo      = trim($_POST['altura_modulo']);
$angulo_corte       = trim($_POST['angulo_corte']);
$especies_recomendadas = trim($_POST['especies_recomendadas']);
$descricao          = trim($_POST['descricao']);

// Busca dados atuais para manter imagem antiga se não for substituída
$result = mysqli_query($conexao, "SELECT imagem FROM caixas WHERE id=$id");
$caixaAtual = mysqli_fetch_assoc($result);

// Upload da imagem
if (!empty($_FILES['imagem']['name'])) {
    $imagemPath = 'uploads/' . basename($_FILES['imagem']['name']);
    move_uploaded_file($_FILES['imagem']['tmp_name'], $imagemPath);
} else {
    $imagemPath = $caixaAtual['imagem']; // mantém a antiga
}

$sql = "UPDATE caixas 
        SET dimensoes='$dimensoes', altura_modulo='$altura_modulo', angulo_corte='$angulo_corte',
            especies_recomendadas='$especies_recomendadas', descricao='$descricao', imagem='$imagemPath'
        WHERE id=$id";

if (mysqli_query($conexao, $sql)) {
    header("Location: listar_caixas.php"); // volta para a listagem de caixas
    exit;
} else {
    echo "Erro ao atualizar: " . mysqli_error($conexao);
}

?>
