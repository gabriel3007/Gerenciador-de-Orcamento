<?php require_once "../header.php";
require_once "../autoload.php";
require_once "../login/logica-usuario.php";
verificaUsuarioLogado();

$usuario = usuarioLogado();
$categoriaDao = new CategoriaDao();
$categorias = $categoriaDao->busca('usuario_id', $usuario->getId());
?>
<a class="btn btn-primary" href="/categorias/form-adiciona.php">Adicionar Categoria</a>
<div class="table-area">
    <table class="table table-hover">
        <thead>
            <tr>
                <td>Categoria</td>
                <td>---</td>
                <td>---</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($categorias as $categoria):?>
            <tr>
                <td><?=$categoria->getNome()?></td>
                <td><a class="btn btn-default btn-block" href="/categorias/form-editar.php?id=<?=$categoria->getId()?>">Editar</a></td>
                <td>
                    <form action="/categorias/deletar.php" method="post">
                        <input type="hidden" name="id" value="<?=$categoria->getId()?>">
                        <button class="btn btn-danger btn-block" type="submit">Deletar</button>
                    </form>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<?php require_once "../footer.php" ?>