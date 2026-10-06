<?php

include 'verifica_login.php';
include 'conexao.php';


/*
|--------------------------------------------------------------------------
| MODO EDIÇÃO
|--------------------------------------------------------------------------
*/

$editando = false;

$noticia = [
    'id_noticia'       => '',
    'titulo_noticia'   => '',
    'resumo_noticia'   => '',
    'conteudo_noticia' => '',
    'imagem_noticia'   => '',
    'data_noticia'     => date('Y-m-d'),
    'status_noticia'   => 'Publicado'
];


if (isset($_GET['id']) && is_numeric($_GET['id'])) {

    $id = (int) $_GET['id'];


    /*
    | Busca a notícia
    */

    $sql = "SELECT *
            FROM noticias
            WHERE id_noticia = ?";


    $stmt = mysqli_prepare($conexao, $sql);


    if ($stmt) {

        mysqli_stmt_bind_param(
            $stmt,
            "i",
            $id
        );

        mysqli_stmt_execute($stmt);

        $resultado = mysqli_stmt_get_result($stmt);


        if (mysqli_num_rows($resultado) > 0) {

            $noticia = mysqli_fetch_assoc($resultado);

            $editando = true;

        } else {

            mysqli_stmt_close($stmt);

            header(
                "Location: form_noticias.php?erro=noticia_nao_encontrada"
            );

            exit;
        }


        mysqli_stmt_close($stmt);

    } else {

        header(
            "Location: form_noticias.php?erro=banco"
        );

        exit;
    }
}


/*
|--------------------------------------------------------------------------
| MENSAGENS
|--------------------------------------------------------------------------
*/

$mensagem = '';
$tipo_mensagem = '';


/*
| Mensagens de sucesso
*/

if (isset($_GET['sucesso'])) {

    switch ($_GET['sucesso']) {

        case 'cadastrada':
            $mensagem = 'Notícia cadastrada com sucesso!';
            $tipo_mensagem = 'success';
            break;

        case 'atualizada':
            $mensagem = 'Notícia atualizada com sucesso!';
            $tipo_mensagem = 'success';
            break;

        case 'excluida':
            $mensagem = 'Notícia excluída com sucesso!';
            $tipo_mensagem = 'success';
            break;
    }
}


/*
| Mensagens de erro
*/

if (isset($_GET['erro'])) {

    switch ($_GET['erro']) {

        case 'noticia_nao_encontrada':
            $mensagem = 'Notícia não encontrada.';
            $tipo_mensagem = 'danger';
            break;

        case 'titulo':
            $mensagem = 'Informe o título da notícia.';
            $tipo_mensagem = 'danger';
            break;

        case 'conteudo':
            $mensagem = 'Informe o conteúdo da notícia.';
            $tipo_mensagem = 'danger';
            break;

        case 'data':
            $mensagem = 'Informe a data da notícia.';
            $tipo_mensagem = 'danger';
            break;

        case 'upload':
            $mensagem = 'Ocorreu um erro ao enviar a imagem.';
            $tipo_mensagem = 'danger';
            break;

        case 'tamanho_imagem':
            $mensagem = 'A imagem não pode ultrapassar 5 MB.';
            $tipo_mensagem = 'danger';
            break;

        case 'imagem_invalida':
            $mensagem = 'O arquivo enviado não é uma imagem válida.';
            $tipo_mensagem = 'danger';
            break;

        case 'extensao_imagem':
            $mensagem = 'Formato de imagem não permitido.';
            $tipo_mensagem = 'danger';
            break;

        case 'salvar_imagem':
            $mensagem = 'Não foi possível salvar a imagem.';
            $tipo_mensagem = 'danger';
            break;

        case 'banco':
            $mensagem = 'Ocorreu um erro ao acessar o banco de dados.';
            $tipo_mensagem = 'danger';
            break;

        case 'salvar':
            $mensagem = 'Não foi possível cadastrar a notícia.';
            $tipo_mensagem = 'danger';
            break;

        case 'atualizar':
            $mensagem = 'Não foi possível atualizar a notícia.';
            $tipo_mensagem = 'danger';
            break;

        default:
            $mensagem = 'Ocorreu um erro ao realizar a operação.';
            $tipo_mensagem = 'danger';
            break;
    }
}

?>

<!DOCTYPE html>

<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        <?php
        echo $editando
            ? 'Editar Notícia'
            : 'Cadastrar Notícia';
        ?>
        | COOPCEEDO
    </title>


    <?php include 'includes_painel/head.php'; ?>


    <link
        rel="stylesheet"
        href="css/cadastros.css"
    >

</head>


<body>


<?php include 'includes_painel/header.php'; ?>


<main class="container my-4">


    <!-- =====================================================
         CABEÇALHO
    ====================================================== -->

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1>

            <?php

            echo $editando
                ? 'Editar Notícia'
                : 'Cadastrar Notícia';

            ?>

        </h1>


        <?php if ($editando): ?>

            <a
                href="form_noticias.php"
                class="btn btn-secondary"
            >
                Nova notícia
            </a>

        <?php endif; ?>

    </div>


    <!-- =====================================================
         MENSAGENS
    ====================================================== -->

    <?php if (!empty($mensagem)): ?>

        <div
            class="alert alert-<?php echo $tipo_mensagem; ?> alert-dismissible fade show"
            role="alert"
        >

            <?php echo htmlspecialchars($mensagem); ?>


            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Fechar"
            ></button>

        </div>

    <?php endif; ?>


    <!-- =====================================================
         FORMULÁRIO
    ====================================================== -->

    <div class="card shadow-sm mb-5">


        <div class="card-header">

            <strong>

                <?php

                echo $editando
                    ? 'Alterar notícia'
                    : 'Nova notícia';

                ?>

            </strong>

        </div>


        <div class="card-body">


            <form
                action="salvar_noticia.php"
                method="POST"
                enctype="multipart/form-data"
            >


                <!-- ID PARA EDIÇÃO -->

                <?php if ($editando): ?>

                    <input
                        type="hidden"
                        name="id_noticia"
                        value="<?php echo (int) $noticia['id_noticia']; ?>"
                    >

                <?php endif; ?>


                <!-- =================================================
                     TÍTULO
                ================================================== -->

                <div class="mb-3">

                    <label
                        for="titulo_noticia"
                        class="form-label"
                    >

                        Título da notícia

                        <span class="text-danger">
                            *
                        </span>

                    </label>


                    <input
                        type="text"
                        class="form-control"
                        id="titulo_noticia"
                        name="titulo_noticia"
                        maxlength="255"
                        required
                        value="<?php echo htmlspecialchars(
                            $noticia['titulo_noticia'],
                            ENT_QUOTES,
                            'UTF-8'
                        ); ?>"
                    >

                </div>


                <!-- =================================================
                     RESUMO
                ================================================== -->

                <div class="mb-3">

                    <label
                        for="resumo_noticia"
                        class="form-label"
                    >

                        Resumo

                    </label>


                    <textarea
                        class="form-control"
                        id="resumo_noticia"
                        name="resumo_noticia"
                        rows="3"
                    ><?php echo htmlspecialchars(
                        $noticia['resumo_noticia'],
                        ENT_QUOTES,
                        'UTF-8'
                    ); ?></textarea>

                </div>


                <!-- =================================================
                     CONTEÚDO
                ================================================== -->

                <div class="mb-3">

                    <label
                        for="conteudo_noticia"
                        class="form-label"
                    >

                        Conteúdo

                        <span class="text-danger">
                            *
                        </span>

                    </label>


                    <textarea
                        class="form-control"
                        id="conteudo_noticia"
                        name="conteudo_noticia"
                        rows="10"
                        required
                    ><?php echo htmlspecialchars(
                        $noticia['conteudo_noticia'],
                        ENT_QUOTES,
                        'UTF-8'
                    ); ?></textarea>

                </div>


                <!-- =================================================
                     DATA E STATUS
                ================================================== -->

                <div class="row">


                    <!-- DATA -->

                    <div class="col-md-6 mb-3">

                        <label
                            for="data_noticia"
                            class="form-label"
                        >

                            Data da notícia

                            <span class="text-danger">
                                *
                            </span>

                        </label>


                        <input
                            type="date"
                            class="form-control"
                            id="data_noticia"
                            name="data_noticia"
                            required
                            value="<?php echo htmlspecialchars(
                                $noticia['data_noticia'],
                                ENT_QUOTES,
                                'UTF-8'
                            ); ?>"
                        >

                    </div>


                    <!-- STATUS -->

                    <div class="col-md-6 mb-3">

                        <label
                            for="status_noticia"
                            class="form-label"
                        >

                            Status

                        </label>


                        <select
                            class="form-select"
                            id="status_noticia"
                            name="status_noticia"
                        >

                            <option
                                value="Publicado"
                                <?php
                                echo (
                                    $noticia['status_noticia']
                                    === 'Publicado'
                                )
                                    ? 'selected'
                                    : '';
                                ?>
                            >
                                Publicado
                            </option>


                            <option
                                value="Rascunho"
                                <?php
                                echo (
                                    $noticia['status_noticia']
                                    === 'Rascunho'
                                )
                                    ? 'selected'
                                    : '';
                                ?>
                            >
                                Rascunho
                            </option>

                        </select>

                    </div>

                </div>


                <!-- =================================================
                     IMAGEM
                ================================================== -->

                <div class="mb-3">

                    <label
                        for="imagem_noticia"
                        class="form-label"
                    >

                        Imagem da notícia

                    </label>


                    <input
                        type="file"
                        class="form-control"
                        id="imagem_noticia"
                        name="imagem_noticia"
                        accept="image/jpeg,image/png,image/webp"
                    >


                    <div class="form-text">

                        Formatos permitidos:
                        JPG, PNG e WEBP.
                        Tamanho máximo: 5 MB.

                    </div>

                </div>


                <!-- =================================================
                     IMAGEM ATUAL
                ================================================== -->

                <?php if (
                    $editando &&
                    !empty($noticia['imagem_noticia'])
                ): ?>

                    <div class="mb-4">

                        <label class="form-label">
                            Imagem atual
                        </label>


                        <div>

                            <img
                                src="midias/noticias/<?php
                                echo htmlspecialchars(
                                    $noticia['imagem_noticia'],
                                    ENT_QUOTES,
                                    'UTF-8'
                                );
                                ?>"
                                alt="Imagem atual da notícia"
                                class="img-thumbnail"
                                style="
                                    max-width: 300px;
                                    max-height: 200px;
                                    object-fit: cover;
                                "
                            >

                        </div>

                    </div>

                <?php endif; ?>


                <!-- =================================================
                     BOTÕES
                ================================================== -->

                <div class="d-flex gap-2">


                    <button
                        type="submit"
                        class="btn btn-primary"
                    >

                        <?php

                        echo $editando
                            ? 'Atualizar notícia'
                            : 'Cadastrar notícia';

                        ?>

                    </button>


                    <a
                        href="form_noticias.php"
                        class="btn btn-secondary"
                    >
                        Limpar
                    </a>

                </div>


            </form>

        </div>

    </div>


    <!-- =====================================================
         LISTAGEM DAS NOTÍCIAS
    ====================================================== -->

    <div class="card shadow-sm">


        <div class="card-header">

            <strong>
                Notícias cadastradas
            </strong>

        </div>


        <div class="card-body">


            <div class="table-responsive">


                <table class="table table-hover align-middle">


                    <thead>

                        <tr>

                            <th>ID</th>

                            <th>Imagem</th>

                            <th>Título</th>

                            <th>Data</th>

                            <th>Status</th>

                            <th class="text-center">
                                Ações
                            </th>

                        </tr>

                    </thead>


                    <tbody>


                    <?php

                    /*
                    | Busca todas as notícias
                    */

                    $sql_lista = "SELECT
                                    id_noticia,
                                    titulo_noticia,
                                    imagem_noticia,
                                    data_noticia,
                                    status_noticia
                                  FROM noticias
                                  ORDER BY
                                    data_noticia DESC,
                                    id_noticia DESC";


                    $resultado_lista = mysqli_query(
                        $conexao,
                        $sql_lista
                    );


                    if (
                        $resultado_lista &&
                        mysqli_num_rows($resultado_lista) > 0
                    ):


                        while (
                            $item =
                            mysqli_fetch_assoc($resultado_lista)
                        ):

                    ?>

                        <tr>


                            <!-- ID -->

                            <td>

                                <?php
                                echo (int)
                                    $item['id_noticia'];
                                ?>

                            </td>


                            <!-- IMAGEM -->

                            <td>

                                <?php if (
                                    !empty(
                                        $item['imagem_noticia']
                                    )
                                ): ?>

                                    <img
                                        src="midias/noticias/<?php
                                        echo htmlspecialchars(
                                            $item['imagem_noticia'],
                                            ENT_QUOTES,
                                            'UTF-8'
                                        );
                                        ?>"
                                        alt="Imagem da notícia"
                                        style="
                                            width: 70px;
                                            height: 50px;
                                            object-fit: cover;
                                        "
                                        class="rounded"
                                    >

                                <?php else: ?>

                                    <span class="text-muted">
                                        Sem imagem
                                    </span>

                                <?php endif; ?>

                            </td>


                            <!-- TÍTULO -->

                            <td>

                                <strong>

                                    <?php

                                    echo htmlspecialchars(
                                        $item['titulo_noticia'],
                                        ENT_QUOTES,
                                        'UTF-8'
                                    );

                                    ?>

                                </strong>

                            </td>


                            <!-- DATA -->

                            <td>

                                <?php

                                echo date(
                                    'd/m/Y',
                                    strtotime(
                                        $item['data_noticia']
                                    )
                                );

                                ?>

                            </td>


                            <!-- STATUS -->

                            <td>

                                <?php if (
                                    $item['status_noticia']
                                    === 'Publicado'
                                ): ?>

                                    <span class="badge bg-success">
                                        Publicado
                                    </span>

                                <?php else: ?>

                                    <span class="badge bg-secondary">
                                        Rascunho
                                    </span>

                                <?php endif; ?>

                            </td>


                            <!-- AÇÕES -->

                            <td class="text-center">


                                <div
                                    class="d-flex justify-content-center gap-2"
                                >


                                    <!-- EDITAR -->

                                    <a
                                        href="form_noticias.php?id=<?php
                                        echo (int)
                                            $item['id_noticia'];
                                        ?>"
                                        class="btn btn-sm btn-warning"
                                    >
                                        Editar
                                    </a>


                                    <!-- EXCLUIR -->

                                    <form
                                        action="excluir_noticia.php"
                                        method="POST"
                                        onsubmit="return confirm(
                                            'Tem certeza que deseja excluir esta notícia?'
                                        );"
                                    >

                                        <input
                                            type="hidden"
                                            name="id_noticia"
                                            value="<?php
                                            echo (int)
                                                $item['id_noticia'];
                                            ?>"
                                        >


                                        <button
                                            type="submit"
                                            class="btn btn-sm btn-danger"
                                        >
                                            Excluir
                                        </button>

                                    </form>


                                </div>


                            </td>


                        </tr>


                    <?php

                        endwhile;

                    else:

                    ?>


                        <tr>

                            <td
                                colspan="6"
                                class="text-center text-muted py-4"
                            >

                                Nenhuma notícia cadastrada.

                            </td>

                        </tr>


                    <?php endif; ?>


                    </tbody>

                </table>

            </div>

        </div>

    </div>


</main>


<?php include 'includes_painel/footer.php'; ?>


</body>

</html>
