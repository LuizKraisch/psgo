<meta charset="utf-8">
<?php 
	include "conexao.php";
	
	$tipousuario = $_POST['tipousuario'];
	$nome = $_POST['nome'];
	$usuario = $_POST['usuario'];
	$email = $_POST['email'];
	$matricula = $_POST['matricula'];
	$senha = $_POST['senha'];
	
	if($dados = mysqli_query($conexao,"INSERT INTO usuario VALUES(DEFAULT, '{$nome}', '{$email}', '{$senha}', '{$usuario}', '{$tipousuario}', '{$matricula}')")){
			echo"<script>alert('Inclusão realizada com sucesso!');</script>";
			echo"<script>window.location='paineldecontrole.php'</script>";
		}else{
			echo"<script>alert('Erro na inclusão, por favor verifique se os dados estão preenchidos corretamente.');</script>";
			echo"<script>window.location='registrousuarios.php'</script>";
		}
?>