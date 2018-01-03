<?php
session_start();

function loga(Usuario $usuario){
    $_SESSION['usuario_logado'] = serialize($usuario);
}
function usuarioLogado(){
    $usuario = unserialize($_SESSION['usuario_logado']);
    return $usuario;
}
function usuarioEstaLogado(){
    return isset($_SESSION['usuario_logado']);
}
function verificaUsuarioLogado(){
    if (!usuarioEstaLogado()){
        $_SESSION['danger'] = "Você não tem acesso a essa funcionalidade!!!";
        header("Location: /");
        die();
    }
}
function logout(){
    session_destroy();
    session_start();
}
