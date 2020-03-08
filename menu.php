<!DOCTYPE html>
<html>
<head>
	<?php 
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
		<style type="text/css">#usuarios{pointer-events:none;opacity:0.5}</style>
		<style type="text/css">#manutencao{pointer-events:none;opacity:0.5}</style>
	<?php
	}
	?> 
	
    <meta charset="utf-8">
	<link rel="icon" href="icone.png" type="image/x-icon"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Bootstrap CSS CDN -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="estilomenu.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
	<script>
		var pessoa = window.speechSynthesis;
		var texto = new SpeechSynthesisUtterance();
		var ajuda = false;

		function Falar(palavras){
			if(ajuda){
				texto.text = palavras;
				pessoa.speak(texto);
			}
		}

		function AtivaAjuda(){
			if(ajuda == false){
				ajuda = true;
				Falar('Assistência auditiva ativada');
			}else{
				Falar('Assistência auditiva desativada');
				ajuda = false;
			}
		}
</script>
<style>
    .borda{
        border-radius: 5px;
        background-color: #f2f2f2;
    }
</style>
</head>

<body>
	<div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
			<ul class="list-unstyled components">
                <div class="sidebar-header">
                    <h6><a onmouseover="Falar('Painel de Controle')" href="paineldecontrole.php"><img src="psgologo.png" width="120px" height="50px" alt=""></a><p>Ver. 1.32.4</p></h6>
				</div>
            
				<li>
                    <a onmouseover="Falar('Usuários clique para expandir o menu')" href="#homeSubmenu" id="usuarios" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-users"></i>
                        &nbspUsuários
                    </a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a onmouseover="Falar('Adicionar usuário')" href="registrousuarios.php">Adicionar usuário</a>
                        </li>
                        <li>
                            <a onmouseover="Falar('Verificar usuários')" href="verificarusuarios.php">Verificar usuários</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a onmouseover="Falar('Peças clique para expandir o menu')" href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-cog"></i>
						&nbspPeças
                    </a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a onmouseover="Falar('Registrar peça')" href="registropecas.php">Registrar peça</a>
                        </li>
                        <li>
                            <a onmouseover="Falar('Verificar peças')" href="verificarpecas.php">Verificar peças</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a onmouseover="Falar('Ferramentas clique para expandir o menu')" href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-wrench"></i>
						&nbspFerramentas
                    </a>
                    <ul class="collapse list-unstyled" id="pageSubmenu2">
                        <li>
                            <a onmouseover="Falar('Registrar ferramenta')" href="registroferramentas.php">Registrar ferramenta</a>
                        </li>
                        <li>
                            <a onmouseover="Falar('Verificar ferramentas')" href="verificarferramentas.php">Verificar ferramentas</a>
                        </li>
                    </ul>
                </li>
				<li>
                    <a onmouseover="Falar('Manutenções clique para expandir o menu')" href="#pageSubmenu3" id="manutencao" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-car"></i>
						&nbspManutenções
                    </a>
                    <ul class="collapse list-unstyled" id="pageSubmenu3">
                        <li>
                            <a onmouseover="Falar('Registrar manutenção')" href="registromanutencao.php">Registrar manutenção</a>
                        </li>
                        <li>
                            <a onmouseover="Falar('Verificar manutenções')" href="verificarmanutencao.php">Verificar manutenções</a>
                        </li>
                    </ul>
                </li>
            </ul>
			<hr class="linha">
		<ul class="list-unstyled CTAs">
                <li>
                    <a href="mailto:psgocontato@gmail.com?" onmouseover="Falar('Contato')" class="tipo1"><i class="fas fa-envelope"></i>&nbsp Contato </a>
                </li>
                <li>
                    <a onmouseover="Falar('Painel de Controle')" href="paineldecontrole.php" class="tipo1"><i class="fas fa-home"></i>&nbsp Painel de controle</a>
                </li>
				<hr class="linha">
				<li align="center">
                    <div class="custom-control custom-switch">
						<input type='checkbox' class='custom-control-input' id='customSwitch1'>
						<label data-toggle="tooltip" data-placement="top" title="Ative essa opção para falar o nomes dos botões ao passar o mouse em cima deles." onclick="AtivaAjuda();" class="custom-control-label" for="customSwitch1">Assistência Auditiva</label>
					</div>
				</li>
        </ul>
        </nav>
	
        <!-- Page Content  -->
        <div id="content">
			<nav class="navbar navbar-expand-lg borda shadow">
                <div class="container-fluid">
					<button type="button" onmouseover="Falar('Abrir Menu')" id="sidebarCollapse" class="btn btn-light">
                        <i class="fas fa-align-left"></i>
                    </button><br><br>
					<a href="sair.php" onmouseover="Falar('Sair')" class="btn btn-light"><i class="fas fa-sign-out-alt"></i><b> Sair</b></a>
                </div>
            </nav>
			
			<div id="conteudo">
			
		

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar, #content').toggleClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>
</body>

</html>