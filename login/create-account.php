<?php 
require_once "../autoload.php";
require_once "logica-usuario.php";

$usuario = UsuarioFactory::criaNovoUser($_POST);
$usuarioDao = new UsuarioDao();
$usuarioDao->verificaEmailEmUso($usuario->getEmail());
$usuarioDao->insere($usuario);
$_SESSION['success'] = "Conta criada com sucesso, efetue login para continuar";
header("Location: index.php");
die();