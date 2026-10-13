
<?php
session_start();
require_once 'painel/conexao.php';

// Verifica se os campos foram preenchidos
if (
    !isset($_POST['email_operador'], $_POST['senha_operador']) ||
    trim($_POST['email_operador']) === '' ||
    $_POST['senha_operador'] === ''
) {
    $_SESSION['nao_autenticado'] = true;
    header('Location: login/index.php');
    exit;
}

$email_operador = trim($_POST['email_operador']);
$senha_digitada = $_POST['senha_operador'];

// Busca o operador usando consulta preparada
$sql = "SELECT id, nome_operador, email_operador, senha_operador
        FROM operadores
        WHERE email_operador = ?
        LIMIT 1";

$stmt = mysqli_prepare($conexao, $sql);

if (!$stmt) {
    error_log('Erro ao preparar consulta de login: ' . mysqli_error($conexao));
    http_response_code(500);
    exit('Não foi possível processar o login. Tente novamente.');
}

mysqli_stmt_bind_param($stmt, 's', $email_operador);
mysqli_stmt_execute($stmt);

mysqli_stmt_bind_result(
    $stmt,
    $id_operador,
    $nome_operador,
    $email_banco,
    $senha_salva
);

$operador_encontrado = mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);

$autenticado = false;

if ($operador_encontrado) {

    // Verifica senhas que já estão protegidas por hash
    if (password_verify($senha_digitada, $senha_salva)) {
        $autenticado = true;

    // Compatibilidade temporária com as senhas antigas em texto puro
    } elseif (hash_equals($senha_salva, $senha_digitada)) {

        $autenticado = true;

        // Converte a senha antiga em hash após um login válido
        $novo_hash = password_hash(
            $senha_digitada,
            PASSWORD_DEFAULT
        );

        $update = mysqli_prepare(
            $conexao,
            "UPDATE operadores SET senha_operador = ? WHERE id = ?"
        );

        if ($update) {
            mysqli_stmt_bind_param(
                $update,
                'si',
                $novo_hash,
                $id_operador
            );

            if (!mysqli_stmt_execute($update)) {
                error_log('Não foi possível atualizar o hash da senha.');
            }

            mysqli_stmt_close($update);
        } else {
            error_log('Não foi possível preparar a atualização da senha.');
        }
    }
}

if ($autenticado) {
    session_regenerate_id(true);

    $_SESSION['usuario'] = $email_banco;
    $_SESSION['nome_operador'] = $nome_operador;

    header('Location: painel/index.php');
    exit;
}

// Login inválido
$_SESSION['nao_autenticado'] = true;
header('Location: login/index.php');
exit;
