<!doctype html>
<html lang="es" class="h-100">
<head>
<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" href="css/estilos.css" type="text/css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="icon" type="image/png" href="imgs/logo.png" />
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/e72a8c50e1.js" crossorigin="anonymous"></script>
</head>

<body class="h-100">
	<div class="container h-100">
		<div class="row justify-content-center h-100">
			<div class="col-sm-8 align-self-center text-center">
				<form action="validarlogin.php" method="post" name="formu" id="formu">
					<table border="0" width="100%" height="100%" cellpadding="8">
						<tr>
							<td align="right">
								<img alt="imgLogo" id="imgLogo" class="tamanioLogo" width="100px" height="100px" src="imgs/logo.png">
							</td>
							<td align="left" colspan="3">
								<h1><font face="Comic Neue" color="#085ba4">Preguntas Hundidas</font></h1>
							</td>
						</tr>
						<tr>
							<td>
							</td>
							<td align="left">
								<b><font face="Comic Neue" color="#575d6a" size="1">ESCRIBE TU NOMBRE</font></b>
							</td>
							<td>
							</td>
								
						</tr>
						<tr>
							<td align="right"><i class="fas fa-ship colorIconos"></i></td>
							<td align="left">
								<input class="form-control tamanioNombre" type="text" name="nombrelogin" id="nombrelogin" value="<?=$_GET['nombrelogin']?>">
							</td>
							<td>
							</td>
						</tr>
						
						<tr>
							<td>
							</td>
							<td align="left">
								<b><font face="Comic Neue" color="#575d6a" size="1">ESCRIBE TU CONTRASEÑA</font></b>
							</td>
							<td>
							</td>
								
						</tr>
						<tr>
							<td align="right"><i class="fas fa-lock colorIconos"></i></td>
							<td align="left">
								<input class="form-control tamanioNombre" type="password" name="passwordlogin" id="passwordlogin"  value="<?=$_GET['passwordlogin']?>">	
							</td>
							<td>
							</td>
						</tr>
						
						<tr>
							<td>
							</td>
							<td align="center">
								<input class="btn-group-sm campos submit" type="submit" id="btnLogin" name="btnLogin" width="100" value="Login">
							</td>
							<td>
							</td>
						</tr>
						<tr>
							<td>
							</td>
							<td align="center">
								<b><font face="Comic Neue" color="#575d6a" size="2">¿Aún no te has registrado?</br></font></b>
								<a href="registro.php"><font face="Comic Neue" color="#575d6a" size="1">Regístrate aquí</font></a>
								<a href="recordarpass.php"><font face="Comic Neue" color="#575d6a" size="1">Has olvidado tu contraseña?</font></a>
							</td>
							<td>
								
							</td>
						</tr>
						<tr>
							<td>
							</td>
							<td>
								<?php 
									session_start();
									echo '<div class="badge-pill badge-danger badges"><font face="Comic Neue">'.$_SESSION['error'].'</font></div>';
								?>
							</td>
							<td>
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>	
	</div>
	
</body>
</html>