<?php
include('conexao.php');

$id          = intval($_POST['id']);
$nome        = trim($_POST['nomeColonia']);
$especie     = trim($_POST['especie']);
$procedencia = trim($_POST['procedencia']);
$data        = trim($_POST['data_aquisicao']);
$localizacao = trim($_POST['localizacao']);
$descricao   = trim($_POST['descricao']);

// Busca os dados atuais para manter imagens antigas se não forem substituídas
$result = mysqli_query($conexao, "SELECT foto, banner FROM colonias WHERE id=$id");
$coloniaAtual = mysqli_fetch_assoc($result);

// Upload da foto
if (!empty($_FILES['foto']['name'])) {
    $fotoPath = 'uploads/' . basename($_FILES['foto']['name']);
    move_uploaded_file($_FILES['foto']['tmp_name'], $fotoPath);
} else {
    $fotoPath = $coloniaAtual['foto']; // mantém a antiga
}

// Upload do banner
if (!empty($_FILES['banner']['name'])) {
    $bannerPath = 'uploads/' . basename($_FILES['banner']['name']);
    move_uploaded_file($_FILES['banner']['tmp_name'], $bannerPath);
} else {
    $bannerPath = $coloniaAtual['banner']; // mantém o antigo
}

// Validação simples
if (empty($nome) || empty($especie) || empty($procedencia) || empty($data) || empty($localizacao)) {
    echo "⚠️ Preencha todos os campos obrigatórios antes de atualizar.";
    exit;
}

$sql = "UPDATE colonias 
        SET nome='$nome', especie='$especie', procedencia='$procedencia',
            data_aquisicao='$data', localizacao='$localizacao', descricao='$descricao',
            foto='$fotoPath', banner='$bannerPath'
        WHERE id=$id";

if (mysqli_query($conexao, $sql)) {
    header("Location: colonias.php");
    exit;
} else {
    echo "Erro ao atualizar: " . mysqli_error($conexao);
}
?>
