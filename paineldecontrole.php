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
	 
	if($tipo == 'Aluno'){
	?>
		<style type="text/css">#inicio{background: linear-gradient(45deg,#2e8b57,#3cb371);}</style>
	<?php
	}else{
	?>
		<style type="text/css">#inicio{background: linear-gradient(45deg,#4099ff,#73b4ff);}</style>
	<?php
	}
	include 'menu.php';
	?>
	<title>Painel de Controle - pSGO</title>
	<meta charset="utf-8">
    <link rel="icon" href="icone.png" type="image/x-icon"/>
	<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
		<script>
			function AbrirSecao(secao){
                window.open(""+secao+"", "_parent");
            }
		</script>
		<style>
			body{
				margin-top:20px;
			}

			.order-card {
				color: #fff;
			}

			.bg-c-blue {
				background: linear-gradient(45deg,#4099ff,#73b4ff);
			}
			
			.card {
				border-radius: 5px;
			}

			.card .card-block {
				padding: 25px;
			}

			.order-card i {
				font-size: 26px;
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
<div class="container">
	<div class="col-sm-12">
		<div id="inicio" class="card order-card shadow-lg">
            <div class="card-block">
                <h3 class="font-weight-bold m-b-20">Bem-Vindo(a)&nbsp<?php echo $nome; ?> </h3>
                <h5 class="m-b-0">Usuário do tipo: <?php echo $tipo;?></h5>
				<script>
					var data = new Date().toLocaleString().substr(0, 10)
					document.write("<p>Hoje é dia: " + data +".</p>")
				</script>
            </div>
        </div>
    </div>
<br>
<div class="col-sm-12">
<div id="usuarios" class="card card-cascade narrower shadow-lg">
	<div class="card-body card-body-cascade">
		<h5 class="pink-text pb-2 pt-1"><i class="fas fa-users"></i>&nbsp&nbspUsuários</h5>
		<h4 class="font-weight-bold card-title">Gerencie contas</h4>
		<p class="card-text">Cadastre novos usuários e defina seus tipos.</p>
		<select class="form-control" name="selectusuario" onChange="AbrirSecao(this.value)">
			<option>Selecione uma opção</option>
			<option value="registrousuarios.php">Adicionar usuário</option>
			<option value="verificarusuarios.php">Verificar usuários</option>
		</select>
	</div>
</div>
</div>
<br>
<div class="col-sm-12">
<div class="card card-cascade narrower shadow-lg">
	<div class="card-body card-body-cascade">
		<h5 class="pink-text pb-2 pt-1"><i class="fas fa-toolbox"></i>&nbsp&nbspPeças e Ferramentas</h5>
		<h4 class="font-weight-bold card-title">Organize e registre</h4>
		<p class="card-text">Insira, delete ou atualize as informações.</p>
		<select class="form-control" name="selectpecas" onChange="AbrirSecao(this.value)">
			<option>Selecione uma opção</option>
				<optgroup label="Peças">
					<option value="registropecas.php">Registrar peça</option>
					<option value="verificarpecas.php">Verificar peças</option>
				</optgroup>
				<optgroup label="Ferramentas">
					<option value="registroferramentas.php">Registrar ferramenta</option>
					<option value="verificarferramentas.php">Verificar ferramentas</option>
				</optgroup>
		</select>
	</div>
</div>
</div>
<br>
<div class="col-sm-12">
<div id="manutencao" class="card card-cascade narrower shadow-lg">
	<div class="card-body manutencao card-body-cascade">
		<h5 class="pink-text pb-2 pt-1"><i class="fas fa-car"></i>&nbsp&nbspManutenções</h5>
		<h4 class="font-weight-bold card-title">Informe as manutenções</h4>
		<p class="card-text">Informe o progresso da manutenção do carro.</p>
		<select class="form-control" name="selectmanutencao" onChange="AbrirSecao(this.value)">
			<option>Selecione uma opção</option>
			<option value="registromanutencao.php">Registrar manutenção</option>
			<option value="verificarmanutencao.php">Verificar manutenções</option>
		</select>
	</div>
</div>
</div>
</div>

<br><br>
<?php
	include 'footer.html';
?>
</div>
</body>
</html>