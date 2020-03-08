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
		<title>Verificar Usuários - pSGO</title>
		<meta charset="utf-8">
		<link rel="icon" href="icone.png" type="image/x-icon"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" type="text/css" href="estilo2.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"><!-- CSS ESTILO-->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <style>
		.p {
            display: inline-block;
        }

        .p a {
            color: black;
			padding: 8px 16px;
			text-decoration: none;
		}

		.p a.active {
			background-color: #0d0d0d;
			color: white;
			border-radius: 5px;
		}

		.p a:hover:not(.active) {
			border-radius: 5px;
			background-color: #0d0d0d;
			color: white;
		}
</style>
	<script>
			function apagar(id){				
				if(window.confirm("Confirmar a exclusão? Essa ação não pode ser desfeita.")){
					window.location = "excluir_usuario.php?id=" + id;
				}				
			}		
	</script>
	</head>
	<?php
		include 'conexao.php';
		include 'menu.php';
		$sql = 'select * from usuario';
		$query = mysqli_query($conexao,$sql);
		
		if(isset($_GET['pesquisa']))
			$valor_pesquisar = $_GET['pesquisa'];
		else
			$valor_pesquisar = ''; 

		$result_usuario = "SELECT * FROM usuario where nomeusuario like '%$valor_pesquisar%' order by nomeusuario";
		$resultado_usuario = mysqli_query($conexao, $result_usuario);
		$total_usuario = mysqli_num_rows($resultado_usuario);
		
		//Início da preparação da paginação

		$pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);	
		$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

		$quantidade_pg = 5;

		//Calcular o inicio da visualizacao
		$inicio = ($quantidade_pg*$pagina)-$quantidade_pg;

		$results_usuario = "SELECT * from usuario WHERE nomeusuario LIKE '%$valor_pesquisar%' order by nomeusuario limit $inicio, $quantidade_pg";

		$resultado_usuario = mysqli_query($conexao, $results_usuario);

		$totall_usuario = mysqli_num_rows($resultado_usuario);
	?>	
<body>
<div class="container">
	<p>
		<h3 align="center">Verificar Usuários</h3>
		<hr>
	</p>
	
	<div class="container">
			<form class="form-inline" method="get" action="#">
 	            <div class="form-row ">
                    <div class="form-group ml-3">
                        <input type="text" name="pesquisa" class="form-control" id="exampleInputName2" placeholder="Digitar...">
                    </div>
                <div class="form-group ml-3">
                    <button onmouseover="Falar('Pesquisar')" type="submit" class="btn btn-primary shadow-lg">Pesquisar</button>
                </div>	
                </div>
                <div class="form-row ml-3">
                    <div class="form-group">
                       <b>*</b>&nbspUsuários do tipo professor não possuem matricula de estudante.
                    </div>
                </div>
            </form> 

			<div class="table-responsive">
				<table class="table table-hover">
					    <thead>
						<tr>
							<th scope='col'>Nome</td>
							<th scope='col'>Apelido</td>
							<th scope='col'>E-mail</td>
							<th scope='col'>Nº Matricula*</td>
							<th scope='col'>Tipo de Usuário</td>
							<th scope='col'>Alterar</td>
							<th scope='col'>Excluir</td>
						</tr>
						</thead>
						<?php
								$contlin = 2;
								while($reg_cadastro=mysqli_fetch_array($resultado_usuario))
								{
									
									$nome = $reg_cadastro["nomeusuario"]."<br>";
									$usuario = $reg_cadastro["usuario"]."<br>";										
									$email = $reg_cadastro["emailusuario"]."<br>";
								    $matricula = $reg_cadastro["matricula"]."<br>";
									$tipousuario = $reg_cadastro["tipousuario"]."<br>";
								?>
								 <tr class="info">
									<?php
										if($contlin%2 == 0){
											?>
											<tr class="trpar">					
									<?php
										}
									?>	
									<td><?php echo $nome ?></td>
									<td><?php echo $usuario ?></td>
									<td><?php echo $email ?></td>
									<td><?php echo $matricula ?></td>
									<td><?php echo $tipousuario ?></td>
									
									<td><a onmouseover="Falar('Alterar')" class="btn btn-success shadow-lg" href="editarusuario.php?id=<?php echo $reg_cadastro["id_usuario"]?>"><i class="fas fa-pencil-alt"></i>&nbsp&nbspAlterar</a>
									<td><a onmouseover="Falar('Excluir')" href="#" class="btn btn-danger shadow-lg" onclick="apagar('<?php echo $reg_cadastro["id_usuario"]?>');"><i class="fas fa-trash"></i>&nbsp&nbspExcluir</td>
								</tr>

							<?php
								$contlin = $contlin + 1;
								}
							?>
				</table>
			</div>
			<br>
			<?php
				$num_pagina = ceil($total_usuario/$quantidade_pg);
				$quantidade_pg = 5;     
				$pagina_anterior = $pagina  - 1;
				$pagina_posterior = $pagina + 1;
			?>
			
			<nav class="text-center">
                <ul class="pagination p">
                  <li>
                    <?php
                    if($pagina_anterior != 0){ ?>
                      <a href="verificarusuarios.php?pagina=<?php echo $pagina_anterior; ?>&pesquisar=<?php echo $valor_pesquisar?>;" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                      </a>
                    <?php }else{ ?>
                      <span aria-hidden="true">&laquo;</span>
                  <?php }  ?>
                  </li>&nbsp&nbsp
                  <?php 
                  for($i = 1; $i < $num_pagina + 1; $i++){ ?>
                    <li><a href="verificarusuarios.php?pagina=<?php echo $i; ?>&pesquisa=<?php echo $valor_pesquisar?>"><?php echo $i; ?></a></li>&nbsp&nbsp
                  <?php } ?>
                  <li>
                    <?php
                    if($pagina_posterior <= $num_pagina){ ?>
                      <a href="verificarusuarios.php?pagina=<?php echo $pagina_posterior; ?>&pesquisa=<?php echo $valor_pesquisar?>" aria-label="Previous">
                        <span aria-hidden="true">&raquo;</span>
                      </a>
                    <?php }else{ ?>
                      <span aria-hidden="true">&raquo;</span>
                  <?php }  ?>
                  </li>&nbsp&nbsp
                </ul>
            </nav>
	</div>
</div>
<br>
<br>		 
<?php
	include 'footer.html';
?>
</div>
</body>
</html>

