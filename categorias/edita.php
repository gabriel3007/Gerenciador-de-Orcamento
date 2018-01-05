<?php require_once "../autoload.php";
require_once "../login/logica-usuario.php";
require_once "../dinheiro/logica-orcamento.php";
verificaUsuarioLogado();

$usuario = usuarioLogado();
$categoria = new Categoria($_POST['nome'], $_POST['id']);
$categoriaDao = new CategoriaDao();

if($categoriaDao->ehValidoEditarMesmoNome($categoria) || $categoriaDao->existe($categoria->getNome(), 'nome')){
    $categoriaDao->edita($categoria, $usuario);
    geraOrcamento($usuario);
    $_SESSION['success'] = "Categoria alterada com sucesso";
    header("Location: /categorias");
    die();
}else{
    $_SESSION['danger'] = "Erro ao editar categoria";
    header("Location: /categorias");
    die();
}
