<meta charset="utf-8">
<?php 
	include "conexao.php";
	
	$nomeprofessor = $_POST['nomeprofessor'];
	$carro = $_POST['dscarro'];
	$descricao = $_POST['descricao'];
	$aulas = $_POST['tempo'];
	$datahora = $_POST['datahora'];
	
	if($dados = mysqli_query($conexao,"INSERT INTO manutencao VALUES(DEFAULT, '{$nomeprofessor}', '{$carro}', '{$descricao}', '{$aulas}', '{$datahora}')")){
		echo"<script>alert('Inclusão realizada com sucesso!');</script>";
		echo"<script>window.location='paineldecontrole.php'</script>";
	}
	else
	{
		echo"<script>alert('Erro na inclusão, por favor verifique se os dados estão preenchidos corretamente.');</script>";
		echo"<script>window.location='registromanutencao.php'</script>";
	}
?>