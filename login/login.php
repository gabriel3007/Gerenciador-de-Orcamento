<?php require_once "../autoload.php";
require_once "logica-usuario.php";
require_once "../dinheiro/logica-orcamento.php";

$usuarioDao = new UsuarioDao();
$usuario = $usuarioDao->buscaUsuario($_POST['email'], $_POST['senha']);
if (is_null($usuario)){
    header("Location: index.php");
    $_SESSION['danger'] = "Verifique os dados inseridos";
    die();
}else{
    loga($usuario);
    geraOrcamento($usuario);
    header("Location: /index.php");
    die();
}