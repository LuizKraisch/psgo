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
		<title>Cadastrar Usuários - pSGO</title>
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
<div class="container">
	<p>
		<h3 align="center">Registrar Usuários</h3>
		<hr>
	<p>
	<form method="POST" action="inclusaousuarios.php">
	<div class="form-row">
		<div class="col-sm-6">
			<div class="form-group">
				<label for="exampleInputText1">Tipo de Usuário:</label>
				<select class="form-control" name="tipousuario">
					<option selected>Selecionar</option>
					<option value="Aluno">Aluno</option>
					<option value="Professor">Professor</option>
				</select>
			</div>
		</div>
	</div>
	
	<div class="form-row">
	<div class="col-sm-6">
		<label for="exampleInputText1">Nome:</label>
		<input type="text" class="form-control" name="nome" placeholder="Seu nome" required/>
	</div>
	<div class="col-sm-6">
		<label for="exampleInputText1">Usuario:</label>
		<input type="text" class="form-control" name="usuario" placeholder="Seu Usuario" required/>
	</div>
	<div class="col-sm-6">
		</p>
		<label for="exampleInputEmail">E-mail:</label>
		<input type="email" class="form-control" name="email" placeholder="Seu e-mail" required/>
	</div>
	<div class="col-sm-6">
		</p>
		<label for="exampleInputText1">Nº Matricula:</label>
		<input type="text" class="form-control" name="matricula" placeholder="Se você for professor, não preencha esse campo" maxlength="6"/>
	</div>
	<div class="col-sm-6">
		</p>
		<label for="exampleInputText1">Senha:</label>
		<input type="password" class="form-control" name="senha" placeholder="Senha" required/>
	</div>
	</div>
	<hr>
	<button type="submit" onmouseover="Falar('Registrar')" class="btn btn-outline-primary shadow-lg">Registrar</button>
	</form>
</div>

<br><br><br>
<?php
	include 'footer.html';
?>

	
</body>
</html>