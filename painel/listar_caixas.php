<?php include('verifica_login.php'); ?>
<?php
include('conexao.php');
$totalCaixas = mysqli_fetch_assoc(mysqli_query($conexao, "SELECT COUNT(*) AS total FROM caixas"))['total'];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Catálogo de Caixas | COOPCEEDO</title>
    <?php include 'includes_painel/head.php'?>
    <link rel="stylesheet" href="css/cadastros.css">
</head>
<body>
    <?php include 'includes_painel/header.php'?>

    <main class="container my-4">
        <h1 class="mb-4 text-center">Catálogo de Caixas</h1>
        <div class="mb-3">
            <strong>Total de Caixas:</strong> <?php echo $totalCaixas; ?>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th><th>Imagem</th><th>Dimensões</th><th>Altura Módulo</th>
                    <th>Ângulo Corte</th><th>Espécies Recomendadas</th><th>Descrição</th><th>Ações</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $result = mysqli_query($conexao, "SELECT * FROM caixas");
            while($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><img src="<?php echo $row['imagem']; ?>" alt="Imagem da Caixa" style="width:80px;"></td>
                    <td><?php echo $row['dimensoes']; ?></td>
                    <td><?php echo $row['altura_modulo']; ?></td>
                    <td><?php echo $row['angulo_corte']; ?></td>
                    <td><?php echo $row['especies_recomendadas']; ?></td>
                    <td><?php echo $row['descricao']; ?></td>
                    <td>
                        <a href="editar_caixa.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-primary">Editar</a>
                        <a href="excluir_caixa.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta caixa?')">Excluir</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </main>

    <?php include 'includes_painel/footer.php'?>
</body>
</html>
