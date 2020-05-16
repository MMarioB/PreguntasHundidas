<?php
        $error_correo = '';
        $error_pass= '';
        if( isset($_POST['btnReset']) ) { 
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
                      $contramal= "Contraseña NO VÁLIDA: " . $error_pass;
                   }
                }

            }
            if($error_correo=="" && $error_pass=="") {
              $exito= "Contraseña cambiada con exito!";
            }
            
            
        }
    ?>

<?php
        $servername = "hl192.dinaserver.com";
		$database = "cfgsl_1dam20";
		$username = "cfgsl_ad1dam20";
		$password = "morcilla1";
		$correo=$_POST['email'];
		$pass=$_POST['password'];
        
			//Crear conexion
			$conexion = mysqli_connect($servername, $username, $password, $database);
			$acentos = $conexion -> query("SET NAMES 'utf8'");
			/* Comprobar conexión */
						if (mysqli_connect_errno()) {
							printf("Conexión fallida: %s\n", mysqli_connect_error());
							exit();
						}
							$sql = 'UPDATE 3registro SET contrasena='.'"'.$pass.'"'.' WHERE email='.'"'. $correo .'"'.'';
			
			$rs=mysqli_query($conexion, $sql);


			mysqli_close($conexion);       
    ?>
<!doctype html>
<html lang="es" class="h-100">
<head>
<meta charset="utf-8">
	<title>Recordar Contraseña</title>
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
			<form action="recordarpass.php" method="post" name="formu" id="formu">
					<table border="0" width="100%" height="100%" cellpadding="8">
						<tr>
							<td align="left" colspan="3">
								<h1><font face="Comic Neue" color="#085ba4">RECUPERA LA CONTRASEÑA!</font></h1>
							</td>
						</tr>
						<tr>
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
							<td></td>
						</tr>
						
						<tr>
							<td align="left" colspan="3">
								<b><font face="Comic Neue" color="#575d6a" size="1">ESCRIBE TU NUEVA CONTRASEÑA</font></b>
							</td>
								
						</tr>
						<tr>
							<td><i class="fas fa-lock colorIconos"></i></td>
							<td align="left">
								<input class="form-control" type="password" name="password" id="password">	
                                <?php echo '<div class="badge-pill badge-danger"><font face="Comic Neue">'.$error_pass.'</font></div>';?>
							</td>
							<td></td>
						</tr>
						
						<tr>
							<td align="center" colspan="3">
								<input class="btn-group-sm campos submit" type="submit" id="btnReset" name="btnReset" width="100" value="Recupera tu Contraseña">
                                
							</td>
						</tr>
						<tr>
							<td></td>
							<td>
								<span width="100px">
									<?php 
										if($error_correo=="" && $error_pass==""){
											echo '<div class="badge-pill badge-success badges"><font face="Comic Neue">'.$exito.'</font></div>';
										} else {
											echo '<div class="badge-pill badge-danger badges"><font face="Comic Neue">'.'No ha sido posible cambiar su contraseña!'.'</font></div>';
										}
									?>
								</span>
							</td>
							<td></td>
						</tr>
					</table>
				</form>
			</div>
		</div>	
	</div>
	
</body>
</html>