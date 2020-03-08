<?php
	include 'conexao.php';
	if(is_numeric($_GET["id"])){
		$sql = "delete from pecas where id_pecas = ".$_GET["id"];
		mysqli_query($conexao,$sql);
		echo"<script>alert('Registro apagado com sucesso');</script>";
		echo"<script>window.location='verificarpecas.php'</script>";
	}
