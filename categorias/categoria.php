<?php
require_once "../header.php";
require_once "../autoload.php";
require_once "../dinheiro/logica-orcamento.php";
require_once "../login/logica-usuario.php";

verificaUsuarioLogado();

$orcamento = orcamentoUsuario();
$categoriaDao = new CategoriaDao();

$categoria = $categoriaDao->buscaCategoria($_GET['id']);
$lancamentos = $orcamento->getLancamentosCategoria($categoria->getNome());

include "mostrador.php";

if(count($lancamentos) == 0){
	echo "<h3>Nenhum lançamento foi feito com essa categoria</h3>";
}else{
	include "tabela-lancamentos.php";
}