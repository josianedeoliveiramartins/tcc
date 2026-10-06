<?php include('verifica_login.php'); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastros | COOPCEEDO</title>

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
        <h1 class="mb-4">Gerenciar Cadastros</h1>

        <div class="cards-container">
            <!-- Padrões de caixa -->
            <a href="cadastar_caixa.php" class="card text-center shadow-sm text-decoration-none">
                <div class="card-body">
                    <img src="midias/icones/caixadeabelha.png" alt="Usuários" width="64" height="64">
                    <h5 class="card-title mt-3">Padrões de caixa</h5>
                    <p class="card-text">Cadastrar novos de padrões de caixa do meloponário</p>
                </div>
            </a>


            <!-- Colônias -->
            <a href="cadastrar_colonia.php" class="card text-center shadow-sm text-decoration-none">
                <div class="card-body">
                    <img src="midias/icones/colonias.png" alt="Colônias" width="64" height="64">
                    <h5 class="card-title mt-3">Colônias</h5>
                    <p class="card-text">Cadastrar novas de colônias</p>
                </div>
            </a>

            
    </main>

    <!--------------- FOOTER ---------------->
        <?php include 'includes_painel/footer.php'?>
    <!--------------------------------------->
</body>
</html>
