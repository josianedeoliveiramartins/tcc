<?php include('verifica_login.php'); ?>
<?php
include('conexao.php');
$totalColonias = mysqli_fetch_assoc(mysqli_query($conexao, "SELECT COUNT(*) AS total FROM colonias"))['total'];
$totalCaixas   = mysqli_fetch_assoc(mysqli_query($conexao, "SELECT COUNT(*) AS total FROM caixas"))['total'];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Colônia | COOPCEEDO</title>
    <?php include 'includes_painel/head.php'?>
    <link rel="stylesheet" href="css/cadastros.css">
</head>
<body>
    <?php include 'includes_painel/header.php'?>

    <main class="container my-4">
        <h1 class="mb-4 text-center">Cadastrar Nova Colônia</h1>

        <div class="d-flex gap-3 mb-4">
            <div class="card p-3">
                <h5>Total de Colônias</h5>
                <p class="fs-4"><?php echo $totalColonias; ?></p>
            </div>
            <div class="card p-3">
                <h5>Total de Caixas Registradas</h5>
                <p class="fs-4"><?php echo $totalCaixas; ?></p>
            </div>
        </div>

        <form action="salvar_colonia.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="foto" class="form-label">Foto da Abelha (Obrigatória)</label>
                <input type="file" name="foto" id="foto" class="form-control" accept="image/*" required>
            </div>
            <div class="mb-3">
                <label for="banner" class="form-label">Banner (Opcional)</label>
                <input type="file" name="banner" id="banner" class="form-control" accept="image/*">
            </div>
            <div class="mb-3">
                <label for="nomeColonia" class="form-label">Nome da Colônia</label>
                <input type="text" name="nomeColonia" id="nomeColonia" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="especie" class="form-label">Espécie</label>
                <input type="text" name="especie" id="especie" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="procedencia" class="form-label">Procedência</label>
                <input type="text" name="procedencia" id="procedencia" class="form-control" placeholder="Ex: Doação, Compra, Captura" required>
            </div>
            <div class="mb-3">
                <label for="data_aquisicao" class="form-label">Data de Aquisição</label>
                <input type="date" name="data_aquisicao" id="data_aquisicao" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="localizacao" class="form-label">Localização</label>
                <input type="text" name="localizacao" id="localizacao" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea name="descricao" id="descricao" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Salvar Colônia</button>
        </form>
    </main>

    <?php include 'includes_painel/footer.php'?>
</body>
</html>
