<?php require_once "../header.php"; ?>
<div class="form-area">
	<h2>Nova Conta</h2>
	<form action="create-account.php" method="post">
		<div class="form-group">
			<label>Nome</label>
			<input class="form-control" type="text" name="nome" placeholder="Nome">
		</div>
		<div class="form-group">
			<label>Email</label>
			<input class="form-control" type="email" name="email" placeholder="Email">
		</div>
		<div class="form-group">
			<label>Senha</label>
			<input class="form-control" type="password" name="senha" placeholder="Senha">
		</div>
		<button class="btn btn-primary" type="submit">Criar conta</button>
	</form>
</div>
<?php require_once "../footer.php" ?>