<?php
include('conexao.php');

// Recebe os dados do formulário
$nome        = trim($_POST['nomeColonia']);
$especie     = trim($_POST['especie']);
$procedencia = trim($_POST['procedencia']); // novo campo
$data        = trim($_POST['data_aquisicao']);
$localizacao = trim($_POST['localizacao']);
$descricao   = trim($_POST['descricao']);

// Validação: não permitir campos obrigatórios vazios
if (empty($nome) || empty($especie) || empty($procedencia) || empty($data) || empty($localizacao)) {
    echo "⚠️ Preencha todos os campos obrigatórios antes de salvar.";
    exit;
}

// Upload da foto (obrigatória)
$foto = null;
if (!empty($_FILES['foto']['name'])) {
    $foto = 'uploads/' . basename($_FILES['foto']['name']);
    move_uploaded_file($_FILES['foto']['tmp_name'], $foto);
} else {
    echo "⚠️ A foto da abelha é obrigatória.";
    exit;
}

// Upload do banner (opcional)
$banner = null;
if (!empty($_FILES['banner']['name'])) {
    $banner = 'uploads/' . basename($_FILES['banner']['name']);
    move_uploaded_file($_FILES['banner']['tmp_name'], $banner);
}

// Query de inserção
$sql = "INSERT INTO colonias (nome, especie, procedencia, data_aquisicao, localizacao, descricao, foto, banner)
        VALUES ('$nome', '$especie', '$procedencia', '$data', '$localizacao', '$descricao', '$foto', '$banner')";

if (mysqli_query($conexao, $sql)) {
    header("Location: listar_colonias.php"); // redireciona para a listagem
    exit;
} else {
    echo "Erro ao salvar: " . mysqli_error($conexao);
}

?>
