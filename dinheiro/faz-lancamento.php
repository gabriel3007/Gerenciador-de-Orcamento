<?php require_once "../autoload.php";
require_once "../login/logica-usuario.php";

$usuario = usuarioLogado();
$orcamentoDao = new OrcamentoDao();
$lancamentoFactory = new LancamentoFactory();
$lancamento = $lancamentoFactory->montaLancamento($_POST);
$orcamentoDao->insere($lancamento, $usuario->getId());
header("Location: index.php");
die();	