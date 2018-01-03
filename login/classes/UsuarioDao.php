<?php 

class UsuarioDao extends Dao{
    
    protected function tabela(){
        return "usuarios";
    }

    protected function objeto(){
        return "Usuario";
    }

    protected function atributosObjeto(){
        return ['nome', 'email', 'senha'];
    }

	public function insere(Usuario $user){
        $conexao = Conexao::get();
        $senhaMd5 = md5($user->getSenha());
        $query = "INSERT INTO {$this->tabela()} (nome, email, senha) VALUES (:nome, :email, :senha)";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome', $user->getNome());
        $stmt->bindValue(':email', $user->getEmail());
        $stmt->bindValue(':senha', $senhaMd5);
        return $stmt->execute();
	}

	public function buscaUsuario($email, $senha){
        $conexao = Conexao::get();
        $senhaMd5 = md5($senha);
		$query = "SELECT * FROM {$this->tabela()} WHERE email = :email AND senha = :senha";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':senha', $senhaMd5);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, $this->objeto(), $this->atributosObjeto())[0];
    }
    
	public function verificaEmailEmUso($email){
		$emailsEmUso = $this->buscaColuna('email');
		foreach ($emailsEmUso as $emailEmUso) {
			if ($email == $emailEmUso['email']){
				$_SESSION['danger'] = "O email já está em uso!!!";
				header("Location: /agenda/login/form-create-account.php");
				die();
			}
		}
    }

}