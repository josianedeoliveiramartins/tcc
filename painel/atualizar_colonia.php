
<?php

require_once __DIR__ . '/conexao.php';
require_once __DIR__ . '/funcoes_upload.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Método não permitido.');
}

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

if (!$id || $id < 1) {
    exit('ID inválido.');
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

$dataObjeto = DateTime::createFromFormat('!Y-m-d', $data);

if (!$dataObjeto || $dataObjeto->format('Y-m-d') !== $data) {
    exit('A data de aquisição é inválida.');
}

// Busca as imagens atuais.
$stmt = mysqli_prepare(
    $conexao,
    'SELECT foto, banner FROM colonias WHERE id = ?'
);

mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);

$resultado = mysqli_stmt_get_result($stmt);
$atual = mysqli_fetch_assoc($resultado);

mysqli_stmt_close($stmt);

if (!$atual) {
    exit('Colônia não encontrada.');
}

// Mantém os nomes antigos se não houver novos uploads.
$foto = !empty($atual['foto'])
    ? basename($atual['foto'])
    : null;

$banner = !empty($atual['banner'])
    ? basename($atual['banner'])
    : null;

$novosArquivos = array();

// Foto nova, se enviada.
$resultadoFoto = uploadImagem('foto', false);

if ($resultadoFoto['erro'] !== null) {
    exit(htmlspecialchars($resultadoFoto['erro'], ENT_QUOTES, 'UTF-8'));
}

if ($resultadoFoto['nome'] !== null) {
    $foto = $resultadoFoto['nome'];
    $novosArquivos[] = $foto;
}

// Banner novo, se enviado.
$resultadoBanner = uploadImagem('banner', false);

if ($resultadoBanner['erro'] !== null) {
    foreach ($novosArquivos as $arquivo) {
        @unlink(__DIR__ . '/uploads/' . $arquivo);
    }

    exit(htmlspecialchars(
        $resultadoBanner['erro'],
        ENT_QUOTES,
        'UTF-8'
    ));
}

if ($resultadoBanner['nome'] !== null) {
    $banner = $resultadoBanner['nome'];
    $novosArquivos[] = $banner;
}

$sql = "UPDATE colonias
        SET nome = ?, especie = ?, procedencia = ?,
            data_aquisicao = ?, localizacao = ?, descricao = ?,
            foto = ?, banner = ?
        WHERE id = ?";

$stmt = mysqli_prepare($conexao, $sql);

if (!$stmt) {
    foreach ($novosArquivos as $arquivo) {
        @unlink(__DIR__ . '/uploads/' . $arquivo);
    }

    exit('Não foi possível preparar a atualização.');
}

mysqli_stmt_bind_param(
    $stmt,
    'ssssssssi',
    $nome,
    $especie,
    $procedencia,
    $data,
    $localizacao,
    $descricao,
    $foto,
    $banner,
    $id
);

if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);

    header('Location: listar_colonias.php');
    exit;
}

mysqli_stmt_close($stmt);

foreach ($novosArquivos as $arquivo) {
    @unlink(__DIR__ . '/uploads/' . $arquivo);
}

exit('Não foi possível atualizar a colônia.');
?>
