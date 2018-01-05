<?php 

class Orcamento{

	private $lancamentos;

	function __construct($lancamentos = []){
		$this->lancamentos = $lancamentos;
	}

	public function add(Lancamento $lancamento){
		array_push($this->lancamentos, $lancamento);
	}
	
	public function calcula(){
		$total = 0;
		foreach($this->lancamentos as $lancamento){
			$total += $lancamento->getValor();
		}
		return $total;
	}

	public function getLancamentosCategoria($nomeCategoria){
		$lancamentosCategoria = [];
		foreach ($this->lancamentos as $lancamento) {
			if($lancamento->getCategoriaNome() == $nomeCategoria){
				$lancamentosCategoria[] = $lancamento;
			}
		}
		return $lancamentosCategoria;
	}
	
	public function getUltimosLancamentos(){
		return array_slice($this->lancamentos, 0, 10);
	}

	public function getLancamentos(){
		return $this->lancamentos;
	}
}