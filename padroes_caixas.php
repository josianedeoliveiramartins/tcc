<?php

$conexao = mysqli_connect("localhost", "root", "", "coopceedo");

if (!$conexao) {
    die("Erro ao conectar com o banco de dados.");
}

mysqli_set_charset($conexao, "utf8mb4");


// Busca os registros da tabela caixas
$sql = "SELECT * FROM caixas ORDER BY id DESC";

$resultado = mysqli_query($conexao, $sql);

if (!$resultado) {
    die("Erro ao buscar os padrões de caixas: " . mysqli_error($conexao));
}


// Descobre os nomes das colunas
$campos = [];

$estrutura = mysqli_query($conexao, "SHOW COLUMNS FROM caixas");

while ($campo = mysqli_fetch_assoc($estrutura)) {
    $campos[] = $campo['Field'];
}


// Procura uma coluna que possa conter a imagem
$campo_imagem = null;

$possiveis_imagens = [
    'foto',
    'imagem',
    'foto_caixa',
    'imagem_caixa',
    'banner'
];

foreach ($possiveis_imagens as $possivel) {

    if (in_array($possivel, $campos)) {
        $campo_imagem = $possivel;
        break;
    }

}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Padrões de Caixas | COOPCEEDO</title>

    <?php include 'includes_site/head.php'; ?>


    <style>

        body {
            background-color: #fffaf0;
        }

        .pagina-caixas {
            padding: 70px 0;
        }

        .titulo-caixas {
            text-align: center;
            margin-bottom: 50px;
        }

        .titulo-caixas h1 {
            color: #333;
            font-size: 42px;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .linha-titulo {
            width: 80px;
            height: 5px;
            background-color: #f2c12e;
            border-radius: 10px;
            margin: 0 auto 20px;
        }

        .titulo-caixas p {
            color: #666;
            font-size: 18px;
        }

        .card-caixa {
            background-color: #fff;
            border-radius: 20px;
            overflow: hidden;
            height: 100%;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
            transition: 0.3s;
            border: 1px solid #eee0ad;
        }

        .card-caixa:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.12);
        }

        .imagem-caixa {
            width: 100%;
            height: 250px;
            object-fit: cover;
            display: block;
            background-color: #f4f0df;
        }

        .sem-imagem {
            width: 100%;
            height: 250px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f4f0df;
            color: #777;
        }

        .conteudo-caixa {
            padding: 25px;
        }

        .nome-caixa {
            font-size: 27px;
            font-weight: 700;
            color: #333;
            margin-bottom: 20px;
        }

        .informacao {
            color: #666;
            margin-bottom: 10px;
            line-height: 1.6;
        }

        .informacao strong {
            color: #333;
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

        .sem-registros {
            text-align: center;
            padding: 50px 20px;
            color: #666;
        }

    </style>

</head>


<body>

    <?php include 'includes_site/header.php'; ?>


    <main>

        <section class="pagina-caixas">

            <div class="container">


                <div class="titulo-caixas">

                    <h1>
                        Padrões de Caixas
                    </h1>

                    <div class="linha-titulo"></div>

                    <p>
                        Conheça os modelos de caixas utilizados
                        no Meliponário CEEDO.
                    </p>

                </div>


                <div class="row g-4">


                    <?php if (mysqli_num_rows($resultado) > 0) { ?>


                        <?php while ($caixa = mysqli_fetch_assoc($resultado)) { ?>


                            <div class="col-12 col-md-6 col-lg-4">

                                <div class="card-caixa">


                                    <?php if (
                                        $campo_imagem &&
                                        !empty($caixa[$campo_imagem])
                                    ) { ?>


                                        <img
                                            src="/tcc/<?php echo htmlspecialchars($caixa[$campo_imagem]); ?>"
                                            alt="Padrão de caixa"
                                            class="imagem-caixa"
                                        >


                                    <?php } else { ?>


                                        <div class="sem-imagem">
                                            Imagem não cadastrada
                                        </div>


                                    <?php } ?>


                                    <div class="conteudo-caixa">


                                        <?php

                                        // Mostra o primeiro campo de texto como título
                                        $titulo_mostrado = false;

                                        foreach ($campos as $campo) {

                                            if (
                                                $campo == 'id' ||
                                                $campo == $campo_imagem
                                            ) {
                                                continue;
                                            }

                                            if (!empty($caixa[$campo])) {

                                                if (!$titulo_mostrado) {

                                                    ?>

                                                    <h2 class="nome-caixa">

                                                        <?php
                                                        echo htmlspecialchars($caixa[$campo]);
                                                        ?>

                                                    </h2>

                                                    <?php

                                                    $titulo_mostrado = true;

                                                    continue;
                                                }

                                            }

                                        }

                                        ?>


                                        <?php

                                        foreach ($campos as $campo) {

                                            if (
                                                $campo == 'id' ||
                                                $campo == $campo_imagem
                                            ) {
                                                continue;
                                            }

                                            if (empty($caixa[$campo])) {
                                                continue;
                                            }


                                            // Não repete o primeiro campo usado como título
                                            if ($titulo_mostrado && isset($primeiro_campo)) {
                                                if ($campo == $primeiro_campo) {
                                                    continue;
                                                }
                                            }


                                            $nome_exibicao = ucfirst(
                                                str_replace(
                                                    '_',
                                                    ' ',
                                                    $campo
                                                )
                                            );

                                            ?>

                                            <div class="informacao">

                                                <strong>
                                                    <?php echo htmlspecialchars($nome_exibicao); ?>:
                                                </strong>

                                                <?php
                                                echo nl2br(
                                                    htmlspecialchars($caixa[$campo])
                                                );
                                                ?>

                                            </div>

                                            <?php

                                        }

                                        ?>


                                    </div>

                                </div>

                            </div>


                        <?php } ?>


                    <?php } else { ?>


                        <div class="col-12">

                            <div class="sem-registros">

                                <h3>
                                    Nenhum padrão de caixa cadastrado.
                                </h3>

                                <p>
                                    Os padrões cadastrados no painel
                                    aparecerão aqui.
                                </p>

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