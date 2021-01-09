<!doctype html>
<html>
	<head>
		<title>Sistemas mjailton</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="<?php echo URL_BASE ?>assets/css/style.css">
		<link rel="stylesheet" type="text/css" href="<?php echo URL_BASE ?>assets/css/auxiliar.css">
		<link rel="stylesheet" type="text/css" href="<?php echo URL_BASE ?>assets/css/grade.css">
		<link rel="stylesheet" type="text/css" href="<?php echo URL_BASE ?>assets/css/m-style.css">
		<!--font icones-->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
 
	</head>
<body class="base-login">
	<div class="rows mx-0">
		<div class="col-4 m-auto">
		<div class="caixa p-4 pb-4  position-relative">
			<img src="<?php echo URL_BASE ?>assets/img/logo.png" class="m-auto d-block">
			
			<div class="py-1">
				<?php $this->incluir("inc/msg") ?>
				<?php $this->incluir("inc/erros")?>
			</div>
			
				<form action="<?php echo URL_BASE ."login/logar"?>" method="post">						
						<h1 class="text-center mt-2">login </h1>			
						<label class="mb-2 d-block">
							<span class="d-block text-label">Login</span>
							<input type="text" value="" name="email" class="form-campo">
						</label>				
						<label class="mb-2 d-block">
							<span class="d-block text-label">Senha</span>
							<input type="password" value="" name="senha" class="form-campo">
						</label>							
						<input type="submit" value="Entrar" class="btn btn-amarelo d-table m-auto width-100 h5">
				</form>
				<a href="" class="senha text-branco mt-3 d-block">Esqueci minha senha</a>
		
			<div class="mostrasenha">
				<div class="p-4">
					<span class="sair senha">X</span>
					<h1 class="text-center h3 mb-0 pb-1  text-roxo">Esqueci minha senha </h1>
					<p class="text-center pb-2">Digite seu email no campo abaixo para recuperar sua senha</p>
					<form action="" method="post">
						<label class="mb-2 d-block">
							<span class="d-block text-label">Seu email</span>
							<input type="text" value="" placeholder="Inserir email" class="form-campo">
						</label>				
						</label>							
						<input type="submit" value="Enviar" class="btn btn-roxo d-table m-auto width-100">
					</form>
				</div>
			</div>
		</div>
			
		
	</div>
	
		<script src="<?php echo URL_BASE ?>assets/js/jquery.min.js"></script>
		<script>
			$(function(){
			$('.senha').click (function(){
			$('.mostrasenha').slideToggle();	
			$(this).toggleClass('active');
				return false;
			});
			});
		 </script>
</body>
</html>