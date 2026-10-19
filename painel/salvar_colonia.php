
<?php

require_once __DIR__ . '/conexao.php';
require_once __DIR__ . '/funcoes_upload.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Método não permitido.');
}

$nome        = trim($_POST['nomeColonia'] ?? '');
$especie     = trim($_POST['especie'] ?? '');
$procedencia = trim($_POST['procedencia'] ?? '');
$data        = trim($_POST['data_aquisicao'] ?? '');
$localizacao = trim($_POST['localizacao'] ?? '');
$descricao   = trim($_POST['descricao'] ?? '');

if (
    $nome === '' ||
    $especie === '' ||
    $procedencia === '' ||
    $data === '' ||
    $localizacao === ''
) {
    exit('Preencha todos os campos obrigatórios.');
}

// Valida a data recebida.
$dataObjeto = DateTime::createFromFormat('!Y-m-d', $data);

if (!$dataObjeto || $dataObjeto->format('Y-m-d') !== $data) {
    exit('A data de aquisição é inválida.');
}

// Foto obrigatória.
$resultadoFoto = uploadImagem('foto', true);

if ($resultadoFoto['erro'] !== null) {
    exit(htmlspecialchars($resultadoFoto['erro'], ENT_QUOTES, 'UTF-8'));
}

$foto = $resultadoFoto['nome'];

// Banner opcional.
$resultadoBanner = uploadImagem('banner', false);

if ($resultadoBanner['erro'] !== null) {
    @unlink(__DIR__ . '/uploads/' . $foto);

    exit(htmlspecialchars(
        $resultadoBanner['erro'],
        ENT_QUOTES,
        'UTF-8'
    ));
}

$banner = $resultadoBanner['nome'];

$sql = "INSERT INTO colonias
        (nome, especie, procedencia, data_aquisicao,
         localizacao, descricao, foto, banner)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conexao, $sql);

if (!$stmt) {
    @unlink(__DIR__ . '/uploads/' . $foto);

    if ($banner !== null) {
        @unlink(__DIR__ . '/uploads/' . $banner);
    }

    exit('Não foi possível preparar o cadastro.');
}

mysqli_stmt_bind_param(
    $stmt,
    'ssssssss',
    $nome,
    $especie,
    $procedencia,
    $data,
    $localizacao,
    $descricao,
    $foto,
    $banner
);

if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);

    header('Location: listar_colonias.php');
    exit;
}

mysqli_stmt_close($stmt);

@unlink(__DIR__ . '/uploads/' . $foto);

if ($banner !== null) {
    @unlink(__DIR__ . '/uploads/' . $banner);
}

exit('Não foi possível salvar a colônia.');
?>
