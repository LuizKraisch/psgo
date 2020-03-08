<?php	
	include 'conexao.php';
	$id 	  = $_POST["campoID"];
	$nome    = $_POST["nome"];
	$descricao   = $_POST["descricao"];
	$almoxarifado    = $_POST["almoxarifado"];
	$manutencao = $_POST["manutencao"];
	$nomeutilizador  = $_POST["nomeutilizador"];
	$uso      = $_POST["uso"];
	
	$sql = "update ferramentas set nomeferramenta = '$nome', descricaoferramenta = '$descricao', manutencao = '$manutencao', almoxarifado = '$almoxarifado', nomeutilizador = '$nomeutilizador', uso = '$uso' where id_ferramentas = '$id'";
	
	mysqli_query($conexao,$sql);
	echo "<script>alert('Registro alterado com sucesso');</script>";
	echo "<script>window.location='verificarferramentas.php'</script>";
?>