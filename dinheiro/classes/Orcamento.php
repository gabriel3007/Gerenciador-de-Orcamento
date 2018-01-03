<?php 

class Orcamento{

	private $lancamentos;

	function __construct($lancamentos = []){
		$this->lancamentos = $lancamentos;
	}

	public function add(Lancamento $lancamento){
		array_push($this->lancamentos, $lancamento);
	}

	public function getLancamentos(){
		return $this->lancamentos;
	}

	public function calcula(){
		$total = 0;
		foreach($this->lancamentos as $lancamento){
			$total += $lancamento->getValor();
		}
		return $total;
	}
}