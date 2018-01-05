<?php require_once "../header.php";
require_once "../autoload.php";
verificaUsuarioLogado();
$usuario = usuarioLogado();
$categoriaDao = new CategoriaDao();
$categorias = $categoriaDao->busca('usuario_id', $usuario->getId());
if(count($categorias) == 0){
	echo "<h3>Crie suas categorias antes de fazer um lançamento no orçamento</h3>";
}else{
	require_once "form-lancamento.php";
} 
require_once "../footer.php";
?>
