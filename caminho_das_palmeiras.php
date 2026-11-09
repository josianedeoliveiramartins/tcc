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
           CARROSSEL DE FOTOS
        ====================================================== */

        .caminho-midias {
            margin-top: 45px;
            padding-top: 30px;
            border-top: 2px solid #e7bb24;
            text-align: center;
        }


        .caminho-midias p {
            margin: 0 0 25px;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 20px;
            color: #000000;
        }


        .caminho-carrossel {
            position: relative;
            width: 100%;
            max-width: 1320px;
            margin: 0 auto;

            background-color: #ffffff;
            border: 1px solid rgba(231, 187, 36, 0.45);
            border-radius: 15px;
            overflow: hidden;

            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        }


        .caminho-carrossel .carousel-inner {
            width: 100%;
            background-color: #f5f5f0;
        }


        .caminho-carrossel .carousel-item {
            width: 100%;
            height: 550px;
            background-color: #f5f5f0;

            align-items: center;
            justify-content: center;
        }


        .caminho-carrossel .carousel-item.active {
            display: flex;
        }


        .caminho-carrossel .carousel-item img {
            display: block;

            width: 100%;
            height: 100%;

            max-width: 100%;
            max-height: 100%;

            object-fit: contain;
            object-position: center;

            margin: 0 auto;
            background-color: #f5f5f0;
        }


        /* BOTÕES DE NAVEGAÇÃO */

        .caminho-carrossel .carousel-control-prev,
        .caminho-carrossel .carousel-control-next {
            width: 55px;
            height: 55px;

            top: 50%;
            transform: translateY(-50%);

            opacity: 1;
            background-color: rgba(51, 51, 51, 0.70);
            border-radius: 50%;

            transition:
                background-color 0.3s ease,
                transform 0.3s ease;
        }


        .caminho-carrossel .carousel-control-prev {
            left: 20px;
        }


        .caminho-carrossel .carousel-control-next {
            right: 20px;
        }


        .caminho-carrossel .carousel-control-prev:hover,
        .caminho-carrossel .carousel-control-next:hover {
            background-color: #e7bb24;
            transform: translateY(-50%) scale(1.05);
        }


        .caminho-carrossel .carousel-control-prev-icon,
        .caminho-carrossel .carousel-control-next-icon {
            width: 24px;
            height: 24px;
            background-size: 100%;
        }


        /* ESPAÇOS DAS FOTOS */

        .caminho-foto-placeholder {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;

            width: 100%;
            height: 100%;
            min-height: 280px;

            padding: 25px;

            color: #555555;
            background-color: #f5f5f0;

            font-family: Arial, Helvetica, sans-serif;
            text-align: center;
        }


        .caminho-foto-placeholder strong {
            display: block;
            margin-bottom: 8px;
            color: #333333;
            font-size: 25px;
        }


        .caminho-foto-placeholder span {
            font-size: 15px;
        }


        /* =====================================================
           RESPONSIVO
        ====================================================== */

        @media (max-width: 992px) {

            .caminho-carrossel .carousel-item {
                height: 450px;
            }

        }


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


            .caminho-carrossel {
                border-radius: 10px;
            }


            .caminho-carrossel .carousel-item {
                height: 350px;
            }


            .caminho-carrossel .carousel-control-prev,
            .caminho-carrossel .carousel-control-next {
                width: 42px;
                height: 42px;
            }


            .caminho-carrossel .carousel-control-prev {
                left: 10px;
            }


            .caminho-carrossel .carousel-control-next {
                right: 10px;
            }

        }


        @media (max-width: 480px) {

            .caminho-carrossel .carousel-item {
                height: 280px;
            }


            .caminho-carrossel .carousel-control-prev,
            .caminho-carrossel .carousel-control-next {
                width: 38px;
                height: 38px;
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
                    ecologia e do turismo sustentável, além de incentivar
                    o cultivo de palmeiras como forma de embelezar o ambiente.
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
                     CARROSSEL COM 6 FOTOS
                ================================================== -->

                <div class="caminho-midias">

                    <p>
                        Confira as fotos do projeto.
                    </p>


                    <?php

                    $diretorioMidias = 'midias/caminho_das_palmeiras/';

                    // Coloque as imagens nesta pasta com estes nomes:
                    // palmeira1.jpg, palmeira2.jpg, ... palmeira6.jpg.

                    $fotosProjeto = array();

                    for ($numeroFoto = 1; $numeroFoto <= 6; $numeroFoto++) {

                        $fotosProjeto[] = array(
                            'titulo' => 'Palmeira ' . $numeroFoto,
                            'arquivo' => $diretorioMidias . 'palmeira' . $numeroFoto . '.jpg'
                        );

                    }

                    ?>


                    <div
                        id="carrosselCaminhoPalmeiras"
                        class="carousel slide caminho-carrossel"
                        data-bs-ride="false"
                        data-bs-interval="false"
                    >

                       <section class="caminhodaspalmeiras-section">

            <div class="container">

                <h2 class="text-center mb-5">
                    Caminho da Palmeiras
                </h2>


                <div
                    id="carrosselMeliponario"
                    class="carousel slide meliponario-carrossel"
                    data-bs-ride="false"
                    data-bs-interval="false"
                >

                    <div class="carousel-inner">


                        <!-- FOTO 1 -->

                        <div class="carousel-item active">

                            <img
                                src=".\midias\palmeira1.jpg"
                                class="d-block w-100"
                                alt="Caixa de abelhas sem ferrão do Meliponário CEEDO - Foto 1"
                                loading="eager"
                                decoding="async"
                                referrerpolicy="no-referrer"
                            >

                        </div>



                        <!-- FOTO 2 -->

                        <div class="carousel-item"> 

                            <img
                                src=".\midias\palmeira2.jpg"
                                alt="Meliponário CEEDO - Foto 2"
                                loading="lazy"
                                decoding="async"
                                referrerpolicy="no-referrer"
                            >

                        </div>


                        <!-- FOTO 3 -->

                        <div class="carousel-item">

                            <img
                                 src=".\midias\palmeira3.jpg"
                                alt="Meliponário CEEDO - Foto 3"
                                loading="lazy"
                                decoding="async"
                                referrerpolicy="no-referrer"
                            >

                        </div>


                        <!-- FOTO 4 -->

                        <div class="carousel-item">
 
                            <img
                                src=".\midias\palmeira4.jpg"
                                class="d-block w-100"
                                alt="Meliponário CEEDO - Foto 4"
                                loading="lazy"
                                decoding="async"
                                referrerpolicy="no-referrer"
                            >

                        </div>


                        <!-- FOTO 5 -->

                        <div class="carousel-item">

                            <img
                                src=".\midias\palmeira5.jpg"
                                class="d-block w-100"
                                alt="Meliponário CEEDO - Foto 5"
                                loading="lazy" 
                                decoding="async"
                                referrerpolicy="no-referrer"
                            >

                        </div>

                        <!-- FOTO 6-->

                        <div class="carousel-item">

                            <img
                                src=".\midias\palmeira6.jpg"
                                class="d-block w-100"
                                alt="Meliponário CEEDO - Foto 6"
                                loading="lazy"
                                decoding="async"
                                referrerpolicy="no-referrer"
                            >

                        </div>

                        <!-- FOTO 7-->
                        
                        <div class="carousel-item">
 
                            <img
                                src=".\midias\palmeira7.jpg"
                                class="d-block w-100"
                                alt="Meliponário CEEDO - Foto 4"
                                loading="lazy"
                                decoding="async"
                                referrerpolicy="no-referrer"
                            >

                        </div>

                        <!-- FOTO 8-->
                        
                        <div class="carousel-item">
 
                            <img
                                src=".\midias\palmeira8.jpg"
                                class="d-block w-100"
                                alt="Meliponário CEEDO - Foto 4"
                                loading="lazy"
                                decoding="async"
                                referrerpolicy="no-referrer"
                            >

                        </div>

                        <!-- FOTO 9-->
                        
                        <div class="carousel-item">
 
                            <img
                                src=".\midias\palmeira9.jpg"
                                class="d-block w-100"
                                alt="Meliponário CEEDO - Foto 4"
                                loading="lazy"
                                decoding="async"
                                referrerpolicy="no-referrer"
                            >

                        </div>

                        <!-- FOTO 10-->

                        <div class="carousel-item">
 
                            <img
                                src=".\midias\palmeira10.jpg"
                                class="d-block w-100"
                                alt="Meliponário CEEDO - Foto 4"
                                loading="lazy"
                                decoding="async"
                                referrerpolicy="no-referrer"
                            >

                        </div>
                    </div>


                    <!-- CONTROLE ANTERIOR -->

                    <button
                        class="carousel-control-prev"
                        type="button"
                        data-bs-target="#carrosselMeliponario"
                        data-bs-slide="prev"
                        aria-label="Foto anterior"
                    >

                        <span
                            class="carousel-control-prev-icon"
                            aria-hidden="true"
                        ></span>

                        <span class="visually-hidden">
                            Anterior
                        </span>

                    </button>

                        <!-- BOTÃO FOTO ANTERIOR -->

                        <button
                            class="carousel-control-prev"
                            type="button"
                            data-bs-target="#carrosselCaminhoPalmeiras"
                            data-bs-slide="prev"
                            aria-label="Foto anterior"
                        >

                            <span
                                class="carousel-control-prev-icon"
                                aria-hidden="true"
                            ></span>

                            <span class="visually-hidden">
                                Anterior
                            </span>

                        </button>


                        <!-- BOTÃO PRÓXIMA FOTO -->

                        <button
                            class="carousel-control-next"
                            type="button"
                            data-bs-target="#carrosselCaminhoPalmeiras"
                            data-bs-slide="next"
                            aria-label="Próxima foto"
                        >

                            <span
                                class="carousel-control-next-icon"
                                aria-hidden="true"
                            ></span>

                            <span class="visually-hidden">
                                Próxima
                            </span>

                        </button>

                    </div>

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