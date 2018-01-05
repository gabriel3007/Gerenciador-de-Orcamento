<h2>Total: R$<?=$orcamento->calcula();?></h2>
<h3>Últimos lançamentos</h3>
<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<td>Valor</td>
			<td>Tipo</td>
			<td>Descrição</td>
			<td>Categoria</td>
			<td>Data</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach($lancamentos as $lancamento):
			if ($lancamento->getTipo() == "Deposito") $class = "success";
			else $class = "danger";
		 ?>	
		<tr class="<?=$class?>">
			<td><?=$lancamento->getValor()?></td>
			<td><?=$lancamento->getTipo()?></td>
			<td><?=$lancamento->getDescricao()?></td>
			<td><?=$lancamento->getCategoriaNome()?></td>
			<td><?=$lancamento->getData()?></td>
		</tr>
		<?php endforeach ?>
	</tbody>
</table>