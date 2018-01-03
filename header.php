<?php require_once "mostra-alerta.php";
require_once "login/logica-usuario.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Gerenciador de Orcamento</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="/css/bootstrap.css">
	<link rel="stylesheet" href="/css/agenda.css">
</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="/">Gerenciador de Orcamento</a>
			</div>
			<ul class="nav navbar-nav navbar-right">
			<?php if(!usuarioEstaLogado()): ?>
				<li><a href="/login/">Login</a></li>
				<li><a href="/login/form-create-account.php">Create account</a></li>
			<?php else: ?>
				<li><a href="dinheiro">Dinheiro</a></li>
				<li><a href="/login/logout.php">Logout</a></li>
			<?php endif ?>
			</ul>
		</div>
		
	</div>
	<div class="container">
		<div class="principal">
		<?php 
			mostraAlerta('success');
			mostraAlerta('danger'); 
		?>
