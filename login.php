<?php
include "funcoes.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
	$usuario = $_POST['usuario'];
	$senha = $_POST['senha'];
	$usuarioValidado = false;

	// Carrega os usuários do arquivo
	$usuarios = carregarUsuarios();

	// Verifica se o usuário e a senha estão no vetor de usuários
	foreach ($usuarios as $id_usuario => $user) {
		if ($user['usuario'] === $usuario && $user['senha'] === $senha) {
			$usuarioValidado = true;
			$id_usuario;
			break;
		}
	}

	if ($usuarioValidado) {
		// Define o cookie para o login por 5 minutos
		setcookie("usuario_logado", $usuario, time() + 600, "/");
		setcookie("id_usuario_logado", $id_usuario, time() + 600, "/");
		header("Location: index.php");
		exit;
	}
}

$cookie = isset($_GET['cookie']) ? $_GET['cookie'] : "";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>LOGIN</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
	<?php include "loginHeader.php"; ?>

	<main class="container d-flex justify-content-center align-items-center min-vh-100">
		<div class="card p-4 shadow" style="width: 100%; max-width: 400px;">
			<?php if ($cookie == 'n') { ?>
				<div class="alert alert-warning text-center">
					Ops! Parece que sua sessão caiu, faça login novamente.
				</div>
			<?php } ?>
			<?php
			if (isset($usuarioValidado)) {
				if (!$usuarioValidado) { ?>
					<div class='alert alert-danger'>Usuário ou senha incorretos.</div>
					<?php
				}
			} ?>

			<h2 class="text-center mb-4">LOGIN</h2>
			<form method="POST">
				<div class="mb-3">
					<label for="usuario" class="form-label">Usuário</label>
					<input type="text" class="form-control" name="usuario" id="usuario" placeholder="Digite seu usuário" required>
				</div>
				<div class="mb-3">
					<label for="senha" class="form-label">Senha</label>
					<input type="password" class="form-control" name="senha" id="senha" placeholder="Digite sua senha" required>
				</div>
				<div class="d-grid">
					<button type="submit" class="btn btn-primary">Entrar</button>
				</div>
				<div class="text-center mt-3">
					<a href="cadastro.php">Não tem login? Cadastre-se</a>
				</div>
			</form>
		</div>
	</main>

</body>

</html>