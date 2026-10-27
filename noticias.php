<?php

include 'conexao.php';

// ============================================================
// FUNÇÃO PARA LOCALIZAR AS IMAGENS DAS NOTÍCIAS
// ============================================================

function caminhoImagemNoticiaPublica($nomeArquivo)
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
// BUSCAR NOTÍCIAS PUBLICADAS
// ============================================================

$sql = "SELECT
            id_noticia,
            titulo_noticia,
            resumo_noticia,
            conteudo_noticia,
            imagem_noticia,
            data_noticia
        FROM noticias
        WHERE status_noticia = 'Publicado'
        ORDER BY data_noticia DESC, id_noticia DESC";

$resultado = mysqli_query($conexao, $sql);

if (!$resultado) {
    die("Erro na consulta das notícias.");
}


// ============================================================
// FUNÇÃO PARA LIMITAR TEXTO
// ============================================================

function limitarTexto($texto, $limite = 150)
{
    $texto = trim(strip_tags($texto));

    if (strlen($texto) <= $limite) {
        return $texto;
    }

    return substr($texto, 0, $limite) . '...';
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Notícias | COOPCEEDO</title>

    <?php include 'includes_site/head.php'; ?>

    <style>

        .pagina-noticias {
            background: #f7f8fa;
            padding: 60px 0 80px;
        }

        .noticias-header {
            text-align: center;
            margin-bottom: 45px;
        }

        .noticias-header h1 {
            color: #333;
            font-size: 2.4rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .noticias-header p {
            color: #777;
            font-size: 1.05rem;
            max-width: 700px;
            margin: 0 auto;
        }

        .noticia-destaque {
            background: #fff;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 4px 18px rgba(0,0,0,.07);
            margin-bottom: 45px;
        }

        .noticia-destaque-imagem {
            width: 100%;
            height: 380px;
            object-fit: cover;
            display: block;
        }

        .noticia-destaque-sem-imagem {
            width: 100%;
            height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #eeeeee;
            color: #999;
        }

        .noticia-destaque-conteudo {
            padding: 30px;
        }

        .noticia-data {
            color: #888;
            font-size: .9rem;
            margin-bottom: 10px;
        }

        .noticia-destaque h2 {
            color: #222;
            font-size: 1.9rem;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .noticia-destaque p {
            color: #666;
            line-height: 1.7;
            margin-bottom: 22px;
        }

        .titulo-outras {
            color: #333;
            font-size: 1.6rem;
            font-weight: 700;
            margin-bottom: 25px;
        }

        .noticias-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
        }

        .noticia-card {
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 3px 15px rgba(0,0,0,.06);
            transition: transform .2s ease, box-shadow .2s ease;
            display: flex;
            flex-direction: column;
        }

        .noticia-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,.10);
        }

        .noticia-card-imagem {
            width: 100%;
            height: 210px;
            object-fit: cover;
            display: block;
        }

        .noticia-card-sem-imagem {
            width: 100%;
            height: 210px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #eeeeee;
            color: #999;
        }

        .noticia-card-conteudo {
            padding: 22px;
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .noticia-card-data {
            color: #999;
            font-size: .85rem;
            margin-bottom: 8px;
        }

        .noticia-card h3 {
            color: #333;
            font-size: 1.2rem;
            font-weight: 700;
            line-height: 1.4;
            margin-bottom: 12px;
        }

        .noticia-card p {
            color: #666;
            font-size: .95rem;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .noticia-card-botao {
            margin-top: auto;
        }

        .btn-noticia {
            display: inline-block;
            padding: 9px 18px;
            border-radius: 6px;
            background: #ffc107;
            color: #222;
            text-decoration: none;
            font-weight: 600;
            transition: .2s;
        }

        .btn-noticia:hover {
            background: #e0a800;
            color: #222;
        }

        .sem-noticias {
            background: #fff;
            border-radius: 12px;
            padding: 50px 30px;
            text-align: center;
            color: #777;
            box-shadow: 0 3px 15px rgba(0,0,0,.05);
        }

        @media (max-width: 992px) {
            .noticias-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {

            .pagina-noticias {
                padding: 40px 0 60px;
            }

            .noticias-header h1 {
                font-size: 2rem;
            }

            .noticia-destaque-imagem {
                height: 280px;
            }

            .noticia-destaque-conteudo {
                padding: 22px;
            }

            .noticia-destaque h2 {
                font-size: 1.5rem;
            }

            .noticias-grid {
                grid-template-columns: 1fr;
            }
        }

    </style>

</head>

<body>

<?php include 'includes_site/header.php'; ?>

<main class="pagina-noticias">

    <div class="container">

        <div class="noticias-header">

            <h1>Notícias e Publicações</h1>

            <p>
                Acompanhe as novidades, comunicados e
                informações da COOPCEEDO.
            </p>

        </div>

        <?php if (mysqli_num_rows($resultado) > 0): ?>

            <?php $destaque = mysqli_fetch_assoc($resultado); ?>

            <!-- NOTÍCIA DESTAQUE -->

            <article class="noticia-destaque">

                <?php
                $imagemDestaque = caminhoImagemNoticiaPublica(
                    $destaque['imagem_noticia']
                );
                ?>

                <?php if ($imagemDestaque !== ''): ?>

                    <img
                        src="<?php echo htmlspecialchars(
                            $imagemDestaque,
                            ENT_QUOTES,
                            'UTF-8'
                        ); ?>"
                        alt="<?php echo htmlspecialchars(
                            $destaque['titulo_noticia'],
                            ENT_QUOTES,
                            'UTF-8'
                        ); ?>"
                        class="noticia-destaque-imagem"
                    >

                <?php else: ?>

                    <div class="noticia-destaque-sem-imagem">
                        Sem imagem
                    </div>

                <?php endif; ?>

                <div class="noticia-destaque-conteudo">

                    <div class="noticia-data">
                        <?php
                        echo date(
                            'd/m/Y',
                            strtotime($destaque['data_noticia'])
                        );
                        ?>
                    </div>

                    <h2>
                        <?php echo htmlspecialchars(
                            $destaque['titulo_noticia'],
                            ENT_QUOTES,
                            'UTF-8'
                        ); ?>
                    </h2>

                    <p>
                        <?php

                        if (!empty($destaque['resumo_noticia'])) {

                            echo htmlspecialchars(
                                $destaque['resumo_noticia'],
                                ENT_QUOTES,
                                'UTF-8'
                            );

                        } else {

                            echo htmlspecialchars(
                                limitarTexto(
                                    $destaque['conteudo_noticia'],
                                    220
                                ),
                                ENT_QUOTES,
                                'UTF-8'
                            );
                        }

                        ?>
                    </p>

                    <a
                        href="noticia.php?id=<?php echo (int) $destaque['id_noticia']; ?>"
                        class="btn-noticia"
                    >
                        Ler notícia
                    </a>

                </div>

            </article>

            <!-- OUTRAS NOTÍCIAS -->

            <?php if (mysqli_num_rows($resultado) > 0): ?>

                <h2 class="titulo-outras">Outras notícias</h2>

                <div class="noticias-grid">

                    <?php while ($item = mysqli_fetch_assoc($resultado)): ?>

                        <article class="noticia-card">

                            <?php
                            $imagemCard = caminhoImagemNoticiaPublica(
                                $item['imagem_noticia']
                            );
                            ?>

                            <?php if ($imagemCard !== ''): ?>

                                <img
                                    src="<?php echo htmlspecialchars(
                                        $imagemCard,
                                        ENT_QUOTES,
                                        'UTF-8'
                                    ); ?>"
                                    alt="<?php echo htmlspecialchars(
                                        $item['titulo_noticia'],
                                        ENT_QUOTES,
                                        'UTF-8'
                                    ); ?>"
                                    class="noticia-card-imagem"
                                >

                            <?php else: ?>

                                <div class="noticia-card-sem-imagem">
                                    Sem imagem
                                </div>

                            <?php endif; ?>

                            <div class="noticia-card-conteudo">

                                <div class="noticia-card-data">
                                    <?php
                                    echo date(
                                        'd/m/Y',
                                        strtotime($item['data_noticia'])
                                    );
                                    ?>
                                </div>

                                <h3>
                                    <?php echo htmlspecialchars(
                                        $item['titulo_noticia'],
                                        ENT_QUOTES,
                                        'UTF-8'
                                    ); ?>
                                </h3>

                                <p>
                                    <?php

                                    if (!empty($item['resumo_noticia'])) {

                                        echo htmlspecialchars(
                                            limitarTexto(
                                                $item['resumo_noticia'],
                                                130
                                            ),
                                            ENT_QUOTES,
                                            'UTF-8'
                                        );

                                    } else {

                                        echo htmlspecialchars(
                                            limitarTexto(
                                                $item['conteudo_noticia'],
                                                130
                                            ),
                                            ENT_QUOTES,
                                            'UTF-8'
                                        );
                                    }

                                    ?>
                                </p>

                                <div class="noticia-card-botao">

                                    <a
                                        href="noticia.php?id=<?php echo (int) $item['id_noticia']; ?>"
                                        class="btn-noticia"
                                    >
                                        Ler notícia
                                    </a>

                                </div>

                            </div>

                        </article>

                    <?php endwhile; ?>

                </div>

            <?php endif; ?>

        <?php else: ?>

            <div class="sem-noticias">

                <h3>Nenhuma notícia publicada</h3>

                <p>
                    No momento não existem notícias disponíveis.
                </p>

            </div>

        <?php endif; ?>

    </div>

</main>

<?php include 'includes_site/footer.php'; ?>

</body>
</html>
```