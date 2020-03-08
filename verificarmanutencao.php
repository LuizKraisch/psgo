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
		<title>Verificar Manutenções - pSGO</title>
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
					window.location = "excluir_manutencao.php?id=" + id;
				}				
			}
		
		
		</script>
	</head>
	<?php
		include 'conexao.php';
		include 'menu.php';
		$sql = 'select * from manutencao';
		$query = mysqli_query($conexao,$sql);
		
		
		if(isset($_GET['pesquisa']))
			$valor_pesquisar = $_GET['pesquisa'];
		else
			$valor_pesquisar = ''; 

		$result_carro = "SELECT * FROM manutencao where carro like '%$valor_pesquisar%' order by carro";
		$resultado_carro = mysqli_query($conexao, $result_carro);
		$total_carro = mysqli_num_rows($resultado_carro);
		
		//Início da preparação da paginação

		$pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);	
		$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

		$quantidade_pg = 5;

		//Calcular o inicio da visualizacao
		$inicio = ($quantidade_pg*$pagina)-$quantidade_pg;

		$results_carro = "SELECT * from manutencao WHERE carro LIKE '%$valor_pesquisar%' order by carro limit $inicio, $quantidade_pg";

		$resultado_carro = mysqli_query($conexao, $results_carro);

		$totall_carro = mysqli_num_rows($resultado_carro);
	?>	
<body>
<div class="container">
	<p>
		<h3 align="center">Verificar Manutenções</h3>
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
            </form>	
			<div class="table-responsive">	
				<table class="table table-hover">
					    <thead>
						<tr>
							
							<th scope="col">Professor</th>
							<th scope="col">Carro</th>
							<th scope="col">Descrição</th>
							<th scope="col">Aulas usadas</th>
							<th scope="col">Data e hora de início</th>
							<th scope="col">Alterar</th>
							<th scope="col">Excluir</th>
						</tr>
						</thead>
						<?php
								$contlin = 2;
								while($reg_cadastro=mysqli_fetch_assoc($resultado_carro))
								{
									$idprofessor = $reg_cadastro["idprofessor"];
									
									$sqlnome = 'select nomeusuario from usuario where id_usuario = '.$idprofessor;
									$nome = mysqli_query($conexao,$sqlnome);
									$reg_professor = mysqli_fetch_array($nome);
									
									$carro = $reg_cadastro["carro"]."<br>";
									$descricao = $reg_cadastro["descricaoaula"]."<br>";										
									$aulas = $reg_cadastro["nm_aulas"]."<br>";
									$datahora = $reg_cadastro["datahora"]."<br>";
									$professor = $reg_professor["nomeusuario"];
								    
								?>
								 <tr class="info">
									<?php
										if($contlin%2 == 0){
											?>
											<tr class="trpar">					
									<?php
										}
									?>	
									<td><?php echo $professor ?></td>
									<td><?php echo $carro ?></td>
									<td><?php echo $descricao ?></td>
									<td><?php echo $aulas ?></td>
									<td><?php echo $datahora ?></td>
									
									<th align="center"><a onmouseover="Falar('Alterar')" href="editarmanutencao.php?id=<?php echo $reg_cadastro["id_manutencao"]?>" class="btn btn-success shadow-lg"><i class="fas fa-pencil-alt"></i></i>&nbsp&nbspAlterar</a>
									<th align="center"><a onmouseover="Falar('Excluir')" href="#" class="btn btn-danger shadow-lg" onclick = "apagar('<?php echo $reg_cadastro["id_manutencao"]?>');"><i class="fas fa-trash"></i>&nbsp&nbspExcluir</th>
								</tr>

							<?php
								$contlin = $contlin + 1;
								}
							?>
						</table>
					</div>
				<br>
				<?php
				$num_pagina = ceil($total_carro/$quantidade_pg);
				$quantidade_pg = 5;     
				$pagina_anterior = $pagina  - 1;
				$pagina_posterior = $pagina + 1;
			?>
			
			<nav class="text-center">
                <ul class="pagination p">
                  <li>
                    <?php
                    if($pagina_anterior != 0){ ?>
                      <a href="verificarmanutencao.php?pagina=<?php echo $pagina_anterior; ?>&pesquisar=<?php echo $valor_pesquisar?>;" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                      </a>
                    <?php }else{ ?>
                      <span aria-hidden="true">&laquo;</span>
                  <?php }  ?>
                  </li>&nbsp&nbsp
                  <?php 
                  for($i = 1; $i < $num_pagina + 1; $i++){ ?>
                    <li><a href="verificarmanutencao.php?pagina=<?php echo $i; ?>&pesquisa=<?php echo $valor_pesquisar?>"><?php echo $i; ?></a></li>&nbsp&nbsp
                  <?php } ?>
                  <li>
                    <?php
                    if($pagina_posterior <= $num_pagina){ ?>
                      <a href="verificarmanutencao.php?pagina=<?php echo $pagina_posterior; ?>&pesquisa=<?php echo $valor_pesquisar?>" aria-label="Previous">
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
  
<!--<div class="modal fade" id="modalexibir" tabindex="-1" role="dialog" aria-labelledby="modalexibir" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Visualizar Informações</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		
		<div class="modal-body">
			<b>Professor: </b><?php echo $idprofessor ?>
			<br>
			<b>Carro: </b><?php echo $carro ?>
			<br>
			<b>Descrição: </b><?php echo $descricao ?>
			<br>
			<b>Aulas usadas: </b><?php echo $aulas ?>
			<br>
			<b>Data e hora de início: </b><?php echo $datahora ?>
		</div>
		
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
		</div>
    </div>
  </div>
</div>-->

	
</body>
</html>