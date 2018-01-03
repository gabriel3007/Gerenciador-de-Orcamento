<?php 

class Usuario{

    private $id;
	private $nome;
	private $email;
	private $senha;

	function __construct($nome, $email, $senha){
		$this->nome = $nome;
		$this->email = $email;
		$this->senha = $senha;
	}

	public function getNome(){
		return $this->nome;
	}

	public function getEmail(){
		return $this->email; 
	}

	public function getSenha(){
		return $this->senha;
	}

	public function getId(){
		return $this->id;
	}
}