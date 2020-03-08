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
		<title>Editar Manutenções - pSGO</title>
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
		<script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
        </script>
	</head>
	<?php
		include "conexao.php";
		include 'menu.php';
	?>
<body>
<?php
	include 'conexao.php';
	if(isset($_GET["id"])){
	if(is_numeric($_GET["id"])){
		$id = $_GET["id"];
		$sql = "select * from manutencao where id_manutencao = ".$_GET["id"];
		$executa=mysqli_query($conexao,$sql);
		$resultado=mysqli_fetch_array($executa);
		}
	}	
	
?>
</p></p>
<div class="container">
	<p>
		<h3 align="center">Editar Manutenções</h3>
		<hr>
	<p>
	<div class="row justify-content-sm-center">
	   <div class="col-md-10 col-sm-6">
	       <form method="POST" action="alterarmanutancao.php">
				        <div class="form-group">
							<div class="col-xs-6">
								<input type="hidden" class="form-control" name="campoID" value="<?php echo $resultado["id_manutencao"];?>"/>
							</div>
						</div>	
						<div class="form-row mt-2 mb-3">
						    <div class="col-md-12">
								<label for="nome">Nome do Professor:</label>
								<select class="form-control" name="nomeprofessor" required>
									<option value="0">Selecione</option>
									<?php
										$sql = 'select * from usuario order by nomeusuario desc';
										$query = mysqli_query($conexao,$sql);
										while($exibir = mysqli_fetch_array($query)){
										?>
										<option value = "<?php echo $exibir["id_usuario"];?>"><?php echo $exibir["nomeusuario"];?></option>
										<?php
											}
										?>
								</select>	
							</div>
						</div>
						<div class="form-row mt-2 mb-3">
						    <div class="col-md-12">
								<label for="nome">Carro: (Marca/Modelo/Ano/Cor)</label>
								<input type="text" class="form-control" maxlength="200" name="dscarro" placeholder="Marca/Modelo/Ano" value="<?php echo $resultado["carro"];?>" oninvalid="this.setCustomValidity('Por favor, preencha desta forma: Marca/Modelo/Ano')" onchange="try{setCustomValidity('')}catch(e){}" required/>
							</div>
						</div>
						<div class="form-row mt-2 mb-3">
						    <div class="col-md-12">
								<label for="descricao">Descrição:</label>
								<textarea class="form-control" rows="3" maxlength="200" name="descricao" placeholder="Explique o que foi feito na aula" required/><?php echo $resultado["descricaoaula"];?></textarea>
							</div>
						</div>
						<div class="form-row mt-2 mb-3">
							<div class="col-md-4">
								<label for="quantidade">Tempo usado:</label>
								<input type="number" class="form-control" name="tempo" placeholder="Aulas" value="<?php echo $resultado["nm_aulas"];?>" required />
							</div>
							<div class="col-md-8">
								<label>Data: (Dia/Mês/Ano - Hora:Minuto)</label>
								<input class="form-control" maxlength="18" type="text" name="datahora" value="<?php echo $resultado["datahora"];?>">
							</div>
						</div>
						<div class="form-row mt-2 mb-3">
						    <div class="col-md-12">
								<button type="submit" onmouseover="Falar('Alterar')" class="btn btn-outline-primary shadow-lg">Alterar</button>
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
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></scrip
	
</body>
</html>