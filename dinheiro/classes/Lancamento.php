<?php 

class Lancamento{

	private $valor;
	private $tipo;
	private $descricao;
	private $data;
	private $categoria_id;
	private $categoria_nome;

	function __construct($valor, $tipo, $descricao, $data, $categoria_id, $categoria_nome){
		$this->valor = $valor;
		$this->tipo = $tipo;
		$this->descricao = $descricao;
		$this->data = $data;
		$this->categoria_id = $categoria_id;
		$this->categoria_nome = $categoria_nome;
	}

	public function atualizaValor(){
		if ($this->tipo == "Retirada") {
			$this->valor = -$this->valor;
		}
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
	
	public function getCategoriaId(){
		return $this->categoria_id;
	}

	public function getCategoriaNome(){
		return $this->categoria_nome;
	}
}