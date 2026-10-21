
<?php

require_once __DIR__ . '/verifica_login.php';
require_once __DIR__ . '/conexao.php';
require_once __DIR__ . '/funcoes_upload.php';

/*
|--------------------------------------------------------------------------
| FUNÇÕES AUXILIARES
|--------------------------------------------------------------------------
*/

function redirecionarNoticia($erro)
{
    header('Location: form_noticias.php?erro=' . urlencode($erro));
    exit;
}

/*
|--------------------------------------------------------------------------
| VERIFICA SE A IMAGEM ESTÁ SENDO UTILIZADA
|--------------------------------------------------------------------------
*/

function imagemEstaEmUso($conexao, $nome)
{
    $sql = "SELECT
                (SELECT COUNT(*)
                 FROM noticias
                 WHERE imagem_noticia = ?) +
                (SELECT COUNT(*)
                 FROM colonias
                 WHERE foto = ? OR banner = ?) AS total";

    $stmt = mysqli_prepare($conexao, $sql);

    // Se não for possível verificar, preserva o arquivo.
    if (!$stmt) {
        return true;
    }

    mysqli_stmt_bind_param(
        $stmt,
        'sss',
        $nome,
        $nome,
        $nome
    );

    if (!mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        return true;
    }

    $resultado = mysqli_stmt_get_result($stmt);

    $dados = $resultado
        ? mysqli_fetch_assoc($resultado)
        : null;

    mysqli_stmt_close($stmt);

    if (!$dados) {
        return true;
    }

    return (int) $dados['total'] > 0;
}

/*
|--------------------------------------------------------------------------
| REMOVE ARQUIVO SEM APAGAR IMAGENS EM USO
|--------------------------------------------------------------------------
*/

function removerArquivoNoticia($conexao, $nome)
{
    if (!is_string($nome) || $nome === '') {
        return;
    }

    // Impede acesso a outros diretórios.
    $nome = basename(str_replace('\\', '/', $nome));

    if (
        $nome === '' ||
        in_array($nome, array('.', '..'), true)
    ) {
        return;
    }

    // Não remove imagens utilizadas por outros cadastros.
    if (imagemEstaEmUso($conexao, $nome)) {
        return;
    }

    // Prioriza uploads e mantém compatibilidade com imagens antigas.
    $pastas = array(
        __DIR__ . '/uploads',
        __DIR__ . '/midias/noticias'
    );

    foreach ($pastas as $pasta) {
        $diretorioReal = realpath($pasta);

        if ($diretorioReal === false) {
            continue;
        }

        $arquivo = $diretorioReal
            . DIRECTORY_SEPARATOR
            . $nome;

        if (!is_file($arquivo) || is_link($arquivo)) {
            continue;
        }

        $arquivoReal = realpath($arquivo);

        if (
            $arquivoReal !== false &&
            dirname($arquivoReal) === $diretorioReal
        ) {
            @unlink($arquivoReal);
            break;
        }
    }
}

/*
|--------------------------------------------------------------------------
| VERIFICA O MÉTODO DA REQUISIÇÃO
|--------------------------------------------------------------------------
*/

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: form_noticias.php');
    exit;
}

/*
|--------------------------------------------------------------------------
| RECEBE OS DADOS
|--------------------------------------------------------------------------
*/

$id_noticia = isset($_POST['id_noticia'])
    ? (int) $_POST['id_noticia']
    : 0;

$titulo_noticia = trim($_POST['titulo_noticia'] ?? '');
$resumo_noticia = trim($_POST['resumo_noticia'] ?? '');
$conteudo_noticia = trim($_POST['conteudo_noticia'] ?? '');
$data_noticia = trim($_POST['data_noticia'] ?? '');
$status_noticia = $_POST['status_noticia'] ?? 'Publicado';

/*
|--------------------------------------------------------------------------
| VALIDA OS CAMPOS
|--------------------------------------------------------------------------
*/

if ($titulo_noticia === '') {
    redirecionarNoticia('titulo');
}

if (strlen($titulo_noticia) > 255) {
    redirecionarNoticia('titulo');
}

if ($conteudo_noticia === '') {
    redirecionarNoticia('conteudo');
}

$data_objeto = DateTime::createFromFormat('!Y-m-d', $data_noticia);

if (
    !$data_objeto ||
    $data_objeto->format('Y-m-d') !== $data_noticia
) {
    redirecionarNoticia('data');
}

if (!in_array($status_noticia, array('Publicado', 'Rascunho'), true)) {
    $status_noticia = 'Publicado';
}

/*
|--------------------------------------------------------------------------
| SE FOR EDIÇÃO, BUSCA A NOTÍCIA ATUAL
|--------------------------------------------------------------------------
*/

$imagem_antiga = null;

if ($id_noticia > 0) {
    $sql_busca = "SELECT imagem_noticia
                  FROM noticias
                  WHERE id_noticia = ?";

    $stmt_busca = mysqli_prepare($conexao, $sql_busca);

    if (!$stmt_busca) {
        redirecionarNoticia('banco');
    }

    mysqli_stmt_bind_param($stmt_busca, 'i', $id_noticia);

    if (!mysqli_stmt_execute($stmt_busca)) {
        mysqli_stmt_close($stmt_busca);
        redirecionarNoticia('banco');
    }

    $resultado_busca = mysqli_stmt_get_result($stmt_busca);

    if (
        !$resultado_busca ||
        mysqli_num_rows($resultado_busca) === 0
    ) {
        mysqli_stmt_close($stmt_busca);
        redirecionarNoticia('noticia_nao_encontrada');
    }

    $dados_antigos = mysqli_fetch_assoc($resultado_busca);
    $imagem_antiga = $dados_antigos['imagem_noticia'];

    mysqli_stmt_close($stmt_busca);
}

/*
|--------------------------------------------------------------------------
| ENVIA A IMAGEM PARA A PASTA UPLOADS
|--------------------------------------------------------------------------
|
| A imagem é opcional.
| Se não for enviada durante a edição, mantém a imagem atual.
| A função compartilhada valida o arquivo e gera um nome exclusivo.
|--------------------------------------------------------------------------
*/

$upload = uploadImagem('imagem_noticia', false);

if ($upload['erro'] !== null) {
    $erro = $upload['erro'];

    if (strpos($erro, '5 MB') !== false) {
        redirecionarNoticia('tamanho_imagem');
    }

    if (strpos($erro, 'Formato inválido') !== false) {
        redirecionarNoticia('extensao_imagem');
    }

    if (strpos($erro, 'imagem válida') !== false) {
        redirecionarNoticia('imagem_invalida');
    }

    redirecionarNoticia('upload');
}

$imagem_nova = $upload['nome'];

if ($imagem_nova !== null) {
    $imagem_salva = $imagem_nova;
} else {
    $imagem_salva = $imagem_antiga;
}

/*
|--------------------------------------------------------------------------
| CADASTRA UMA NOVA NOTÍCIA
|--------------------------------------------------------------------------
*/

if ($id_noticia === 0) {

    $sql = "INSERT INTO noticias (
                titulo_noticia,
                resumo_noticia,
                conteudo_noticia,
                imagem_noticia,
                data_noticia,
                status_noticia
            ) VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conexao, $sql);

    if (!$stmt) {
        if ($imagem_nova !== null) {
            removerArquivoNoticia($conexao, $imagem_nova);
        }

        redirecionarNoticia('banco');
    }

    mysqli_stmt_bind_param(
        $stmt,
        'ssssss',
        $titulo_noticia,
        $resumo_noticia,
        $conteudo_noticia,
        $imagem_salva,
        $data_noticia,
        $status_noticia
    );

    $executou = mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    if (!$executou) {
        if ($imagem_nova !== null) {
            removerArquivoNoticia($conexao, $imagem_nova);
        }

        redirecionarNoticia('salvar');
    }

    header('Location: form_noticias.php?sucesso=cadastrada');
    exit;
}

/*
|--------------------------------------------------------------------------
| ATUALIZA A NOTÍCIA EXISTENTE
|--------------------------------------------------------------------------
*/

$sql = "UPDATE noticias
        SET titulo_noticia = ?,
            resumo_noticia = ?,
            conteudo_noticia = ?,
            imagem_noticia = ?,
            data_noticia = ?,
            status_noticia = ?
        WHERE id_noticia = ?";

$stmt = mysqli_prepare($conexao, $sql);

if (!$stmt) {
    if ($imagem_nova !== null) {
        removerArquivoNoticia($conexao, $imagem_nova);
    }

    redirecionarNoticia('banco');
}

mysqli_stmt_bind_param(
    $stmt,
    'ssssssi',
    $titulo_noticia,
    $resumo_noticia,
    $conteudo_noticia,
    $imagem_salva,
    $data_noticia,
    $status_noticia,
    $id_noticia
);

$executou = mysqli_stmt_execute($stmt);

mysqli_stmt_close($stmt);

if (!$executou) {
    if ($imagem_nova !== null) {
        removerArquivoNoticia($conexao, $imagem_nova);
    }

    redirecionarNoticia('atualizar');
}

/*
|--------------------------------------------------------------------------
| REMOVE A IMAGEM ANTIGA APÓS A ATUALIZAÇÃO
|--------------------------------------------------------------------------
*/

if (
    $imagem_nova !== null &&
    !empty($imagem_antiga) &&
    $imagem_antiga !== $imagem_nova
) {
    removerArquivoNoticia($conexao, $imagem_antiga);
}

/*
|--------------------------------------------------------------------------
| REDIRECIONA APÓS ATUALIZAÇÃO
|--------------------------------------------------------------------------
*/

header('Location: form_noticias.php?sucesso=atualizada');
exit;

?>
