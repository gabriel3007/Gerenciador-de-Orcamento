<?php require_once "../autoload.php";
require_once "../login/logica-usuario.php";
verificaUsuarioLogado();

$categoria = new Categoria($_POST['nome'], $_POST['id']);
$categoriaDao = new CategoriaDao();
  
if($categoriaDao->ehValidoEditarMesmoNome($categoria) || $categoriaDao->existe($categoria->getNome(), 'nome')){
    $categoriaDao->edita($categoria);
    header("Location: /categorias");
    die();
}else{
    $_SESSION['danger'] = "Erro ao editar categorias";
    header("Location: /categorias");
    die();
}
