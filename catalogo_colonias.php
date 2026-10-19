<?php

$conexao = mysqli_connect("localhost", "root", "", "coopceedo");

if (!$conexao) {
    die("Erro ao conectar com o banco de dados.");
}

mysqli_set_charset($conexao, "utf8mb4");

$sql = "SELECT * FROM colonias ORDER BY id DESC";
$resultado = mysqli_query($conexao, $sql);

if (!$resultado) {
    die("Erro ao buscar as colônias: " . mysqli_error($conexao));
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Catálogo de Colônias | COOPCEEDO</title>

    <?php include 'includes_site/head.php'; ?>

    <style>

        body {
            background-color: #fffaf0;
        }

        .catalogo-colonias {
            padding: 70px 0;
        }

        .titulo-catalogo {
            text-align: center;
            margin-bottom: 50px;
        }

        .titulo-catalogo h1 {
            font-size: 42px;
            font-weight: 700;
            margin-bottom: 15px;
            color: #333;
        }

        .titulo-catalogo p {
            font-size: 18px;
            color: #666;
        }

        .linha-titulo {
            width: 80px;
            height: 5px;
            background-color: #f2c12e;
            border-radius: 10px;
            margin: 0 auto 20px;
        }

        .card-colonia {
            background-color: white;
            border: none;
            border-radius: 20px;
            overflow: hidden;
            height: 100%;
            box-shadow: 0 6px 20px rgba(0,0,0,0.08);
            transition: 0.3s;
        }

        .card-colonia:hover {
            transform: translateY(-5px);
        }

        .imagem-colonia {
            width: 100%;
            height: 250px;
            object-fit: cover;
            display: block;
        }

        .sem-imagem {
            height: 250px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f4f0df;
            color: #777;
        }

        .conteudo-colonia {
            padding: 25px;
        }

        .especie {
            display: inline-block;
            background-color: #f2c12e;
            color: white;
            padding: 7px 14px;
            border-radius: 30px;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .nome-colonia {
            font-size: 27px;
            font-weight: 700;
            color: #333;
            margin-bottom: 20px;
        }

        .informacao {
            color: #666;
            margin-bottom: 10px;
            line-height: 1.5;
        }

        .informacao strong {
            color: #333;
        }

        .descricao {
            border-top: 1px solid #eee;
            margin-top: 18px;
            padding-top: 18px;
            color: #666;
            line-height: 1.7;
        }

        .voltar {
            text-align: center;
            margin-top: 45px;
        }

        .voltar a {
            display: inline-block;
            padding: 12px 24px;
            background-color: #f2c12e;
            color: white;
            text-decoration: none;
            border-radius: 10px;
            font-weight: bold;
        }

    </style>

</head>

<body>

    <?php include 'includes_site/header.php'; ?>

    <main>

        <section class="catalogo-colonias">

            <div class="container">

                <div class="titulo-catalogo">

                    <h1>Nossas Colônias</h1>

                    <div class="linha-titulo"></div>

                    <p>
                        Conheça as colônias cadastradas no Meliponário CEEDO.
                    </p>

                </div>


                <div class="row g-4">


                    <?php while ($colonia = mysqli_fetch_assoc($resultado)) { ?>

                        <div class="col-12 col-md-6 col-lg-4">

                            <div class="card-colonia">


                                <?php if (!empty($colonia['foto'])) { ?>

                                    <img
                                        src="painel/uploads/<?php echo rawurlencode(basename($colonia['foto'])); ?>"
                                        alt="<?php echo htmlspecialchars($colonia['nome']); ?>"
                                        class="imagem-colonia"
                                    >

                                <?php } else { ?>

                                    <div class="sem-imagem">
                                        Imagem não cadastrada
                                    </div>

                                <?php } ?>


                                <div class="conteudo-colonia">

                                    <span class="especie">
                                        <?php echo htmlspecialchars($colonia['especie']); ?>
                                    </span>


                                    <h2 class="nome-colonia">
                                        <?php echo htmlspecialchars($colonia['nome']); ?>
                                    </h2>


                                    <div class="informacao">

                                        <strong>Procedência:</strong>
                                        <?php echo htmlspecialchars($colonia['procedencia']); ?>

                                    </div>


                                    <div class="informacao">

                                        <strong>Data de aquisição:</strong>

                                        <?php

                                        if (
                                            !empty($colonia['data_aquisicao']) &&
                                            $colonia['data_aquisicao'] != '0000-00-00'
                                        ) {

                                            echo date(
                                                'd/m/Y',
                                                strtotime($colonia['data_aquisicao'])
                                            );

                                        } else {

                                            echo 'Não informada';

                                        }

                                        ?>

                                    </div>


                                    <div class="informacao">

                                        <strong>Localização:</strong>
                                        <?php echo htmlspecialchars($colonia['localizacao']); ?>

                                    </div>


                                    <?php if (!empty($colonia['descricao'])) { ?>

                                        <div class="descricao">

                                            <?php
                                            echo nl2br(
                                                htmlspecialchars($colonia['descricao'])
                                            );
                                            ?>

                                        </div>

                                    <?php } ?>


                                </div>

                            </div>

                        </div>

                    <?php } ?>


                </div>


                <div class="voltar">

                    <a href="meliponario.php">
                        ← Voltar ao Meliponário
                    </a>

                </div>

            </div>

        </section>

    </main>


    <?php include 'includes_site/footer.php'; ?>

</body>

</html>