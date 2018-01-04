<?php

class Categoria{

    private $id;
    private $nome;

    function __construct($nome, $id = ""){
        $this->nome = $nome;
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
}