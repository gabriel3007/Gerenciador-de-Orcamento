<?php 
require_once "../autoload.php";
require_once "logica-usuario.php";

$usuario = UsuarioFactory::criaNovoUser($_POST);
$usuarioDao = new UsuarioDao();
if($usuarioDao->existe($usuario->getEmail(), 'email')){
    $usuarioDao->insere($usuario);
    $_SESSION['success'] = "Conta criada com sucesso, efetue login para continuar";
    header("Location: index.php");
    die();
}else{
    header("Location: /login/form-create-account.php");
    $_SESSION['danger'] = "O email já está em uso!!!";
    die();
}