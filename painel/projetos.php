<?php
include("includes_painel/head.php");
include("includes_painel/header.php");
?>

<div class="container mt-4">

    <h1>Cadastro de Projetos</h1>

    <form action="cad_projetos.php" method="POST">

        <div class="row g-3">

            <div class="form-group col-12">
                <label for="nome_projeto">Nome do Projeto</label>
                <input type="text" class="form-control" id="nome_projeto" name="nome_projeto" required>
            </div>

            <div class="form-group col-md-6">
                <label for="ano_projeto">Ano do Projeto</label>
                <input type="number" class="form-control" id="ano_projeto" name="ano_projeto" required>
            </div>

            <div class="form-group col-md-6">
                <label for="tipo_projeto">Tipo de Projeto</label>
                <select class="form-select" id="tipo_projeto" name="tipo_projeto" required>
                    <option value="">Selecione</option>
                    <option value="Histórico">Histórico</option>
                    <option value="Novo Projeto">Novo Projeto</option>
                </select>
            </div>

            <div class="form-group col-12">
                <label for="descricao_projeto">Descrição do Projeto</label>
                <textarea class="form-control" id="descricao_projeto" name="descricao_projeto" rows="5" required></textarea>
            </div>

            <div class="form-group col-md-6">
                <label for="dt_cad_projeto">Data do Cadastro</label>
                <input type="date" class="form-control" id="dt_cad_projeto" name="dt_cad_projeto" required>
            </div>

            <div class="form-group col-12">
                <button type="submit" class="btn btn-success">
                    Cadastrar Projeto
                </button>
            </div>

        </div>

    </form>

</div>

<?php
include("includes_painel/footer.php");
?>