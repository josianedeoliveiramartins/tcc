<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title>INÍCIO | Terceirão 3K26 Play</title>
        <!--------------- HEAD ---------------->
        <?php include 'includes_painel/head.php'?>
        <!------------------------------------->
</head>
<body>
        <!--------------- HEADER ---------------->
        <?php include 'includes_painel/header.php'?>
        <!--------------------------------------->
        <br><br>
  <form id="formID" name="formID" action="cad_categorias.php" method="POST">
    <div class="container">
      <center>
        <h4>PREENCHA OS COMPOS ABAIXO PARA INSERIR UMA NOVA CATEGORIA!</h4>
      </center>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Nome da categoria</label>
        <input type="text" class="form-control" id="nome_categoria" name="nome_categoria" required placeholder="Ação">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Sobre a categoria</label>
        <textarea class="form-control" id="info_categoria" name="info_categoria" rows="3"></textarea>
      </div>
      <button type="submit" class="btn btn-primary btn-sm">Cadastrar</button>
      <button type="button" class="btn btn-secondary btn-sm">Cancelar</button>
    </div>
  </form>


  <br><br>

    <!---------------FOOTER---------------------->
    <?php include 'includes_painel/footer.php'?>
    <!------------------------------------------->
</body>
</html>