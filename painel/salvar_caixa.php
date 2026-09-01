<?php
include('conexao.php');

// Recebe os dados do formulário
$dimensoes   = trim($_POST['dimensoes']);
$altura      = trim($_POST['altura_modulo']);
$angulo      = trim($_POST['angulo_corte']);
$especies    = trim($_POST['especies_recomendadas']);
$descricao   = trim($_POST['descricao']);

// Validação: todos os campos obrigatórios
if (empty($dimensoes) || empty($altura) || empty($angulo) || empty($especies) || empty($descricao)) {
    echo "⚠️ Preencha todos os campos obrigatórios antes de salvar.";
    exit;
}

// Upload da imagem ilustrativa (obrigatória)
$imagem = null;
if (!empty($_FILES['imagem']['name'])) {
    $imagem = 'uploads/' . basename($_FILES['imagem']['name']);
    if (!move_uploaded_file($_FILES['imagem']['tmp_name'], $imagem)) {
        echo "⚠️ Erro ao enviar a imagem ilustrativa.";
        exit;
    }
} else {
    echo "⚠️ A imagem ilustrativa é obrigatória.";
    exit;
}

// Query de inserção
$sql = "INSERT INTO caixas (imagem, dimensoes, altura_modulo, angulo_corte, especies_recomendadas, descricao)
        VALUES ('$imagem', '$dimensoes', '$altura', '$angulo', '$especies', '$descricao')";

if (mysqli_query($conexao, $sql)) {
    // Volta para a mesma página (colonias.php) com campos limpos
    header("Location: colonias.php");
    exit;
} else {
    echo "Erro ao salvar: " . mysqli_error($conexao);
}
?>
