<meta charset="utf-8">
<?php 
	include "conexao.php";
	
	$query = "select id_ferramentas from ferramentas order by id_ferramentas desc";
	$idmax = mysqli_query($conexao, $query);
	$reg_cadastro=mysqli_fetch_array($idmax);
	$idmax = $reg_cadastro['id_ferramentas'];
	$idmax++;
	
	switch($idmax){
		case($idmax <= 9):
			$codigoferramenta = rand(10000,99999);
			break;
		case($idmax >= 10 && $idmax <= 99):
			$codigoferramenta = rand(1000,9999);
			break;
		case($idmax >= 100 && $idmax <= 999):
			$codigoferramenta = rand(100,999);
			break;
		case($idmax >= 1000 && $idmax <= 9999):
			$codigoferramenta = rand(10,99);
			break;
		case($idmax >= 10000 && $idmax <= 99999):
			$codigoferramenta = rand(0,9);
			break;
	}
	
	$idmax = $idmax.$codigoferramenta;
	
	$nomeferramenta = $_POST['nome'];
	$descricaoferramenta = $_POST['descricao'];
	$almoxarifado = $_POST['almoxarifado'];
	$nomeutilizador = $_POST['nomeutilizador'];
	$uso = "nao";
	$manutencao = "17";
	
	if($dados = mysqli_query($conexao,"INSERT INTO ferramentas VALUES(DEFAULT, '{$nomeferramenta}', '{$idmax}', '{$descricaoferramenta}', '{$manutencao}', '{$almoxarifado}', '{$nomeutilizador}','{$uso}')")){
		echo"<script>alert('Inclusão realizada com sucesso!');</script>";
		echo"<script>window.location='verificarferramentas.php'</script>";
	}
	else
	{
		echo"<script>alert('Erro na inclusão, por favor verifique se os dados estão preenchidos corretamente.');</script>";
		echo"<script>window.location='registroferramentas.php'</script>";
	}
?>