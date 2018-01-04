<?php

class CategoriaDao extends Dao{
    
    protected function tabela(){
        return 'categorias';
    }

    protected function objeto(){
        return 'Categoria';
    }

    protected function atributosObjeto(){
        return ['nome', 'id'];
    }

    public function insere(Categoria $categoria, Usuario $usuario){
        $conexao = Conexao::get();
        $query = "INSERT INTO {$this->tabela()}(nome, usuario_id) VALUES (:nome, {$usuario->getId()})";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome', $categoria->getNome());
        $stmt->execute();
    }

    public function edita(Categoria $categoria){
        $conexao = Conexao::get();
        $query = "UPDATE categorias SET nome = :nome WHERE id = :id";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome', $categoria->getNome());
        $stmt->bindValue(':id', $categoria->getId());
        $stmt->execute();
    }

    public function buscaCategoria($id){
        $conexao = Conexao::get();
        $query = "SELECT * FROM categorias WHERE id = :id";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, $this->objeto(), $this->atributosObjeto())[0];
    }

    public function ehValidoEditarMesmoNome(Categoria $novaCategoria){
        $categorias = $this->busca();
        foreach($categorias as $categoria){
            $mesmoNome = $novaCategoria->getNome() == $categoria->getNome();
            $mesmoId = $novaCategoria->getId() == $categoria->getId();
            if($mesmoNome && $mesmoId){
               return true;
            }    
       }
       return false;
    }
}