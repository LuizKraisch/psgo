<html>	
	<head>
		<title>pSGO - Gerencie sua oficina de maneira eficiente</title>
		<link rel="icon" href="icone.png" type="image/x-icon"/>
		<!-- Meta tags Obrigatórias -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" type="text/css" href="estilopsgo.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"><!-- CSS ESTILO-->
		<link href="https://fonts.googleapis.com/css?family=Raleway:800,900" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="estiloindex.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
		<style>
			<style>
			body{
				margin-top:20px;
			}

			.order-card {
				color: black;
			}

			.bg-c-blue {
				background: #f2f2f2;
			}
			
			.bg-c-green {
				background: #f2f2f2;
			}

			.card {
				border-radius: 5px;
			}

			.card .card-block {
				padding: 25px;
			}
            
            .f-left {
				float: left;
			}

			.f-right {
				float: right;
			}
        </style>
	</head>
<body>
<div id="content">
	<div class="row">
		<div class="preto shadow-lg">
			<a href="index.php"><img class="logoindex" src="psgologo.png"></a><hr class="linha"><p>
			<h1 class="display-4 text-white lead ml-4 mt-2">Evolua<br>sua oficina.</h1>
			<div class="text-white texto ml-4 mt-2">Gerenciar sua oficina fica muito mais eficiente com as ferramentas práticas do pSGO.</div><hr class="linha2"><hr class="linha3">
			<div class="text-white texto ml-4 mt-2">Veja o que o pSGO pode fazer:</div>
			
			<br>
			<li>
                <i class="fas fa-tools fa-2x"></i>
            </li>
			<div class="text-white texto ml-4 mt-2">Peças e Ferramentas</div><hr class="linha4">
			<div class="text-white texto ml-4 mt-2">Gerencie peças e ferramentas de forma organizada e rápida, com informações alteraveis a qualquer momento.</div>
			<br>
			<li>
				<i class="fas fa-car fa-2x"></i>
			</li>
			<div class="text-white texto ml-4 mt-2">Manutenções</div><hr class="linha4">
			<div class="text-white texto ml-4 mt-2">Crie manutenções e autalize seu andamento.</div>
			<br>
			<li>
				<i class="fas fa-users fa-2x"></i>
			</li>
			<div class="text-white texto ml-4 mt-2">Usuários</div><hr class="linha4">
			<div class="text-white texto ml-4 mt-2">Adicione alunos e professores para ter um registro completo de retirada de itens.</div>
		</div>		
		
		<div class="col-sm-7 col-md-7 ml-2 mr-2">
			<br>
			<form name="login" method="post" action="autenticacao.php">
				<div class="form-row">
					<div class="col">
						<h2 class="card-title">Vamos Começar:</h2>
						<h6 class="text-muted">Para cadastrar outros usuários, inicie uma sessão com uma conta professor.</h6>
					</div>
				</div>	
					<hr>
				<div class="form-group">
					<label for="exampleInputEmail1">Digite seu Usuario:</label>
					<input type="text" class="form-control" name="usuario" placeholder="Seu usuário" required/>
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Digite sua Senha:</label>
					<input type="password" class="form-control" name="senha" placeholder="Senha" required/>
				</div>
				<button type="submit" class="btn btn-outline-primary shadow-lg">Acessar</button>
			</form>
			<hr>
			<h5 class="card-title">Conheça mais sobre o pSGO:</h5>
			<div class="row">
				<div class="col-sm-12">
					<div class="card bg-c-blue order-card shadow-lg">
						<div class="card-block">
							<h3 class="font-weight-bold m-b-20">Problema atual</h3>
							<h6 class="font-weight-light">Na Oficina de Manutenção Automotiva do Senai Sul Joinville os alunos não tinham um forma organizada de gerenciar a retirada de peças e ferramentas, para isso os alunos tiravam fotos das peças com o celular, gerando uma grande desorganização.</h6>
						</div>
					</div>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-sm-12">
					<div class="card bg-c-green order-card shadow-lg">
						<div class="card-block">
							<h3 class="font-weight-bold m-b-20">Uma solução</h3>
							<h6 class="font-weight-light">Em vista disso, surgiu a oportunidade dos alunos do terceiro semestre do Curso Técnico em Informática para Internet, usassem os conhecimentos adquiridos no curso para criar um sistema de gerenciamento de peças e ferramentas para a Oficina de Manutenção Automotiva, nesse momento que o pSGO (Projeto de Sistema de Gerenciamento da Oficina) surgiu.</h6>
						</div>
					</div>
				</div>
			</div>
            <br><br><br>
			<?php
				include 'footer.html';
			?>
		</div>
	</div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
</body>
</html>