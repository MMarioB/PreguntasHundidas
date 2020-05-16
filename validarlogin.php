<?php
require 'conexion.php';
session_start();

$usuario = $_POST['nombrelogin'];
$clave = $_POST['passwordlogin'];

$q = "SELECT COUNT(*) as contar from 3registro where nombre='$usuario' and contrasena='$clave'";
$consulta = mysqli_query($conexion,$q);
$array = mysqli_fetch_array($consulta);


if($array['contar']>0){
    $_SESSION['user'] = $usuario;
    header("location: bienvenida.php");
} else{
    $error= "Datos incorrectos!";
    header("location: login.php");
}

mysqli_close($conexion);
?>