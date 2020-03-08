<?php	
	include 'conexao.php';
	$id 	  = $_POST["campoID"];
	$nome    = $_POST["nome"];
	$descricao   = $_POST["descricao"];
	$almoxarifado    = $_POST["almoxarifado"];
	$manutencao = $_POST["manutencao"];
	$nome_utilizador  = $_POST["nomeutilizador"];
	$uso      = $_POST["uso"];
	
	$sql = "update pecas set nomepeca = '$nome', descricaopeca = '$descricao', almoxarifado='$almoxarifado', manutencao = '$manutencao', nomeutilizador = '$nome_utilizador',uso = '$uso' where id_pecas = '$id'";
	
	mysqli_query($conexao,$sql);
	echo "<script>alert('Registro alterado com sucesso');</script>";
	echo "<script>window.location='verificarpecas.php'</script>";
?>