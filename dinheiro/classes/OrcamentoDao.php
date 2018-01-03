<?php 

class OrcamentoDao extends Dao{
	
	protected function tabela(){
		return "orcamento";
	}
	protected function objeto(){
		return "Lancamento";
	} 

	protected function atributosObjeto(){
		return ['valor', 'tipo', 'descricao', 'data'];
	}

	public function insere(Lancamento $lancamento, $usuario_id){
		$conexao = Conexao::get();
		$query = "INSERT INTO {$this->tabela()} (valor, tipo, descricao, data, usuario_id) 
					VALUES (:valor, :tipo, :descricao, now(), {$usuario_id})";
		$stmt = $conexao->prepare($query);	
		$stmt->bindValue(':valor', $lancamento->getValor());
		$stmt->bindValue(':tipo', $lancamento->getTipo());
		$stmt->bindValue(':descricao', $lancamento->getDescricao());
		$stmt->execute();
	}
}