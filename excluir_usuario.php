<?php
	include 'conexao.php';
	if(is_numeric($_GET["id"])){
		$sql = "delete from usuario where id_usuario = ".$_GET["id"];
		mysqli_query($conexao,$sql);
		echo"<script>alert('Registro apagado com sucesso');</script>";
		echo"<script>window.location='paineldecontrole.php'</script>";
	}
	