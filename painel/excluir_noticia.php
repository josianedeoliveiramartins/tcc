<?php

include 'verifica_login.php';
include 'conexao.php';


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
| RECEBE O ID DA NOTÍCIA
|--------------------------------------------------------------------------
*/

$id_noticia = isset($_POST['id_noticia'])
    ? (int) $_POST['id_noticia']
    : 0;


/*
|--------------------------------------------------------------------------
| VERIFICA SE O ID É VÁLIDO
|--------------------------------------------------------------------------
*/

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


$stmt_busca = mysqli_prepare(
    $conexao,
    $sql_busca
);


if (!$stmt_busca) {

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
|--------------------------------------------------------------------------
| VERIFICA SE A NOTÍCIA EXISTE
|--------------------------------------------------------------------------
*/

if (mysqli_num_rows($resultado) === 0) {

    mysqli_stmt_close($stmt_busca);

    header(
        'Location: form_noticias.php?erro=noticia_nao_encontrada'
    );

    exit;
}


/*
|--------------------------------------------------------------------------
| PEGA O NOME DA IMAGEM
|--------------------------------------------------------------------------
*/

$noticia = mysqli_fetch_assoc($resultado);

$imagem_noticia = $noticia['imagem_noticia'];


mysqli_stmt_close($stmt_busca);


/*
|--------------------------------------------------------------------------
| EXCLUI A NOTÍCIA DO BANCO
|--------------------------------------------------------------------------
*/

$sql_delete = "DELETE FROM noticias
               WHERE id_noticia = ?";


$stmt_delete = mysqli_prepare(
    $conexao,
    $sql_delete
);


if (!$stmt_delete) {

    header(
        'Location: form_noticias.php?erro=banco'
    );

    exit;
}


mysqli_stmt_bind_param(
    $stmt_delete,
    "i",
    $id_noticia
);


/*
|--------------------------------------------------------------------------
| EXECUTA A EXCLUSÃO
|--------------------------------------------------------------------------
*/

if (mysqli_stmt_execute($stmt_delete)) {

    mysqli_stmt_close($stmt_delete);


    /*
    |--------------------------------------------------------------------------
    | EXCLUI A IMAGEM
    |--------------------------------------------------------------------------
    */

    if (!empty($imagem_noticia)) {

        $arquivo_imagem =
            __DIR__ .
            '/midias/noticias/' .
            $imagem_noticia;


        if (file_exists($arquivo_imagem)) {

            unlink($arquivo_imagem);
        }
    }


    /*
    |--------------------------------------------------------------------------
    | VOLTA PARA A LISTAGEM
    |--------------------------------------------------------------------------
    */

    header(
        'Location: form_noticias.php?sucesso=excluida'
    );

    exit;
}


/*
|--------------------------------------------------------------------------
| ERRO AO EXCLUIR
|--------------------------------------------------------------------------
*/

mysqli_stmt_close($stmt_delete);


header(
    'Location: form_noticias.php?erro=excluir'
);

exit;
