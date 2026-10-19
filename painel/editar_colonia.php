
<?php
require_once __DIR__ . '/verifica_login.php';
require_once __DIR__ . '/conexao.php';

// Valida o ID recebido pela URL.
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id || $id < 1) {
    http_response_code(400);
    exit('ID da colônia inválido.');
}

// Busca a colônia com consulta preparada.
$stmt = mysqli_prepare(
    $conexao,
    'SELECT * FROM colonias WHERE id = ?'
);

if (!$stmt) {
    exit('Não foi possível consultar a colônia.');
}

mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);

$resultado = mysqli_stmt_get_result($stmt);
$colonia = mysqli_fetch_assoc($resultado);

mysqli_stmt_close($stmt);

if (!$colonia) {
    http_response_code(404);
    exit('Colônia não encontrada.');
}

// Prepara os valores para exibição segura.
function e($valor)
{
    return htmlspecialchars(
        (string) $valor,
        ENT_QUOTES,
        'UTF-8'
    );
}

// Compatível com nomes simples e caminhos antigos, como uploads/foto.jpg.
function caminhoImagem($valor)
{
    if (empty($valor)) {
        return null;
    }

    $nome = basename(str_replace('\\', '/', $valor));

    if ($nome === '.' || $nome === '..' || $nome === '') {
        return null;
    }

    $arquivo = __DIR__ . '/uploads/' . $nome;

    if (!is_file($arquivo)) {
        return null;
    }

    return 'uploads/' . rawurlencode($nome);
}

$fotoAtual = caminhoImagem($colonia['foto'] ?? '');
$bannerAtual = caminhoImagem($colonia['banner'] ?? '');

$dataAquisicao = $colonia['data_aquisicao'] ?? '';

if (
    $dataAquisicao === '0000-00-00' ||
    empty($dataAquisicao)
) {
    $dataAquisicao = '';
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Editar Colônia | COOPCEEDO</title>

    <link rel="stylesheet" href="css/cadastros.css">

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"
        rel="stylesheet"
    >
</head>

<body>

    <div class="container my-4">

        <div class="card shadow-sm">

            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">Editar Colônia</h3>
            </div>

            <div class="card-body">

                <form
                    action="atualizar_colonia.php"
                    method="post"
                    enctype="multipart/form-data"
                >

                    <input
                        type="hidden"
                        name="id"
                        value="<?php echo (int) $colonia['id']; ?>"
                    >

                    <!-- Limite de 5 MB por imagem.
                         A validação definitiva é feita no PHP. -->
                    <input
                        type="hidden"
                        name="MAX_FILE_SIZE"
                        value="5242880"
                    >

                    <!-- Foto da abelha -->
                    <div class="mb-4">

                        <label for="foto" class="form-label">
                            Foto da Abelha
                        </label>

                        <?php if ($fotoAtual !== null): ?>

                            <div class="mb-2">
                                <img
                                    src="<?php echo e($fotoAtual); ?>"
                                    alt="Foto atual da colônia"
                                    style="width: 120px; max-height: 120px; object-fit: cover;"
                                    class="img-thumbnail"
                                >
                            </div>

                        <?php else: ?>

                            <p class="text-muted">
                                Nenhuma foto disponível.
                            </p>

                        <?php endif; ?>

                        <input
                            type="file"
                            id="foto"
                            name="foto"
                            class="form-control"
                            accept=".jpg,.jpeg,.png,.gif,.webp,image/jpeg,image/png,image/gif,image/webp"
                        >

                        <small class="form-text text-muted">
                            Opcional. JPG, PNG, GIF ou WebP. Máximo de 5 MB.
                            Deixe vazio para manter a foto atual.
                        </small>

                    </div>

                    <!-- Banner -->
                    <div class="mb-4">

                        <label for="banner" class="form-label">
                            Banner
                        </label>

                        <?php if ($bannerAtual !== null): ?>

                            <div class="mb-2">
                                <img
                                    src="<?php echo e($bannerAtual); ?>"
                                    alt="Banner atual da colônia"
                                    style="width: 200px; max-width: 100%; max-height: 150px; object-fit: cover;"
                                    class="img-thumbnail"
                                >
                            </div>

                        <?php else: ?>

                            <p class="text-muted">
                                Nenhum banner disponível.
                            </p>

                        <?php endif; ?>

                        <input
                            type="file"
                            id="banner"
                            name="banner"
                            class="form-control"
                            accept=".jpg,.jpeg,.png,.gif,.webp,image/jpeg,image/png,image/gif,image/webp"
                        >

                        <small class="form-text text-muted">
                            Opcional. JPG, PNG, GIF ou WebP. Máximo de 5 MB.
                            Deixe vazio para manter o banner atual.
                        </small>

                    </div>

                    <!-- Nome -->
                    <div class="mb-3">

                        <label for="nomeColonia" class="form-label">
                            Nome
                        </label>

                        <input
                            type="text"
                            id="nomeColonia"
                            name="nomeColonia"
                            value="<?php echo e($colonia['nome']); ?>"
                            class="form-control"
                            maxlength="255"
                            required
                        >

                    </div>

                    <!-- Espécie -->
                    <div class="mb-3">

                        <label for="especie" class="form-label">
                            Espécie
                        </label>

                        <input
                            type="text"
                            id="especie"
                            name="especie"
                            value="<?php echo e($colonia['especie']); ?>"
                            class="form-control"
                            maxlength="255"
                            required
                        >

                    </div>

                    <!-- Procedência -->
                    <div class="mb-3">

                        <label for="procedencia" class="form-label">
                            Procedência
                        </label>

                        <input
                            type="text"
                            id="procedencia"
                            name="procedencia"
                            value="<?php echo e($colonia['procedencia']); ?>"
                            class="form-control"
                            maxlength="255"
                            required
                        >

                    </div>

                    <!-- Data de aquisição -->
                    <div class="mb-3">

                        <label for="data_aquisicao" class="form-label">
                            Data de aquisição
                        </label>

                        <input
                            type="date"
                            id="data_aquisicao"
                            name="data_aquisicao"
                            value="<?php echo e($dataAquisicao); ?>"
                            class="form-control"
                            required
                        >

                    </div>

                    <!-- Localização -->
                    <div class="mb-3">

                        <label for="localizacao" class="form-label">
                            Localização
                        </label>

                        <input
                            type="text"
                            id="localizacao"
                            name="localizacao"
                            value="<?php echo e($colonia['localizacao']); ?>"
                            class="form-control"
                            maxlength="255"
                            required
                        >

                    </div>

                    <!-- Descrição -->
                    <div class="mb-3">

                        <label for="descricao" class="form-label">
                            Descrição
                        </label>

                        <textarea
                            id="descricao"
                            name="descricao"
                            class="form-control"
                            rows="4"
                        ><?php echo e($colonia['descricao']); ?></textarea>

                    </div>

                    <!-- Botões -->
                    <div class="d-flex justify-content-between gap-2">

                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-check-circle"></i>
                            Atualizar
                        </button>

                        <a
                            href="listar_colonias.php"
                            class="btn btn-secondary"
                        >
                            <i class="bi bi-arrow-left-circle"></i>
                            Cancelar
                        </a>

                    </div>

                </form>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
