<?php require_once "../header.php"?>
<div class="form-area">
	<h2>Login</h2>
	<form action="login.php" method="post">
		<div class="form-group">
			<label>Email</label>
			<input class="form-control" type="email" name="email" placeholder="Email">
		</div>
		<div class="form-group">
			<label>Senha</label>
			<input class="form-control" type="password" name="senha" placeholder="Senha">
		</div>
		<button class="btn btn-primary" type="submit">Login</button>
	</form>
</div>
<?php require_once "../footer.php"?>