<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Caminho das Palmeiras | COOPCEEDO</title>

    <?php include 'includes_site/head.php'; ?>


    <style>

        * {
            box-sizing: border-box;
        }


        body {
            margin: 0;
            padding: 0;

            background-color: #ffffff;

            color: #000000;

            font-family: Georgia, "Times New Roman", serif;
        }


        /* =====================================================
           IMAGEM + TÍTULO
        ====================================================== */

        .caminho-capa {
            position: relative;

            width: 100%;

            height: 480px;

            background-image:
                linear-gradient(
                    rgba(0, 0, 0, 0.35),
                    rgba(0, 0, 0, 0.35)
                ),
                url("midias/caminho_das_palmeiras/capa.jpg");

            background-size: cover;

            background-position: center;

            display: flex;

            align-items: center;

            justify-content: center;

            text-align: center;
        }


        .caminho-capa-conteudo {
            width: 90%;

            max-width: 1100px;

            color: #ffffff;
        }


        .caminho-capa h1 {
            margin: 0 0 18px;

            font-family: Georgia, "Times New Roman", serif;

            font-size: 48px;

            line-height: 1.2;

            font-weight: 700;

            text-shadow:
                2px 2px 5px rgba(0, 0, 0, 0.7);
        }


        .caminho-capa h2 {
            margin: 0;

            font-family: Georgia, "Times New Roman", serif;

            font-size: 28px;

            font-weight: 400;

            text-shadow:
                2px 2px 5px rgba(0, 0, 0, 0.7);
        }


        /* =====================================================
           LINHA AMARELA
        ====================================================== */

        .caminho-linha {
            width: 90%;

            max-width: 1430px;

            height: 2px;

            margin: 0 auto;

            background-color: #e7bb24;
        }


        /* =====================================================
           CONTEÚDO
        ====================================================== */

        .caminho-container {
            width: 90%;

            max-width: 1430px;

            margin: 0 auto;

            padding: 45px 0 65px;
        }


        .caminho-texto {
            text-align: justify;

            font-size: 18px;

            line-height: 1.45;

            color: #222222;
        }


        .caminho-texto p {
            margin: 0 0 28px;
        }


        .caminho-texto strong {
            font-weight: 700;
        }


        /* =====================================================
           BOTÃO VISUALIZAR MÍDIAS
        ====================================================== */

        .caminho-midias {
            margin-top: 45px;

            padding-top: 30px;

            border-top: 2px solid #e7bb24;

            text-align: center;
        }


        .caminho-midias p {
            margin: 0 0 20px;

            font-family: Arial, Helvetica, sans-serif;

            font-size: 20px;

            color: #000000;
        }


        .botao-midias {
            display: flex;

            align-items: center;

            justify-content: center;

            width: 100%;

            min-height: 50px;

            padding: 13px 20px;

            background-color: #234d20;

            color: #ffffff;

            border-radius: 5px;

            text-decoration: none;

            font-family: Arial, Helvetica, sans-serif;

            font-size: 16px;

            font-weight: 700;

            transition:
                background-color 0.25s ease,
                transform 0.2s ease;
        }


        .botao-midias:hover {
            background-color: #193a17;

            color: #ffffff;

            transform: translateY(-2px);
        }


        /* =====================================================
           RESPONSIVO
        ====================================================== */

        @media (max-width: 700px) {

            .caminho-capa {
                height: 380px;
            }


            .caminho-capa h1 {
                font-size: 32px;
            }


            .caminho-capa h2 {
                font-size: 21px;
            }


            .caminho-container {
                width: 90%;

                padding: 35px 0 50px;
            }


            .caminho-texto {
                font-size: 16px;

                text-align: left;
            }


            .caminho-midias p {
                font-size: 18px;
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
             CAPA COM IMAGEM E TÍTULO
        ====================================================== -->

        <section class="caminho-capa">

            <div class="caminho-capa-conteudo">

                <h1>
                    Bem-Vindo ao Caminho das Palmeiras CEEDO
                </h1>

                <h2>
                    Paisagismo Sustentável Atemporal e Dinâmico
                </h2>

            </div>

        </section>


        <!-- =====================================================
             LINHA AMARELA
        ====================================================== -->

        <div class="caminho-linha"></div>


        <!-- =====================================================
             TEXTO DO PROJETO
        ====================================================== -->

        <section class="caminho-container">

            <div class="caminho-texto">


                <!-- PRIMEIRO PARÁGRAFO -->

                <p>
                    O Projeto Interinstitucional
                    <strong>Caminho das Palmeiras</strong>
                    é uma iniciativa desenvolvida pela comunidade colegial
                    do CEEDO e a Associação Científica Medeia, com o objetivo
                    de promover a cultura ecológica nas comunidades de Cerro
                    Grande e Novo Tiradentes, no Rio Grande do Sul. O foco
                    principal do projeto é o cultivo, manejo, plantio e
                    cuidado da <strong>Palmeira Real</strong>
                    <em>(Archontophoenix cunninghamiana)</em>,
                    abordando sua história, ecologia e potencial turístico.
                    A proposta visa integrar a educação formal com práticas
                    que valorizem o território e as questões ambientais.
                </p>


                <!-- SEGUNDO PARÁGRAFO -->

                <p>
                    Os objetivos do projeto são variados, incluindo a
                    conscientização da comunidade sobre a importância da
                    ecologia e do turismo sustentável, além de incentivar o
                    cultivo de palmeiras como forma de embelezar o ambiente.
                    O projeto também busca refletir sobre as relações entre
                    a população e a natureza, promovendo a responsabilidade
                    coletiva e a integração das atividades pedagógicas com a
                    realidade cotidiana dos indivíduos. Através de atividades
                    práticas, pretende-se desenvolver uma consciência
                    ambiental que transcenda as salas de aula.
                </p>


                <!-- TERCEIRO PARÁGRAFO -->

                <p>
                    A metodologia do projeto envolve a coleta de sementes,
                    germinação, transplante e plantio em áreas públicas,
                    além de diálogos com a comunidade para garantir a
                    participação e o engajamento. O cronograma prevê o início
                    das atividades em setembro de 2022, com o plantio de
                    mudas programado para março de 2023 e desenvolvimento
                    contínuo até 2024. Com parcerias estratégicas, o projeto
                    não apenas busca embelezar o território, mas também
                    fortalecer a educação ambiental e promover a colaboração
                    entre escolas e comunidades.
                </p>


                <!-- =================================================
                     BOTÃO VISUALIZAR MÍDIAS
                ================================================== -->

                <div class="caminho-midias">

                    <p>
                        Clique aqui para visualizar fotos e vídeos do projeto.
                    </p>


                    <a
                        href="midias_caminho_das_palmeiras.php"
                        class="botao-midias"
                    >
                        Visualizar mídias →
                    </a>

                </div>


            </div>

        </section>


    </main>


    <!-- =====================================================
         FOOTER
    ===================================================== -->

    <?php include 'includes_site/footer.php'; ?>


</body>

</html>