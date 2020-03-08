<meta charset="utf-8">
<?php 
	session_start();
	$login = $_POST['usuario'];
	$senha = $_POST['senha'];
	
	include 'conexao.php';
	
	//$result = mysqli_query($conexao,"select * from usuario where usuario = '$login' and senhausuario = '$senha'");
	$result = "select * from usuario where usuario = '$login' and senhausuario = '$senha'";
	$resultado = mysqli_query($conexao,$result);
   	
	if(mysqli_num_rows ($resultado) > 0 ){ 
	
	    //$resultado_usuario = mysqli_query($conexao,$result);

        $reg_usuario = mysqli_fetch_array($resultado);
				
		$_SESSION['login']  = $login; 
		$_SESSION['senha']  = $senha; 
		$_SESSION['nome'] = $reg_usuario["nomeusuario"];
		$_SESSION['tipo'] = $reg_usuario["tipousuario"];
		
		echo $_SESSION['nome'];
		echo $_SESSION['tipo'];
		
		
		header('location:paineldecontrole.php');
	}else{
		unset ($_SESSION['login']); 
		unset ($_SESSION['senha']);
		echo "<script>alert('Login inválido, verifique os seus dados e tente novamente.');</script>";
		echo"<script>window.location='index.php'</script>";
	}
?>






