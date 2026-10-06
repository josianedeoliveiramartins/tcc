<?php

include 'verifica_login.php';
include 'conexao.php';


/*
|--------------------------------------------------------------------------
| VERIFICA SE O FORMULÁRIO FOI ENVIADO
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

$data_noticia = $_POST['data_noticia'] ?? '';

$status_noticia = $_POST['status_noticia'] ?? 'Publicado';


/*
|--------------------------------------------------------------------------
| VALIDAÇÕES
|--------------------------------------------------------------------------
*/

if ($titulo_noticia === '') {
    header('Location: form_noticias.php?erro=titulo');
    exit;
}

if ($conteudo_noticia === '') {
    header('Location: form_noticias.php?erro=conteudo');
    exit;
}

if ($data_noticia === '') {
    header('Location: form_noticias.php?erro=data');
    exit;
}


/*
|--------------------------------------------------------------------------
| GARANTE STATUS VÁLIDO
|--------------------------------------------------------------------------
*/

if (!in_array($status_noticia, ['Publicado', 'Rascunho'], true)) {
    $status_noticia = 'Publicado';
}


/*
|--------------------------------------------------------------------------
| CONFIGURAÇÃO DA IMAGEM
|--------------------------------------------------------------------------
*/

$pasta_imagens = __DIR__ . '/midias/noticias/';

$nome_imagem = '';

$imagem_enviada = false;


/*
|--------------------------------------------------------------------------
| VERIFICA SE FOI ENVIADA UMA IMAGEM
|--------------------------------------------------------------------------
*/

if (
    isset($_FILES['imagem_noticia']) &&
    $_FILES['imagem_noticia']['error'] !== UPLOAD_ERR_NO_FILE
) {

    /*
    | Verifica erro no upload
    */

    if ($_FILES['imagem_noticia']['error'] !== UPLOAD_ERR_OK) {

        header('Location: form_noticias.php?erro=upload');
        exit;
    }


    /*
    | Limite de 5 MB
    */

    $tamanho_maximo = 5 * 1024 * 1024;

    if ($_FILES['imagem_noticia']['size'] > $tamanho_maximo) {

        header('Location: form_noticias.php?erro=tamanho_imagem');
        exit;
    }


    /*
    | Verifica se realmente é uma imagem
    */

    $informacoes_imagem = getimagesize(
        $_FILES['imagem_noticia']['tmp_name']
    );

    if ($informacoes_imagem === false) {

        header('Location: form_noticias.php?erro=imagem_invalida');
        exit;
    }


    /*
    | Extensões permitidas
    */

    $extensoes_permitidas = [
        'jpg',
        'jpeg',
        'png',
        'webp'
    ];


    $extensao = strtolower(
        pathinfo(
            $_FILES['imagem_noticia']['name'],
            PATHINFO_EXTENSION
        )
    );


    if (!in_array($extensao, $extensoes_permitidas, true)) {

        header('Location: form_noticias.php?erro=extensao_imagem');
        exit;
    }


    /*
    | Cria a pasta caso não exista
    */

    if (!is_dir($pasta_imagens)) {

        if (!mkdir($pasta_imagens, 0755, true)) {

            header('Location: form_noticias.php?erro=pasta_imagem');
            exit;
        }
    }


    /*
    | Nome único para a imagem
    */

    $nome_imagem =
        'noticia_' .
        uniqid() .
        '.' .
        $extensao;


    /*
    | Caminho completo
    */

    $caminho_imagem =
        $pasta_imagens .
        $nome_imagem;


    /*
    | Move a imagem
    */

    if (
        !move_uploaded_file(
            $_FILES['imagem_noticia']['tmp_name'],
            $caminho_imagem
        )
    ) {

        header('Location: form_noticias.php?erro=salvar_imagem');
        exit;
    }


    $imagem_enviada = true;
}


/*
|--------------------------------------------------------------------------
| CADASTRAR NOVA NOTÍCIA
|--------------------------------------------------------------------------
*/

if ($id_noticia === 0) {


    /*
    | COM IMAGEM
    */

    if ($imagem_enviada) {

        $sql = "INSERT INTO noticias (
                    titulo_noticia,
                    resumo_noticia,
                    conteudo_noticia,
                    imagem_noticia,
                    data_noticia,
                    status_noticia
                )
                VALUES (?, ?, ?, ?, ?, ?)";


        $stmt = mysqli_prepare(
            $conexao,
            $sql
        );


        if (!$stmt) {

            if (
                $imagem_enviada &&
                file_exists($caminho_imagem)
            ) {
                unlink($caminho_imagem);
            }

            header('Location: form_noticias.php?erro=banco');
            exit;
        }


        mysqli_stmt_bind_param(
            $stmt,
            "ssssss",
            $titulo_noticia,
            $resumo_noticia,
            $conteudo_noticia,
            $nome_imagem,
            $data_noticia,
            $status_noticia
        );

    }


    /*
    | SEM IMAGEM
    */

    else {

        $sql = "INSERT INTO noticias (
                    titulo_noticia,
                    resumo_noticia,
                    conteudo_noticia,
                    imagem_noticia,
                    data_noticia,
                    status_noticia
                )
                VALUES (?, ?, ?, NULL, ?, ?)";


        $stmt = mysqli_prepare(
            $conexao,
            $sql
        );


        if (!$stmt) {

            header('Location: form_noticias.php?erro=banco');
            exit;
        }


        mysqli_stmt_bind_param(
            $stmt,
            "sssss",
            $titulo_noticia,
            $resumo_noticia,
            $conteudo_noticia,
            $data_noticia,
            $status_noticia
        );
    }


    /*
    | EXECUTA INSERT
    */

    if (mysqli_stmt_execute($stmt)) {

        mysqli_stmt_close($stmt);

        header(
            'Location: form_noticias.php?sucesso=cadastrada'
        );

        exit;
    }


    /*
    | ERRO NO INSERT
    */

    else {

        if (
            $imagem_enviada &&
            file_exists($caminho_imagem)
        ) {
            unlink($caminho_imagem);
        }


        mysqli_stmt_close($stmt);

        header(
            'Location: form_noticias.php?erro=salvar'
        );

        exit;
    }
}


/*
|--------------------------------------------------------------------------
| ATUALIZAR NOTÍCIA
|--------------------------------------------------------------------------
*/


/*
| Busca a imagem atual
*/

$sql_busca = "SELECT imagem_noticia
              FROM noticias
              WHERE id_noticia = ?";


$stmt_busca = mysqli_prepare(
    $conexao,
    $sql_busca
);


if (!$stmt_busca) {

    if (
        $imagem_enviada &&
        file_exists($caminho_imagem)
    ) {
        unlink($caminho_imagem);
    }

    header('Location: form_noticias.php?erro=banco');
    exit;
}


mysqli_stmt_bind_param(
    $stmt_busca,
    "i",
    $id_noticia
);


mysqli_stmt_execute($stmt_busca);


$resultado = mysqli_stmt_get_result($stmt_busca);


/*
| Verifica se existe
*/

if (mysqli_num_rows($resultado) === 0) {

    mysqli_stmt_close($stmt_busca);


    if (
        $imagem_enviada &&
        file_exists($caminho_imagem)
    ) {
        unlink($caminho_imagem);
    }


    header(
        'Location: form_noticias.php?erro=noticia_nao_encontrada'
    );

    exit;
}


$dados_noticia = mysqli_fetch_assoc($resultado);

$imagem_antiga = $dados_noticia['imagem_noticia'];


mysqli_stmt_close($stmt_busca);


/*
|--------------------------------------------------------------------------
| UPDATE COM IMAGEM NOVA
|--------------------------------------------------------------------------
*/

if ($imagem_enviada) {

    $sql = "UPDATE noticias
            SET
                titulo_noticia = ?,
                resumo_noticia = ?,
                conteudo_noticia = ?,
                imagem_noticia = ?,
                data_noticia = ?,
                status_noticia = ?
            WHERE id_noticia = ?";


    $stmt = mysqli_prepare(
        $conexao,
        $sql
    );


    if (!$stmt) {

        if (file_exists($caminho_imagem)) {
            unlink($caminho_imagem);
        }

        header('Location: form_noticias.php?erro=banco');
        exit;
    }


    mysqli_stmt_bind_param(
        $stmt,
        "ssssssi",
        $titulo_noticia,
        $resumo_noticia,
        $conteudo_noticia,
        $nome_imagem,
        $data_noticia,
        $status_noticia,
        $id_noticia
    );
}


/*
|--------------------------------------------------------------------------
| UPDATE SEM ALTERAR IMAGEM
|--------------------------------------------------------------------------
*/

else {

    $sql = "UPDATE noticias
            SET
                titulo_noticia = ?,
                resumo_noticia = ?,
                conteudo_noticia = ?,
                data_noticia = ?,
                status_noticia = ?
            WHERE id_noticia = ?";


    $stmt = mysqli_prepare(
        $conexao,
        $sql
    );


    if (!$stmt) {

        header('Location: form_noticias.php?erro=banco');
        exit;
    }


    mysqli_stmt_bind_param(
        $stmt,
        "sssssi",
        $titulo_noticia,
        $resumo_noticia,
        $conteudo_noticia,
        $data_noticia,
        $status_noticia,
        $id_noticia
    );
}


/*
|--------------------------------------------------------------------------
| EXECUTA UPDATE
|--------------------------------------------------------------------------
*/

if (mysqli_stmt_execute($stmt)) {

    mysqli_stmt_close($stmt);


    /*
    | Se existe uma imagem nova,
    | exclui a imagem antiga.
    */

    if (
        $imagem_enviada &&
        !empty($imagem_antiga)
    ) {

        $arquivo_antigo =
            $pasta_imagens .
            $imagem_antiga;


        if (file_exists($arquivo_antigo)) {
            unlink($arquivo_antigo);
        }
    }


    header(
        'Location: form_noticias.php?sucesso=atualizada'
    );

    exit;
}


/*
|--------------------------------------------------------------------------
| ERRO NO UPDATE
|--------------------------------------------------------------------------
*/

else {

    /*
    | Remove imagem nova caso tenha dado erro.
    */

    if (
        $imagem_enviada &&
        file_exists($caminho_imagem)
    ) {
        unlink($caminho_imagem);
    }


    mysqli_stmt_close($stmt);


    header(
        'Location: form_noticias.php?erro=atualizar'
    );

    exit;
}
