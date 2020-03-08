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
	 
	 $logado = $_SESSION['login'];
	 $nome = $_SESSION['nome'];
	 $tipo = $_SESSION['tipo'];	
	?>
		<title>Registrar Manutenções - pSGO</title>
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
</p></p>
<div class="container">
	<p>
		<h3 align="center">Registrar Manutenções</h3>
		<hr>
	<p>
	<div class="row justify-content-sm-center">
	   <div class="col-md-10 col-sm-6">
	       <form method="POST" action="inclusaomanutencao.php">
				        <div class="form-row mt-2 mb-3">
						    <div class="col-md-12">
								<label for="nome">Nome do Professor:</label>
								<select class="form-control" name="nomeprofessor">
									<option value="0">Selecione</option>
									<?php
										$sql = "select * from usuario where tipousuario = '$tipo' order by nomeusuario desc";
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
								<input type="text" class="form-control" maxlength="200" name="dscarro" placeholder="Marca/Modelo/Ano/Cor" required/>
							</div>
						</div>
						<div class="form-row mt-2 mb-3">
						    <div class="col-md-12">
								<label for="descricao">Descrição:</label>
								<textarea class="form-control" rows="3" maxlength="200" name="descricao" placeholder="Explique o que foi feito na aula" required/></textarea>
							</div>
						</div>
						<div class="form-row mt-2 mb-3">
							<div class="col-md-4">
								<label for="quantidade">Tempo usado:</label>
								<input type="number" class="form-control" name="tempo" placeholder="Aulas" required/>
							</div>
							<div class="col-md-8">
								<label>Data: (Dia/Mês/Ano - Hora:Minuto)</label>
								<input class="form-control" type="text" maxlength="18" name="datahora" placeholder="Dia/Mês/Ano Hora/Minuto">
							</div>
						</div>
						<div class="form-row mt-2 mb-3">
						    <div class="col-md-12">
								<button type="submit" onmouseover="Falar('Registrar')" class="btn btn-outline-primary shadow-lg">Enviar</button>
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