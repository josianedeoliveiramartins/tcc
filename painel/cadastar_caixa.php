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
    <title>Cadastrar Padrão de Caixa | COOPCEEDO</title>
    <?php include 'includes_painel/head.php'?>
    <link rel="stylesheet" href="css/cadastros.css">
</head>
<body>
    <?php include 'includes_painel/header.php'?>

    <main class="container my-4">
        <h1 class="mb-4 text-center">Cadastrar Padrão de Caixa</h1>

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

        <form method="POST" action="salvar_caixa.php" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Imagem ilustrativa</label>
                <input type="file" name="imagem" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Dimensões</label>
                <input type="text" name="dimensoes" class="form-control" placeholder="Ex: 30x20 cm" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Altura do Módulo</label>
                <input type="number" name="altura_modulo" class="form-control" placeholder="Ex: 15 cm" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Ângulo do Corte</label>
                <input type="number" name="angulo_corte" class="form-control" placeholder="Ex: 45°" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Espécies Recomendadas</label>
                <input type="text" name="especies_recomendadas" class="form-control" placeholder="Ex: Jataí, Mandaçaia" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Descrição (Opcional)</label>
                <textarea name="descricao" class="form-control" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Salvar Caixa</button>
        </form>
    </main>

    <?php include 'includes_painel/footer.php'?>
</body>
</html>