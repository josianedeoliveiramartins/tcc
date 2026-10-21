
<?php

require_once __DIR__ . '/verifica_login.php';
require_once __DIR__ . '/conexao.php';

/*
|--------------------------------------------------------------------------
| VERIFICA SE A REQUISIÇÃO É POST
|--------------------------------------------------------------------------
*/

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: form_noticias.php');
    exit;
}

/*
|--------------------------------------------------------------------------
| RECEBE E VALIDA O ID
|--------------------------------------------------------------------------
*/

$id_noticia = isset($_POST['id_noticia'])
    ? (int) $_POST['id_noticia']
    : 0;

if ($id_noticia <= 0) {
    header('Location: form_noticias.php?erro=erro');
    exit;
}

/*
|--------------------------------------------------------------------------
| BUSCA A IMAGEM DA NOTÍCIA
|--------------------------------------------------------------------------
*/

$sql_busca = "SELECT imagem_noticia
              FROM noticias
              WHERE id_noticia = ?";

$stmt_busca = mysqli_prepare($conexao, $sql_busca);

if (!$stmt_busca) {
    header('Location: form_noticias.php?erro=banco');
    exit;
}

mysqli_stmt_bind_param($stmt_busca, 'i', $id_noticia);

if (!mysqli_stmt_execute($stmt_busca)) {
    mysqli_stmt_close($stmt_busca);
    header('Location: form_noticias.php?erro=banco');
    exit;
}

$resultado = mysqli_stmt_get_result($stmt_busca);

if (!$resultado || mysqli_num_rows($resultado) === 0) {
    mysqli_stmt_close($stmt_busca);
    header('Location: form_noticias.php?erro=noticia_nao_encontrada');
    exit;
}

$noticia = mysqli_fetch_assoc($resultado);
$imagem_noticia = $noticia['imagem_noticia'] ?? '';

mysqli_stmt_close($stmt_busca);

/*
|--------------------------------------------------------------------------
| EXCLUI A NOTÍCIA DO BANCO
|--------------------------------------------------------------------------
*/

$sql_delete = "DELETE FROM noticias
               WHERE id_noticia = ?";

$stmt_delete = mysqli_prepare($conexao, $sql_delete);

if (!$stmt_delete) {
    header('Location: form_noticias.php?erro=banco');
    exit;
}

mysqli_stmt_bind_param($stmt_delete, 'i', $id_noticia);

if (!mysqli_stmt_execute($stmt_delete)) {
    mysqli_stmt_close($stmt_delete);
    header('Location: form_noticias.php?erro=excluir');
    exit;
}

$excluida = mysqli_stmt_affected_rows($stmt_delete) === 1;

mysqli_stmt_close($stmt_delete);

if (!$excluida) {
    header('Location: form_noticias.php?erro=excluir');
    exit;
}

/*
|--------------------------------------------------------------------------
| VERIFICA SE A IMAGEM AINDA ESTÁ SENDO UTILIZADA
|--------------------------------------------------------------------------
| Protege imagens de outras notícias e das colônias.
|--------------------------------------------------------------------------
*/

if (
    is_string($imagem_noticia) &&
    $imagem_noticia !== '' &&
    basename(str_replace('\\', '/', $imagem_noticia)) === $imagem_noticia &&
    !in_array($imagem_noticia, array('.', '..'), true)
) {
    $sql_verifica = "SELECT
                        (SELECT COUNT(*)
                         FROM noticias
                         WHERE imagem_noticia = ?) +
                        (SELECT COUNT(*)
                         FROM colonias
                         WHERE foto = ? OR banner = ?) AS total";

    $stmt_verifica = mysqli_prepare($conexao, $sql_verifica);

    /*
     * Se não for possível verificar o banco,
     * não apaga a imagem.
     */
    if ($stmt_verifica) {
        mysqli_stmt_bind_param(
            $stmt_verifica,
            'sss',
            $imagem_noticia,
            $imagem_noticia,
            $imagem_noticia
        );

        if (mysqli_stmt_execute($stmt_verifica)) {
            $resultado_verifica = mysqli_stmt_get_result(
                $stmt_verifica
            );

            $dados = $resultado_verifica
                ? mysqli_fetch_assoc($resultado_verifica)
                : null;

            mysqli_stmt_close($stmt_verifica);

            /*
             * Só tenta excluir o arquivo quando
             * nenhum cadastro utiliza esse nome.
             */
            if (
                $dados !== null &&
                (int) $dados['total'] === 0
            ) {
                $pastas = array(
                    __DIR__ . '/uploads',
                    __DIR__ . '/midias/noticias'
                );

                foreach ($pastas as $pasta) {
                    $diretorio_real = realpath($pasta);

                    if ($diretorio_real === false) {
                        continue;
                    }

                    $arquivo = $diretorio_real
                        . DIRECTORY_SEPARATOR
                        . $imagem_noticia;

                    if (!is_file($arquivo) || is_link($arquivo)) {
                        continue;
                    }

                    $arquivo_real = realpath($arquivo);

                    if (
                        $arquivo_real !== false &&
                        dirname($arquivo_real) === $diretorio_real
                    ) {
                        // Para após localizar o arquivo.
                        @unlink($arquivo_real);
                        break;
                    }
                }
            }
        } else {
            mysqli_stmt_close($stmt_verifica);
        }
    }
}

/*
|--------------------------------------------------------------------------
| REDIRECIONA APÓS A EXCLUSÃO
|--------------------------------------------------------------------------
*/

header('Location: form_noticias.php?sucesso=excluida');
exit;

?>
