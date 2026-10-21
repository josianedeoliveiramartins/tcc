```php
<?php

include 'conexao.php';


// ============================================================
// FUNÇÃO PARA LOCALIZAR A IMAGEM
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
// VERIFICA O ID
// ============================================================

if (
    !isset($_GET['id']) ||
    !is_numeric($_GET['id']) ||
    (int) $_GET['id'] <= 0
) {
    header('Location: noticias.php');
    exit;
}

$id = (int) $_GET['id'];


// ============================================================
// BUSCA A NOTÍCIA
// ============================================================

$sql = "SELECT
            id_noticia,
            titulo_noticia,
            resumo_noticia,
            conteudo_noticia,
            imagem_noticia,
            data_noticia
        FROM noticias
        WHERE id_noticia = ?
        AND status_noticia = 'Publicado'";

$stmt = mysqli_prepare($conexao, $sql);

if (!$stmt) {
    header('Location: noticias.php');
    exit;
}

mysqli_stmt_bind_param($stmt, "i", $id);

if (!mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    header('Location: noticias.php');
    exit;
}

$resultado = mysqli_stmt_get_result($stmt);

if (!$resultado || mysqli_num_rows($resultado) === 0) {
    mysqli_stmt_close($stmt);
    header('Location: noticias.php');
    exit;
}

$noticia = mysqli_fetch_assoc($resultado);

mysqli_stmt_close($stmt);


// ============================================================
// CAMINHO DA IMAGEM DA NOTÍCIA
// ============================================================

$imagemNoticia = caminhoImagemNoticiaPublica(
    $noticia['imagem_noticia'] ?? ''
);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title><?php
        echo htmlspecialchars(
            $noticia['titulo_noticia'],
            ENT_QUOTES,
            'UTF-8'
        );
    ?> | COOPCEEDO</title>

    <?php include 'includes_site/head.php'; ?>

    <style>

        /* =====================================================
           PÁGINA
        ===================================================== */

        .pagina-noticia {
            background-color: #f7f8fa;
            padding: 60px 0 80px;
        }


        /* =====================================================
           ARTIGO
        ===================================================== */

        .noticia-completa {
            max-width: 900px;
            margin: 0 auto;
            background: #fff;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.07);
        }


        /* =====================================================
           IMAGEM
        ===================================================== */

        .noticia-completa-imagem {
            width: 100%;
            max-height: 500px;
            object-fit: cover;
            display: block;
        }

        .noticia-sem-imagem {
            width: 100%;
            min-height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #eeeeee;
            color: #777;
        }


        /* =====================================================
           CONTEÚDO
        ===================================================== */

        .noticia-completa-conteudo {
            padding: 40px;
        }

        .noticia-completa-data {
            color: #888;
            font-size: 0.9rem;
            margin-bottom: 12px;
        }

        .noticia-completa h1 {
            color: #222;
            font-size: 2.3rem;
            line-height: 1.25;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .noticia-completa-resumo {
            color: #666;
            font-size: 1.1rem;
            line-height: 1.7;
            padding-bottom: 25px;
            margin-bottom: 25px;
            border-bottom: 1px solid #eee;
        }

        .noticia-completa-texto {
            color: #444;
            font-size: 1.05rem;
            line-height: 1.9;
            white-space: pre-line;
            overflow-wrap: anywhere;
        }


        /* =====================================================
           BOTÃO VOLTAR
        ===================================================== */

        .btn-voltar-noticias {
            display: inline-block;
            margin-bottom: 25px;
            color: #555;
            text-decoration: none;
            font-weight: 600;
        }

        .btn-voltar-noticias:hover {
            color: #d39e00;
        }


        /* =====================================================
           RESPONSIVO
        ===================================================== */

        @media (max-width: 768px) {

            .pagina-noticia {
                padding: 30px 0 50px;
            }

            .noticia-completa-conteudo {
                padding: 25px;
            }

            .noticia-completa h1 {
                font-size: 1.8rem;
            }

            .noticia-completa-imagem {
                max-height: 300px;
            }
        }

    </style>

</head>

<body>

    <?php include 'includes_site/header.php'; ?>

    <main class="pagina-noticia">

        <div class="container">

            <a
                href="noticias.php"
                class="btn-voltar-noticias"
            >
                ← Voltar para notícias
            </a>

            <article class="noticia-completa">

                <!-- IMAGEM -->

                <?php if ($imagemNoticia !== ''): ?>

                    <img
                        src="<?php echo htmlspecialchars(
                            $imagemNoticia,
                            ENT_QUOTES,
                            'UTF-8'
                        ); ?>"
                        alt="<?php echo htmlspecialchars(
                            $noticia['titulo_noticia'],
                            ENT_QUOTES,
                            'UTF-8'
                        ); ?>"
                        class="noticia-completa-imagem"
                    >

                <?php elseif (!empty($noticia['imagem_noticia'])): ?>

                    <div class="noticia-sem-imagem">
                        A imagem desta notícia não foi encontrada.
                    </div>

                <?php endif; ?>


                <!-- CONTEÚDO -->

                <div class="noticia-completa-conteudo">

                    <div class="noticia-completa-data">
                        <?php
                        echo date(
                            'd/m/Y',
                            strtotime($noticia['data_noticia'])
                        );
                        ?>
                    </div>

                    <h1>
                        <?php echo htmlspecialchars(
                            $noticia['titulo_noticia'],
                            ENT_QUOTES,
                            'UTF-8'
                        ); ?>
                    </h1>

                    <?php if (!empty($noticia['resumo_noticia'])): ?>

                        <div class="noticia-completa-resumo">
                            <?php echo htmlspecialchars(
                                $noticia['resumo_noticia'],
                                ENT_QUOTES,
                                'UTF-8'
                            ); ?>
                        </div>

                    <?php endif; ?>

                    <div class="noticia-completa-texto">
                        <?php echo htmlspecialchars(
                            $noticia['conteudo_noticia'],
                            ENT_QUOTES,
                            'UTF-8'
                        ); ?>
                    </div>

                </div>

            </article>

        </div>

    </main>

    <?php include 'includes_site/footer.php'; ?>

</body>
</html>
```