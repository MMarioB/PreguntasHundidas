<?php
$H = 6;       //filas
$V = 7;       //Columnes
$B = 10;       //Bombas
$total_casillas = $H * $V; //Guardo el total de las casillas para moverme luego en un for
$vector;   //declaramos el vector vacio


//vector vacio pero con todas las posiciones
function vector_v(&$vector, $total_casillas, $V)
{
    $j = 0;
    $p = 0;
    for ($i = 1; $i <= $total_casillas; $i++) {
        $vector[$p][$j] = "&nbsp"; //Primero dejamos las posiciones vacias para luego poner los asteriscos
        if ($i % $V == 0) { //Si el modulo de $i con las columnas es 0 creamos otra fila y empezamos otra columna.
            $p++;
            $j = 0;
        } else { //Si no es l modulo segimos creand casillas de columna.
            $j++;
        }
    }
    return $vector;
}



//Esta funcion introduce las minas aleatoriamente en el vector
function poner_m($B, $V, $H, &$vector)
{
    $total = 1; //usaremos esta variable para controlar que se escriban correctamente las minas.
    while ($total <= $B) {
        $h = rand(0, $H - 1); //creamos un numero aleatorio para movernos por las filas
        $v = rand(0, $V - 1); //creamos un numero para movernos por las columnas.
        if ($vector[$h][$v] == "*") { //Si en esa posición aleatoria hay un asterisco que no haga nada

        } else { //Si no hay un asterisco que lo ponga y que incremente el contador.
            $vector[$h][$v] = "*";
            $total++;
        }
    }
    return $vector;
}

//Esta funcion pone los números que indican las posiciones de las minas
function poner_n($H, $V, &$vector)
{

    for ($I = 0; $I < $H; $I++) {            //hacemos 2 fors que nos recorran el vector (columnas y filas)
        for ($J = 0; $J < $V; $J++) {         //Tenemos 8 if's que miran las posiciones que rodean dónde nos encontremos
            if ($vector[$I][$J + 1] == "*") { //miramos si delante hay un asterisco	
                if ($vector[$I][$J] == "*") { //Si lo hay, ahí no hacemos nada.

                } else {
                    $vector[$I][$J] = $vector[$I][$J] + 1; //Si delante ha habido un número incrementamos en la posicion q estamos.
                }
            }
            if ($vector[$I][$J - 1] == "*") { //A partir de aquí es lo mismo todo el rato pero cambiando la posicion.
                if ($vector[$I][$J] == "*") { //Miramos detras, arriba,abajo,etc.

                } else {
                    $vector[$I][$J] = $vector[$I][$J] + 1;
                }
            }
            if ($vector[$I - 1][$J - 1] == "*") {
                if ($vector[$I][$J] == "*") {
                } else {
                    $vector[$I][$J] = $vector[$I][$J] + 1;
                }
            }
            if ($vector[$I + 1][$J - 1] == "*") {
                if ($vector[$I][$J] == "*") {
                } else {
                    $vector[$I][$J] = $vector[$I][$J] + 1;
                }
            }
            if ($vector[$I - 1][$J] == "*") {
                if ($vector[$I][$J] == "*") {
                } else {
                    $vector[$I][$J] = $vector[$I][$J] + 1;
                }
            }
            if ($vector[$I + 1][$J] == "*") {
                if ($vector[$I][$J] == "*") {
                } else {
                    $vector[$I][$J] = $vector[$I][$J] + 1;
                }
            }
            if ($vector[$I - 1][$J + 1] == "*") {
                if ($vector[$I][$J] == "*") {
                } else {
                    $vector[$I][$J] = $vector[$I][$J] + 1;
                }
            }
            if ($vector[$I + 1][$J + 1] == "*") {
                if ($vector[$I][$J] == "*") {
                } else {
                    $vector[$I][$J] = $vector[$I][$J] + 1;
                }
            }
        }
    }
    return $vector;
}

?>
<!doctype html>
<html lang="es" class="h-100">

<head>
    <meta charset="utf-8">
    <title>PREGUNTA HUNDIDAS</title>
    <link rel="stylesheet" href="css/estilos.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="imgs/logo.png" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/e72a8c50e1.js" crossorigin="anonymous"></script>
</head>
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        setTimeout(function() {
            $(".content").fadeOut(1500);
        }, 3000);
    });
</script>

<body class="h-100" background="imgs/fondomar.jpg">
    <div class="container h-100">
        <div class="row justify-content-center h-100">
            <div class="col-sm-8 align-self-center text-center">
                <?php
                //Llamamos a todas las funciones para que se genere el array con el juego hecho.
                vector_v($vector, $total_casillas, $V);
                poner_m($B, $V, $H, $vector);
                poner_n($H, $V, $vector);
                //Comprobamos que seguimos logueados
                session_start();
                if (empty($_SESSION['user'])) {
                    header("location:login.php");
                }

                ?>
                <div class="content"><?php echo $_SESSION['buscaminas']; ?></div>
                <font face='Comic Neue' color='#085ba4'>
                    <h1>PREGUNTAS HUNDIDAS</h1>
                </font>
                <table border='3' cellpadding='20' align="center">
                    <tr>
                        <td>
                            <a href="../preguntashundidas/preguntas/pregunta1.php"><img src="imgs/incognita.png" width="30px" height="30px" /></a>
                        </td>
                        <td>
                            <?php
                            session_start();
                            if ($vector[0][1] == '*') {
                                $_SESSION['puntuaciones'] = "<div class='alert alert-danger' role='alert'>" . 'Incorrecta. Has perdido!' . "</div>";
                                header("Location: http://cfgslosnaranjos.net/1dam19/mariob/php/preguntashundidas/auxiliarpuntuaciones.php");
                            } else {
                                echo $vector[0][1];
                            }

                            ?>
                        </td>
                        <td>
                            <a href="../preguntashundidas/preguntas/pregunta3.php"><img src="imgs/incognita.png" width="30px" height="30px" /></a>
                        </td>
                        <td>
                            <a href="../preguntashundidas/preguntas/pregunta4.php"><img src="imgs/incognita.png" width="30px" height="30px" /></a>
                        </td>
                        <td>
                            <a href="../preguntashundidas/preguntas/pregunta5.php"><img src="imgs/incognita.png" width="30px" height="30px" /></a>
                        </td>
                        <td>
                            <a href="../preguntashundidas/preguntas/pregunta6.php"><img src="imgs/incognita.png" width="30px" height="30px" /></a>
                        </td>
                        <td>
                            <a href="../preguntashundidas/preguntas/pregunta7.php"><img src="imgs/incognita.png" width="30px" height="30px" /></a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="../preguntashundidas/preguntas/pregunta8.php"><img src="imgs/incognita.png" width="30px" height="30px" /></a>
                        </td>
                        <td>
                            <a href="../preguntashundidas/preguntas/pregunta9.php"><img src="imgs/incognita.png" width="30px" height="30px" /></a>
                        </td>
                        <td>
                            <a href="../preguntashundidas/preguntas/pregunta10.php"><img src="imgs/incognita.png" width="30px" height="30px" /></a>
                        </td>
                        <td>
                            <a href="../preguntashundidas/preguntas/pregunta11.php"><img src="imgs/incognita.png" width="30px" height="30px" /></a>
                        </td>
                        <td>
                            <a href="../preguntashundidas/preguntas/pregunta12.php"><img src="imgs/incognita.png" width="30px" height="30px" /></a>
                        </td>
                        <td>
                            <a href="../preguntashundidas/preguntas/pregunta13.php"><img src="imgs/incognita.png" width="30px" height="30px" /></a>
                        </td>
                        <td>
                            <a href="../preguntashundidas/preguntas/pregunta14.php"><img src="imgs/incognita.png" width="30px" height="30px" /></a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="../preguntashundidas/preguntas/pregunta15.php"><img src="imgs/incognita.png" width="30px" height="30px" /></a>
                        </td>
                        <td>
                            <a href="../preguntashundidas/preguntas/pregunta16.php"><img src="imgs/incognita.png" width="30px" height="30px" /></a>
                        </td>
                        <td>
                            <a href="../preguntashundidas/preguntas/pregunta17.php"><img src="imgs/incognita.png" width="30px" height="30px" /></a>
                        </td>
                        <td>
                            <a href="../preguntashundidas/preguntas/pregunta18.php"><img src="imgs/incognita.png" width="30px" height="30px" /></a>
                        </td>
                        <td>
                            <a href="../preguntashundidas/preguntas/pregunta19.php"><img src="imgs/incognita.png" width="30px" height="30px" /></a>
                        </td>
                        <td>
                            <a href="../preguntashundidas/preguntas/pregunta20.php"><img src="imgs/incognita.png" width="30px" height="30px" /></a>
                        </td>
                        <td>
                            <a href="../preguntashundidas/preguntas/pregunta21.php"><img src="imgs/incognita.png" width="30px" height="30px" /></a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="../preguntashundidas/preguntas/pregunta22.php"><img src="imgs/incognita.png" width="30px" height="30px" /></a>
                        </td>
                        <td>
                            <a href="../preguntashundidas/preguntas/pregunta23.php"><img src="imgs/incognita.png" width="30px" height="30px" /></a>
                        </td>
                        <td>
                            <a href="../preguntashundidas/preguntas/pregunta24.php"><img src="imgs/incognita.png" width="30px" height="30px" /></a>
                        </td>
                        <td>
                            <a href="../preguntashundidas/preguntas/pregunta25.php"><img src="imgs/incognita.png" width="30px" height="30px" /></a>
                        </td>
                        <td>
                            <a href="../preguntashundidas/preguntas/pregunta26.php"><img src="imgs/incognita.png" width="30px" height="30px" /></a>
                        </td>
                        <td>
                            <a href="../preguntashundidas/preguntas/pregunta27.php"><img src="imgs/incognita.png" width="30px" height="30px" /></a>
                        </td>
                        <td>
                            <a href="../preguntashundidas/preguntas/pregunta28.php"><img src="imgs/incognita.png" width="30px" height="30px" /></a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="../preguntashundidas/preguntas/pregunta29.php"><img src="imgs/incognita.png" width="30px" height="30px" /></a>
                        </td>
                        <td>
                            <a href="../preguntashundidas/preguntas/pregunta30.php"><img src="imgs/incognita.png" width="30px" height="30px" /></a>
                        </td>
                        <td>
                            <a href="../preguntashundidas/preguntas/pregunta31.php"><img src="imgs/incognita.png" width="30px" height="30px" /></a>
                        </td>
                        <td>
                            <a href="../preguntashundidas/preguntas/pregunta32.php"><img src="imgs/incognita.png" width="30px" height="30px" /></a>
                        </td>
                        <td>
                            <a href="../preguntashundidas/preguntas/pregunta33.php"><img src="imgs/incognita.png" width="30px" height="30px" /></a>
                        </td>
                        <td>
                            <a href="../preguntashundidas/preguntas/pregunta34.php"><img src="imgs/incognita.png" width="30px" height="30px" /></a>
                        </td>
                        <td>
                            <a href="../preguntashundidas/preguntas/pregunta35.php"><img src="imgs/incognita.png" width="30px" height="30px" /></a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="../preguntashundidas/preguntas/pregunta36.php"><img src="imgs/incognita.png" width="30px" height="30px" /></a>
                        </td>
                        <td>
                            <a href="../preguntashundidas/preguntas/pregunta37.php"><img src="imgs/incognita.png" width="30px" height="30px" /></a>
                        </td>
                        <td>
                            <a href="../preguntashundidas/preguntas/pregunta38.php"><img src="imgs/incognita.png" width="30px" height="30px" /></a>
                        </td>
                        <td>
                            <a href="../preguntashundidas/preguntas/pregunta39.php"><img src="imgs/incognita.png" width="30px" height="30px" /></a>
                        </td>
                        <td>
                            <a href="../preguntashundidas/preguntas/pregunta40.php"><img src="imgs/incognita.png" width="30px" height="30px" /></a>
                        </td>
                        <td>
                            <a href="../preguntashundidas/preguntas/pregunta41.php"><img src="imgs/incognita.png" width="30px" height="30px" /></a>
                        </td>
                        <td>
                            <a href="../preguntashundidas/preguntas/pregunta42.php"><img src="imgs/incognita.png" width="30px" height="30px" /></a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>

</html>