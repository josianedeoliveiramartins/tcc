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
            <!-- Usuários -->
            <a href="usuarios.php" class="card text-center shadow-sm text-decoration-none">
                <div class="card-body">
                    <img src="../midias/icones/usuarios.png" alt="Usuários" width="64" height="64">
                    <h5 class="card-title mt-3">Usuários</h5>
                    <p class="card-text">Gerenciar administradores e membros</p>
                </div>
            </a>

            <!-- Projetos -->
            <a href="projetos.php" class="card text-center shadow-sm text-decoration-none">
                <div class="card-body">
                    <img src="../midias/icones/projetos.png" alt="Projetos" width="64" height="64">
                    <h5 class="card-title mt-3">Projetos</h5>
                    <p class="card-text">Cadastrar e editar projetos</p>
                </div>
            </a>

            <!-- Colônias -->
            <a href="colonias.php" class="card text-center shadow-sm text-decoration-none">
                <div class="card-body">
                    <img src="../midias/icones/colonias.png" alt="Colônias" width="64" height="64">
                    <h5 class="card-title mt-3">Colônias</h5>
                    <p class="card-text">Controle do meliponário</p>
                </div>
            </a>

            <!-- Produtos/Serviços -->
            <a href="produtos.php" class="card text-center shadow-sm text-decoration-none">
                <div class="card-body">
                    <img src="../midias/icones/produtos.png" alt="Produtos/Serviços" width="64" height="64">
                    <h5 class="card-title mt-3">Produtos/Serviços</h5>
                    <p class="card-text">Gerenciar itens e serviços</p>
                </div>
            </a>
        </div>
    </main>

    <!--------------- FOOTER ---------------->
        <?php include 'includes_painel/footer.php'?>
    <!--------------------------------------->
</body>
</html>
