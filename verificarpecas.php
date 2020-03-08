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
		<title>Verificar Peças - pSGO</title>
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
					window.location = "excluir_peca.php?id=" + id;
				}				
			}

			function usoLivre(n){
				document.getElementById("quadrado" + n).style.backgroundColor = 'green';
			}
			
			function usoUsado(n){
				document.getElementById("quadrado" + n).style.backgroundColor = 'red';
			}
			
			function usoNao(n){
				document.getElementById("quadrado" + n).style.backgroundColor = 'white';
			}
		</script>
	</head>
	<?php
		include 'conexao.php';
		include 'menu.php';
		$sql = 'select * from pecas';
		$query = mysqli_query($conexao,$sql);
		
		if(isset($_GET['pesquisa']))
			$valor_pesquisar = $_GET['pesquisa'];
		else
			$valor_pesquisar = ''; 

		$result_pecas = "SELECT * FROM pecas where nomepeca like '%$valor_pesquisar%' order by nomepeca";
		
		$resultado_pecas = mysqli_query($conexao, $result_pecas);
		
		$total_pecas = mysqli_num_rows($resultado_pecas);
		
		//Início da preparação da paginação

		$pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);	
		$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

		$quantidade_pg = 5;

		//Calcular o inicio da visualizacao
		$inicio = ($quantidade_pg*$pagina)-$quantidade_pg;

		$results_pecas = "SELECT * from pecas WHERE nomepeca LIKE '%$valor_pesquisar%' order by nomepeca limit $inicio, $quantidade_pg";

		$resultado_pecas = mysqli_query($conexao, $results_pecas);

		$totall_pecas = mysqli_num_rows($resultado_pecas);
	?>
	<style>
		.quadrado{
			width: 30px;
			height: 30px;
			border-radius: 2px 2px;
			background-color: white;
		}
		
		.verde{
			width: 30px;
			height: 30px;
			border-radius: 2px 2px;
			background-color: green;
		}
		
		.vermelho{
			width: 30px;
			height: 30px;
			border-radius: 2px 2px;
			background-color: red;
		}
	</style>
<body>
</p></p>
<div class="container">
	<p>
		<h3 align="center">Verificar Peças</h3>
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
                <div class="form-row ml-3  font-weight-bold">
                    <div class="form-group ">
                        Livre: &nbsp&nbsp<div class="verde mr-3"></div>
                    </div>
                    <div class="form-group ">
                        Em Uso: &nbsp&nbsp<div class="vermelho"></div>
                    </div>
                </div>
            </form> 	
				<div class="table-responsive">	
					<table class="table table-hover">
					    <thead>
						<tr>
							<th scope="col">Uso</th>
							<th scope="col">Nome</td>
						    <th scope="col">Código</td>
							<th scope="col">Descrição</td>			
							<th scope="col">Almoxarifado</td>
							<th scope="col">Nome do Utilizador</th>							
							<th scope="col">Manutenção</td>
							<th scope="col">Alterar</td>
							<th scope="col">Excluir</td>
						</tr>
						</thead>
						<?php
								$a = 1;
								$contlin = 2;
								while($reg_cadastro=mysqli_fetch_assoc($resultado_pecas))
								{
									$idmanutencao = $reg_cadastro["manutencao"];
									$sqlnome = 'select carro from manutencao where id_manutencao = '.$idmanutencao;
									$nome = mysqli_query($conexao,$sqlnome);
									$reg_manutencao = mysqli_fetch_array($nome);
									
									$nome = $reg_cadastro["nomepeca"]."<br>";
									$codigo = $reg_cadastro["codigopeca"]."<br>";
									$descricao = $reg_cadastro["descricaopeca"]."<br>";										
									$almoxarifado = $reg_cadastro["almoxarifado"]."<br>";					
									$nome_utilizador = $reg_cadastro["nomeutilizador"]."<br>";
									$uso = $reg_cadastro["uso"];
									$manutencao = $reg_manutencao["carro"];
									
								?>
								 <tr class="info">
									<?php
										if($contlin%2 == 0){
											?>
											<tr class="trpar">					
									<?php
										}
										
									
									echo '<td><div id="quadrado'.$a.'" class="quadrado" ></div></td>';
									
									if($uso == "sim"){
										echo"<script>usoUsado($a);</script>";
									}else{
										if($uso == "nao"){
											echo"<script>usoLivre($a);</script>";
										}else{
											echo"<script>usoNao($a);</script>";
										}
									}
									?>
									<td><?php echo $nome ?></td>
									<td><?php echo $codigo ?></td>
									<td><?php echo $descricao ?></td>				
									<td><?php echo $almoxarifado ?></td>
									<td><?php echo $nome_utilizador ?></td>
									<td><?php echo $manutencao ?></td>
																		
									<td align="center"><a onmouseover="Falar('Alterar')" href="editarpeca.php?id=<?php echo $reg_cadastro["id_pecas"]?>" class="btn btn-success shadow-lg"><i class="fas fa-pencil-alt"></i>&nbsp&nbspAlterar</a>
									<td align="center"><a onmouseover="Falar('Excluir')" href="#" class="btn btn-danger shadow-lg" onclick = "apagar('<?php echo $reg_cadastro["id_pecas"]?>');"><i class="fas fa-trash"></i>&nbsp&nbspExcluir</td>
								</tr>

							<?php
								$contlin = $contlin + 1;
								//echo "<script>console.log($uso)</script>";
								$a = $a + 1;
								}
							?>
						</table>
					</div>
					<br>
					<?php
				$num_pagina = ceil($total_pecas/$quantidade_pg);
				$quantidade_pg = 5;     
				$pagina_anterior = $pagina  - 1;
				$pagina_posterior = $pagina + 1;
			?>
			
			<nav class="text-center">
                <ul class="pagination p">
                  <li>
                    <?php
                    if($pagina_anterior != 0){ ?>
                      <a href="verificarpecas.php?pagina=<?php echo $pagina_anterior; ?>&pesquisar=<?php echo $valor_pesquisar?>;" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                      </a>
                    <?php }else{ ?>
                      <span aria-hidden="true">&laquo;</span>
                  <?php }  ?>
                  </li>&nbsp&nbsp
                  <?php 
                  for($i = 1; $i < $num_pagina + 1; $i++){ ?>
                    <li><a href="verificarpecas.php?pagina=<?php echo $i; ?>&pesquisa=<?php echo $valor_pesquisar?>"><?php echo $i; ?></a></li>&nbsp&nbsp
                  <?php } ?>
                  <li>
                    <?php
                    if($pagina_posterior <= $num_pagina){ ?>
                      <a href="verificarpecas.php?pagina=<?php echo $pagina_posterior; ?>&pesquisa=<?php echo $valor_pesquisar?>" aria-label="Previous">
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
			<b>Nome: </b><?php echo $nome ?>
			<br>
			<b>Código: </b><?php echo $codigo ?>
			<br>
			<b>Descrição: </b><?php echo $descricao ?>
			<br>
			<b>Almoxarifado: </b><?php echo $almoxarifado ?>
			<br>
			<b>Nome do Utilizador: </b><?php echo $nome_utilizador ?>
		</div>
		
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
		</div>
    </div>
  </div>
</div>-->


</body>
</html>