<?php 

class OrcamentoDao extends Dao{
	
	protected function tabela(){
		return "orcamento";
	}
	protected function objeto(){
		return "Lancamento";
	} 

	protected function atributosObjeto(){
		return ['valor', 'tipo', 'descricao', 'data', 'nome'];
	}

	public function buscaLancamentos(Usuario $usuario){
		$conexao = Conexao::get();
		$query = "SELECT * FROM orcamento INNER JOIN categorias ON orcamento.categoria_id = categorias.id
				WHERE orcamento.usuario_id = {$usuario->getId()} AND categorias.usuario_id = {$usuario->getId()}";
		$resultado = $conexao->query($query);
		return $resultado->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, $this->objeto(), $this->atributosObjeto());
	}

	public function buscaLancamentosDia(Usuario $usuario){
		$conexao = Conexao::get();
		$data = date("Y-m-d");
		$query = "SELECT * FROM orcamento INNER JOIN categorias ON orcamento.categoria_id = categorias.id
				WHERE orcamento.usuario_id = {$usuario->getId()} 
				AND categorias.usuario_id = {$usuario->getId()} AND  orcamento.data = '{$data}'";
		$resultado = $conexao->query($query);
		return $resultado->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, $this->objeto(), $this->atributosObjeto());
	}

	public function insere(Lancamento $lancamento, $usuario_id){
		$conexao = Conexao::get();
		$query = "INSERT INTO {$this->tabela()} (valor, tipo, descricao, data, usuario_id, categoria_id) 
					VALUES (:valor, :tipo, :descricao, now(), {$usuario_id}, :categoria_id)";
		$stmt = $conexao->prepare($query);	
		$stmt->bindValue(':valor', $lancamento->getValor());
		$stmt->bindValue(':tipo', $lancamento->getTipo());
		$stmt->bindValue(':descricao', $lancamento->getDescricao());
		$stmt->bindValue(':categoria_id', $lancamento->getCategoriaId());
		$stmt->execute();
	}
}