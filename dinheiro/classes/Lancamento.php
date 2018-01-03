<?php 

class Lancamento{

	private $valor;
	private $tipo;
	private $descricao;
	private $data;

	function __construct($valor, $tipo, $descricao, $data){
		$this->valor = $valor;
		$this->tipo = $tipo;
		$this->descricao = $descricao;
		$this->data = $data;
	}

	public function getValor(){
		return $this->valor;
	}

	public function getTipo(){
		return $this->tipo;
	}

	public function getDescricao(){
		return $this->descricao;
	}

	public function getData(){
		return $this->data;
	}

	public function atualizaValor(){
		if ($this->tipo == "Retirada") {
			$this->valor = -$this->valor;
		}
	}
}