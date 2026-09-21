<?php include('verifica_login.php'); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo | COOPCEEDO</title>

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
        <h1 class="mb-4">Catálogo do meliponário</h1>

        <div class="cards-container">
            <!-- Colônias -->
            <a href="listar_colonias.php" class="card text-center shadow-sm text-decoration-none">
                <div class="card-body">
                    <img src="midias/icones/colonias.png" alt="Colônia" width="64" height="64">
                    <h5 class="card-title mt-3">Colônias</h5>
                    <p class="card-text">Listagem e edição de colônias</p>
                </div>
            </a>

            <!-- Mídias -->
            <a href="listar_caixas.php" class="card text-center shadow-sm text-decoration-none">
                <div class="card-body">
                    <img src="midias/icones/caixadeabelha.png" alt="Mídias" width="64" height="64">
                    <h5 class="card-title mt-3">Padrões de caixa</h5>
                    <p class="card-text">Listagem e edição de padrões de caixas</p>
                </div>
            </a>
        </div>
    </main>

    <!--------------- FOOTER ---------------->
        <?php include 'includes_painel/footer.php'?>
    <!--------------------------------------->
</body>
</html>
