<?php include('verifica_login.php'); ?>

<?php
// Conexão com o banco
include('../conexao.php');


// ===============================
// QUANTIDADE DE NOTÍCIAS
// ===============================

$sql_noticias = "SELECT COUNT(*) AS total FROM noticias";
$resultado_noticias = mysqli_query($conexao, $sql_noticias);

$total_noticias = 0;

if ($resultado_noticias) {
    $dados_noticias = mysqli_fetch_assoc($resultado_noticias);
    $total_noticias = $dados_noticias['total'];
}


// ===============================
// QUANTIDADE DE PADRÕES DE CAIXA
// ===============================

$sql_caixas = "SELECT COUNT(*) AS total FROM padroes_caixa";
$resultado_caixas = mysqli_query($conexao, $sql_caixas);

$total_caixas = 0;

if ($resultado_caixas) {
    $dados_caixas = mysqli_fetch_assoc($resultado_caixas);
    $total_caixas = $dados_caixas['total'];
}


// ===============================
// QUANTIDADE DE COLÔNIAS
// ===============================

$sql_colonias = "SELECT COUNT(*) AS total FROM colonias";
$resultado_colonias = mysqli_query($conexao, $sql_colonias);

$total_colonias = 0;

if ($resultado_colonias) {
    $dados_colonias = mysqli_fetch_assoc($resultado_colonias);
    $total_colonias = $dados_colonias['total'];
}
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Início | COOPCEEDO</title>

    <?php include 'includes_painel/head.php'; ?>

    <style>

        /* DASHBOARD */

        .dashboard {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }


        /* TÍTULO */

        .titulo-dashboard {
            margin-bottom: 35px;
        }

        .titulo-dashboard h1 {
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .titulo-dashboard p {
            color: #666;
            margin: 0;
        }


        /* CARDS */

        .cards-dashboard {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
            margin-bottom: 35px;
        }

        .card-dashboard {
            background: #fff3cd;
            border: 1px solid #e6c95c;
            border-radius: 10px;
            padding: 30px;
            text-decoration: none;
            color: #222;
            transition: 0.3s;
        }

        .card-dashboard:hover {
            transform: translateY(-4px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.10);
            background: #ffefad;
        }

        .numero-card {
            font-size: 40px;
            font-weight: bold;
            color: #198754;
            margin-bottom: 10px;
        }

        .card-dashboard h2 {
            font-size: 21px;
            margin-bottom: 8px;
        }

        .card-dashboard p {
            color: #777;
            margin: 0;
        }


        /* ACESSO RÁPIDO */

        .box-acesso {
            background: #fff3cd;
            border: 1px solid #e6c95c;
            border-radius: 10px;
            padding: 25px;
        }

        .box-acesso h2 {
            font-size: 22px;
            margin-bottom: 20px;
        }

        .acessos-rapidos {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .botao-acesso {
            display: inline-block;
            padding: 10px 20px;
            background: #198754;
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
            transition: 0.3s;
        }

        .botao-acesso:hover {
            background: #146c43;
            color: #fff;
        }


        /* RESPONSIVO */

        @media (max-width: 800px) {

            .cards-dashboard {
                grid-template-columns: 1fr;
            }

        }

    </style>

</head>


<body>

    <?php include 'includes_painel/header.php'; ?>


    <main class="dashboard">


        <!-- TÍTULO -->

        <div class="titulo-dashboard">

            <h1>Página administrativa</h1>

            <p>
                Gerencie as informações da COOPCEEDO pelo painel administrativo.
            </p>

        </div>


        <!-- CARDS PRINCIPAIS -->

        <div class="cards-dashboard">


            <!-- NOTÍCIAS -->

            <a href="noticias.php" class="card-dashboard">

                <div class="numero-card">
                    <?php echo $total_noticias; ?>
                </div>

                <h2>Notícias</h2>

                <p>
                    Notícias cadastradas
                </p>

            </a>


            <!-- PADRÕES DE CAIXA -->

            <a href="padroes_caixa.php" class="card-dashboard">

                <div class="numero-card">
                    <?php echo $total_caixas; ?>
                </div>

                <h2>Padrões de Caixa</h2>

                <p>
                    Padrões de caixa cadastrados
                </p>

            </a>


            <!-- COLÔNIAS -->

            <a href="colonias.php" class="card-dashboard">

                <div class="numero-card">
                    <?php echo $total_colonias; ?>
                </div>

                <h2>Colônias</h2>

                <p>
                    Colônias cadastradas
                </p>

            </a>


        </div>


        <!-- ACESSO RÁPIDO -->

        <div class="box-acesso">

            <h2>Acesso rápido</h2>

            <div class="acessos-rapidos">

                <a href="noticias.php" class="botao-acesso">
                    Notícias
                </a>

                <a href="padroes_caixa.php" class="botao-acesso">
                    Padrões de Caixa
                </a>

                <a href="colonias.php" class="botao-acesso">
                    Colônias
                </a>

            </div>

        </div>


    </main>


    <?php include 'includes_painel/footer.php'; ?>

</body>

</html>