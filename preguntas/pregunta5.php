<!doctype html>
<html lang="es" class="h-100">

<head>
    <meta charset="utf-8">
    <title>Preguntas</title>
    <link rel="stylesheet" href="../css/estilos.css" type="text/css">
    <link rel="icon" type="image/png" href="../imgs/logo.png" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="../imgs/logo.png" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/e72a8c50e1.js" crossorigin="anonymous"></script>
</head>
<?php
//Conexion a la BBDD
$conexion = mysqli_connect("hl192.dinaserver.com", "cfgsl_ad1dam20", "morcilla1", "cfgsl_1dam20");
$acentos = $conexion->query("SET NAMES 'utf8'");

/* Comprobar conexión */
if (mysqli_connect_errno()) {
    printf("Conexión fallida: %s\n", mysqli_connect_error());
    exit();
}
//Consulta que se desea ejecutar
$aleatorio = rand(23, 52);
$consulta = "SELECT * FROM 3preguntas WHERE idpregunta=" . $aleatorio . " limit 1";

$resultados = mysqli_query($conexion, $consulta);
while ($mostrar = mysqli_fetch_array($resultados)) {
    $titulo = $mostrar["titulopregunta"];
    $respuesta1 = $mostrar["respuesta1"];
    $respuesta2 = $mostrar["respuesta2"];
    $respuesta3 = $mostrar["respuesta3"];
    $respuesta4 = $mostrar["respuesta4"];
    $respuestas = array($respuesta1, $respuesta2, $respuesta3, $respuesta4);
    shuffle($respuestas);
}

mysqli_close($conexion);

?>

<body class="h-100">
    <div class="container h-100">
        <div class="row justify-content-center h-100">
            <div class="col-sm-8 align-self-center text-center">
                <font face='Comic Neue' color='#085ba4'>
                    <h1><?php echo $titulo; ?></h1>
                </font><br>
                <form method="post" action="auxiliarpreguntas5.php" name="formu" id="formu">
                    <table border="0" width="100%" height="100%" cellpadding="8">
                        <tr>
                            <td align="right"><i class="fas fa-ship colorIconos"></i></td>
                            <td align="left" colspan="3">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="respuesta1" name="respuestas" <?php echo 'value="' . "correcta" . '"' ?> required="required" />
                                    <label class="custom-control-label" for="respuesta1">
                                        <font face='Comic Neue' color='#085ba4'><?php echo $respuesta1; ?></font>
                                    </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><i class="fas fa-ship colorIconos"></i></td>
                            <td align="left" colspan="3">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="respuesta2" name="respuestas" <?php echo 'value="' . $respuesta2 . '"' ?> required="required" />
                                    <label class="custom-control-label" for="respuesta2">
                                        <font face='Comic Neue' color='#085ba4'><?php echo $respuesta2; ?></font>
                                    </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><i class="fas fa-ship colorIconos"></i></td>
                            <td align="left" colspan="3">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="respuesta3" name="respuestas" <?php echo 'value="' . $respuesta3 . '"' ?> required="required" />
                                    <label class="custom-control-label" for="respuesta3">
                                        <font face='Comic Neue' color='#085ba4'><?php echo $respuesta3; ?></font>
                                    </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><i class="fas fa-ship colorIconos"></i></td>
                            <td align="left" colspan="3">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="respuesta4" name="respuestas" <?php echo 'value="' . $respuesta4 . '"' ?> required="required" />
                                    <label class="custom-control-label" for="respuesta4">
                                        <font face='Comic Neue' color='#085ba4'><?php echo $respuesta4; ?></font>
                                    </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td align="center" colspan="3">
                                <input class="btn-group-sm campos submit" type="submit" id="btnPreg" name="btnPreg" width="100" value="Responde!">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>

</body>

</html>