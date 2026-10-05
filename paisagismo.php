<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Paisagismo Sustentável, Atemporal e Dinâmico | COOPCEEDO
    </title>

    <?php include 'includes_site/head.php'; ?>


    <style>

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            background-color: #fff9df;
            color: #000000;
            font-family: "Times New Roman", Times, serif;
        }


        /* =====================================================
           CAPA COM IMAGEM
        ====================================================== */

        .projeto-capa {

            min-height: 620px;

            display: flex;
            align-items: flex-end;

            background-image:
                linear-gradient(
                    to top,
                    rgba(0, 0, 0, 0.78),
                    rgba(0, 0, 0, 0.35),
                    rgba(0, 0, 0, 0.08)
                ),
                url("https://lh7-us.googleusercontent.com/sitesv-images-rt/AMxu72tOVpMC8HwqqHj5M71hOMFcHjwAKXrW2znAEkjlbbLileIXY-T3RdYeVLqZSfD95FW8-El8SaCdL4SoBG7Qt1h3NhFe5J_CMZVd39RRmhH1sWb-XiwzL5LWe64B-B4JWajMr89ActrXekvD7nxrxefqMb-k0kBYYK9cT6nuLna1cupNARQUGPEEI6bK=w16383");

            background-position: center center;
            background-size: cover;
            background-repeat: no-repeat;
        }


        .projeto-capa-conteudo {

            width: 100%;
            max-width: 1200px;

            margin: 0 auto;

            padding: 90px 30px 65px;

            color: #ffffff;
        }


        .projeto-capa-linha {

            width: 80px;
            height: 5px;

            margin-bottom: 20px;

            background-color: #e7bb24;

            border-radius: 10px;
        }


        .projeto-capa h1 {

            max-width: 1000px;

            margin: 0;

            font-family: "Times New Roman", Times, serif;

            font-size: 48px;
            line-height: 1.15;

            font-weight: 700;

            color: #ffffff;
        }


        .projeto-capa-descricao {

            max-width: 800px;

            margin: 20px 0 0;

            font-family: "Times New Roman", Times, serif;

            font-size: 18px;

            line-height: 1.7;

            color: #ffffff;
        }


        /* =====================================================
           ÁREA DO TRABALHO
        ====================================================== */

        .projeto-texto-area {

            padding: 65px 20px 90px;

            background-color: #fff5cf;
        }


        .projeto-documento {

            width: 100%;
            max-width: 1000px;

            margin: 0 auto;

            padding: 60px 70px;

            background-color: #ffffff;

            border: 1px solid #e5d9a8;

            border-radius: 18px;

            box-shadow:
                0 10px 30px rgba(0, 0, 0, 0.08);
        }


        /* =====================================================
           CABEÇALHO
        ====================================================== */

        .cabecalho {

            text-align: center;

            margin-bottom: 80px;
        }


        .cabecalho p {

            margin: 0 0 22px;

            color: #000000;

            font-family: "Times New Roman", Times, serif;

            font-size: 12pt;

            font-weight: 700;

            line-height: 1.4;
        }


        /* =====================================================
           TÍTULO INTERNO
        ====================================================== */

        .titulo-projeto {

            text-align: center;

            margin-bottom: 80px;
        }


        .titulo-projeto h2 {

            margin: 0;

            color: #000000;

            font-family: "Times New Roman", Times, serif;

            font-size: 12pt;

            line-height: 1.5;

            font-weight: 700;
        }


        /* =====================================================
           AUTORES
        ====================================================== */

        .autores {

            text-align: center;

            margin-bottom: 85px;
        }


        .autores p {

            margin: 0 0 22px;

            color: #000000;

            font-family: "Times New Roman", Times, serif;

            font-size: 12pt;

            font-weight: 700;
        }


        /* =====================================================
           DATA
        ====================================================== */

        .data-projeto {

            text-align: center;

            margin-bottom: 70px;

            color: #000000;

            font-family: "Times New Roman", Times, serif;

            font-size: 12pt;

            font-weight: 700;
        }


        /* =====================================================
           SEÇÕES
        ====================================================== */

        .secao {

            margin-bottom: 45px;
        }


        .secao h3 {

            margin: 0 0 22px;

            color: #000000;

            font-family: "Times New Roman", Times, serif;

            font-size: 12pt;

            font-weight: 700;
        }


        /* =====================================================
           TEXTO DO TRABALHO
        ====================================================== */

        .secao p {

            margin: 0 0 20px;

            color: #000000;

            font-family: "Times New Roman", Times, serif;

            font-size: 12pt;

            line-height: 1.5;

            text-align: justify;
        }


        /* =====================================================
           PALAVRAS-CHAVE
        ====================================================== */

        .palavras-chave {

            margin-top: 28px !important;

            line-height: 1.5 !important;
        }


        .palavras-chave strong {

            font-family: "Times New Roman", Times, serif;

            font-size: 12pt;

            font-weight: 700;
        }


        /* =====================================================
           BOTÃO VOLTAR
        ====================================================== */

        .voltar {

            text-align: center;

            margin-top: 55px;
        }


        .voltar a {

            display: inline-flex;

            align-items: center;
            justify-content: center;

            padding: 13px 24px;

            background-color: #234d20;

            color: #ffffff;

            border-radius: 9px;

            text-decoration: none;

            font-family: Arial, Helvetica, sans-serif;

            font-size: 15px;

            font-weight: 700;

            transition: 0.25s ease;
        }


        .voltar a:hover {

            background-color: #193a17;

            color: #ffffff;

            transform: translateY(-2px);
        }


        /* =====================================================
           RESPONSIVO
        ====================================================== */

        @media (max-width: 768px) {

            .projeto-capa {

                min-height: 500px;
            }


            .projeto-capa-conteudo {

                padding: 65px 20px 45px;
            }


            .projeto-capa h1 {

                font-size: 36px;
            }


            .projeto-capa-descricao {

                font-size: 16px;
            }


            .projeto-texto-area {

                padding: 35px 15px 55px;
            }


            .projeto-documento {

                padding: 35px 25px;
            }


            .cabecalho {

                margin-bottom: 55px;
            }


            .cabecalho p {

                font-size: 12pt;
            }


            .titulo-projeto {

                margin-bottom: 55px;
            }


            .titulo-projeto h2 {

                font-size: 12pt;
            }


            .autores {

                margin-bottom: 55px;
            }


            .autores p,
            .data-projeto {

                font-size: 12pt;
            }


            .secao h3 {

                font-size: 12pt;
            }


            .secao p {

                font-size: 12pt;

                line-height: 1.5;

                text-align: justify;
            }

        }

    </style>

</head>


<body>


    <!-- HEADER -->

    <?php include 'includes_site/header.php'; ?>


    <main>


        <!-- =====================================================
             CAPA
        ====================================================== -->

        <section class="projeto-capa">

            <div class="projeto-capa-conteudo">

                <div class="projeto-capa-linha"></div>

                <h1>
                    Paisagismo Sustentável,
                    Atemporal e Dinâmico
                </h1>

                <p class="projeto-capa-descricao">
                    Projeto desenvolvido pelo Colégio Estadual
                    Dr. Dorvalino Luciano de Souza.
                </p>

            </div>

        </section>


        <!-- =====================================================
             TRABALHO ESCRITO
        ====================================================== -->

        <section class="projeto-texto-area">

            <div class="projeto-documento">


                <!-- CABEÇALHO -->

                <div class="cabecalho">

                    <p>
                        GOVERNO DO ESTADO DO RIO GRANDE DO SUL
                    </p>

                    <p>
                        SECRETARIA ESTADUAL DE EDUCAÇÃO
                    </p>

                    <p>
                        20ª CRE- PALMEIRA DAS MISSÕES
                    </p>

                    <p>
                        COLÉGIO ESTADUAL Dr. DORVALINO LUCIANO DE SOUZA
                    </p>

                    <p>
                        CERRO GRANDE - RS
                    </p>

                    <p>
                        ENSINO MÉDIO NOTURNO
                    </p>

                </div>


                <!-- TÍTULO -->

                <div class="titulo-projeto">

                    <h2>
                        PAISAGISMO SUSTENTÁVEL, ATEMPORAL E DINÂMICO
                    </h2>

                </div>


                <!-- AUTORES -->

                <div class="autores">

                    <p>
                        ALBERTO MOI
                    </p>

                    <p>
                        MARIANA ALBERTI
                    </p>

                </div>


                <!-- DATA -->

                <div class="data-projeto">

                    CERRO GRANDE, JULHO DE 2023

                </div>


                <!-- RESUMO -->

                <section class="secao">

                    <h3>
                        Resumo
                    </h3>

                    <p>
                        O paisagismo sustentável é tema multidisciplinar e aborda a multifuncionalidade da paisagem, abrangendo aspectos ambientais, sociais e econômicos, dentro de estratégias restauradoras, preservacionistas e responsáveis por benefícios ao meio ambiente e para a sociedade. O paisagismo sustentável é atemporal e dinâmico, pois está embasado em ciência. Plantas nativas são atemporais e representam a identidade natural e cultural original de um território. Aprendendo a nos conscientizar, podemos educar e transformar. A transformação de pequenos espaços de áreas degradadas do ambiente escolar é um exemplo de espaço a ser explorado e recuperado, pois ali, inúmeras crianças, jovens e até mesmo adultos passam boa parte de seu tempo. A formação do pensamento crítico com relação à forma de como tratamos a natureza, nos leva a formar cidadãos com atitudes mais responsáveis e voltadas a preservar tanto espécies animais quanto vegetais. Sendo assim, além de debatermos esses temas em aulas, precisamos colocar em prática, aproveitando os espaços físicos ociosos e degradados existentes na escola. Consorciar o cultivo de plantas e vegetações aprimorando práticas sustentáveis e de recuperação ambiental. Com isso, desenvolveu-se o projeto de paisagismo sustentável, o qual prevê a recuperação de áreas através da harmonização natural, com plantio de grama, mudas de árvores frutíferas e nativas, plantas medicinais, como chás, temperos, flores, vegetações e folhagens, assim tornando esses ambientes mais naturais e sustentáveis.
                    </p>

                    <p class="palavras-chave">
                        <strong>Palavras chave:</strong>
                        Sustentabilidade, Paisagismo, Recuperação Ambiental.
                    </p>

                </section>


                <!-- ABSTRACT -->

                <section class="secao">

                    <h3>
                        Abstract
                    </h3>

                    <p>
                        Sustainable landscaping is a multidisciplinary theme and addresses the multifunctionality of the landscape, covering environmental, social and economic aspects, within restorative, preservationist and responsible strategies for benefits to the environment and society. Sustainable landscaping is timeless and dynamic, as it is based on science. Native plants are timeless and represent the original natural and cultural identity of a territory. By learning to raise awareness, we can educate and transform. The transformation of small spaces in degraded areas of the school environment is an example of a space to be explored and recovered, as countless children, young people and even adults spend a good part of their time there. The formation of critical thinking regarding the way we treat nature leads us to form citizens with more responsible attitudes aimed at preserving both animal and plant species. Therefore, in addition to debating these topics in classes, we need to put them into practice, taking advantage of the idle and degraded physical spaces in the school. Combine the cultivation of plants and vegetation, improving sustainable practices and environmental recovery. With this, the sustainable landscaping project was developed, which envisages the recovery of areas through natural harmonization, with planting grass, fruit and native tree seedlings, medicinal plants, such as teas, spices, flowers, vegetation and foliage, thus making these environments more natural and sustainable.
                    </p>

                    <p class="palavras-chave">
                        <strong>Keywords:</strong>
                        Sustainability, Landscaping, Environmental Recovery.
                    </p>

                </section>


                <!-- VOLTAR -->

                <div class="voltar">

                    <a href="historico_projetos.php">
                        ← Voltar ao Histórico de Projetos
                    </a>

                </div>


            </div>

        </section>


    </main>


    <!-- FOOTER -->

    <?php include 'includes_site/footer.php'; ?>


</body>

</html>