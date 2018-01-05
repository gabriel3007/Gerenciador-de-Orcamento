<h3>Lançamentos dessa categoria</h3>
<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<td>Valor</td>
			<td>Tipo</td>
			<td>Descrição</td>
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
			<td><?=$lancamento->getData()?></td>
		</tr>
		<?php endforeach ?>
	</tbody>
</table>