<?php

require_once "classes/OrcamentoDao.php";
require_once "classes/Orcamento.php";
require_once "classes/LancamentoFactory.php";
require_once "classes/Lancamento.php";


function geraOrcamento(Usuario $usuario){
    $orcamentoDao = new OrcamentoDao();
    $todosLancamentos = $orcamentoDao->buscaLancamentos($usuario);
    $lancamentos = array_reverse($todosLancamentos);
    $orcamento = new Orcamento($lancamentos);
    $_SESSION['orcamento'] = serialize($orcamento);
}

function orcamentoUsuario(){
    return unserialize($_SESSION['orcamento']);
}
