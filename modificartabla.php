<?php
        $servername = "hl192.dinaserver.com";
		$database = "cfgsl_1dam20";
		$username = "cfgsl_ad1dam20";
		$password = "morcilla1";
        
			//Crear conexion
			$conexion = mysqli_connect($servername, $username, $password, $database);
			$acentos = $conexion -> query("SET NAMES 'utf8'");
			/* Comprobar conexión */
						if (mysqli_connect_errno()) {
							printf("Conexión fallida: %s\n", mysqli_connect_error());
							exit();
						}

                $sql = "ALTER TABLE '3resultados' ADD 'usuario' VARCHAR(50) NOT NULL AFTER 'idusuarios'";
                        echo $sql;
			
			$rs=mysqli_query($conexion, $sql);


			mysqli_close($conexion);       
    ?>
<!doctype html>
<html lang="es" class="h-100">
<head>
<meta charset="utf-8">
	<title>Borrar</title>
	<link rel="stylesheet" href="css/estilos.css" type="text/css">
	<link rel="icon" type="image/png" href="imgs/logo.png" />
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
                
			</div>
		</div>	
	</div>
	
</body>
</html>