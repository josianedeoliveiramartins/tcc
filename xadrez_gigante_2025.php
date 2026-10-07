<?php
include('includes_site/head.php');
include('includes_site/header.php');
?>

<style>
    .pagina-xadrez-2025 {
        max-width: 1200px;
        margin: 40px auto;
        padding: 0 20px;
    }

    .titulo-principal {
        text-align: center;
        margin-bottom: 35px;
    }

    .titulo-principal h1 {
        font-size: 32px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .conteudo-xadrez {
        display: grid;
        grid-template-columns: 1fr 420px;
        gap: 40px;
        align-items: start;
    }

    .texto-xadrez {
        text-align: justify;
        line-height: 1.7;
        font-size: 17px;
    }

    .subtitulo {
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .instituicao {
        font-weight: bold;
        margin-bottom: 5px;
    }

    .turma {
        font-weight: bold;
        margin-bottom: 25px;
    }

    .texto-xadrez p {
        margin-bottom: 20px;
    }

    /* PALAVRAS-CHAVE */
    .palavras-chave {
        margin-top: 25px;
        font-weight: bold;
    }

    /* ÁREA DO JOGO */
    .area-jogar {
        margin-top: 30px;
        padding: 20px;
        border-radius: 8px;
        background-color: #f5f5f5;
        border-left: 4px solid #198754;
    }

    .area-jogar h3 {
        margin: 0 0 8px;
        font-size: 22px;
        font-weight: bold;
    }

    .area-jogar p {
        margin: 0 0 15px;
        line-height: 1.5;
    }

    /* BOTÃO */
    .botao-jogar {
        display: inline-block;
        padding: 10px 24px;
        background-color: #198754;
        color: #fff;
        text-decoration: none;
        border-radius: 6px;
        font-weight: bold;
        transition: 0.3s;
    }

    .botao-jogar:hover {
        background-color: #146c43;
        color: #fff;
    }

    /* FOTOS */
    .galeria-xadrez {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .espaco-foto {
        width: 100%;
        height: 260px;
        border: 2px dashed #aaa;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: #777;
        background-color: #f8f8f8;
        font-size: 16px;
    }

    @media (max-width: 900px) {
        .conteudo-xadrez {
            grid-template-columns: 1fr;
        }

        .galeria-xadrez {
            margin-top: 20px;
        }
    }

    @media (max-width: 600px) {
        .titulo-principal h1 {
            font-size: 26px;
        }

        .texto-xadrez {
            font-size: 16px;
        }

        .espaco-foto {
            height: 220px;
        }
    }
</style>


<div class="pagina-xadrez-2025">

    <div class="titulo-principal">
        <h1>XADREZ GIGANTE 2025</h1>
    </div>


    <div class="conteudo-xadrez">

        <!-- ESCRITAS -->
        <div class="texto-xadrez">

            <div class="subtitulo">
                XEQUE-MATE NO CONHECIMENTO: O xadrez como ferramenta para o raciocínio lógico e abstrato
            </div>

            <div class="instituicao">
                Colégio Estadual Dr. Dorvalino Luciano de Souza
            </div>

            <div class="turma">
                7° Ano CEEDO/2025
            </div>

            <p>
                O projeto "Xeque-Mate no Conhecimento: O Xadrez como Ferramenta para o
                Raciocínio Lógico e Abstrato" tem como propósito utilizar o xadrez como
                recurso pedagógico interdisciplinar, promovendo o desenvolvimento do
                pensamento lógico, crítico e abstrato entre os alunos do CEEDO, com foco
                especial na inclusão de estudantes com Transtorno do Espectro Autista (TEA).
                Desde 2022, a proposta baseia-se na sustentabilidade, na coleta de materiais
                reaproveitáveis e na construção de um tabuleiro gigante de xadrez.
            </p>

            <p>
                As ações incluem oficinas inclusivas, apoio do AEE, parcerias público-privadas
                e integração com eventos como as Paraolimpíadas Escolares e mostras regionais.
                A iniciativa promove a socialização, o raciocínio estratégico, a concentração,
                a criatividade e o desempenho estudantil, consolidando-se como uma prática
                inovadora e acessível para o fortalecimento da aprendizagem.
            </p>


            <!-- PALAVRAS-CHAVE -->
            <div class="palavras-chave">
                Palavras-chave: xadrez; raciocínio lógico; inclusão; autismo; sustentabilidade.
            </div>


            <!-- JOGO ON-LINE -->
            <div class="area-jogar">

                <h3>Jogue Xadrez On-line</h3>

                <p>
                    Teste suas habilidades e jogue uma partida de xadrez on-line.
                </p>

                <a
                    href="https://www.chess.com/pt-BR"
                    class="botao-jogar"
                    target="_blank"
                >
                    Jogue agora
                </a>

            </div>

        </div>


        <!-- FOTOS -->
        <div class="galeria-xadrez">

            <div class="espaco-foto">
                Espaço para foto 1
            </div>

            <div class="espaco-foto">
                Espaço para foto 2
            </div>

            <div class="espaco-foto">
                Espaço para foto 3
            </div>

            <div class="espaco-foto">
                Espaço para foto 4
            </div>

        </div>

    </div>

</div>


<?php
include('includes_site/footer.php');
?>