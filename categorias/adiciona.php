<?php require_once "../autoload.php";
require_once "../login/logica-usuario.php"; 
verificaUsuarioLogado();

$usuario = usuarioLogado();
$categoria = new Categoria($_POST['nome']);
$categoria->verificaNome();

$categoriaDao = new CategoriaDao();

if($categoriaDao->existe($categoria->getNome(), 'nome')){
    $categoriaDao->insere($categoria, $usuario);
    $_SESSION['sucess'] = "Categoria adicionada com sucesso";
    header("location: /categorias");
    die();
}else{
    $_SESSION['danger'] = "Categoria adicionada com sucesso";
    header("location: /categorias/form-adiciona.php");
    die();
}