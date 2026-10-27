
<?php

require_once __DIR__ . '/verifica_login.php';
require_once __DIR__ . '/conexao.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/* Token de segurança dos formulários */
if (empty($_SESSION['token_operadores'])) {
    $_SESSION['token_operadores'] = bin2hex(random_bytes(32));
}

$mensagem = '';
$tipo_mensagem = 'success';
$editar = null;

/* Verifica se o formulário foi enviado */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (
        !isset($_POST['token']) ||
        !hash_equals($_SESSION['token_operadores'], $_POST['token'])
    ) {
        die('Solicitação inválida. Atualize a página e tente novamente.');
    }

    $acao = isset($_POST['acao']) ? $_POST['acao'] : '';

    /* CADASTRAR OU EDITAR */
    if ($acao === 'salvar') {

        $id = isset($_POST['id']) ? (int) $_POST['id'] : 0;

        $nome = trim($_POST['nome_operador'] ?? '');
        $email = trim($_POST['email_operador'] ?? '');
        $senha = $_POST['senha_operador'] ?? '';

        if ($nome === '' || $email === '') {
            $mensagem = 'Preencha o nome e o e-mail.';
            $tipo_mensagem = 'danger';

        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $mensagem = 'Informe um endereço de e-mail válido.';
            $tipo_mensagem = 'danger';

        } elseif ($id === 0 && $senha === '') {
            $mensagem = 'Informe uma senha para o novo usuário.';
            $tipo_mensagem = 'danger';

        } elseif ($senha !== '' && strlen($senha) < 8) {
            $mensagem = 'A senha deve possuir pelo menos 8 caracteres.';
            $tipo_mensagem = 'danger';

        } else {

            /* Verifica se o e-mail já pertence a outro operador */
            $sql_email = "SELECT id FROM operadores
                          WHERE email_operador = ? AND id <> ?";

            $stmt_email = mysqli_prepare($conexao, $sql_email);
            mysqli_stmt_bind_param($stmt_email, 'si', $email, $id);
            mysqli_stmt_execute($stmt_email);
            $resultado_email = mysqli_stmt_get_result($stmt_email);

            if (mysqli_num_rows($resultado_email) > 0) {

                $mensagem = 'Este e-mail já está cadastrado.';
                $tipo_mensagem = 'danger';

            } else {

                if ($id > 0) {

                    /* EDITAR USUÁRIO */
                    if ($senha !== '') {

                        $hash = password_hash($senha, PASSWORD_DEFAULT);

                        $sql = "UPDATE operadores
                                SET nome_operador = ?,
                                    email_operador = ?,
                                    senha_operador = ?
                                WHERE id = ?";

                        $stmt = mysqli_prepare($conexao, $sql);
                        mysqli_stmt_bind_param(
                            $stmt, 'sssi', $nome, $email, $hash, $id
                        );

                    } else {

                        /* Mantém a senha atual se o campo ficar vazio */
                        $sql = "UPDATE operadores
                                SET nome_operador = ?,
                                    email_operador = ?
                                WHERE id = ?";

                        $stmt = mysqli_prepare($conexao, $sql);
                        mysqli_stmt_bind_param(
                            $stmt, 'ssi', $nome, $email, $id
                        );
                    }

                    if (mysqli_stmt_execute($stmt)) {
                        header('Location: operadores.php?status=editado');
                        exit;
                    }

                    $mensagem = 'Não foi possível editar o usuário.';
                    $tipo_mensagem = 'danger';

                } else {

                    /* CADASTRAR USUÁRIO */
                    $hash = password_hash($senha, PASSWORD_DEFAULT);

                    $sql = "INSERT INTO operadores
                            (nome_operador, email_operador, senha_operador)
                            VALUES (?, ?, ?)";

                    $stmt = mysqli_prepare($conexao, $sql);
                    mysqli_stmt_bind_param(
                        $stmt, 'sss', $nome, $email, $hash
                    );

                    if (mysqli_stmt_execute($stmt)) {
                        header('Location: operadores.php?status=cadastrado');
                        exit;
                    }

                    $mensagem = 'Não foi possível cadastrar o usuário.';
                    $tipo_mensagem = 'danger';
                }
            }

            mysqli_stmt_close($stmt_email);
        }
    }

    /* EXCLUIR USUÁRIO */
    if ($acao === 'excluir') {

        $id_excluir = isset($_POST['id']) ? (int) $_POST['id'] : 0;

        if ($id_excluir > 0) {

            $sql = "DELETE FROM operadores WHERE id = ?";
            $stmt = mysqli_prepare($conexao, $sql);
            mysqli_stmt_bind_param($stmt, 'i', $id_excluir);

            if (mysqli_stmt_execute($stmt)) {
                header('Location: operadores.php?status=excluido');
                exit;
            }

            $mensagem = 'Não foi possível excluir o usuário.';
            $tipo_mensagem = 'danger';

        } else {
            $mensagem = 'Usuário inválido.';
            $tipo_mensagem = 'danger';
        }
    }
}

/* Mensagens após as operações */
if (isset($_GET['status'])) {
    $status = $_GET['status'];

    if ($status === 'cadastrado') {
        $mensagem = 'Usuário cadastrado com sucesso!';
    } elseif ($status === 'editado') {
        $mensagem = 'Usuário atualizado com sucesso!';
    } elseif ($status === 'excluido') {
        $mensagem = 'Usuário excluído com sucesso!';
    }
}

/* Busca os dados do usuário que será editado */
if (isset($_GET['editar'])) {

    $id_editar = (int) $_GET['editar'];

    $sql = "SELECT id, nome_operador, email_operador
            FROM operadores WHERE id = ?";

    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $id_editar);
    mysqli_stmt_execute($stmt);

    $resultado_editar = mysqli_stmt_get_result($stmt);
    $editar = mysqli_fetch_assoc($resultado_editar);

    if (!$editar) {
        $mensagem = 'Usuário não encontrado.';
        $tipo_mensagem = 'danger';
    }
}

/* Lista os usuários sem exibir suas senhas */
$sql_lista = "SELECT id, nome_operador, email_operador
              FROM operadores ORDER BY id ASC";

$resultado = mysqli_query($conexao, $sql_lista);

function h($valor) {
    return htmlspecialchars((string) $valor, ENT_QUOTES, 'UTF-8');
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Gerenciar operadores | CoopCEEDO</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>
        :root {
            --color-primary: #FFF8DC;
            --color-secondary: #F4C430;
            --color-light: #FAFAF5;
            --color-dark: #333333;
            --color-accent: #3A6EA5;
        }

        html, body {
            min-height: 100%;
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background-color: var(--color-light);
            color: var(--color-dark);
        }

        body {
            display: flex;
            flex-direction: column;
        }

        .navbar {
            background-color: var(--color-primary);
            border-bottom: 2px solid var(--color-secondary);
        }

        .navbar-brand {
            font-weight: bold;
            color: var(--color-dark);
        }

        main {
            flex: 1;
            padding: 35px 15px;
        }

        .page-title {
            font-weight: 700;
            margin-bottom: 6px;
        }

        .subtitle {
            color: #666;
            margin-bottom: 28px;
        }

        .card {
            border: 1px solid #eee4bd;
            border-radius: 12px;
            box-shadow: 0 4px 14px rgba(0, 0, 0, .04);
            margin-bottom: 25px;
        }

        .card-header {
            background-color: var(--color-primary);
            border-bottom: 2px solid var(--color-secondary);
            padding: 16px 20px;
            font-weight: 700;
        }

        .card-body {
            padding: 24px;
        }

        .form-label {
            font-weight: 600;
        }

        .form-control {
            padding: 11px 12px;
            border-radius: 7px;
        }

        .form-control:focus {
            border-color: var(--color-secondary);
            box-shadow: 0 0 0 .2rem rgba(244, 196, 48, .2);
        }

        .btn-principal {
            background-color: var(--color-secondary);
            border: 2px solid var(--color-secondary);
            color: #333;
            font-weight: 600;
        }

        .btn-principal:hover {
            background-color: #e5b51f;
            border-color: #e5b51f;
            color: #222;
        }

        .btn-editar {
            background-color: var(--color-primary);
            border: 1px solid var(--color-secondary);
            color: #333;
        }

        .btn-editar:hover {
            background-color: #fff0b5;
        }

        .table thead th {
            background-color: var(--color-primary);
            white-space: nowrap;
        }

        .table td, .table th {
            padding: 13px;
            vertical-align: middle;
        }

        .footer {
            margin-top: auto;
            text-align: center;
            padding: 16px;
            background: var(--color-primary);
            border-top: 2px solid var(--color-secondary);
        }

        @media (max-width: 576px) {
            main {
                padding: 22px 10px;
            }

            .card-body {
                padding: 16px;
            }
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            CoopCEEDO
        </a>

        <a href="index.php" class="btn btn-outline-dark btn-sm">
            Voltar ao painel
        </a>
    </div>
</nav>

<main>
    <div class="container">

        <h1 class="page-title">Gerenciamento de usuários</h1>

        <p class="subtitle">
            Cadastre, consulte, edite ou exclua os operadores do sistema.
        </p>

        <?php if ($mensagem !== ''): ?>
            <div class="alert alert-<?php echo h($tipo_mensagem); ?> alert-dismissible fade show">
                <?php echo h($mensagem); ?>
                <button type="button" class="btn-close"
                        data-bs-dismiss="alert" aria-label="Fechar"></button>
            </div>
        <?php endif; ?>

        <div class="card">

            <div class="card-header">
                <?php echo $editar ? 'Editar operador' : 'Cadastrar novo operador'; ?>
            </div>

            <div class="card-body">

                <form action="operadores.php" method="POST">

                    <input type="hidden" name="token"
                           value="<?php echo h($_SESSION['token_operadores']); ?>">

                    <input type="hidden" name="acao" value="salvar">

                    <input type="hidden" name="id"
                           value="<?php echo $editar ? (int) $editar['id'] : 0; ?>">

                    <div class="mb-3">
                        <label for="nome_operador" class="form-label">
                            Nome completo
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            id="nome_operador"
                            name="nome_operador"
                            maxlength="150"
                            value="<?php echo $editar ? h($editar['nome_operador']) : ''; ?>"
                            required
                        >
                    </div>

                    <div class="mb-3">
                        <label for="email_operador" class="form-label">
                            E-mail
                        </label>

                        <input
                            type="email"
                            class="form-control"
                            id="email_operador"
                            name="email_operador"
                            maxlength="254"
                            value="<?php echo $editar ? h($editar['email_operador']) : ''; ?>"
                            required
                        >
                    </div>

                    <div class="mb-3">
                        <label for="senha_operador" class="form-label">
                            Senha
                        </label>

                        <input
                            type="password"
                            class="form-control"
                            id="senha_operador"
                            name="senha_operador"
                            minlength="8"
                            autocomplete="new-password"
                            <?php echo $editar ? '' : 'required'; ?>
                        >

                        <div class="form-text">
                            <?php if ($editar): ?>
                                Deixe vazio para manter a senha atual.
                                Digite uma nova senha para alterá-la.
                            <?php else: ?>
                                A senha deve ter pelo menos 8 caracteres.
                            <?php endif; ?>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-principal">
                        <?php echo $editar ? 'Salvar alterações' : 'Cadastrar usuário'; ?>
                    </button>

                    <?php if ($editar): ?>
                        <a href="operadores.php" class="btn btn-outline-secondary">
                            Cancelar edição
                        </a>
                    <?php endif; ?>

                </form>
            </div>
        </div>

        <div class="card">

            <div class="card-header">
                Usuários cadastrados
            </div>

            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-hover align-middle">

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Ações</th>
                            </tr>
                        </thead>

                        <tbody>

                        <?php if ($resultado && mysqli_num_rows($resultado) > 0): ?>

                            <?php while ($usuario = mysqli_fetch_assoc($resultado)): ?>

                                <tr>
                                    <td><?php echo (int) $usuario['id']; ?></td>

                                    <td><?php echo h($usuario['nome_operador']); ?></td>

                                    <td><?php echo h($usuario['email_operador']); ?></td>

                                    <td>
                                        <div class="d-flex flex-wrap gap-2">

                                            <a
                                                href="operadores.php?editar=<?php echo (int) $usuario['id']; ?>"
                                                class="btn btn-sm btn-editar"
                                            >
                                                Editar
                                            </a>

                                            <form
                                                action="operadores.php"
                                                method="POST"
                                                onsubmit="return confirm('Tem certeza de que deseja excluir este usuário?');"
                                            >
                                                <input type="hidden" name="token"
                                                       value="<?php echo h($_SESSION['token_operadores']); ?>">

                                                <input type="hidden" name="acao"
                                                       value="excluir">

                                                <input type="hidden" name="id"
                                                       value="<?php echo (int) $usuario['id']; ?>">

                                                <button type="submit"
                                                        class="btn btn-sm btn-outline-danger">
                                                    Excluir
                                                </button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>

                            <?php endwhile; ?>

                        <?php else: ?>

                            <tr>
                                <td colspan="4" class="text-center">
                                    Nenhum usuário cadastrado.
                                </td>
                            </tr>

                        <?php endif; ?>

                        </tbody>

                    </table>
                </div>

            </div>
        </div>

    </div>
</main>

<footer class="footer">
    <div>Cooperativa CEEDO</div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
