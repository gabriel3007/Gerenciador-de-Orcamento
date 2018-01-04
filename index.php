<?php require_once "header.php";
require_once "autoload.php";
$usuario = usuarioLogado();
$orcamentoDao = new OrcamentoDao();
$lancamentos = $orcamentoDao->buscaLancamentosDia($usuario);
$orcamento = new Orcamento($lancamentos);
?>
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
		<?php foreach(array_reverse($orcamento->getLancamentos()) as $lancamento):
			if ($lancamento->getTipo() == "Deposito") $class = "success";
			else $class = "danger";
		 ?>	
		<tr class="<?=$class?>">
			<td><?=$lancamento->getValor()?></td>
			<td><?=$lancamento->getTipo()?></td>
			<td><?=$lancamento->getDescricao()?></td>
			<td><?=$lancamento->getNome()?></td>
			<td><?=$lancamento->getData()?></td>
		</tr>
		<?php endforeach ?>
	</tbody>
</table>

<?php require_once "footer.php"?>