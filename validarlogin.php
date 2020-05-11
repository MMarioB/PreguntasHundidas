<?php 
    $servername = "hl192.dinaserver.com";
    $database = "cfgsl_1dam20";
    $username = "cfgsl_ad1dam20";
    $password = "morcilla1";
    
    $conexion = mysqli_connect($servername, $username, $password, $database);
    $acentos = $conexion -> query("SET NAMES 'utf8'");
    /* Comprobar conexión */
    if (mysqli_connect_errno()) {
        printf("Conexión fallida: %s\n", mysqli_connect_error());
        exit();
    } 
    
    session_start();
    $nombre = $_POST['nombrelogin'];
    $clave = $_POST['passwordlogin'];
    
    $q = "SELECT * from 3registro where nombre='$nombre' and contrasena='$clave'";
    $consulta = mysqli_query($conexion, $q);
    $array = mysqli_fetch_array($consulta);

    if($array['contar']>0){
        $_SESSION['nombre']=$nombre;
        header("location: reglas.php");
    } else {
        echo "Datos Incorrectos";
    }
    
    mysqli_close($conexion);

?>