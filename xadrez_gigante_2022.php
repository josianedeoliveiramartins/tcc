<?php
include('includes_site/head.php');
include('includes_site/header.php');
?>

<style>

    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        font-family: "Times New Roman", Times, serif;
        color: #000;
        background-color: #fff;
    }


    /* =====================================================
       IMAGEM PRINCIPAL
    ====================================================== */

    .capa-xadrez {
        width: 100%;
        height: 355px;
        overflow: hidden;
    }

    .capa-xadrez img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }


    /* =====================================================
       CONTEÚDO
    ====================================================== */

    .conteudo-xadrez {
        max-width: 1500px;
        margin: 0 auto;
        padding: 45px 70px 70px 70px;
    }


    /* =====================================================
       ÁREA PRINCIPAL
    ====================================================== */

    .area-projeto {
        display: grid;
        grid-template-columns: minmax(0, 1fr) 330px;
        gap: 55px;
        align-items: start;
    }


    /* =====================================================
       TÍTULO PRINCIPAL
    ====================================================== */

    .titulo-xadrez {
        text-align: center;
        font-size: 52px;
        font-weight: bold;
        margin: 0 0 45px 0;
        line-height: 1.1;
    }


    /* =====================================================
       SUBTÍTULO
    ====================================================== */

    .subtitulo-xadrez {
        text-align: center;
        font-size: 25px;
        line-height: 1.35;
        margin: 0 auto 30px auto;
        max-width: 1050px;
    }


    /* =====================================================
       INSTITUIÇÃO
    ====================================================== */

    .instituicao {
        text-align: center;
        font-size: 20px;
        margin-bottom: 25px;
    }


    /* =====================================================
       AUTORES
    ====================================================== */

    .autores {
        text-align: center;
        font-size: 19px;
        line-height: 1.5;
        margin-bottom: 30px;
    }


    /* =====================================================
       TEXTO DO PROJETO
    ====================================================== */

    .texto-xadrez {
        font-size: 19px;
        line-height: 1.5;
        text-align: justify;
        text-indent: 1.25cm;
        margin: 0;
    }


    /* =====================================================
       PALAVRAS-CHAVE
    ====================================================== */

    .palavras-chave {
        margin-top: 30px;
        font-size: 19px;
        line-height: 1.5;
        text-align: left;
    }


    /* =====================================================
       GALERIA LATERAL
    ====================================================== */

    .galeria-lateral {
        display: flex;
        flex-direction: column;
        gap: 30px;
    }


    /* =====================================================
       ESPAÇOS PARA FOTOS
    ====================================================== */

    .espaco-imagem {
        width: 100%;
        height: 250px;

        border: 2px solid #d8d8d8;

        background-color: #f7f7f7;

        display: flex;
        align-items: center;
        justify-content: center;

        color: #999;

        font-family: Arial, Helvetica, sans-serif;
        font-size: 15px;

        text-align: center;
    }


    /* =====================================================
       PREMIAÇÃO
    ====================================================== */

    .premiacao {
        margin-top: 60px;
        padding-top: 35px;

        border-top: 2px solid #d6a500;

        text-align: center;
    }


    .premiacao h2 {
        font-size: 30px;
        margin: 0 0 25px 0;
    }


    /* =====================================================
       ESPAÇO PARA FOTO DA PREMIAÇÃO
    ====================================================== */

    .espaco-premiacao {
        width: 80%;
        max-width: 900px;

        height: 350px;

        margin: 0 auto;

        border: 2px solid #d8d8d8;

        background-color: #f7f7f7;

        display: flex;
        align-items: center;
        justify-content: center;

        color: #999;

        font-family: Arial, Helvetica, sans-serif;
        font-size: 16px;

        text-align: center;
    }


    /* =====================================================
       RESPONSIVO
    ====================================================== */

    @media (max-width: 1000px) {

        .conteudo-xadrez {
            padding: 35px 30px 60px 30px;
        }

        .area-projeto {
            grid-template-columns: 1fr;
        }

        .galeria-lateral {
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        .espaco-imagem {
            height: 280px;
        }

        .titulo-xadrez {
            font-size: 42px;
        }
    }


    @media (max-width: 600px) {

        .capa-xadrez {
            height: 230px;
        }

        .conteudo-xadrez {
            padding: 25px 18px 45px 18px;
        }

        .titulo-xadrez {
            font-size: 32px;
        }

        .subtitulo-xadrez {
            font-size: 21px;
        }

        .instituicao,
        .autores {
            font-size: 17px;
        }

        .texto-xadrez {
            font-size: 17px;
            text-align: left;
            text-indent: 0;
        }

        .galeria-lateral {
            display: grid;
            grid-template-columns: 1fr;
        }

        .espaco-imagem {
            height: 250px;
        }

        .espaco-premiacao {
            width: 100%;
            height: 280px;
        }

    }

</style>


<!-- =====================================================
     IMAGEM PRINCIPAL
====================================================== -->

<section class="capa-xadrez">

    <img
        src="https://lh7-us.googleusercontent.com/sitesv-images-rt/AMxu72sUZ2GszF-tEJfxFebJBcXX1BB9B8o86RWA4v_iJQaoHS4xmlDjUL3GUNYG7vpA4xW2_e0-ZFLnGpidLeujeO1W3rFGEWinRmOIG3RmT8wmlpoXDDBtRHGhVa55s3QWlTe1saWX0XtUGZuTiutWt3jnMbYpO2Bmg_CVQNd7_Y6liKVH6wcz5bVoxaDo-MTNZRQysGFYmV4pT2aYykLvAxTaZhUEegKRPF3bi1rO8no=w1280"
        alt="Xadrez Gigante 2022"
    >

</section>


<!-- =====================================================
     CONTEÚDO PRINCIPAL
====================================================== -->

<main class="conteudo-xadrez">

    <div class="area-projeto">


        <!-- =================================================
             TEXTO DO PROJETO
        ================================================== -->

        <div>

            <h1 class="titulo-xadrez">
                XADREZ GIGANTE 2022
            </h1>


            <h2 class="subtitulo-xadrez">

                <strong>
                    XADREZ NA ESCOLA:
                </strong>

                UMA NOVA ALTERNATIVA PEDAGÓGICA NO
                DESENVOLVIMENTO DE HABILIDADES E COMPETÊNCIAS

            </h2>


            <div class="instituicao">

                Colégio Estadual Dr. Dorvalino Luciano de Souza

            </div>


            <div class="autores">

                Andrei Borges Bianchetto;
                Luis Gustavo Moi;
                Maicon Perreira Rodrigues;
                Mariana Alberti;
                Alberto Moi;
                Silvania Bianchetto Fedrigo

            </div>


            <p class="texto-xadrez">

                Tendo o xadrez como uma atividade em classe ou extraclasse,
                como modalidade intelectual e esportiva, foram adquiridos
                importantes conhecimentos, que justificam sua existência
                milenar. Na matemática, tem base de linguagem técnica
                estimulando o pensamento organizado e habilidades cognitivas,
                fundamentais no desenvolvimento do indivíduo. Na modalidade
                esportivo-física, estimula a competição saudável, o trabalho
                em equipe, proporcionando prazer em sua prática. Esta atividade
                muitas vezes tem uma passagem rápida em aulas, pois, alguns
                professores não possuem suporte necessário para o seu
                desenvolvimento. O jogo de xadrez conquistou cultura e costumes
                pelo mundo, é impulsionador da imaginação, auxilia na capacidade
                de memorização, concentração e raciocínio lógico. A reutilização
                de materiais vem conquistando cada dia mais espaço, possibilitando
                a produção de novos produtos com custos mais baixos. Para o
                desenvolvimento deste projeto o design das peças é de madeira
                em tamanho médio de 50 cm, desenvolvidas para jogo de tabuleiro
                gigante. A base, denominada tabuleiro, é de lona plástica
                reaproveitada, medindo 16 m² a qual será dividida em 64
                quadriculados de tamanhos iguais, dividido em cores claras e
                escuras com pintura realizada com sobras de tinta, caracterizando
                o formato similar ao tabuleiro de xadrez. Este jogo gigante
                oferecerá novos aspectos visuais e culturais ao ambiente escolar,
                desafiando o envolvimento estudantil em horários extraclasse ou
                intervalos, aguçando a curiosidade e a tomada de decisões,
                respeitando regras e definições. Com isso, este projeto pretende
                mostrar para comunidade escolar que o xadrez não é apenas um jogo
                comum, mas sim, um método de firmamento intelectual e social do
                desenvolvimento humano, contribuindo assim, no aprendizado e no
                respeito ao meio ambiente.

            </p>


            <div class="palavras-chave">

                <strong>
                    Palavras chaves:
                </strong>

                Habilidade, Competência, Reaproveitamento, Concentração

            </div>

        </div>


        <!-- =================================================
             ESPAÇOS PARA AS FOTOS
        ================================================== -->

        <div class="galeria-lateral">

            <div class="espaco-imagem">
                Espaço para imagem 1
            </div>

            <div class="espaco-imagem">
                Espaço para imagem 2
            </div>

            <div class="espaco-imagem">
                Espaço para imagem 3
            </div>

            <div class="espaco-imagem">
                Espaço para imagem 4
            </div>

        </div>

    </div>


    <!-- =====================================================
         PREMIAÇÃO
    ====================================================== -->

    <section class="premiacao">

        <h2>
            Premiação na Mostra IFFAR
        </h2>

        <div class="espaco-premiacao">

            Espaço para foto da premiação

        </div>

    </section>


</main>