<?php
session_start();
$erro = isset($_SESSION['nao_autenticado']) && $_SESSION['nao_autenticado'] === true;
if ($erro) {
    unset($_SESSION['nao_autenticado']);
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <title>Login</title>
  </head>
  <body>
  
  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('images/bg_1.jpg');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <h3>Página Administrativa</h3>

            <!-- Mensagem de erro -->
            <?php if ($erro): ?>
              <div class="alert alert-danger text-center" role="alert">
                Usuário ou senha inválidos. Verifique e tente novamente.
              </div>
            <?php endif; ?>

            <!-- Formulário de login -->
            <form class="login100-form validate-form" action="../autentica.php" method="POST">
              <div class="form-group first">
                <label for="email_operador">Usuário</label>
                <input type="text" class="form-control" id="email_operador" name="email_operador" required placeholder="your-email@gmail.com">
              </div>
              <div class="form-group last mb-3">
                <label for="senha_operador">Senha</label>
                <input type="password" class="form-control" id="senha_operador" name="senha_operador" required placeholder="Your Password">
              </div>
              
              <div class="text-center p-t-12">
                <span class="txt1">Para voltar</span>
                <a class="txt2" href="../">clique aqui</a>
              </div>

              <input type="submit" value="Entrar" class="btn btn-block btn-primary">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
    
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
