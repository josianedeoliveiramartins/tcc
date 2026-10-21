<?php include('verifica_login.php'); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conteúdos | COOPCEEDO</title>

    <!--------------- HEAD ---------------->
        <?php include 'includes_painel/head.php'?>
    <!------------------------------------->

    <link rel="stylesheet" href="css/cadastros.css">
</head>
<body>
    <!--------------- HEADER ---------------->
        <?php include 'includes_painel/header.php'?>
    <!--------------------------------------->

    <main class="container my-4">
        <h1 class="mb-4">Gerenciar Conteúdos</h1>

        <div class="cards-container">
            <!-- Notícias e Publicações-->
            <a href="form_noticias.php" class="card text-center shadow-sm text-decoration-none">
                <div class="card-body">
                    <img src="midias/icones/loudspeaker.png" alt="Notícias e Comunicações" width="64" height="64">
                    <h5 class="card-title mt-3">Notícias e Publicações</h5>
                    <p class="card-text">Gerenciar avisos e notícias internas</p>
                </div>
            </a>


        </div>
    </main>

    <!--------------- FOOTER ---------------->
        <?php include 'includes_painel/footer.php'?>
    <!--------------------------------------->
</body>
</html>
