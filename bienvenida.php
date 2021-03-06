<!doctype html>
<html lang="es" class="h-100">
<head>
<meta charset="utf-8">
	<title>Bienvenido!</title>
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
            <?php 
                session_start();
                $usuario = $_SESSION['user'];

				echo "<font face='Comic Neue' color='#085ba4'><h1>BIENVENID@ ". $usuario . "</h1></font>";
				

				echo "<font face='Comic Neue' color='#575d6a'>¿Qué desea hacer?</font><br>";
				echo "<br><br>";
            ?>
            <button class="btn-group-sm campos submit" onclick="location.href='reglas.php'">Leer Reglas</button>
			<?php echo "<br><br>";?>
            <button class="btn-group-sm campos submit" onclick="location.href='salir.php'">Salir</button>
			</div>
		</div>	
	</div>
	
</body>
</html>