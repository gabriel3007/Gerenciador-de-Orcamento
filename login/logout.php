<?php require_once "../autoload.php";
require_once "logica-usuario.php";

verificaUsuarioLogado();
logout();
header("Location: /");
die();
