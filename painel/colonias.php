<?php include('verifica_login.php'); ?>
<?php
include('conexao.php');

// Totais dinâmicos
$totalColonias = mysqli_fetch_assoc(mysqli_query($conexao, "SELECT COUNT(*) AS total FROM colonias"))['total'];
$totalCaixas   = mysqli_fetch_assoc(mysqli_query($conexao, "SELECT COUNT(*) AS total FROM caixas"))['total'];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Colônias | COOPCEEDO</title>

    <?php include 'includes_painel/head.php'?>

    <link rel="stylesheet" href="css/cadastros.css">
</head>
<body>
    <?php include 'includes_painel/header.php'?>

    <main class="container my-4">
        <h1 class="mb-4 text-center">Gestão de Colônias</h1>

        <!-- Botões de navegação -->
        <div class="d-flex justify-content-center gap-3 mb-4">
            <button class="btn-nav active" onclick="mostrarSecao('form-colonia', this)">Cadastrar Colônia</button>
            <button class="btn-nav" onclick="mostrarSecao('form-caixa', this)">Cadastrar Padrão de Caixa</button>
            <button class="btn-nav" onclick="mostrarSecao('lista-colonias', this)">Catálogo de Colônias</button>
            <button class="btn-nav" onclick="mostrarSecao('lista-caixas', this)">Catálogo de Caixas</button>
        </div>

        <!-- Formulário Colônia -->
        <section id="form-colonia" class="secao">
            <h3>Cadastro de Colônia</h3>
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
            <form method="POST" action="salvar_colonia.php" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Foto da Abelha (perfil)</label>
                    <input type="file" name="foto" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Banner (opcional)</label>
                    <input type="file" name="banner" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Nome da Colônia</label>
                    <input type="text" name="nomeColonia" class="form-control" placeholder="Ex: Jataí" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Espécie</label>
                    <input type="text" name="especie" class="form-control" placeholder="Ex: Tetragonisca angustula" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Origem / Procedência</label>
                    <input type="text" name="origem" class="form-control" placeholder="Ex: Doação de Fulano" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Data de Aquisição</label>
                    <input type="month" name="data_aquisicao" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Localização</label>
                    <input type="text" name="localizacao" class="form-control" placeholder="Ex: Meliponário CEEDO" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Descrição (opcional)</label>
                    <textarea name="descricao" class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Salvar Colônia</button>
            </form>
        </section>

        <!-- Formulário Caixa -->
        <section id="form-caixa" class="secao" style="display:none;">
            <h3>Cadastro de Padrão de Caixa</h3>
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
                    <label class="form-label">Descrição</label>
                    <textarea name="descricao" class="form-control" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-success">Salvar Caixa</button>
            </form>
        </section>

        <!-- Lista Colônias -->
        <section id="lista-colonias" class="secao" style="display:none;">
            <h3>Catálogo de Colônias</h3>
            <div class="mb-3">
                <strong>Total de Colônias:</strong> <?php echo $totalColonias; ?>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr><th>ID</th><th>Nome</th><th>Espécie</th><th>Ações</th></tr>
                </thead>
                <tbody>
                    <?php
                    $result = mysqli_query($conexao, "SELECT * FROM colonias");
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['nome']}</td>
                                <td>{$row['especie']}</td>
                                <td><a href='editar_colonia.php?id={$row['id']}' class='btn btn-sm btn-primary'>Editar</a></td>
                              </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>

        <!-- Lista Caixas -->
        <section id="lista-caixas" class="secao" style="display:none;">
            <h3>Catálogo de Caixas</h3>
            <div class="mb-3">
                <strong>Total de Caixas:</strong> <?php echo $totalCaixas; ?>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr><th>ID</th><th>Dimensões</th><th>Espécies</th><th>Ações</th></tr>
                </thead>
                <tbody>
                    <?php
                    $result = mysqli_query($conexao, "SELECT * FROM caixas