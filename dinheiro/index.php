<?php require_once "../header.php";
require_once "../autoload.php";
verificaUsuarioLogado();
$usuario = usuarioLogado();
$orcamentoDao = new OrcamentoDao();
$lancamentos = $orcamentoDao->busca('usuario_id', $usuario->getId());
$orcamento = new Orcamento($lancamentos);
?>
<h2>Fazer Lançamento</h2>
<form action="/dinheiro/faz-lancamento.php" method="post">
	<div class="form-inline">
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-addon">$</div>
				<input class="form-control" type="number" min=0 step=0.01 name="valor" placeholder="Valor">
			</div>
		</div>
		<div class="form-group">
			<select class="form-control" name="tipo">
				<option value="Deposito">Deposito</option>
				<option value="Retirada">Retirada</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<textarea class="form-control descricao-orcamento" name="descricao" placeholder="Descrição"></textarea>
	</div>
	<button class="btn btn-success" type="submit">Registrar</button>
<h2>Total: <?=$orcamento->calcula();?></h2>
<h3>Lançamentos</h3>
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
		<?php foreach(array_reverse($orcamento->getLancamentos()) as $lancamento):
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
<?php require_once "../footer.php" ?>
