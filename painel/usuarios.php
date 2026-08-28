<?php
include("includes_painel/head.php");
include("includes_painel/header.php");
?>

<div class="container mt-4">

    <h1>Cadastro de Usuários</h1>

    <form action="cad_usuarios.php" method="POST">

        <div class="row g-3">

            <div class="form-group col-12">
                <label for="nome_usuario">Nome do Usuário</label>
                <input type="text" class="form-control" id="nome_usuario" name="nome_usuario" required>
            </div>

            <div class="form-group col-md-6">
                <label for="email_usuario">E-mail</label>
                <input type="email" class="form-control" id="email_usuario" name="email_usuario" required>
            </div>

            <div class="form-group col-md-6">
                <label for="tipo_usuario">Tipo de Usuário</label>
                <select class="form-select" id="tipo_usuario" name="tipo_usuario" required>
                    <option value="">Selecione</option>
                    <option value="Administrador">Administrador</option>
                    <option value="Membro">Membro</option>
                    <option value="Colaborador">Colaborador</option>
                </select>
            </div>

            <div class="form-group col-md-6">
                <label for="senha_usuario">Senha</label>
                <input type="password" class="form-control" id="senha_usuario" name="senha_usuario" required>
            </div>

            <div class="form-group col-md-6">
                <label for="dt_cad_usuario">Data do Cadastro</label>
                <input type="date" class="form-control" id="dt_cad_usuario" name="dt_cad_usuario" required>
            </div>

            <div class="form-group col-12">
                <button type="submit" class="btn btn-success">
                    Cadastrar Usuário
                </button>
            </div>

        </div>

    </form>

</div>

<?php
include("includes_painel/footer.php");
?>