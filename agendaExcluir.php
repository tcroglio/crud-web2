<?php

if (isset($_GET['excluir'])) {
	include "funcoesAgenda.php";
	$index = $_GET['excluir'];

	excluirAgenda($index);
	header('Location: ./');
}