<?php
include("../conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cadastrar Notícia</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>

<body>

<div class="container py-4">

    <!-- TÍTULO DA PÁGINA -->

    <div class="mb-4">

        <h2>
            Cadastrar Notícia
        </h2>

        <p class="text-muted">
            Cadastre uma nova notícia ou publicação.
        </p>

    </div>


    <!-- FORMULÁRIO -->

    <div class="card shadow-sm">

        <div class="card-body">

            <form
                action="salvar_noticias.php"
                method="POST"
                enctype="multipart/form-data"
            >


                <!-- TÍTULO -->

                <div class="mb-3">

                    <label
                        for="titulo_noticia"
                        class="form-label"
                    >
                        Título da notícia
                    </label>

                    <input
                        type="text"
                        name="titulo_noticia"
                        id="titulo_noticia"
                        class="form-control"
                        placeholder="Digite o título da notícia"
                        required
                    >

                </div>


                <!-- RESUMO -->

                <div class="mb-3">

                    <label
                        for="resumo_noticia"
                        class="form-label"
                    >
                        Resumo
                    </label>

                    <textarea
                        name="resumo_noticia"
                        id="resumo_noticia"
                        class="form-control"
                        rows="3"
                        placeholder="Digite um breve resumo da notícia"
                    ></textarea>

                </div>


                <!-- CONTEÚDO -->

                <div class="mb-3">

                    <label
                        for="conteudo_noticia"
                        class="form-label"
                    >
                        Conteúdo da notícia
                    </label>

                    <textarea
                        name="conteudo_noticia"
                        id="conteudo_noticia"
                        class="form-control"
                        rows="7"
                        placeholder="Digite o conteúdo completo da notícia"
                        required
                    ></textarea>

                </div>


                <div class="row">


                    <!-- DATA -->

                    <div class="col-md-6 mb-3">

                        <label
                            for="data_noticia"
                            class="form-label"
                        >
                            Data da notícia
                        </label>

                        <input
                            type="date"
                            name="data_noticia"
                            id="data_noticia"
                            class="form-control"
                            required
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
                            name="status_noticia"
                            id="status_noticia"
                            class="form-select"
                        >

                            <option value="Publicado">
                                Publicado
                            </option>

                            <option value="Rascunho">
                                Rascunho
                            </option>

                        </select>

                    </div>

                </div>


                <!-- IMAGEM -->

                <div class="mb-4">

                    <label
                        for="imagem_noticia"
                        class="form-label"
                    >
                        Imagem da notícia
                    </label>

                    <input
                        type="file"
                        name="imagem_noticia"
                        id="imagem_noticia"
                        class="form-control"
                        accept=".jpg,.jpeg,.png,.webp"
                    >

                    <div class="form-text">
                        Formatos permitidos: JPG, JPEG, PNG e WEBP.
                    </div>

                </div>


                <!-- BOTÕES -->

                <div class="d-flex gap-2">

                    <button
                        type="submit"
                        class="btn btn-success"
                    >
                        Salvar notícia
                    </button>


                    <a
                        href="listar_noticias.php"
                        class="btn btn-secondary"
                    >
                        Listar notícias
                    </a>

                </div>


            </form>

        </div>

    </div>

</div>


<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js">
</script>

</body>

</html>