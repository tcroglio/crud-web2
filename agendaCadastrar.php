<?php

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['nome'], $_POST['telefone'])) {

	include "funcoesAgenda.php";

	$nome = htmlspecialchars($_POST['nome']);
	$telefone = htmlspecialchars($_POST['telefone']);

	if (cadastrarAgenda($nome, $telefone)) {

		header('Location: ./index.php');
		exit;

	} else {
		header('Location: ./index.php');
	}
}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cadastrar agenda</title>
</head>

<body>
	<?php include "header.php"; ?>

	<section class="d-flex align-items-center justify-content-center py-5">
		<div class="mx-auto">
			<h2 class="mb-5 text-center">Cadastrar novo contato na agenda</h2>
			<div class="d-flex gap-2 align-items-center justify-content-center border border-dark bg-light rounded p-4">
				<form method="POST">
					<div class="row gap-2 justify-content-center">
						<div class="form-group">
							<label for="nome">Nome do contato</label>
							<input type="text" class="form-control" id="nome" name="nome" required placeholder="Nome">
						</div>
						<div class="form-group">
							<label for="telefone">Telefone</label>
							<input type="text" class="form-control" id="telefone" name="telefone" required placeholder="(XX) XXXXX-XXXX">
						</div>
						<button class="btn btn-success m-3" type="submit">CADASTRAR</button>
					</div>
				</form>
			</div>
		</div>
	</section>

	<script>
		$(document).ready(function() {
			$('#telefone').mask('(00) 00000-0000');
		});
	</script>
</body>

</html>