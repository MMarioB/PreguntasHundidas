<!doctype html>
<html lang="es" class="h-100">
<head>
<meta charset="utf-8">
	<title>Registro</title>
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
				<form action="login.php" method="post" name="formu" id="formu">
                    <?php
			
                        if(isset($_POST['nombre'])){
                            $nombre = $_POST['nombre'];
                            $password = $_POST['password'];
                            $email = $_POST['email'];

                            $campos = array();

                            if($nombre == ""){
                                array_push($campos, "El campo Nombre no pude estar vacío");
                            }

                            if($password == "" || strlen($password) < 6){
                                array_push($campos, "El campo Password no puede estar vacío, ni tener menos de 6 caracteres.");
                            }

                            if($email == "" || strpos($email, "@") === false){
                                array_push($campos, "Ingresa un correo electrónico válido.");
                            }

                            if(count($campos) > 0){
                                echo "<div class='error'>";
                                for($i = 0; $i < count($campos); $i++){
                                    echo "<li>".$campos[$i]."</i>";
                                }
                            }else{
                                echo "<div class='correcto'>
                                        Datos correctos";
                            }
                            echo "</div>";
                        }
                    ?>
					<table border="0" width="100%" height="100%" cellpadding="8">
						<tr>
							<td align="left" colspan="3">
								<h1><font face="Comic Neue" color="#085ba4">Registro</font></h1>
							</td>
						</tr>
						<tr>
							<td align="left" colspan="3">
								<b><font face="Comic Neue" color="#575d6a" size="3">¿Aún no te has registrado? Escríbenos tus datos y al instante podrás jugar a Preguntas Hundidas!</font></b>
							</td>
						</tr>
						<tr>
							<td align="left" colspan="3">
								<b><font face="Comic Neue" color="#575d6a" size="1">ESCRIBE TU NOMBRE</font></b>
							</td>
								
						</tr>
						<tr>
							<td><i class="fas fa-user colorIconos" ></i></td>
							<td align="left" colspan="3">
								<input class="form-control tamanioNombre" type="text" name="nombre" id="nombre" maxlength="15" value="<?=$_GET['nombre']?>">
							</td>
						</tr>
						<tr>
							<td align="left" colspan="3">
								<b><font face="Comic Neue" color="#575d6a" size="1">ESCRIBE TU EMAIL</font></b>
							</td>
								
						</tr>
						<tr>
							<td><i class="fas fa-envelope colorIconos"></i></td>
							<td align="left">
								<input class="form-control" type="text" name="email" id="email" value="<?=$_GET['email']?>">	
							</td>
						</tr>
						
						<tr>
							<td align="left" colspan="3">
								<b><font face="Comic Neue" color="#575d6a" size="1">ESCRIBE TU CONTRASEÑA</font></b>
							</td>
								
						</tr>
						<tr>
							<td><i class="fas fa-lock colorIconos"></i></td>
							<td align="left">
								<input class="form-control" type="password" name="password" id="password"  value="<?=$_GET['password']?>">	
							</td>
						</tr>
						
						<tr>
							<td align="center" colspan="3">
								<input class="btn-group-sm campos submit" type="submit" id="btnRegistro" name="btnRegistro" width="100" value="Registro">
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>	
	</div>
</body>
</html>

<form action="formulario.php" method="POST">
		
		<p>
		Nombre:<br/>
		<input type="text" name="nombre">
		</p>

		<p>
		Password:<br/>
		<input type="password" name="password">
		</p>

		<p>
		correo electrónico:<br/>
		<input type="text" name="email">
		</p>

		<p><input type="submit" value="enviar datos"></p> 
	</form>
