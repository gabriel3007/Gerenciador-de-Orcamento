<?php 

class UsuarioFactory{

	public static function criaNovoUser($params){
		UsuarioFactory::verificaInputsVazios($params);
		$nome = $params['nome'];
		$email = strtolower($params['email']);
		$senha = $params['senha'];
		return new Usuario($nome, $email, $senha);
	}

    public static function verificaInputsVazios($params){
	    foreach ($params as $dadoLogin) {
            if($dadoLogin == ""){
            $_SESSION["danger"] = "Dados inválidos, tente novamente";
            header("Location: /login/form-create-account.php");
            die(); 
            }
        }
    }
	  
}