<?php
require_once "../header.php";
require_once "../autoload.php";
require_once "../login/logica-usuario.php";
require_once "logica-orcamento.php";

verificaUsuarioLogado();

$usuario = usuarioLogado();
$orcamento = orcamentoUsuario();
$lancamentos = $orcamento->getLancamentos();

if(count($lancamentos) == 0){
	echo "<h2>Você ainda não fez nenhum lançamento em nosso sistema</h2>";
}else{
	require_once "tabela-orcamento.php";
} 
require_once "../footer.php";
?>