<?php	
	include 'conexao.php';
	$id 	  = $_POST["campoID"];
	$nome    = $_POST["nome"];
	$usuario = $_POST["usuario"];
	$email   = $_POST["email"];
	$tipousuario = $_POST["tipousuario"];
	$matricula    = $_POST["matricula"];
	$senhausuario  = $_POST["senha"];
	
	
	$sql = "update usuario set nomeusuario = '$nome',usuario = '$usuario',emailusuario = '$email', senhausuario='$senhausuario', tipousuario = '$tipousuario', matricula = '$matricula' where id_usuario = '$id'";
	
	mysqli_query($conexao,$sql);
	echo "<script>alert('Registro alterado com sucesso');</script>";
	echo "<script>window.location='verificarusuarios.php'</script>";
?>