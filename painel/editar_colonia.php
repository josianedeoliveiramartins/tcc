<?php
include('conexao.php');

$id = intval($_GET['id']);
$result = mysqli_query($conexao, "SELECT * FROM colonias WHERE id=$id");
$colonia = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Colônia</title>
    <link rel="stylesheet" href="css/cadastros.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <div class="container my-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">Editar Colônia</h3>
            </div>
            <div class="card-body">
                <form action="atualizar_colonia.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $colonia['id']; ?>">

                    <!-- Foto -->
                    <div class="mb-3">
                        <label class="form-label">Foto da Abelha</label><br>
                        <?php if(!empty($colonia['foto'])): ?>
                            <img src="<?php echo $colonia['foto']; ?>" alt="Foto atual" style="width:120px;" class="mb-2">
                        <?php endif; ?>
                        <input type="file" name="foto" class="form-control" accept="image/*">
                    </div>

                    <!-- Banner -->
                    <div class="mb-3">
                        <label class="form-label">Banner</label><br>
                        <?php if(!empty($colonia['banner'])): ?>
                            <img src="<?php echo $colonia['banner']; ?>" alt="Banner atual" style="width:200px;" class="mb-2">
                        <?php endif; ?>
                        <input type="file" name="banner" class="form-control" accept="image/*">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nome</label>
                        <input type="text" name="nomeColonia" value="<?php echo $colonia['nome']; ?>" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Espécie</label>
                        <input type="text" name="especie" value="<?php echo $colonia['especie']; ?>" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Procedência</label>
                        <input type="text" name="procedencia" value="<?php echo $colonia['procedencia']; ?>" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Data Aquisição</label>
                        <input type="date" name="data_aquisicao" value="<?php echo $colonia['data_aquisicao']; ?>" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Localização</label>
                        <input type="text" name="localizacao" value="<?php echo $colonia['localizacao']; ?>" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Descrição</label>
                        <textarea name="descricao" class="form-control"><?php echo $colonia['descricao']; ?></textarea>
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-check-circle"></i> Atualizar
                        </button>
                        <a href="colonias.php" class="btn btn-secondary">
                            <i class="bi bi-arrow-left-circle"></i> Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
