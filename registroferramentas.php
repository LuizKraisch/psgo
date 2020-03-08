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
		<title>Registrar Ferramentas - pSGO</title>
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
	<?php
		include 'menu.php';
	?>
<body>
</p></p>
<div class="container">
	<p>
		<h3 align="center">Registrar Ferramentas</h3> 
		<hr>
	<p>
	<div class="row justify-content-sm-center">
	   <div class="col-md-10 col-sm-4">
	       <form name="" method="POST" action="inclusaoferramenta.php">
				        <div class="form-row mt-2 mb-3">
						    <div class="col-md-12">
								<label for="nome">Nome:</label>
								<input type="text" class="form-control" name="nome" placeholder="Nome" required/>
							</div>
						</div>
						<div class="form-row mt-2 mb-3">
						    <div class="col-md-12">
								<label>Descrição: (Opcional)</label>
								<textarea class="form-control" name="descricao" placeholder="Explique a peça, se possui algum defeito ou uma observação útil" required/></textarea>
							</div>
						</div>
						<div class="form-row mt-2 mb-3">							
							<div class="col-md-12">
								<label for="almoxarifado">Almoxarifado:</label>
								<input type="text" class="form-control" name="almoxarifado" placeholder="Número" required/>
							</div>
						</div>
						<!--<div class="form-row mt-2 mb-3">
							<div class="col-md-8">
								<label for="nome_utilizador">Nome Utilizador:</label>
								<input type="text" class="form-control" name="nomeutilizador" placeholder="Nome utilizador"/>
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
						</div>-->
						<div class="form-row mt-2 mb-3">
						    <div class="col-md-4">
								<button type="submit" onmouseover="Falar('Registrar')" class="btn btn-outline-primary shadow-lg">Registrar</button>
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