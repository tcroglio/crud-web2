<?php

function carregarAgenda()
{
	$contatos = [];

	if (file_exists('agenda.txt')) {
		$dados = file('agenda.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

		foreach ($dados as $linha) {
			list($nome, $telefone) = explode(":", $linha);
			$contatos[] = ["nome" => $nome, "telefone" => $telefone];
		}
	}
	return $contatos;
}

function cadastrarAgenda($nome, $telefone)
{
	$linha = $nome . ":" . $telefone . PHP_EOL;

	if (file_put_contents("agenda.txt", $linha, FILE_APPEND)) {
		return true;

	} else {
		return false;
	}
}

function listarAgenda()
{
	$contatos = carregarAgenda();
	echo "<ul>";

	foreach ($contatos as $index => $contato) {
		$indexEnfeite = $index + 1;

		$html = "<tr>";
		$html .= "	<th scope='row'> $indexEnfeite </th>";
		$html .= "	<td> " . htmlspecialchars($contato['nome']) . " </td>";
		$html .= "	<td> " . htmlspecialchars($contato['telefone']) . " </td>";
		$html .= "	<td class='d-flex gap-4 align-items-center'>";
		$html .= "		<a href='agendaEditar.php?editar=$index' title='Editar'>";
		$html .= "         <i class='fas fa-pencil-alt'></i>";
		$html .= "		</a>";
		$html .= "		<button class='btn' type='button' data-bs-toggle='modal' data-bs-target='#modalConfirmacao' data-bs-id='" . $index . "'>";
		$html .= "         <i class='fas fa-trash' style='color: red;'></i>";
		$html .= "		</button>";
		$html .= "  </td>";
		$html .= "</tr>";

		echo $html;
		$index++;
	}
	echo "</ul>";
}

function alterarAgenda($index, $novoNome, $novoTelefone)
{
	$contatos = carregarAgenda();

	if (isset($contatos[$index])) {

		$contatos[$index] = ['nome' => $novoNome, 'telefone' => $novoTelefone];
		file_put_contents("agenda.txt", "");


		foreach ($contatos as $contato) {
			cadastrarAgenda($contato['nome'], $contato['telefone']);
		}

	}
}

function excluirAgenda($index)
{

	$contatos = carregarAgenda();
	if (isset($contatos[$index])) {
		unset($contatos[$index]);
		file_put_contents("agenda.txt", "");

		foreach ($contatos as $contato) {
			cadastrarAgenda($contato['nome'], $contato['telefone']);
		}
	}


}