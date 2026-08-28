<?php
include("includes_painel/head.php");
include("includes_painel/header.php");
?>

<div class="container mt-4">

    <h1>Cadastro de Colônias</h1>

    <form action="cad_colonias.php" method="POST">

        <div class="row g-3">

            <div class="form-group col-12">
                <label for="nome_colonia">Nome da Colônia</label>
                <input type="text" class="form-control" id="nome_colonia" name="nome_colonia" required>
            </div>

            <div class="form-group col-md-6">
                <label for="especie">Espécie</label>
                <input type="text" class="form-control" id="especie" name="especie" required>
            </div>

            <div class="form-group col-md-6">
                <label for="quantidade">Quantidade</label>
                <input type="number" class="form-control" id="quantidade" name="quantidade" required>
            </div>

            <div class="form-group col-12">
                <label for="localizacao">Localização</label>
                <input type="text" class="form-control" id="localizacao" name="localizacao" required>
            </div>

            <div class="form-group col-12">
                <label for="observacao">Observação</label>
                <textarea class="form-control" id="observacao" name="observacao" rows="4"></textarea>
            </div>

            <div class="form-group col-md-6">
                <label for="dt_cad_colonia">Data do Cadastro</label>
                <input type="date" class="form-control" id="dt_cad_colonia" name="dt_cad_colonia" required>
            </div>

            <div class="form-group col-12">
                <button type="submit" class="btn btn-success">
                    Cadastrar Colônia
                </button>
            </div>

        </div>

    </form>

</div>

<?php
include("includes_painel/footer.php");
?>