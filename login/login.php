<!DOCTYPE html>
<?php include "../includes/geral.php";?>
<html lang="pt-br">

<head>

<meta charset="UTF-8">

<!--[if lt IE 9]>-->


<script src="https://raw.githubusercontent.com/aFarkas/html5shiv/master/dist/html5shiv.min.js"></script>


<!--[endif]-->

<title><?php echo $nomeSite." - ".$slogan;?></title>



<link rel="stylesheet" type="text/css" href="../css/style.css">
<link rel="icon" type="image/png" href="../Imagens/logo.png" />

</head>

<body>

<section class="centro">


	

	<div class="destaquesPrincipal">
	
	<nav id="navigation" width="100%" height="10" align="center">

	<a href="../index.php" title="Home">VOLTAR	</a>

  <ul>
				
		
		<div class="login" id="log">

			<img src="../Imagens/logo.png">

			<form method="post" action="validaLogin.php" class="formulario-login">

				<fieldset>

					<h2><legend>Login</legend><h2>

					<br /><br />

					<table>

						<tr>

							<td><label>Login:</label></td>

							<td><input type="text" name="login" placeholder="Digite seu login!" required/></td>

						</tr>

						<tr>

							<td><label>Senha:</label> </td>

	

								<td><input type="password" name="senha" placeholder="Digite sua senha!" required/></td>

							</tr>

							<tr>

								<td></td>

								<td><input type="submit" id="enviar" value="Entrar"></td>

							</tr>

						</table>

					



					<?php

						



						if(isset($_GET['erro'])){

							echo "<div class=\"erro \">Login ou senha incorretos!<br />Tente outra vez.</div>";

						}



					?>

				</fieldset>

			</form>



		</div>

		

	

	</div>

	

	



	

	

	<div class="clearfix"></div>

</section>



</body>
</html>