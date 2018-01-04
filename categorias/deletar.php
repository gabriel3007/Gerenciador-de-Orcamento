<?php require_once "../autoload.php";
require_once "../login/logica-usuario.php";
verificaUsuarioLogado();

$categoriaDao = new CategoriaDao();
$id = $_POST['id'];
$categoriaDao->deleta($id);
header("Location: index.php");
die();