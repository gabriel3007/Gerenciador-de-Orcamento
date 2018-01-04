<?php 

class LancamentoFactory{

	public static function montaLancamento($params){
		$valor = $params['valor'];
		$tipo = $params['tipo'];
		$descricao = $params['descricao'];
		$categoria_id = $params['categoria_id'];
		LancamentoFactory::validaOperacao($tipo);
		LancamentoFactory::validaValor($valor);
		LancamentoFactory::verificaDadosNulos($params);
		if(is_null($params['data'])) $data = date("d/m/Y");
		else $data = $params['data'];
		$lancamento = new Lancamento($valor, $tipo, $descricao, $data, $categoria_id);
		$lancamento->atualizaValor();	
		return $lancamento;
	}

	private static function validaOperacao($tipo){
		$deposito = $tipo == "Deposito";
		$retirada = $tipo == "Retirada";
		if (!$retirada && !$deposito){
			$_SESSION['danger'] = "Operação inválida!";
			header("Location: /dinheiro");
			die();
		}
	}

	private static function validaValor($valor){
		if ($valor < 0) {
			$_SESSION['danger'] = "Não é possível inserir um valor abaixo de zero";
			header("Location: /dinheiro");
			die();
		}
	}
	
	private static function verificaDadosNulos($params){
	    foreach ($params as $dadoLancamento) {
            if($dadoLancamento == ""){
            $_SESSION["danger"] = "Todos os campos necessitam de estar preenchidos";
            header("Location: /dinheiro");
            die(); 
			}
		}
	}
}