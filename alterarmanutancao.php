<?php	
	include 'conexao.php';
	$id 	  = $_POST["campoID"];
	$carro    = $_POST["dscarro"];
	$descricao   = $_POST["descricao"];
	$tempo    = $_POST["tempo"];
	$datahora      = $_POST["datahora"];
	
	$sql = "update manutencao set carro = '$carro', descricaoaula = '$descricao', nm_aulas = '$tempo', datahora = '$datahora' where id_manutencao = '$id'";
	
	mysqli_query($conexao,$sql);
	echo "<script>alert('Registro alterado com sucesso');</script>";
	echo "<script>window.location='verificarmanutencao.php'</script>";
?>