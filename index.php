<?php 
require_once "header.php";
require_once "autoload.php";
require_once "login/logica-usuario.php";
require_once "dinheiro/logica-orcamento.php";

$usuario = usuarioLogado();
$orcamento =  orcamentoUsuario();
$lancamentos = $orcamento->getUltimosLancamentos();

if(count($lancamentos) == 0){
	echo "<h2>Você ainda não fez nenhum lançamento hoje</h2>";
}else{
	require_once "dinheiro/tabela-orcamento.php";
} 
require_once "footer.php";
?>