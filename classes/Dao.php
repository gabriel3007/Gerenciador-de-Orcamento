<?php 

abstract class Dao{

    protected abstract function tabela();
    protected abstract function objeto();
    protected abstract function atributosObjeto();

	public function busca($db_elemento = "", $filtro = ""){
        $conexao = Conexao::get();
        $resultado = $this->selecionaQuery($db_elemento, $filtro, $conexao);
        return $resultado;
	}

	public function buscaColuna($coluna){
        $conexao = Conexao::get();
        $query = "select {$coluna} from {$this->tabela()}";
        $resultado = $conexao->query($query);
        return $resultado->fetchAll();
      	}

	public function deleta($id){
		$query = "DELETE FROM {$this->tabela()} WHERE id = :id";
        $conexao = Conexao::get();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }
    

    public function existe($novo, $coluna){
        $existentes = $this->buscaColuna($coluna);
        foreach($existentes as $existente){
            if(in_array($novo,  $existente)){
                return false; 
            }
        }
        return true;
    }

	private function selecionaQuery($db_elemento, $filtro, $conexao){
	    if ($filtro == "") {
            return $this->buscaObjetos($conexao);         
	    }else{
            return $this->buscaObjetosFiltrados($db_elemento, $filtro, $conexao);
        } 
    }
    private function buscaObjetos($conexao){
        $query = "SELECT * FROM {$this->tabela()}";
        $resultado = $conexao->query($query);
        return $resultado->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, $this->objeto(), $this->atributosObjeto());
    }

    private function buscaObjetosFiltrados($db_elemento, $filtro, $conexao){
        $query = "SELECT * FROM {$this->tabela()} WHERE {$db_elemento} = :filtro";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':filtro', $filtro);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, $this->objeto(), $this->atributosObjeto());
    }
}