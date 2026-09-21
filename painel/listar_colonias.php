<?php include('verifica_login.php'); ?>
<?php
include('conexao.php');
$totalColonias = mysqli_fetch_assoc(mysqli_query($conexao, "SELECT COUNT(*) AS total FROM colonias"))['total'];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Catálogo de Colônias | COOPCEEDO</title>
    <?php include 'includes_painel/head.php'?>
    <link rel="stylesheet" href="css/cadastros.css">
</head>
<body>
    <?php include 'includes_painel/header.php'?>

    <main class="container my-4">
        <h1 class="mb-4 text-center">Catálogo de Colônias</h1>
        <div class="mb-3">
            <strong>Total de Colônias:</strong> <?php echo $totalColonias; ?>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th><th>Nome</th><th>Espécie</th><th>Procedência</th>
                    <th>Data Aquisição</th><th>Localização</th><th>Ações</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $result = mysqli_query($conexao, "SELECT * FROM colonias");
            while($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nome']; ?></td>
                    <td><?php echo $row['especie']; ?></td>
                    <td><?php echo $row['procedencia']; ?></td>
                    <td><?php echo (!empty($row['data_aquisicao']) && $row['data_aquisicao'] != "0000-00-00") ? date("d/m/Y", strtotime($row['data_aquisicao'])) : "-"; ?></td>
                    <td><?php echo $row['localizacao']; ?></td>
                    <td>
                        <a href="editar_colonia.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-primary">Editar</a>
                        <a href="excluir_colonia.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta colônia?')">Excluir</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </main>

    <?php include 'includes_painel/footer.php'?>
</body>
</html>
