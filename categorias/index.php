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
                <td>Saldo</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($categorias as $categoria):?>
            <tr>
                <td><a href="/categorias/categoria.php?id=<?=$categoria->getId()?>"><?=$categoria->getNome()?></a></td>
                <td><?=$categoria->getSaldo()?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<?php require_once "../footer.php" ?>