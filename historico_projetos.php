<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Histórico de Projetos | COOPCEEDO</title>

    <?php include 'includes_site/head.php'; ?>


    <style>

        /* =====================================================
           CONFIGURAÇÃO GERAL
        ====================================================== */

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;

            background-color: #fff9df;

            color: #000000;

            font-family: Arial, Helvetica, sans-serif;
        }


        /* =====================================================
           CABEÇALHO
        ====================================================== */

        .historico-header {
            background-color: #fffdf7;

            text-align: center;

            padding: 65px 20px 50px;
        }


        .historico-header h1 {
            margin: 0;

            color: #000000;

            font-family: Georgia, "Times New Roman", serif;

            font-size: 48px;

            line-height: 1.2;

            font-weight: 700;
        }


        .historico-linha {
            width: 90px;

            height: 5px;

            margin: 22px auto 0;

            background-color: #e7bb24;

            border-radius: 20px;
        }


        /* =====================================================
           ÁREA DOS PROJETOS
        ====================================================== */

        .historico-area {
            background-color: #fff5cf;

            padding: 55px 20px 75px;

            border-top: 1px solid #efdda0;

            border-bottom: 1px solid #efdda0;
        }


        .historico-container {
            width: 100%;

            max-width: 1250px;

            margin: 0 auto;
        }


        /* =====================================================
           GRID
        ====================================================== */

        .projetos-grid {
            display: grid;

            grid-template-columns: repeat(2, minmax(0, 1fr));

            gap: 30px;
        }


        /* =====================================================
           CARD
        ====================================================== */

        .projeto-card {
            background-color: #ffffff;

            border: 1px solid #d8d2b2;

            border-radius: 18px;

            overflow: hidden;

            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.07);

            transition:
                transform 0.3s ease,
                box-shadow 0.3s ease;
        }


        .projeto-card:hover {
            transform: translateY(-5px);

            box-shadow: 0 15px 32px rgba(0, 0, 0, 0.11);
        }


        /* =====================================================
           FAIXA AMARELA
        ====================================================== */

        .projeto-faixa {
            width: 100%;

            height: 7px;

            background-color: #e7bb24;
        }


        /* =====================================================
           CONTEÚDO
        ====================================================== */

        .projeto-inner {
            padding: 38px 35px 40px;

            text-align: center;
        }


        /* =====================================================
           TÍTULO
        ====================================================== */

        .projeto-card h2 {
            max-width: 560px;

            margin: 0 auto 20px;

            color: #000000;

            font-family: Georgia, "Times New Roman", serif;

            font-size: 28px;

            line-height: 1.35;

            font-weight: 700;
        }


        /* =====================================================
           TEXTO
        ====================================================== */

        .projeto-card p {
            max-width: 550px;

            margin: 0 auto 30px;

            color: #333333;

            font-size: 16px;

            line-height: 1.75;
        }


        /* =====================================================
           BOTÕES
        ====================================================== */

        .projeto-botoes {
            display: flex;

            flex-direction: column;

            gap: 12px;

            width: 100%;

            max-width: 430px;

            margin: 0 auto;
        }


        .projeto-botao {
            display: flex;

            align-items: center;

            justify-content: center;

            width: 100%;

            min-height: 50px;

            padding: 13px 20px;

            border-radius: 9px;

            text-decoration: none;

            font-size: 15px;

            font-weight: 700;

            transition:
                background-color 0.25s ease,
                transform 0.2s ease,
                box-shadow 0.25s ease;
        }


        .projeto-botao:hover {
            transform: translateY(-2px);

            box-shadow: 0 5px 12px rgba(0, 0, 0, 0.10);
        }


        /* =====================================================
           BOTÃO PROJETO - VERDE ESCURO
        ====================================================== */

        .botao-projeto {
            background-color: #234d20;

            color: #ffffff;
        }


        .botao-projeto:hover {
            background-color: #193a17;

            color: #ffffff;
        }


        /* =====================================================
           BOTÃO RESUMO - AMARELO
        ====================================================== */

        .botao-resumo {
            background-color: #e7bb24;

            color: #ffffff;
        }


        .botao-resumo:hover {
            background-color: #cda619;

            color: #ffffff;
        }


        /* =====================================================
           BOTÃO VÍDEO - AMARELO
        ====================================================== */

        .botao-video {
            background-color: #e7bb24;

            color: #ffffff;
        }


        .botao-video:hover {
            background-color: #cda619;

            color: #ffffff;
        }


        /* =====================================================
           DETALHE VERDE
        ====================================================== */

        .projeto-detalhe {
            width: 55px;

            height: 3px;

            margin: 28px auto 0;

            background-color: #234d20;

            border-radius: 10px;
        }


        /* =====================================================
           RESPONSIVO
        ====================================================== */

        @media (max-width: 900px) {

            .projetos-grid {
                grid-template-columns: 1fr;
            }

        }


        @media (max-width: 600px) {

            .historico-header {
                padding: 48px 18px 38px;
            }


            .historico-header h1 {
                font-size: 35px;
            }


            .historico-area {
                padding: 35px 15px 55px;
            }


            .projeto-inner {
                padding: 28px 20px 32px;
            }


            .projeto-card h2 {
                font-size: 24px;
            }


            .projeto-card p {
                font-size: 15px;
            }

        }

    </style>

</head>


<body>


    <!-- =====================================================
         HEADER
    ====================================================== -->

    <?php include 'includes_site/header.php'; ?>


    <main>


        <!-- =====================================================
             TÍTULO
        ====================================================== -->

        <section class="historico-header">

            <div class="historico-container">

                <h1>
                    Histórico de Projetos
                </h1>

                <div class="historico-linha"></div>

            </div>

        </section>



        <!-- =====================================================
             PROJETOS
        ====================================================== -->

        <section class="historico-area">

            <div class="historico-container">

                <div class="projetos-grid">


                    <!-- =================================================
                         PROJETO 1 - PAISAGISMO
                    ================================================== -->

                    <article class="projeto-card">

                        <div class="projeto-faixa"></div>


                        <div class="projeto-inner">


                            <h2>
                                Paisagismo Sustentável,
                                Atemporal e Dinâmico
                            </h2>


                            <p>
                                Clique abaixo para acessar os anexos
                                do projeto "Paisagismo Sustentável,
                                Atemporal e Dinâmico".
                            </p>


                            <div class="projeto-botoes">


                                <!-- VISUALIZAR PROJETO -->

                                <a
                                    href="paisagismo.php"
                                    class="projeto-botao botao-projeto"
                                >
                                    Visualizar projeto →
                                </a>


                                <!-- VISUALIZAR RESUMO -->

                                <a
                                    href="documentos/resumo_paisagismo.pdf" 
                                    class="projeto-botao botao-resumo"
                                >
                                    Visualizar resumo →
                                </a>


                            </div>


                            <div class="projeto-detalhe"></div>


                        </div>

                    </article>



                    <!-- =================================================
                         PROJETO 2 - DOCE SABEDORIA
                    ================================================== -->

                    <article class="projeto-card">

                        <div class="projeto-faixa"></div>


                        <div class="projeto-inner">


                            <h2>
                                Doce Sabedoria Meliponícola
                            </h2>


                            <p>
                                Clique abaixo para acessar os anexos
                                do projeto "Doce Sabedoria
                                Meliponícola".
                            </p>


                            <div class="projeto-botoes">


                                <!-- VISUALIZAR PROJETO -->

                                <a
                                    href="documentos/relatorio.1.pdf" 
                                    class="projeto-botao botao-projeto"
                                >
                                    Visualizar projeto →
                                </a>


                                <!-- ASSISTIR VÍDEO -->

                                <a
                                    href="https://www.youtube.com/watch?v=BQZflcGdnHk&t=2s"
                                    class="projeto-botao botao-video"
                                >
                                    ▶&nbsp; Vídeo - Sicredi Conexão
                                </a>


                            </div>


                            <div class="projeto-detalhe"></div>


                        </div>

                    </article>


                </div>

            </div>

        </section>


    </main>

    <!-- =====================================================
         FOOTER
    ====================================================== -->

    <?php include 'includes_site/footer.php'; ?>


</body>

</html>