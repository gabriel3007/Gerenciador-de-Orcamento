<?php require_once "../header.php";
require_once "../autoload.php";
require_once "../login/logica-usuario.php";
verificaUsuarioLogado();

$categoriaDao = new CategoriaDao();
$id = $_GET['id'];
$categoria = $categoriaDao->buscaCategoria($id);    
?>
<h2>Editar categoria</h2>
<div class="form-area">
    <form action="/categorias/edita.php" method="post">
        <div class="form-group">
            <label>Nome</label>
            <input class="form-control" type="text" name="nome" placeholder="Nome da categoria" value="<?=$categoria->getNome()?>">
        </div>
            <input type="hidden" name="id" value="<?=$id?>">
        <button class="btn btn-primary btn-block" type="submit">Editar</button>
    </form>
</div>
<?php require_once "../footer.php" ?>