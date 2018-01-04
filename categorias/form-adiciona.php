<?php require_once "../header.php";
require_once "../login/logica-usuario.php";
verificaUsuarioLogado();
?>
<h2>Adicionar categoria</h2>
<div class="form-area">
    <form action="/categorias/adiciona.php" method="post">
        <div class="form-group">
            <label>Nome</label>
            <input class="form-control" type="text" name="nome" placeholder="Nome da categoria">
        </div>
        <button class="btn btn-primary btn-block" type="submit">Adicionar</button>
    </form>
</div>
<?php require_once "../footer.php" ?>