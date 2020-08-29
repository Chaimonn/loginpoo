<!DOCTYPE html>
<html lang="pt-BR">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="<?php echo HOME_URI?>view/tema/css/style.css"> 
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	
	<title>Site Noticias Saimon</title>
</head>
<body>
	<header>
		<div id="h-logo"><img src="<?php echo HOME_URI  ?>view/tema/imagens/logo.png" style="height:75px"/></div>
		<div id='h-center'>
			<div id="icon-menu">
				<a id="link-icon-menu" href="#"><img src="<?php echo HOME_URI  ?>view/tema/imagens/icon-menu.png" style="height:75px"/></a>
			</div>
			<div id="icon-close-menu">
				<a id="link-icon-close-menu" href="#"><img src="<?php echo HOME_URI  ?>view/tema/imagens/icon-close.png" /></a>
			</div>
		</div>
		<div id='h-user'>
			
			<?php 
			if(isset($_SESSION['user'])){

				echo
                '
                 <div>
                    <span>'.$_SESSION['user']->nome.'</span>
                    <a class="btn btn-outline-danger btn-sm" href="'.HOME_URI.'usuario/logout">SAIR</a>
                 </div>
                ';
			}
			else{
				echo '<a class="btn btn-outline-info btn-sm" href="'.HOME_URI.'usuario/login">ENTRAR</a>';
			}
			?>
		</div>
	</header>
	