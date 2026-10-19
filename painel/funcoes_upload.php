
<?php

/**
 * Salva uma imagem em painel/uploads.
 * Retorna o nome exclusivo do arquivo ou uma mensagem de erro.
 */
function uploadImagem($campo, $obrigatoria = false, $limiteBytes = 5242880)
{
    if (!isset($_FILES[$campo])) {
        return array(
            'nome' => null,
            'erro' => $obrigatoria ? 'A imagem é obrigatória.' : null
        );
    }

    $arquivo = $_FILES[$campo];

    if ($arquivo['error'] === UPLOAD_ERR_NO_FILE) {
        return array(
            'nome' => null,
            'erro' => $obrigatoria ? 'Selecione uma imagem.' : null
        );
    }

    if ($arquivo['error'] !== UPLOAD_ERR_OK) {
        return array(
            'nome' => null,
            'erro' => 'Falha no envio da imagem.'
        );
    }

    if ($arquivo['size'] <= 0 || $arquivo['size'] > $limiteBytes) {
        return array(
            'nome' => null,
            'erro' => 'A imagem deve ter no máximo 5 MB.'
        );
    }

    if (!is_uploaded_file($arquivo['tmp_name'])) {
        return array(
            'nome' => null,
            'erro' => 'Arquivo enviado inválido.'
        );
    }

    // Confere se o arquivo realmente é uma imagem.
    $informacoes = @getimagesize($arquivo['tmp_name']);

    if ($informacoes === false) {
        return array(
            'nome' => null,
            'erro' => 'O arquivo selecionado não é uma imagem válida.'
        );
    }

    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $arquivo['tmp_name']);
    finfo_close($finfo);

    $formatos = array(
        'image/jpeg' => 'jpg',
        'image/png'  => 'png',
        'image/gif'  => 'gif',
        'image/webp' => 'webp'
    );

    if (!isset($formatos[$mime]) ||
        $informacoes[2] === IMAGETYPE_SVG) {
        return array(
            'nome' => null,
            'erro' => 'Formato inválido. Use JPG, PNG, GIF ou WebP.'
        );
    }

    $pasta = __DIR__ . DIRECTORY_SEPARATOR . 'uploads';

    if (!is_dir($pasta)) {
        if (!mkdir($pasta, 0755, true) && !is_dir($pasta)) {
            return array(
                'nome' => null,
                'erro' => 'Não foi possível criar a pasta de uploads.'
            );
        }
    }

    if (!is_writable($pasta)) {
        return array(
            'nome' => null,
            'erro' => 'A pasta uploads não permite gravação.'
        );
    }

    // Nome aleatório, sem depender do nome original.
    try {
        $nome = bin2hex(random_bytes(16)) . '.' . $formatos[$mime];
    } catch (Exception $e) {
        return array(
            'nome' => null,
            'erro' => 'Não foi possível gerar o nome da imagem.'
        );
    }

    $destino = $pasta . DIRECTORY_SEPARATOR . $nome;

    if (!move_uploaded_file($arquivo['tmp_name'], $destino)) {
        return array(
            'nome' => null,
            'erro' => 'Não foi possível salvar a imagem.'
        );
    }

    return array(
        'nome' => $nome,
        'erro' => null
    );
}
?>
