<h2>Fazer Lançamento</h2>
<div class="form-area">
	<form action="/dinheiro/faz-lancamento.php" method="post">
		<div class="form-group">
			<label>Valor</label>
			<div class="input-group">
				<div class="input-group-addon">$</div>
				<input class="form-control" type="number" min=0 step=0.01 name="valor" placeholder="Valor">
			</div>
		</div>
		<div class="form-group">
			<label>Operação</label>
			<select class="form-control" name="tipo">
				<option value="Deposito">Deposito</option>
				<option value="Retirada">Retirada</option>
			</select>
		</div>
		<div class="form-group">
			<label>Categoria</label>
			<select class="form-control" name="categoria_id">
				<?php foreach($categorias as $categoria): ?>
					<option value="<?=$categoria->getId()?>"><?=$categoria->getNome()?></option>
				<?php endforeach ?>
			</select>
		</div>
		<div class="form-group">
			<label>Descrição</label>
			<textarea class="form-control" name="descricao" placeholder="Descrição"></textarea>
		</div>
		<button class="btn btn-success" type="submit">Registrar</button>
	</form>
</div>