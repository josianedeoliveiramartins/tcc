<?php
include("includes_painel/head.php");
include("includes_painel/header.php");
?>

<div class="container mt-4">

    <h1>Relatórios</h1>

    <form action="cad_relatorios.php" method="POST">

        <div class="row g-3">

            <div class="form-group col-12">
                <label for="titulo_relatorio">Título do Relatório</label>
                <input type="text" class="form-control" id="titulo_relatorio" name="titulo_relatorio" required>
            </div>

            <div class="form-group col-md-6">
                <label for="tipo_relatorio">Tipo de Relatório</label>
                <select class="form-select" id="tipo_relatorio" name="tipo_relatorio" required>
                    <option value="">Selecione</option>
                    <option value="Financeiro">Financeiro</option>
                    <option value="Atividades">Atividades</option>
                    <option value="Estatísticas">Estatísticas</option>
                </select>
            </div>

            <div class="form-group col-md-6">
                <label for="dt_relatorio">Data do Relatório</label>
                <input type="date" class="form-control" id="dt_relatorio" name="dt_relatorio" required>
            </div>

            <div class="form-group col-12">
                <label for="descricao_relatorio">Descrição</label>
                <textarea class="form-control" id="descricao_relatorio" name="descricao_relatorio" rows="5" required></textarea>
            </div>

            <div class="form-group col-12">
                <button type="submit" class="btn btn-success">
                    Cadastrar Relatório
                </button>
            </div>

        </div>

    </form>

</div>

<?php
include("includes_painel/footer.php");
?>