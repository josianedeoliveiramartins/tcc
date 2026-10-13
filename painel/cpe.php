
<?php
include('verifica_login.php');
include('../conexao.php');

mysqli_set_charset($conexao, "utf8");

$mensagem = '';
$tipo_mensagem = 'success';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $ids = isset($_POST['id']) ? $_POST['id'] : array();
    $titulos = isset($_POST['titulo']) ? $_POST['titulo'] : array();
    $descricoes = isset($_POST['descricao']) ? $_POST['descricao'] : array();
    $urls = isset($_POST['url']) ? $_POST['url'] : array();

    $stmt = mysqli_prepare(
        $conexao,
        "UPDATE cpe_links
         SET titulo = ?, descricao = ?, url = ?
         WHERE id = ? AND id <> 2"
    );

    if ($stmt) {
        $erro = false;

        foreach ($ids as $i => $id) {

            $id = (int) $id;

            // O Instagram não é gerenciado pelo painel.
            if ($id === 2) {
                continue;
            }

            if (!isset($titulos[$i], $descricoes[$i], $urls[$i])) {
                continue;
            }

            $titulo = trim($titulos[$i]);
            $descricao = trim($descricoes[$i]);
            $url = trim($urls[$i]);

            mysqli_stmt_bind_param(
                $stmt,
                "sssi",
                $titulo,
                $descricao,
                $url,
                $id
            );

            if (!mysqli_stmt_execute($stmt)) {
                $erro = true;
            }
        }

        mysqli_stmt_close($stmt);

        if ($erro) {
            $mensagem = "Algumas informações não puderam ser salvas.";
            $tipo_mensagem = 'danger';
        } else {
            $mensagem = "Informações do CPE salvas com sucesso!";
        }
    } else {
        $mensagem = "Não foi possível preparar a atualização.";
        $tipo_mensagem = 'danger';
    }
}

$resultado = mysqli_query(
    $conexao,
    "SELECT * FROM cpe_links
     WHERE id <> 2
     ORDER BY id ASC"
);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gerenciar CPE | COOPCEEDO</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>
        body {
            background: #faf9f4;
            color: #333;
            font-family: Arial, sans-serif;
        }

        .cpe-container {
            max-width: 1000px;
            margin: 40px auto;
        }

        .cpe-card {
            background: #fff;
            padding: 25px;
            margin-bottom: 20px;
            border: 1px solid #e5e5e5;
            border-radius: 12px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, .05);
        }

        .cpe-card h5 {
            font-weight: bold;
            color: #333;
        }

        .btn-amarelo {
            background: #f8c52e;
            color: #222;
            border: none;
            font-weight: 600;
        }

        .btn-amarelo:hover {
            background: #e8b619;
            color: #222;
        }

        @media (max-width: 576px) {
            .cpe-container {
                margin: 20px auto;
            }

            .cpe-card {
                padding: 18px;
            }
        }
    </style>
</head>

<body>

<div class="container cpe-container">

    <h1 class="text-center mb-3">Gerenciar CPE</h1>

    <p class="text-center text-muted mb-4">
        Edite os títulos, as descrições e os links do CPE CEEDO.
    </p>

    <?php if ($mensagem !== '') { ?>
        <div class="alert alert-<?php echo $tipo_mensagem; ?>">
            <?php
            echo htmlspecialchars(
                $mensagem,
                ENT_QUOTES,
                'UTF-8'
            );
            ?>
        </div>
    <?php } ?>

    <?php if ($resultado && mysqli_num_rows($resultado) > 0) { ?>

        <form method="POST" action="cpe.php">

            <?php while ($item = mysqli_fetch_assoc($resultado)) { ?>

                <div class="cpe-card">

                    <h5 class="mb-3">
                        <?php
                        echo htmlspecialchars(
                            $item['titulo'],
                            ENT_QUOTES,
                            'UTF-8'
                        );
                        ?>
                    </h5>

                    <input
                        type="hidden"
                        name="id[]"
                        value="<?php echo (int) $item['id']; ?>"
                    >

                    <div class="mb-3">
                        <label class="form-label">Título</label>

                        <input
                            type="text"
                            name="titulo[]"
                            class="form-control"
                            maxlength="100"
                            required
                            value="<?php
                            echo htmlspecialchars(
                                $item['titulo'],
                                ENT_QUOTES,
                                'UTF-8'
                            );
                            ?>"
                        >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Descrição</label>

                        <input
                            type="text"
                            name="descricao[]"
                            class="form-control"
                            maxlength="255"
                            value="<?php
                            echo htmlspecialchars(
                                $item['descricao'],
                                ENT_QUOTES,
                                'UTF-8'
                            );
                            ?>"
                        >
                    </div>

                    <?php if ((int) $item['id'] !== 5) { ?>

                        <div class="mb-0">
                            <label class="form-label">
                                Link de destino
                            </label>

                            <input
                                type="url"
                                name="url[]"
                                class="form-control"
                                maxlength="500"
                                placeholder="https://..."
                                value="<?php
                                echo htmlspecialchars(
                                    $item['url'],
                                    ENT_QUOTES,
                                    'UTF-8'
                                );
                                ?>"
                            >
                        </div>

                    <?php } else { ?>

                        <input
                            type="hidden"
                            name="url[]"
                            value="<?php
                            echo htmlspecialchars(
                                $item['url'],
                                ENT_QUOTES,
                                'UTF-8'
                            );
                            ?>"
                        >

                    <?php } ?>

                </div>

            <?php } ?>

            <div class="d-flex justify-content-between flex-wrap gap-2">

                <a
                    href="index.php"
                    class="btn btn-outline-secondary"
                >
                    Voltar
                </a>

                <button
                    type="submit"
                    class="btn btn-amarelo px-4"
                >
                    Salvar alterações
                </button>

            </div>

        </form>

    <?php } else { ?>

        <div class="alert alert-warning">
            Não foram encontrados conteúdos na tabela
            <strong>cpe_links</strong>. Verifique se a tabela existe
            e se os registros foram cadastrados no banco de dados.
        </div>

    <?php } ?>

</div>

</body>
</html>
