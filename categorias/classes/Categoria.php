<?php

class Categoria{

    private $id;
    private $nome;
    private $saldo;

    function __construct($nome, $id = "", $saldo = 0){
        $this->nome = $nome;
        $this->saldo = $saldo;
        $this->id = $id;
    }

    public function verificaNome(){
        if($this->nome == ""){
            $_SESSION['danger'] = "Insira uma categorias antes de continuar";
            header("location: /categorias");
            die();
        }
    }

    public function getNome(){
        return $this->nome;
    }

    public function getId(){
        return $this->id;
    }
    
    public function getSaldo(){
        return $this->saldo;
    }
}