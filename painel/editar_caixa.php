<?php
include('conexao.php');

$id = intval($_GET['id']);
$result = mysqli_query($conexao, "SELECT * FROM caixas WHERE id=$id");
$caixa = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Caixa</title>
    <link rel="stylesheet" href="css/cadastros.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <div class="container my-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">Editar Padrão de Caixa</h3>
            </div>
            <div class="card-body">
                <form action="atualizar_caixa.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $caixa['id']; ?>">

                    <div class="mb-3">
                        <label class="form-label">Imagem ilustrativa</label><br>
                        <img src="<?php echo $caixa['imagem']; ?>" alt="Imagem atual" style="width:120px;" class="mb-2">
                        <input type="file" name="imagem" class="form-control" accept="image/*">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Dimensões</label>
                        <input type="text" name="dimensoes" value="<?php echo $caixa['dimensoes']; ?>" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Altura do Módulo</label>
                        <input type="number" name="altura_modulo" value="<?php echo $caixa['altura_modulo']; ?>" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Ângulo do Corte</label>
                        <input type="number" name="angulo_corte" value="<?php echo $caixa['angulo_corte']; ?>" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Espécies Recomendadas</label>
                        <input type="text" name="especies_recomendadas" value="<?php echo $caixa['especies_recomendadas']; ?>" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Descrição</label>
                        <textarea name="descricao" class="form-control"><?php echo $caixa['descricao']; ?></textarea>
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-check-circle"></i> Atualizar
                        </button>
                       <a href="listar_caixas.php" class="btn btn-secondary">
                        <i class="bi bi-arrow-left-circle"></i> Cancelar
                        </a>

                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
