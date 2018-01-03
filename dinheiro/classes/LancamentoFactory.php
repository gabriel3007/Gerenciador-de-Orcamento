<?php 

class LancamentoFactory{

	public function montaLancamento($params){
		$valor = $params['valor'];
		$tipo = $params['tipo'];
		$descricao = $params['descricao'];
		$this->validaOperacao($tipo);
		$this->validaValor($valor);
		if(is_null($params['data'])) $data = date("d/m/Y");
		else $data = $params['data'];
		$lancamento = new Lancamento($valor, $tipo, $descricao, $data);
		$lancamento->atualizaValor();	
		return $lancamento;
	}

	private function validaOperacao($tipo){
		$deposito = $tipo == "Deposito";
		$retirada = $tipo == "Retirada";
		if (!$retirada && !$deposito){
			$_SESSION['danger'] = "Operação inválida!";
			header("Location: /dinheiro");
			die();
		}
	}

	private function validaValor($valor){
		if ($valor < 0) {
			$_SESSION['danger'] = "Não é possível inserir um valor abaixo de zero";
			header("Location: /dinheiro");
			die();
		}
	}
}