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

    <?php
        $error_nombre = '';
        $error_correo = '';
        $error_pass= '';
        if( isset($_POST['btnRegistro']) ) { 
            function test_input($data) {
              // para evitar caracteres innecesarios
              $data = trim($data);
              // quita los espacios al principio y al final
              $data = stripslashes($data);
              // quita las barras inclinadas
              return $data;
            }
            
            function validar_clave($clave,&$error_pass){
               if(strlen($clave) < 6){
                  $error_pass = "La contraseña debe tener al menos 6 caracteres";
                  return false;
               }
               if(strlen($clave) > 16){
                  $error_pass = "La contraseña no puede tener más de 16 caracteres";
                  return false;
               }
               if (!preg_match('`[A-Z]`',$clave)){
                  $error_pass = "La contraseña debe tener al menos una letra mayúscula";
                  return false;
               }
               $error_pass = "";
               return true;
            }
            
            // nombre 
            if (empty($_POST['nombre'])) {
                $error_nombre = "El nombre no puede estar vacío";
            } else{
                $nombre = test_input($_POST['nombre']);
                if (strlen($nombre)<4){
                    $error_nombre = "El nombre debe contener al menos 4 caracteres";
                }
            }

            // correo
            if (empty($_POST['email'])){
                $error_correo = "El email no puede estar vacío";
            } else {
                $correo = test_input($_POST['email']);
                if (!preg_match('/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/', $correo)){
                    $error_correo = "El formato del correo es erróneo"; 
                }
            }
            
            //contraseña
            if (empty($_POST['password'])){
                $error_pass = "La contraseña no puede estar vacía";
            } else {
                $contra = test_input($_POST['password']);
                if ($_POST){
                   $error_pass="";
                   if (validar_clave($_POST["password"], $error_pass)){
                   }else{
                      echo "Contraseña NO VÁLIDA: " . $error_pass;
                   }
                }

            }
            if($error_nombre=="" && $error_correo=="" && $error_pass=="") {
              echo header('Location: login.php');
            }
            
            
        }
    ?>
    <?php
        $servername = "hl192.dinaserver.com";
		$database = "cfgsl_1dam20";
		$username = "cfgsl_ad1dam20";
		$password = "morcilla1";
        $nombre=$_POST['nombre'];
        $mail=$_POST['email'];
        $pass= $_POST['password'];
        
    
        if($error_nombre=="" && $error_correo=="" && $error_pass==""){
			//Crear conexion
			$conexion = mysqli_connect($servername, $username, $password, $database);
			$acentos = $conexion -> query("SET NAMES 'utf8'");
			/* Comprobar conexión */
						if (mysqli_connect_errno()) {
							printf("Conexión fallida: %s\n", mysqli_connect_error());
							exit();
						}

            if($nombre!="" && $mail !="" && $pass!=""){
                $sql = 'insert into 3registro (nombre,email,contrasena) values ('.'"'.$nombre.'","'.$mail.'","'.$pass.'")';
            }
			
			
			$rs=mysqli_query($conexion, $sql);


			mysqli_close($conexion);
			
		} else {
			$errorregistro= "Error al registrar usuario";
		}
    
        
    ?>
    
<body class="h-100">
	<div class="container h-100">
		<div class="row justify-content-center h-100">
			<div class="col-sm-8 align-self-center text-center">
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="formu" id="formu">
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
								<input class="form-control tamanioNombre" type="text" name="nombre" id="nombre" value="<?$_GET['nombre']?>">
                                <span>
                                    <?php echo '<div class="badge-pill badge-danger"><font face="Comic Neue">'.$error_nombre.'</font></div>';?>
                                </span>
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
								<input class="form-control" type="text" name="email" id="email" >
                                <span>
                                    <?php echo '<div class="badge-pill badge-danger"><font face="Comic Neue">'.$error_correo.'</font></div>';?>
                                </span>
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
								<input class="form-control" type="password" name="password" id="password">	
                                <?php echo '<div class="badge-pill badge-danger"><font face="Comic Neue">'.$error_pass.'</font></div>';?>
							</td>
						</tr>
						
						<tr>
							<td align="center" colspan="3">
								<input class="btn-group-sm campos submit" type="submit" id="btnRegistro" name="btnRegistro" width="100" value="Registro">
                                
							</td>
						</tr>
					</table>
				</form>
                <?php echo $errorregistro;?>
			</div>
		</div>	
	</div>
</body>
</html>