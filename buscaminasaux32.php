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
                            <a href="../preguntashundidas/preguntas/pregunta2.php"><img src="imgs/incognita.png" width="30px" height="30px" /></a>
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
                            <?php
                            session_start();
                            if ($_SESSION['matriz'][4][3] == '*') {
                                $_SESSION['puntuaciones'] = "<div class='alert alert-danger' role='alert'>" . 'Incorrecta. Has topado con una mina o no te sabias la pregunta!!' . "</div>";
                                header("Location: http://cfgslosnaranjos.net/1dam19/mariob/php/preguntashundidas/auxiliarpuntuaciones.php");
                            } else {
                                echo $_SESSION['matriz'][4][3];
                            }

                            ?>
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