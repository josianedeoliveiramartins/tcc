<?php

include 'conexao.php';

// ============================================================
// LOCALIZAR IMAGENS DAS NOTÍCIAS
// ============================================================

function caminhoImagemNoticiaHome($nomeArquivo)
{
    $nomeArquivo = basename(
        str_replace('\\', '/', (string) $nomeArquivo)
    );

    if (
        $nomeArquivo === '' ||
        $nomeArquivo === '.' ||
        $nomeArquivo === '..'
    ) {
        return '';
    }

    $pastas = [
        __DIR__ . '/painel/uploads/',
        __DIR__ . '/painel/midias/noticias/'
    ];

    foreach ($pastas as $pasta) {

        $arquivo = $pasta . $nomeArquivo;

        if (is_file($arquivo)) {

            $caminhoRelativo = str_replace(
                '\\',
                '/',
                substr($arquivo, strlen(__DIR__) + 1)
            );

            return implode(
                '/',
                array_map(
                    'rawurlencode',
                    explode('/', $caminhoRelativo)
                )
            );
        }
    }

    return '';
}


// ============================================================
// BUSCAR AS 3 ÚLTIMAS NOTÍCIAS PUBLICADAS
// ============================================================

$sql_noticias = "SELECT
                    id_noticia,
                    titulo_noticia,
                    resumo_noticia,
                    conteudo_noticia,
                    imagem_noticia,
                    data_noticia
                 FROM noticias
                 WHERE status_noticia = 'Publicado'
                 ORDER BY data_noticia DESC, id_noticia DESC
                 LIMIT 3";

$resultado_noticias = mysqli_query($conexao, $sql_noticias);


// ============================================================
// FUNÇÃO PARA LIMITAR TEXTO
// ============================================================

function limitarTextoHome($texto, $limite = 120)
{
    $texto = trim(strip_tags($texto));

    if (mb_strlen($texto, 'UTF-8') <= $limite) {
        return $texto;
    }

    return mb_substr($texto, 0, $limite, 'UTF-8') . '...';
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Início | COOPCEEDO</title>

    <?php include 'includes_site/head.php'; ?>

    <style>

        /* =====================================================
           GERAL
        ===================================================== */

        .home {
            color: #333;
        }


        /* =====================================================
           BEM-VINDO
        ===================================================== */

        .hero-home {
            background: linear-gradient(
                135deg,
                #f8f9fa 0%,
                #fff9df 100%
            );

            padding: 90px 0;
        }

        .hero-conteudo {
            max-width: 750px;
        }

        .hero-pequeno {
            color: #9a7600;
            font-size: 0.9rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 15px;
        }

        .hero-home h1 {
            color: #2f2f2f;
            font-size: 3rem;
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 20px;
        }

        .hero-home h1 span {
            color: #b88a00;
        }

        .hero-home p {
            color: #666;
            font-size: 1.1rem;
            line-height: 1.7;
            margin-bottom: 30px;
            max-width: 650px;
        }


        /* =====================================================
           BOTÃO
        ===================================================== */

        .btn-home {
            display: inline-block;
            padding: 11px 22px;
            border-radius: 6px;
            background-color: #e8b600;
            color: #222;
            text-decoration: none;
            font-weight: 600;
            transition: 0.2s ease;
        }

        .btn-home:hover {
            background-color: #c99d00;
            color: #222;
            transform: translateY(-1px);
        }


        /* =====================================================
           SEÇÕES
        ===================================================== */

        .home-secao {
            padding: 70px 0;
        }

        .home-secao-cinza {
            background-color: #f7f8fa;
        }

        .titulo-secao {
            text-align: center;
            margin-bottom: 40px;
        }

        .titulo-secao h2 {
            color: #333;
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .titulo-secao p {
            color: #777;
            max-width: 650px;
            margin: 0 auto;
            line-height: 1.6;
        }


        /* =====================================================
           NOTÍCIAS
        ===================================================== */

        .noticias-home {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
        }

        .noticia-home-card {
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.06);
            display: flex;
            flex-direction: column;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .noticia-home-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 7px 20px rgba(0, 0, 0, 0.10);
        }

        .noticia-home-imagem {
            width: 100%;
            height: 200px;
            object-fit: cover;
            display: block;
        }

        .noticia-home-sem-imagem {
            width: 100%;
            height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #eeeeee;
            color: #999;
        }

        .noticia-home-conteudo {
            padding: 22px;
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .noticia-home-data {
            color: #999;
            font-size: 0.85rem;
            margin-bottom: 8px;
        }

        .noticia-home-card h3 {
            color: #333;
            font-size: 1.2rem;
            font-weight: 700;
            line-height: 1.4;
            margin-bottom: 12px;
        }

        .noticia-home-card p {
            color: #666;
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .noticia-home-link {
            margin-top: auto;
            color: #a67c00;
            text-decoration: none;
            font-weight: 600;
        }

        .noticia-home-link:hover {
            color: #795c00;
        }

        .botao-noticias {
            text-align: center;
            margin-top: 35px;
        }


        /* =====================================================
           SOBRE
        ===================================================== */

        .sobre-home {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            align-items: center;
        }

        .sobre-home h2 {
            color: #333;
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 18px;
        }

        .sobre-home p {
            color: #666;
            line-height: 1.8;
            margin-bottom: 15px;
        }

        .sobre-home-destaque {
            background-color: #fff;
            border-left: 4px solid #e8b600;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.05);
        }

        .sobre-home-destaque strong {
            display: block;
            color: #333;
            font-size: 1.1rem;
            margin-bottom: 8px;
        }

        .sobre-home-destaque span {
            color: #777;
            line-height: 1.6;
        }


        /* =====================================================
           FALE CONOSCO
        ===================================================== */

        .contato-home {
            background: #fff9df;
            border-radius: 12px;
            padding: 50px 30px;
            text-align: center;
        }

        .contato-home h2 {
            color: #333;
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .contato-home p {
            color: #666;
            max-width: 650px;
            margin: 0 auto 25px;
            line-height: 1.7;
        }


        /* =====================================================
           SEM NOTÍCIAS
        ===================================================== */

        .sem-noticias-home {
            grid-column: 1 / -1;
            background-color: #fff;
            padding: 40px;
            text-align: center;
            border-radius: 10px;
            color: #777;
        }


        /* =====================================================
           RESPONSIVO
        ===================================================== */

        @media (max-width: 992px) {

            .noticias-home {
                grid-template-columns: repeat(2, 1fr);
            }

            .sobre-home {
                grid-template-columns: 1fr;
            }

        }

        @media (max-width: 768px) {

            .hero-home {
                padding: 65px 0;
            }

            .hero-home h1 {
                font-size: 2.2rem;
            }

            .hero-home p {
                font-size: 1rem;
            }

            .noticias-home {
                grid-template-columns: 1fr;
            }

            .home-secao {
                padding: 55px 0;
            }

        }

    </style>

</head>

<body>

    <?php include 'includes_site/header.php'; ?>

    <main class="home">

        <!-- BEM-VINDO -->

        <section class="hero-home">

            <div class="container">

                <div class="hero-conteudo">

                    <div class="hero-pequeno">
                        Bem-vindo à COOPCEEDO
                    </div>

                    <h1>
                        Cooperação que
                        <span>transforma</span>.
                    </h1>

                    <p>
                        Um espaço para conhecer a COOPCEEDO,
                        acompanhar nossas novidades e ficar
                        sempre informado sobre nossas ações.
                    </p>

                    <a href="#sobre" class="btn-home">
                        Conheça a COOPCEEDO
                    </a>

                </div>

            </div>

        </section>


        <!-- ÚLTIMAS NOTÍCIAS -->

        <section class="home-secao home-secao-cinza">

            <div class="container">

                <div class="titulo-secao">

                    <h2>Últimas notícias</h2>

                    <p>
                        Confira as novidades, comunicados
                        e informações da COOPCEEDO.
                    </p>

                </div>

                <div class="noticias-home">

                    <?php if (
                        $resultado_noticias &&
                        mysqli_num_rows($resultado_noticias) > 0
                    ): ?>

                        <?php while (
                            $noticia = mysqli_fetch_assoc($resultado_noticias)
                        ): ?>

                            <article class="noticia-home-card">

                                <?php
                                $imagemNoticiaHome = caminhoImagemNoticiaHome(
                                    $noticia['imagem_noticia'] ?? ''
                                );
                                ?>

                                <?php if ($imagemNoticiaHome !== ''): ?>

                                    <img
                                        src="<?php echo htmlspecialchars(
                                            $imagemNoticiaHome,
                                            ENT_QUOTES,
                                            'UTF-8'
                                        ); ?>"
                                        alt="<?php echo htmlspecialchars(
                                            $noticia['titulo_noticia'],
                                            ENT_QUOTES,
                                            'UTF-8'
                                        ); ?>"
                                        class="noticia-home-imagem"
                                    >

                                <?php else: ?>

                                    <div class="noticia-home-sem-imagem">
                                        Sem imagem
                                    </div>

                                <?php endif; ?>

                                <div class="noticia-home-conteudo">

                                    <div class="noticia-home-data">
                                        <?php
                                        echo date(
                                            'd/m/Y',
                                            strtotime($noticia['data_noticia'])
                                        );
                                        ?>
                                    </div>

                                    <h3>
                                        <?php echo htmlspecialchars(
                                            $noticia['titulo_noticia'],
                                            ENT_QUOTES,
                                            'UTF-8'
                                        ); ?>
                                    </h3>

                                    <p>
                                        <?php

                                        $texto_noticia = '';

                                        if (!empty($noticia['resumo_noticia'])) {
                                            $texto_noticia = $noticia['resumo_noticia'];
                                        } else {
                                            $texto_noticia = $noticia['conteudo_noticia'];
                                        }

                                        echo htmlspecialchars(
                                            limitarTextoHome($texto_noticia, 120),
                                            ENT_QUOTES,
                                            'UTF-8'
                                        );

                                        ?>
                                    </p>

                                    <a
                                        href="noticia.php?id=<?php echo (int) $noticia['id_noticia']; ?>"
                                        class="noticia-home-link"
                                    >
                                        Ler notícia →
                                    </a>

                                </div>

                            </article>

                        <?php endwhile; ?>

                    <?php else: ?>

                        <div class="sem-noticias-home">

                            <h3>Nenhuma notícia publicada</h3>

                            <p>
                                No momento não existem
                                notícias disponíveis.
                            </p>

                        </div>

                    <?php endif; ?>

                </div>

                <?php
                /*
                | Exibe o botão se a consulta encontrou notícias.
                | Usa o número de linhas original, pois o resultado já foi percorrido.
                */

                if (
                    $resultado_noticias &&
                    mysqli_num_rows($resultado_noticias) > 0
                ):
                ?>

                    <div class="botao-noticias">

                        <a href="noticias.php" class="btn-home">
                            Ver todas as notícias
                        </a>

                    </div>

                <?php endif; ?>

            </div>

        </section>


        <!-- SOBRE A COOPCEEDO -->

        <section class="home-secao" id="sobre">

            <div class="container">

                <div class="sobre-home">

                    <div>

                        <h2>Sobre a COOPCEEDO</h2>

                        <p>
                            O projeto COOPCEEDO, iniciado em 2022, é uma iniciativa do CEEDO que integra educação, cooperativismo e sustentabilidade, envolvendo alunos e professores. Com apoio de instituições parceiras, busca promover a produção e comercialização de produtos da meliponicultura, o reaproveitamento de materiais e a educação ambiental. Além disso, desenvolve conhecimentos técnicos, financeiros e profissionais dos estudantes, incentivando a pesquisa, a consciência socioambiental e uma gestão sustentável e transparente da cooperativa.
                        </p>

                        <p>
                            Este espaço foi criado para aproximar
                            a cooperativa de seus cooperados e
                            da comunidade.
                        </p>

                    </div>

                    <div class="sobre-home-destaque">

                        <strong>
                            Cooperar é construir juntos.
                        </strong>

                        <span>
                            A união de pessoas em torno de
                            objetivos comuns torna possível
                            criar oportunidades e transformar
                            realidades.
                        </span>

                    </div>

                </div>

            </div>

        </section>


        <!-- FALE CONOSCO -->

        <section class="home-secao home-secao-cinza">

            <div class="container">

                <div class="contato-home">

                    <h2>Fale conosco</h2>

                    <p>
                        Tem alguma dúvida ou gostaria de saber
                        mais sobre a COOPCEEDO? Entre em contato
                        conosco.
                    </p>

                    <a href="contato.php" class="btn-home">
                        Entre em contato
                    </a>

                </div>

            </div>

        </section>

    </main>

    <?php include 'includes_site/footer.php'; ?>

</body>
</html>
```