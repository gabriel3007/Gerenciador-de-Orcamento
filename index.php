<?php require_once "header.php";
require_once "autoload.php";

if(usuarioEstaLogado()):
    $usuario = usuarioLogado();?>
    <h2>Seja bem vindo <?=$usuario->getNome()?></h2>
<?php endif ?>

<?php require_once "footer.php"?>