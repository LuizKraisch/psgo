<html>	
	<head>
	<?php 

     session_start();
     if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
     {
     unset($_SESSION['login']);
     unset($_SESSION['senha']);
     header('location:index.php');
     }
	?>
		<title>Editar Ferramentas - pSGO</title>
		<!-- Meta tags Obrigatórias -->
		<meta charset="utf-8">
		<link rel="icon" href="icone.png" type="image/x-icon"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" type="text/css" href="estilo2.css">
		<link rel="stylesheet" type="text/javascript" href="carousel.js">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"><!-- CSS ESTILO-->
		
		<!--Font Awesome-->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/css/swiper.min.css'>
        <link rel="stylesheet" href="css/style.css">
		
	</head>
<body>

<?php
	include 'conexao.php';
	if(isset($_GET["id"])){
	if(is_numeric($_GET["id"])){
		$id = $_GET["id"];
		$sql = "select * from ferramentas where id_ferramentas = ".$_GET["id"];
		$executa=mysqli_query($conexao,$sql);
		$resultado=mysqli_fetch_array($executa);
		}
	}	
	include 'menu.php';
?>
</p></p>
<div class="container">
	<p>
		<h3 align="center">Editar Ferramentas</h3>
		<hr>
	<p>
	<div class="row justify-content-sm-center">
	   <div class="col-md-10 col-sm-4">
	       <form name="" method="POST" action="alterarferramentas.php">
				        <div class="form-group">
							<div class="col-xs-6">
								<input type="hidden" class="form-control" name="campoID" value="<?php echo $resultado["id_ferramentas"];?>"/>
							</div>
						</div>		
						<div class="form-row mt-2 mb-3">
						    <div class="col-md-6">
								<label for="nome">Nome:</label>
								<input type="text" class="form-control" name="nome" placeholder="Nome" value="<?php echo $resultado["nomeferramenta"];?>" required/>
							</div>
							<div class="col-md-6">
								<label for="codigo">Código:</label>
								<input type="text" class="form-control" name="codigo" placeholder="Código" value="<?php echo $resultado["codigoferramenta"];?>" disabled/>
							</div>
						</div>
						<div class="form-row mt-2 mb-3">
						    <div class="col-md-12">
								<label>Descrição: (Opcional)</label>
								<textarea class="form-control" name="descricao" placeholder="Explique a peça, se possui algum defeito ou uma observação útil" value=""><?php echo $resultado["descricaoferramenta"];?></textarea>
							</div>
						</div>
						<div class="form-row mt-2 mb-3">
							<div class="col-md-12">
								<label for="almoxarifado">Almoxarifado:</label>
								<input type="text" class="form-control" name="almoxarifado" placeholder="Número" value="<?php echo $resultado["almoxarifado"];?>" required/>
							</div>
						</div>
						<br>
						<hr>
						<h5>Alterar informações de uso</h5>
						<br>
						<div class="form-row">
						<div class="col-md-12">
							<label for="nome">Manutenção:</label>
							<select class="form-control" name="manutencao">
								<option value="0">Selecionar</option>
								<?php
									$sql = "select * from manutencao order by carro desc";
									$query = mysqli_query($conexao,$sql);
									while($exibir = mysqli_fetch_array($query)){
									?>
									<option value = "<?php echo $exibir["id_manutencao"];?>"><?php echo $exibir["carro"];?></option>
									<?php
										}
									?>
							</select>	
						</div>
						</div>
						<div class="form-row mt-2 mb-3">
							<div class="col-md-8">
								<label for="nome_utilizador">Nome Utilizador:</label>
								<input type="text" class="form-control" name="nomeutilizador" placeholder="Nome utilizador" value="<?php echo $resultado["nomeutilizador"];?>"/>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="exampleInputText1">Uso:</label>
									<select class="form-control" name="uso">
										<option selected>Selecionar</option>
										<option value="sim">Em Uso</option>
										<option value="nao">Livre</option>
									</select>
								</div>
							</div>
						</div>
						<div class="form-row mt-2 mb-3">
						    <div class="col-md-12">
								<button type="submit" onmouseover="Falar('Alterar')" class="btn btn-primary shadow-lg">Alterar</button>
							</div>
						</div>	
					</form>
				  </div>
			
    </div>		
	    
</div>
<br>
<br>		 
<?php
	include 'footer.html';
?>

	
</body>
</html>