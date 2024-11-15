<?php
include 'funcoesAgenda.php';

if (isset($_GET['editar'])) {


	$index = $_GET['editar'];

	$contatos = carregarAgenda();
	$nome = $contatos[$index]["nome"];
	$telefone = $contatos[$index]["telefone"];

} else {
	header('Location: index.php');
}


if ($_SERVER['REQUEST_METHOD'] === "POST") {
	if (isset($contatos[$index])) {

		$nome = $_POST['nome'];
		$telefone = $_POST['telefone'];


		alterarAgenda($index, $nome, $telefone);
		header('Location: index.php');

	}
}


?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>EDITAR AGENDA</title>
</head>

<body>
	<?php include "header.php"; ?>

	<section class="d-flex align-items-center justify-content-center py-5">
		<div class="col-12 col-md-6 col-lg-4 mx-auto">
			<h2 class="mb-5 text-center">Editar contato "<?= $nome ?>"</h2>
			<div class="border border-dark bg-light rounded p-4">
				<form method="POST">
					<div class="mb-3">
						<label for="nome" class="form-label">Nome do contato</label>
						<input type="text" class="form-control" id="nome" name="nome" required placeholder="Nome" value="<?= $nome ?>">
					</div>
					<div class="mb-3">
						<label for="telefone" class="form-label">Telefone</label>
						<input type="text" class="form-control" id="telefone" name="telefone" required placeholder="(XX) XXXXX-XXXX" value="<?= $telefone ?>">
					</div>
					<button class="btn btn-success w-100" type="submit">EDITAR</button>
				</form>
			</div>
		</div>
	</section>


	<script>
		$(document).ready(function () {
			$('#telefone').mask('(00) 00000-0000');
		});
	</script>
</body>

</html>