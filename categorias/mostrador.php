<h2><?=$categoria->getNome()?></h2>
<h3>Saldo com a categoria: R$<?=$categoria->getSaldo()?></h3>
<a class="btn btn-primary" href="/categorias/form-editar.php?id=<?=$categoria->getId()?>">Editar nome da categoria  </a>