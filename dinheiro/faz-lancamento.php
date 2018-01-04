<?php require_once "../autoload.php";
require_once "../login/logica-usuario.php";
verificaUsuarioLogado();

$usuario = usuarioLogado();
$orcamentoDao = new OrcamentoDao();

$lancamento = LancamentoFactory::montaLancamento($_POST);
$orcamentoDao->insere($lancamento, $usuario->getId());
$_SESSION['success'] = "Lançamento realizado com sucesso";
header("Location: index.php");
die();	