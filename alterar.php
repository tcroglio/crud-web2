<?php

include "funcoes.php";

if (isset($_GET['editar'])) {
	$index = $_GET['editar'];
	$usuarios = carregarUsuarios();

	if (isset($usuarios['index'])) {
		$usuarioAtual = $usuarios[$index]["usuario"];
		$senhaAtual = $usuarios[$index]["senha"];

	} else {
		echo "Usuário não encontrado";
		exit;

	}
}

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['usuario']) && isset($_POST['senha'])) {

	$novoUsuario = $_POST['usuario'];
	$novaSenha = $_POST['senha'];

	alterarUsuario($index, $novoUsuario, $novaSenha);

	header('Location: cadastro.php');
	exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Alterar Usuário</title>
</head>
<body>
	
	<h2>Alterar Usuário</h2>
	<form method="POST">
		<input type="text" name="usuario" value="<?php echo htmlspecialchars($usuarioAtual);?>" required>
		<br>
		<input type="password" name="senha" value="<?php echo htmlspecialchars($senhaAtual);?>" required>
		<br>
		<button type="submit">Salvar alterações</button>
	</form>
</body>
</html>