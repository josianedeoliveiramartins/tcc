
<?php
$hash = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $senha = $_POST['senha'] ?? '';

    if ($senha !== '') {
        $hash = password_hash($senha, PASSWORD_DEFAULT);
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Gerar hash da senha</title>
</head>
<body>
    <h2>Gerar hash da nova senha</h2>

    <form method="POST">
        <label for="senha">Digite sua nova senha:</label>
        <input type="password" id="senha" name="senha" required>
        <button type="submit">Gerar hash</button>
    </form>

    <?php if ($hash !== ''): ?>
        <p>Copie o hash abaixo:</p>
        <textarea rows="4" cols="70" readonly><?php
            echo htmlspecialchars($hash, ENT_QUOTES, 'UTF-8');
        ?></textarea>
    <?php endif; ?>
</body>
</html>
