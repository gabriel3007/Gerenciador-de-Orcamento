<?php require_once "../autoload.php";
require_once "logica-usuario.php";

$usuarioDao = new UsuarioDao();
$usuario = $usuarioDao->buscaUsuario($_POST['email'], $_POST['senha']);
if (is_null($usuario)){
    header("Location: index.php");
    $_SESSION['danger'] = "Verifique os dados inseridos";
    die();
}else{
    loga($usuario);
    header("Location: /index.php");
    die();
}