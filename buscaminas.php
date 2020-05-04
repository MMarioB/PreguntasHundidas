<?php
	$H= 8; 		//filas
	$V= 7; 		//Columnes
	$B= 10; 		//Bombas
	$total_casillas= $H*$V; //Guardo el total de las casillas para moverme luego en un for
	$vector;	//declaramos el vector vacio
 
 
	//vector vacio pero con todas las posiciones
	function vector_v(&$vector,$total_casillas,$V){
	$j=0;
	$p=0;
	for($i=1;$i <= $total_casillas;$i++){
		$vector[$p][$j]= "&nbsp"; //Primero dejamos las posiciones vacias para luego poner los asteriscos
			if($i % $V == 0){ //Si el modulo de $i con las columnas es 0 creamos otra fila y empezamos otra columna.
				$p++;
				$j=0;
			}else{ //Si no es l modulo segimos creand casillas de columna.
			$j++;
			}
		}
	  return $vector;
	}
 
 
 
	//Esta funcion introduce las minas aleatoriamente en el vector
	function poner_m($B,$V,$H,&$vector){
	$total=1;//usaremos esta variable para controlar que se escriban correctamente las minas.
	while($total <= $B){
	$h=rand(0,$H-1);//creamos un numero aleatorio para movernos por las filas
	$v=rand(0,$V-1);//creamos un numero para movernos por las columnas.
            if ($vector[$h][$v] == "*"){//Si en esa posición aleatoria hay un asterisco que no haga nada
 
			}else{//Si no hay un asterisco que lo ponga y que incremente el contador.
			$vector[$h][$v] = "*";
			$total++;
			}
		}
		return $vector;
	}
 
	//Esta funcion pone los números que indican las posiciones de las minas
	function poner_n($H,$V,&$vector){
 
	for($I=0;$I < $H;$I++){				//hacemos 2 fors que nos recorran el vector (columnas y filas)
		for($J=0;$J < $V;$J++){			//Tenemos 8 if's que miran las posiciones que rodean dónde nos encontremos
			 if($vector[$I][$J+1]=="*"){ //miramos si delante hay un asterisco	
				if($vector[$I][$J]=="*"){//Si lo hay, ahí no hacemos nada.
 
				}else{ 
					$vector[$I][$J]=$vector[$I][$J]+1;//Si delante ha habido un número incrementamos en la posicion q estamos.
					}
			}if($vector[$I][$J-1]=="*"){//A partir de aquí es lo mismo todo el rato pero cambiando la posicion.
				if($vector[$I][$J]=="*"){//Miramos detras, arriba,abajo,etc.
 
				}else{
				$vector[$I][$J]=$vector[$I][$J]+1;
				}
			}if($vector[$I-1][$J-1]=="*"){
				if($vector[$I][$J]=="*"){
 
				}else{
				$vector[$I][$J]=$vector[$I][$J]+1;
				}
			}if($vector[$I+1][$J-1]=="*"){
				if($vector[$I][$J]=="*"){
 
				}else{
				$vector[$I][$J]=$vector[$I][$J]+1;
				}
 
			}if($vector[$I-1][$J]=="*"){
				if($vector[$I][$J]=="*"){
 
				}else{
				$vector[$I][$J]=$vector[$I][$J]+1;
				}
			}if($vector[$I+1][$J]=="*"){
				if($vector[$I][$J]=="*"){
 
				}else{
				$vector[$I][$J]=$vector[$I][$J]+1;
				}
			}if($vector[$I-1][$J+1]=="*"){
				if($vector[$I][$J]=="*"){
				}else{
				$vector[$I][$J]=$vector[$I][$J]+1;
				}
			}
			if($vector[$I+1][$J+1]=="*"){
				if($vector[$I][$J]=="*"){
 
				}else{
				$vector[$I][$J]=$vector[$I][$J]+1;
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
    <script languague="javascript">
        function toggle(tableid){
          var id = jQuery(tableid).data('id')
          jQuery('#Tabla_Mostrar'+id).toggle();
        }

        jQuery(document).ready(function(){
          jQuery('.opciones').on('click', function(){
            toggle(this)
          })
        });
    </script>
    <script languague="javascript">
        function mostrar1() {
            div = document.getElementById('flotante1');
            div.style.display = '';
        }

        function cerrar1() {
            div = document.getElementById('flotante1');
            div.style.display = 'none';
        }
    </script>
    <script languague="javascript">
        function mostrar2() {
            div = document.getElementById('flotante2');
            div.style.display = '';
        }

        function cerrar2() {
            div = document.getElementById('flotante2');
            div.style.display = 'none';
        }
    </script>
    <script languague="javascript">
        function mostrar3() {
            div = document.getElementById('flotante3');
            div.style.display = '';
        }

        function cerrar3() {
            div = document.getElementById('flotante3');
            div.style.display = 'none';
        }
    </script>
    <script languague="javascript">
        function mostrar4() {
            div = document.getElementById('flotante4');
            div.style.display = '';
        }

        function cerrar4() {
            div = document.getElementById('flotante4');
            div.style.display = 'none';
        }
    </script>
    <script languague="javascript">
        function mostrar5() {
            div = document.getElementById('flotante5');
            div.style.display = '';
        }

        function cerrar5() {
            div = document.getElementById('flotante5');
            div.style.display = 'none';
        }
    </script>
    <script languague="javascript">
        function mostrar6() {
            div = document.getElementById('flotante6');
            div.style.display = '';
        }

        function cerrar6() {
            div = document.getElementById('flotante6');
            div.style.display = 'none';
        }
    </script>
    <script languague="javascript">
        function mostrar7() {
            div = document.getElementById('flotante7');
            div.style.display = '';
        }

        function cerrar7() {
            div = document.getElementById('flotante7');
            div.style.display = 'none';
        }
    </script>
    <script languague="javascript">
        function mostrar8() {
            div = document.getElementById('flotante8');
            div.style.display = '';
        }

        function cerrar8() {
            div = document.getElementById('flotante8');
            div.style.display = 'none';
        }
    </script>
    <script languague="javascript">
        function mostrar9() {
            div = document.getElementById('flotante9');
            div.style.display = '';
        }

        function cerrar9() {
            div = document.getElementById('flotante9');
            div.style.display = 'none';
        }
    </script>
    <script languague="javascript">
        function mostrar10() {
            div = document.getElementById('flotante10');
            div.style.display = '';
        }

        function cerrar10() {
            div = document.getElementById('flotante10');
            div.style.display = 'none';
        }
    </script>
    <script languague="javascript">
        function mostrar11() {
            div = document.getElementById('flotante11');
            div.style.display = '';
        }

        function cerrar11() {
            div = document.getElementById('flotante11');
            div.style.display = 'none';
        }
    </script>
    <script languague="javascript">
        function mostrar12() {
            div = document.getElementById('flotante12');
            div.style.display = '';
        }

        function cerrar12() {
            div = document.getElementById('flotante12');
            div.style.display = 'none';
        }
    </script>
    <script languague="javascript">
        function mostrar13() {
            div = document.getElementById('flotante13');
            div.style.display = '';
        }

        function cerrar13() {
            div = document.getElementById('flotante13');
            div.style.display = 'none';
        }
    </script>
    <script languague="javascript">
        function mostrar14() {
            div = document.getElementById('flotante14');
            div.style.display = '';
        }

        function cerrar14() {
            div = document.getElementById('flotante14');
            div.style.display = 'none';
        }
    </script>
    <script languague="javascript">
        function mostrar15() {
            div = document.getElementById('flotante15');
            div.style.display = '';
        }

        function cerrar15() {
            div = document.getElementById('flotante15');
            div.style.display = 'none';
        }
    </script>
    <script languague="javascript">
        function mostrar16() {
            div = document.getElementById('flotante16');
            div.style.display = '';
        }

        function cerrar16() {
            div = document.getElementById('flotante16');
            div.style.display = 'none';
        }
    </script>
    <script languague="javascript">
        function mostrar17() {
            div = document.getElementById('flotante17');
            div.style.display = '';
        }

        function cerrar17() {
            div = document.getElementById('flotante17');
            div.style.display = 'none';
        }
    </script>
    <script languague="javascript">
        function mostrar18() {
            div = document.getElementById('flotante18');
            div.style.display = '';
        }

        function cerrar18() {
            div = document.getElementById('flotante18');
            div.style.display = 'none';
        }
    </script>
    <script languague="javascript">
        function mostrar19() {
            div = document.getElementById('flotante19');
            div.style.display = '';
        }

        function cerrar19() {
            div = document.getElementById('flotante19');
            div.style.display = 'none';
        }
    </script>
    <script languague="javascript">
        function mostrar20() {
            div = document.getElementById('flotante20');
            div.style.display = '';
        }

        function cerrar20() {
            div = document.getElementById('flotante20');
            div.style.display = 'none';
        }
    </script>
    <script languague="javascript">
        function mostrar21() {
            div = document.getElementById('flotante21');
            div.style.display = '';
        }

        function cerrar21() {
            div = document.getElementById('flotante21');
            div.style.display = 'none';
        }
    </script>
    <script languague="javascript">
        function mostrar22() {
            div = document.getElementById('flotante22');
            div.style.display = '';
        }

        function cerrar22() {
            div = document.getElementById('flotante22');
            div.style.display = 'none';
        }
    </script>
    <script languague="javascript">
        function mostrar23() {
            div = document.getElementById('flotante23');
            div.style.display = '';
        }

        function cerrar23() {
            div = document.getElementById('flotante23');
            div.style.display = 'none';
        }
    </script>
    <script languague="javascript">
        function mostrar24() {
            div = document.getElementById('flotante24');
            div.style.display = '';
        }

        function cerrar24() {
            div = document.getElementById('flotante24');
            div.style.display = 'none';
        }
    </script>
    <script languague="javascript">
        function mostrar25() {
            div = document.getElementById('flotante25');
            div.style.display = '';
        }

        function cerrar25() {
            div = document.getElementById('flotante25');
            div.style.display = 'none';
        }
    </script>
    <script languague="javascript">
        function mostrar26() {
            div = document.getElementById('flotante26');
            div.style.display = '';
        }

        function cerrar26() {
            div = document.getElementById('flotante26');
            div.style.display = 'none';
        }
    </script>
    <script languague="javascript">
        function mostrar27() {
            div = document.getElementById('flotante27');
            div.style.display = '';
        }

        function cerrar27() {
            div = document.getElementById('flotante27');
            div.style.display = 'none';
        }
    </script>
    <script languague="javascript">
        function mostrar28() {
            div = document.getElementById('flotante28');
            div.style.display = '';
        }

        function cerrar28() {
            div = document.getElementById('flotante28');
            div.style.display = 'none';
        }
    </script>
        <script languague="javascript">
        function mostrar29() {
            div = document.getElementById('flotante29');
            div.style.display = '';
        }

        function cerrar29() {
            div = document.getElementById('flotante29');
            div.style.display = 'none';
        }
    </script>
    <script languague="javascript">
        function mostrar30() {
            div = document.getElementById('flotante30');
            div.style.display = '';
        }

        function cerrar30() {
            div = document.getElementById('flotante30');
            div.style.display = 'none';
        }
    </script>
    <script languague="javascript">
        function mostrar31() {
            div = document.getElementById('flotante31');
            div.style.display = '';
        }

        function cerrar31() {
            div = document.getElementById('flotante31');
            div.style.display = 'none';
        }
    </script>
    <script languague="javascript">
        function mostrar32() {
            div = document.getElementById('flotante32');
            div.style.display = '';
        }

        function cerrar32() {
            div = document.getElementById('flotante32');
            div.style.display = 'none';
        }
    </script>
    <script languague="javascript">
        function mostrar33() {
            div = document.getElementById('flotante33');
            div.style.display = '';
        }

        function cerrar33() {
            div = document.getElementById('flotante33');
            div.style.display = 'none';
        }
    </script>
    <script languague="javascript">
        function mostrar34() {
            div = document.getElementById('flotante34');
            div.style.display = '';
        }

        function cerrar34() {
            div = document.getElementById('flotante34');
            div.style.display = 'none';
        }
    </script>
    <script languague="javascript">
        function mostrar35() {
            div = document.getElementById('flotante35');
            div.style.display = '';
        }

        function cerrar35() {
            div = document.getElementById('flotante35');
            div.style.display = 'none';
        }
    </script>
    <script languague="javascript">
        function mostrar36() {
            div = document.getElementById('flotante36');
            div.style.display = '';
        }

        function cerrar36() {
            div = document.getElementById('flotante36');
            div.style.display = 'none';
        }
    </script>
    <script languague="javascript">
        function mostrar37() {
            div = document.getElementById('flotante37');
            div.style.display = '';
        }

        function cerrar37() {
            div = document.getElementById('flotante37');
            div.style.display = 'none';
        }
    </script>
    <script languague="javascript">
        function mostrar38() {
            div = document.getElementById('flotante38');
            div.style.display = '';
        }

        function cerrar38() {
            div = document.getElementById('flotante38');
            div.style.display = 'none';
        }
    </script>
    <script languague="javascript">
        function mostrar39() {
            div = document.getElementById('flotante39');
            div.style.display = '';
        }

        function cerrar39() {
            div = document.getElementById('flotante39');
            div.style.display = 'none';
        }
    </script>
    <script languague="javascript">
        function mostrar40() {
            div = document.getElementById('flotante40');
            div.style.display = '';
        }

        function cerrar40() {
            div = document.getElementById('flotante40');
            div.style.display = 'none';
        }
    </script>
    <script languague="javascript">
        function mostrar41() {
            div = document.getElementById('flotante41');
            div.style.display = '';
        }

        function cerrar41() {
            div = document.getElementById('flotante41');
            div.style.display = 'none';
        }
    </script>
    <script languague="javascript">
        function mostrar42() {
            div = document.getElementById('flotante42');
            div.style.display = '';
        }

        function cerrar42() {
            div = document.getElementById('flotante42');
            div.style.display = 'none';
        }
    </script>
    <script languague="javascript">
        function mostrar43() {
            div = document.getElementById('flotante43');
            div.style.display = '';
        }

        function cerrar43() {
            div = document.getElementById('flotante43');
            div.style.display = 'none';
        }
    </script>
    <script languague="javascript">
        function mostrar44() {
            div = document.getElementById('flotante44');
            div.style.display = '';
        }

        function cerrar44() {
            div = document.getElementById('flotante44');
            div.style.display = 'none';
        }
    </script>
    <script languague="javascript">
        function mostrar45() {
            div = document.getElementById('flotante45');
            div.style.display = '';
        }

        function cerrar45() {
            div = document.getElementById('flotante45');
            div.style.display = 'none';
        }
    </script>
    <script languague="javascript">
        function mostrar46() {
            div = document.getElementById('flotante46');
            div.style.display = '';
        }

        function cerrar46() {
            div = document.getElementById('flotante46');
            div.style.display = 'none';
        }
    </script>
    <script languague="javascript">
        function mostrar47() {
            div = document.getElementById('flotante47');
            div.style.display = '';
        }

        function cerrar47() {
            div = document.getElementById('flotante47');
            div.style.display = 'none';
        }
    </script>
    <script languague="javascript">
        function mostrar48() {
            div = document.getElementById('flotante48');
            div.style.display = '';
        }

        function cerrar48() {
            div = document.getElementById('flotante48');
            div.style.display = 'none';
        }
    </script>
    <script languague="javascript">
        function mostrar49() {
            div = document.getElementById('flotante49');
            div.style.display = '';
        }

        function cerrar49() {
            div = document.getElementById('flotante49');
            div.style.display = 'none';
        }
    </script>
    <script languague="javascript">
        function mostrar50() {
            div = document.getElementById('flotante50');
            div.style.display = '';
        }

        function cerrar50() {
            div = document.getElementById('flotante50');
            div.style.display = 'none';
        }
    </script>
    <script languague="javascript">
        function mostrar51() {
            div = document.getElementById('flotante51');
            div.style.display = '';
        }

        function cerrar51() {
            div = document.getElementById('flotante51');
            div.style.display = 'none';
        }
    </script>
    <script languague="javascript">
        function mostrar52() {
            div = document.getElementById('flotante52');
            div.style.display = '';
        }

        function cerrar52() {
            div = document.getElementById('flotante52');
            div.style.display = 'none';
        }
    </script>
    <script languague="javascript">
        function mostrar53() {
            div = document.getElementById('flotante53');
            div.style.display = '';
        }

        function cerrar53() {
            div = document.getElementById('flotante53');
            div.style.display = 'none';
        }
    </script>
    <script languague="javascript">
        function mostrar54() {
            div = document.getElementById('flotante54');
            div.style.display = '';
        }

        function cerrar54() {
            div = document.getElementById('flotante54');
            div.style.display = 'none';
        }
    </script>
    <script languague="javascript">
        function mostrar55() {
            div = document.getElementById('flotante55');
            div.style.display = '';
        }

        function cerrar55() {
            div = document.getElementById('flotante55');
            div.style.display = 'none';
        }
    </script>
    <script languague="javascript">
        function mostrar56() {
            div = document.getElementById('flotante56');
            div.style.display = '';
        }

        function cerrar56() {
            div = document.getElementById('flotante56');
            div.style.display = 'none';
        }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>

<body class="h-100" background="imgs/fondomar.jpg">
	<div class="container h-100">
		<div class="row justify-content-center h-100">
			<div class="col-sm-8 align-self-center text-center">
                <?php 
                    //Llamamos a todas las funciones para que se genere el array con el juego hecho.
                    vector_v($vector,$total_casillas,$V);
                    poner_m($B,$V,$H,$vector);
                    poner_n($H,$V,$vector);
                ?>
                <h1><b>PREGUNTAS HUNDIDAS</b></h1>
                <table border='3'cellpadding='20' align="center">
                    <tr>
                        <td>
                            <a href="javascript:mostrar1();"><img src="imgs/incognita.png" width="30px" height="30px"/>
                                <div id="flotante1" style="display:none;">
                                  <div id="close"><a href="javascript:cerrar1();"><font color="#8dd8f8">.</font></a></div>
                                     <table align="center">
                                        <tr id="Mostrar_Tabla1" data-id="1" class="opciones">
                                            <td>
                                        
                                            </td>
                                        </tr>
                                        <tr id="Tabla_Mostrar1">
                                            <td align="center">
                                               <?php echo $vector[0][0] ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </a>
                        </td>
                         <td>
                             <a href="javascript:mostrar2();"><img src="imgs/incognita.png" width="30px" height="30px"/>
                                <div id="flotante2" style="display:none;">
                                  <div id="close"><a href="javascript:cerrar2();"><font color="#8dd8f8">.</font></a></div>
                                     <table align="center">
                                        <tr id="Mostrar_Tabla2" data-id="2" class="opciones">
                                            <td>
                                        
                                            </td>
                                        </tr>
                                        <tr id="Tabla_Mostrar2">
                                            <td align="center">
                                               <?php echo $vector[0][1] ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </a>
                         <td>
                             <a href="javascript:mostrar3();"><img src="imgs/incognita.png" width="30px" height="30px"/>
                                <div id="flotante3" style="display:none;">
                                  <div id="close"><a href="javascript:cerrar3();"><font color="#8dd8f8">.</font></a></div>
                                     <table align="center">
                                        <tr id="Mostrar_Tabla3" data-id="3" class="opciones">
                                            <td>
                                        
                                            </td>
                                        </tr>
                                        <tr id="Tabla_Mostrar3">
                                            <td align="center">
                                               <?php echo $vector[0][2] ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </a>
                         </td>
                         <td>
                             <a href="javascript:mostrar4();"><img src="imgs/incognita.png" width="30px" height="30px"/>
                                <div id="flotante4" style="display:none;">
                                  <div id="close"><a href="javascript:cerrar4();"><font color="#8dd8f8">.</font></a></div>
                                     <table align="center">
                                        <tr id="Mostrar_Tabla4" data-id="4" class="opciones">
                                            <td>
                                        
                                            </td>
                                        </tr>
                                        <tr id="Tabla_Mostrar4">
                                            <td align="center">
                                               <?php echo $vector[0][3] ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </a>
                         </td>
                         <td>
                             <a href="javascript:mostrar5();"><img src="imgs/incognita.png" width="30px" height="30px"/>
                                <div id="flotante5" style="display:none;">
                                  <div id="close"><a href="javascript:cerrar5();"><font color="#8dd8f8">.</font></a></div>
                                     <table align="center">
                                        <tr id="Mostrar_Tabla5" data-id="5" class="opciones">
                                            <td>
                                        
                                            </td>
                                        </tr>
                                        <tr id="Tabla_Mostrar5">
                                            <td align="center">
                                               <?php echo $vector[0][4] ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </a>
                         </td>
                        <td>
                             <a href="javascript:mostrar6();"><img src="imgs/incognita.png" width="30px" height="30px"/>
                                <div id="flotante6" style="display:none;">
                                  <div id="close"><a href="javascript:cerrar6();"><font color="#8dd8f8">.</font></a></div>
                                     <table align="center">
                                        <tr id="Mostrar_Tabla6" data-id="6" class="opciones">
                                            <td>
                                        
                                            </td>
                                        </tr>
                                        <tr id="Tabla_Mostrar6">
                                            <td align="center">
                                               <?php echo $vector[0][5] ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </a>
                         </td>
                         <td>
                             <a href="javascript:mostrar7();"><img src="imgs/incognita.png" width="30px" height="30px"/>
                                <div id="flotante7" style="display:none;">
                                  <div id="close"><a href="javascript:cerrar7();"><font color="#8dd8f8">.</font></a></div>
                                     <table align="center">
                                        <tr id="Mostrar_Tabla7" data-id="7" class="opciones">
                                            <td>
                                        
                                            </td>
                                        </tr>
                                        <tr id="Tabla_Mostrar7">
                                            <td align="center">
                                               <?php echo $vector[0][6] ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </a>
                         </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="javascript:mostrar8();"><img src="imgs/incognita.png" width="30px" height="30px"/>
                                <div id="flotante8" style="display:none;">
                                  <div id="close"><a href="javascript:cerrar8();"><font color="#8dd8f8">.</font></a></div>
                                     <table align="center">
                                        <tr id="Mostrar_Tabla8" data-id="8" class="opciones">
                                            <td>
                                        
                                            </td>
                                        </tr>
                                        <tr id="Tabla_Mostrar8">
                                            <td align="center">
                                               <?php echo $vector[1][0] ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </a>
                        </td>
                         <td>
                             <a href="javascript:mostrar9();"><img src="imgs/incognita.png" width="30px" height="30px"/>
                                <div id="flotante9" style="display:none;">
                                  <div id="close"><a href="javascript:cerrar9();"><font color="#8dd8f8">.</font></a></div>
                                     <table align="center">
                                        <tr id="Mostrar_Tabla9" data-id="9" class="opciones">
                                            <td>
                                        
                                            </td>
                                        </tr>
                                        <tr id="Tabla_Mostrar9">
                                            <td align="center">
                                               <?php echo $vector[1][1] ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </a>
                         </td>
                         <td>
                             <a href="javascript:mostrar10();"><img src="imgs/incognita.png" width="30px" height="30px"/>
                                <div id="flotante10" style="display:none;">
                                  <div id="close"><a href="javascript:cerrar10();"><font color="#8dd8f8">.</font></a></div>
                                     <table align="center">
                                        <tr id="Mostrar_Tabla10" data-id="10" class="opciones">
                                            <td>
                                        
                                            </td>
                                        </tr>
                                        <tr id="Tabla_Mostrar10">
                                            <td align="center">
                                               <?php echo $vector[1][2] ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                             </a>
                         </td>
                         <td>
                             <a href="javascript:mostrar11();"><img src="imgs/incognita.png" width="30px" height="30px"/>
                                <div id="flotante11" style="display:none;">
                                  <div id="close"><a href="javascript:cerrar11();"><font color="#8dd8f8">.</font></a></div>
                                     <table align="center">
                                        <tr id="Mostrar_Tabla11" data-id="11" class="opciones">
                                            <td>
                                        
                                            </td>
                                        </tr>
                                        <tr id="Tabla_Mostrar11">
                                            <td align="center">
                                               <?php echo $vector[1][3] ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                             </a>
                         </td>
                         <td>
                             <a href="javascript:mostrar12();"><img src="imgs/incognita.png" width="30px" height="30px"/>
                                <div id="flotante12" style="display:none;">
                                  <div id="close"><a href="javascript:cerrar12();"><font color="#8dd8f8">.</font></a></div>
                                     <table align="center">
                                        <tr id="Mostrar_Tabla12" data-id="12" class="opciones">
                                            <td>
                                        
                                            </td>
                                        </tr>
                                        <tr id="Tabla_Mostrar12">
                                            <td align="center">
                                               <?php echo $vector[1][4] ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                             </a>
                         </td>
                        <td>
                             <a href="javascript:mostrar13();"><img src="imgs/incognita.png" width="30px" height="30px"/>
                                <div id="flotante13" style="display:none;">
                                  <div id="close"><a href="javascript:cerrar13();"><font color="#8dd8f8">.</font></a></div>
                                     <table align="center">
                                        <tr id="Mostrar_Tabla13" data-id="13" class="opciones">
                                            <td>
                                        
                                            </td>
                                        </tr>
                                        <tr id="Tabla_Mostrar13">
                                            <td align="center">
                                               <?php echo $vector[1][5] ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                             </a>
                         </td>
                         <td>
                             <a href="javascript:mostrar14();"><img src="imgs/incognita.png" width="30px" height="30px"/>
                                <div id="flotante14" style="display:none;">
                                  <div id="close"><a href="javascript:cerrar14();"><font color="#8dd8f8">.</font></a></div>
                                     <table align="center">
                                        <tr id="Mostrar_Tabla14" data-id="14" class="opciones">
                                            <td>
                                        
                                            </td>
                                        </tr>
                                        <tr id="Tabla_Mostrar14">
                                            <td align="center">
                                               <?php echo $vector[1][6] ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                             </a>
                         </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="javascript:mostrar15();"><img src="imgs/incognita.png" width="30px" height="30px"/>
                                <div id="flotante15" style="display:none;">
                                  <div id="close"><a href="javascript:cerrar15();"><font color="#8dd8f8">.</font></a></div>
                                     <table align="center">
                                        <tr id="Mostrar_Tabla15" data-id="15" class="opciones">
                                            <td>
                                        
                                            </td>
                                        </tr>
                                        <tr id="Tabla_Mostrar15">
                                            <td align="center">
                                               <?php echo $vector[2][0] ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                             </a>
                        </td>
                         <td>
                             <a href="javascript:mostrar16();"><img src="imgs/incognita.png" width="30px" height="30px"/>
                                <div id="flotante16" style="display:none;">
                                  <div id="close"><a href="javascript:cerrar16();"><font color="#8dd8f8">.</font></a></div>
                                     <table align="center">
                                        <tr id="Mostrar_Tabla16" data-id="16" class="opciones">
                                            <td>
                                        
                                            </td>
                                        </tr>
                                        <tr id="Tabla_Mostrar16">
                                            <td align="center">
                                               <?php echo $vector[2][1] ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                             </a>
                         </td>
                         <td>
                             <a href="javascript:mostrar17();"><img src="imgs/incognita.png" width="30px" height="30px"/>
                                <div id="flotante17" style="display:none;">
                                  <div id="close"><a href="javascript:cerrar17();"><font color="#8dd8f8">.</font></a></div>
                                     <table align="center">
                                        <tr id="Mostrar_Tabla17" data-id="17" class="opciones">
                                            <td>
                                        
                                            </td>
                                        </tr>
                                        <tr id="Tabla_Mostrar17">
                                            <td align="center">
                                               <?php echo $vector[2][2] ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                             </a>
                         </td>
                         <td>
                             <a href="javascript:mostrar18();"><img src="imgs/incognita.png" width="30px" height="30px"/>
                                <div id="flotante18" style="display:none;">
                                  <div id="close"><a href="javascript:cerrar18();"><font color="#8dd8f8">.</font></a></div>
                                     <table align="center">
                                        <tr id="Mostrar_Tabla18" data-id="18" class="opciones">
                                            <td>
                                        
                                            </td>
                                        </tr>
                                        <tr id="Tabla_Mostrar18">
                                            <td align="center">
                                               <?php echo $vector[2][3] ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                             </a>
                         </td>
                         <td>
                             <a href="javascript:mostrar19();"><img src="imgs/incognita.png" width="30px" height="30px"/>
                                <div id="flotante19" style="display:none;">
                                  <div id="close"><a href="javascript:cerrar19();"><font color="#8dd8f8">.</font></a></div>
                                     <table align="center">
                                        <tr id="Mostrar_Tabla19" data-id="19" class="opciones">
                                            <td>
                                        
                                            </td>
                                        </tr>
                                        <tr id="Tabla_Mostrar19">
                                            <td align="center">
                                               <?php echo $vector[2][4] ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                             </a>
                         </td>
                        <td>
                             <a href="javascript:mostrar20();"><img src="imgs/incognita.png" width="30px" height="30px"/>
                                <div id="flotante20" style="display:none;">
                                  <div id="close"><a href="javascript:cerrar20();"><font color="#8dd8f8">.</font></a></div>
                                     <table align="center">
                                        <tr id="Mostrar_Tabla20" data-id="20" class="opciones">
                                            <td>
                                        
                                            </td>
                                        </tr>
                                        <tr id="Tabla_Mostrar20">
                                            <td align="center">
                                               <?php echo $vector[2][5] ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                             </a>
                         </td>
                         <td>
                             <a href="javascript:mostrar21();"><img src="imgs/incognita.png" width="30px" height="30px"/>
                                <div id="flotante21" style="display:none;">
                                  <div id="close"><a href="javascript:cerrar21();"><font color="#8dd8f8">.</font></a></div>
                                     <table align="center">
                                        <tr id="Mostrar_Tabla21" data-id="21" class="opciones">
                                            <td>
                                        
                                            </td>
                                        </tr>
                                        <tr id="Tabla_Mostrar21">
                                            <td align="center">
                                               <?php echo $vector[2][6] ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                             </a>
                         </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="javascript:mostrar22();"><img src="imgs/incognita.png" width="30px" height="30px"/>
                                <div id="flotante22" style="display:none;">
                                  <div id="close"><a href="javascript:cerrar22();"><font color="#8dd8f8">.</font></a></div>
                                     <table align="center">
                                        <tr id="Mostrar_Tabla22" data-id="22" class="opciones">
                                            <td>
                                        
                                            </td>
                                        </tr>
                                        <tr id="Tabla_Mostrar22">
                                            <td align="center">
                                               <?php echo $vector[3][0] ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                             </a>
                        </td>
                         <td>
                              <a href="javascript:mostrar23();"><img src="imgs/incognita.png" width="30px" height="30px"/>
                                <div id="flotante23" style="display:none;">
                                  <div id="close"><a href="javascript:cerrar23();"><font color="#8dd8f8">.</font></a></div>
                                     <table align="center">
                                        <tr id="Mostrar_Tabla23" data-id="23" class="opciones">
                                            <td>
                                        
                                            </td>
                                        </tr>
                                        <tr id="Tabla_Mostrar23">
                                            <td align="center">
                                               <?php echo $vector[3][1] ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                             </a>
                         </td>
                         <td>
                              <a href="javascript:mostrar24();"><img src="imgs/incognita.png" width="30px" height="30px"/>
                                <div id="flotante24" style="display:none;">
                                  <div id="close"><a href="javascript:cerrar24();"><font color="#8dd8f8">.</font></a></div>
                                     <table align="center">
                                        <tr id="Mostrar_Tabla24" data-id="24" class="opciones">
                                            <td>
                                        
                                            </td>
                                        </tr>
                                        <tr id="Tabla_Mostrar24">
                                            <td align="center">
                                               <?php echo $vector[3][2] ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                             </a>
                         </td>
                         <td>
                              <a href="javascript:mostrar25();"><img src="imgs/incognita.png" width="30px" height="30px"/>
                                <div id="flotante25" style="display:none;">
                                  <div id="close"><a href="javascript:cerrar25();"><font color="#8dd8f8">.</font></a></div>
                                     <table align="center">
                                        <tr id="Mostrar_Tabla25" data-id="25" class="opciones">
                                            <td>
                                        
                                            </td>
                                        </tr>
                                        <tr id="Tabla_Mostrar25">
                                            <td align="center">
                                               <?php echo $vector[3][3] ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                             </a>
                         </td>
                         <td>
                              <a href="javascript:mostrar26();"><img src="imgs/incognita.png" width="30px" height="30px"/>
                                <div id="flotante26" style="display:none;">
                                  <div id="close"><a href="javascript:cerrar26();"><font color="#8dd8f8">.</font></a></div>
                                     <table align="center">
                                        <tr id="Mostrar_Tabla26" data-id="26" class="opciones">
                                            <td>
                                        
                                            </td>
                                        </tr>
                                        <tr id="Tabla_Mostrar26">
                                            <td align="center">
                                               <?php echo $vector[3][4] ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                             </a>
                         </td>
                        <td>
                              <a href="javascript:mostrar27();"><img src="imgs/incognita.png" width="30px" height="30px"/>
                                <div id="flotante27" style="display:none;">
                                  <div id="close"><a href="javascript:cerrar27();"><font color="#8dd8f8">.</font></a></div>
                                     <table align="center">
                                        <tr id="Mostrar_Tabla27" data-id="27" class="opciones">
                                            <td>
                                        
                                            </td>
                                        </tr>
                                        <tr id="Tabla_Mostrar27">
                                            <td align="center">
                                               <?php echo $vector[3][5] ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                             </a>
                         </td>
                         <td>
                              <a href="javascript:mostrar28();"><img src="imgs/incognita.png" width="30px" height="30px"/>
                                <div id="flotante28" style="display:none;">
                                  <div id="close"><a href="javascript:cerrar28();"><font color="#8dd8f8">.</font></a></div>
                                     <table align="center">
                                        <tr id="Mostrar_Tabla28" data-id="28" class="opciones">
                                            <td>
                                        
                                            </td>
                                        </tr>
                                        <tr id="Tabla_Mostrar28">
                                            <td align="center">
                                               <?php echo $vector[3][6] ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                             </a>
                         </td>
                    </tr>
                    <tr>
                        <td>
                             <a href="javascript:mostrar29();"><img src="imgs/incognita.png" width="30px" height="30px"/>
                                <div id="flotante29" style="display:none;">
                                  <div id="close"><a href="javascript:cerrar29();"><font color="#8dd8f8">.</font></a></div>
                                     <table align="center">
                                        <tr id="Mostrar_Tabla29" data-id="29" class="opciones">
                                            <td>
                                        
                                            </td>
                                        </tr>
                                        <tr id="Tabla_Mostrar29">
                                            <td align="center">
                                               <?php echo $vector[4][0] ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                             </a>
                        </td>
                         <td>
                              <a href="javascript:mostrar30();"><img src="imgs/incognita.png" width="30px" height="30px"/>
                                <div id="flotante30" style="display:none;">
                                  <div id="close"><a href="javascript:cerrar30();"><font color="#8dd8f8">.</font></a></div>
                                     <table align="center">
                                        <tr id="Mostrar_Tabla30" data-id="30" class="opciones">
                                            <td>
                                        
                                            </td>
                                        </tr>
                                        <tr id="Tabla_Mostrar30">
                                            <td align="center">
                                               <?php echo $vector[4][1] ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                             </a>
                         </td>
                         <td>
                             <a href="javascript:mostrar31();"><img src="imgs/incognita.png" width="30px" height="30px"/>
                                <div id="flotante31" style="display:none;">
                                  <div id="close"><a href="javascript:cerrar31();"><font color="#8dd8f8">.</font></a></div>
                                     <table align="center">
                                        <tr id="Mostrar_Tabla31" data-id="31" class="opciones">
                                            <td>
                                        
                                            </td>
                                        </tr>
                                        <tr id="Tabla_Mostrar31">
                                            <td align="center">
                                               <?php echo $vector[4][2] ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                             </a>
                         </td>
                         <td>
                             <a href="javascript:mostrar32();"><img src="imgs/incognita.png" width="30px" height="30px"/>
                                <div id="flotante32" style="display:none;">
                                  <div id="close"><a href="javascript:cerrar32();"><font color="#8dd8f8">.</font></a></div>
                                     <table align="center">
                                        <tr id="Mostrar_Tabla32" data-id="32" class="opciones">
                                            <td>
                                        
                                            </td>
                                        </tr>
                                        <tr id="Tabla_Mostrar32">
                                            <td align="center">
                                               <?php echo $vector[4][3] ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                             </a>
                         </td>
                         <td>
                             <a href="javascript:mostrar33();"><img src="imgs/incognita.png" width="30px" height="30px"/>
                                <div id="flotante33" style="display:none;">
                                  <div id="close"><a href="javascript:cerrar33();"><font color="#8dd8f8">.</font></a></div>
                                     <table align="center">
                                        <tr id="Mostrar_Tabla33" data-id="33" class="opciones">
                                            <td>
                                        
                                            </td>
                                        </tr>
                                        <tr id="Tabla_Mostrar33">
                                            <td align="center">
                                               <?php echo $vector[4][4] ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                             </a>
                         </td>
                        <td>
                             <a href="javascript:mostrar34();"><img src="imgs/incognita.png" width="30px" height="30px"/>
                                <div id="flotante34" style="display:none;">
                                  <div id="close"><a href="javascript:cerrar34();"><font color="#8dd8f8">.</font></a></div>
                                     <table align="center">
                                        <tr id="Mostrar_Tabla34" data-id="34" class="opciones">
                                            <td>
                                        
                                            </td>
                                        </tr>
                                        <tr id="Tabla_Mostrar34">
                                            <td align="center">
                                               <?php echo $vector[4][5] ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                             </a>
                         </td>
                         <td>
                             <a href="javascript:mostrar35();"><img src="imgs/incognita.png" width="30px" height="30px"/>
                                <div id="flotante35" style="display:none;">
                                  <div id="close"><a href="javascript:cerrar35();"><font color="#8dd8f8">.</font></a></div>
                                     <table align="center">
                                        <tr id="Mostrar_Tabla35" data-id="30" class="opciones">
                                            <td>
                                        
                                            </td>
                                        </tr>
                                        <tr id="Tabla_Mostrar35">
                                            <td align="center">
                                               <?php echo $vector[4][6] ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                             </a>
                         </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="javascript:mostrar36();"><img src="imgs/incognita.png" width="30px" height="30px"/>
                                <div id="flotante36" style="display:none;">
                                  <div id="close"><a href="javascript:cerrar36();"><font color="#8dd8f8">.</font></a></div>
                                     <table align="center">
                                        <tr id="Mostrar_Tabla36" data-id="36" class="opciones">
                                            <td>
                                        
                                            </td>
                                        </tr>
                                        <tr id="Tabla_Mostrar36">
                                            <td align="center">
                                               <?php echo $vector[5][0] ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                             </a>
                        </td>
                         <td>
                             <a href="javascript:mostrar37();"><img src="imgs/incognita.png" width="30px" height="30px"/>
                                <div id="flotante37" style="display:none;">
                                  <div id="close"><a href="javascript:cerrar37();"><font color="#8dd8f8">.</font></a></div>
                                     <table align="center">
                                        <tr id="Mostrar_Tabla37" data-id="37" class="opciones">
                                            <td>
                                        
                                            </td>
                                        </tr>
                                        <tr id="Tabla_Mostrar37">
                                            <td align="center">
                                               <?php echo $vector[5][1] ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                             </a>
                         </td>
                         <td>
                             <a href="javascript:mostrar38();"><img src="imgs/incognita.png" width="30px" height="30px"/>
                                <div id="flotante38" style="display:none;">
                                  <div id="close"><a href="javascript:cerrar38();"><font color="#8dd8f8">.</font></a></div>
                                     <table align="center">
                                        <tr id="Mostrar_Tabla38" data-id="38" class="opciones">
                                            <td>
                                        
                                            </td>
                                        </tr>
                                        <tr id="Tabla_Mostrar38">
                                            <td align="center">
                                               <?php echo $vector[5][2] ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                             </a>
                         </td>
                         <td>
                             <a href="javascript:mostrar39();"><img src="imgs/incognita.png" width="30px" height="30px"/>
                                <div id="flotante39" style="display:none;">
                                  <div id="close"><a href="javascript:cerrar39();"><font color="#8dd8f8">.</font></a></div>
                                     <table align="center">
                                        <tr id="Mostrar_Tabla39" data-id="39" class="opciones">
                                            <td>
                                        
                                            </td>
                                        </tr>
                                        <tr id="Tabla_Mostrar39">
                                            <td align="center">
                                               <?php echo $vector[5][3] ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                             </a>
                         </td>
                         <td>
                             <a href="javascript:mostrar40();"><img src="imgs/incognita.png" width="30px" height="30px"/>
                                <div id="flotante40" style="display:none;">
                                  <div id="close"><a href="javascript:cerrar40();"><font color="#8dd8f8">.</font></a></div>
                                     <table align="center">
                                        <tr id="Mostrar_Tabla40" data-id="40" class="opciones">
                                            <td>
                                        
                                            </td>
                                        </tr>
                                        <tr id="Tabla_Mostrar40">
                                            <td align="center">
                                               <?php echo $vector[5][4] ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                             </a>
                         </td>
                        <td>
                             <a href="javascript:mostrar41();"><img src="imgs/incognita.png" width="30px" height="30px"/>
                                <div id="flotante41" style="display:none;">
                                  <div id="close"><a href="javascript:cerrar41();"><font color="#8dd8f8">.</font></a></div>
                                     <table align="center">
                                        <tr id="Mostrar_Tabla41" data-id="41" class="opciones">
                                            <td>
                                        
                                            </td>
                                        </tr>
                                        <tr id="Tabla_Mostrar41">
                                            <td align="center">
                                               <?php echo $vector[5][5] ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                             </a>
                         </td>
                         <td>
                             <a href="javascript:mostrar42();"><img src="imgs/incognita.png" width="30px" height="30px"/>
                                <div id="flotante42" style="display:none;">
                                  <div id="close"><a href="javascript:cerrar42();"><font color="#8dd8f8">.</font></a></div>
                                     <table align="center">
                                        <tr id="Mostrar_Tabla42" data-id="42" class="opciones">
                                            <td>
                                        
                                            </td>
                                        </tr>
                                        <tr id="Tabla_Mostrar42">
                                            <td align="center">
                                               <?php echo $vector[5][6] ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                             </a>
                         </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="javascript:mostrar43();"><img src="imgs/incognita.png" width="30px" height="30px"/>
                                <div id="flotante43" style="display:none;">
                                  <div id="close"><a href="javascript:cerrar43();"><font color="#8dd8f8">.</font></a></div>
                                     <table align="center">
                                        <tr id="Mostrar_Tabla43" data-id="43" class="opciones">
                                            <td>
                                        
                                            </td>
                                        </tr>
                                        <tr id="Tabla_Mostrar43">
                                            <td align="center">
                                               <?php echo $vector[6][0] ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                             </a>
                        </td>
                         <td>
                              <a href="javascript:mostrar44();"><img src="imgs/incognita.png" width="30px" height="30px"/>
                                <div id="flotante44" style="display:none;">
                                  <div id="close"><a href="javascript:cerrar44();"><font color="#8dd8f8">.</font></a></div>
                                     <table align="center">
                                        <tr id="Mostrar_Tabla44" data-id="44" class="opciones">
                                            <td>
                                        
                                            </td>
                                        </tr>
                                        <tr id="Tabla_Mostrar44">
                                            <td align="center">
                                               <?php echo $vector[6][1] ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                             </a>
                         </td>
                         <td>
                              <a href="javascript:mostrar45();"><img src="imgs/incognita.png" width="30px" height="30px"/>
                                <div id="flotante45" style="display:none;">
                                  <div id="close"><a href="javascript:cerrar45();"><font color="#8dd8f8">.</font></a></div>
                                     <table align="center">
                                        <tr id="Mostrar_Tabla45" data-id="45" class="opciones">
                                            <td>
                                        
                                            </td>
                                        </tr>
                                        <tr id="Tabla_Mostrar45">
                                            <td align="center">
                                               <?php echo $vector[6][2] ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                             </a>
                         </td>
                         <td>
                              <a href="javascript:mostrar46();"><img src="imgs/incognita.png" width="30px" height="30px"/>
                                <div id="flotante46" style="display:none;">
                                  <div id="close"><a href="javascript:cerrar46();"><font color="#8dd8f8">.</font></a></div>
                                     <table align="center">
                                        <tr id="Mostrar_Tabla46" data-id="46" class="opciones">
                                            <td>
                                        
                                            </td>
                                        </tr>
                                        <tr id="Tabla_Mostrar46">
                                            <td align="center">
                                               <?php echo $vector[6][3] ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                             </a>
                         </td>
                         <td>
                             <a href="javascript:mostrar47();"><img src="imgs/incognita.png" width="30px" height="30px"/>
                                <div id="flotante47" style="display:none;">
                                  <div id="close"><a href="javascript:cerrar47();"><font color="#8dd8f8">.</font></a></div>
                                     <table align="center">
                                        <tr id="Mostrar_Tabla47" data-id="47" class="opciones">
                                            <td>
                                        
                                            </td>
                                        </tr>
                                        <tr id="Tabla_Mostrar47">
                                            <td align="center">
                                               <?php echo $vector[6][4] ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                             </a>
                         </td>
                        <td>
                              <a href="javascript:mostrar48();"><img src="imgs/incognita.png" width="30px" height="30px"/>
                                <div id="flotante48" style="display:none;">
                                  <div id="close"><a href="javascript:cerrar48();"><font color="#8dd8f8">.</font></a></div>
                                     <table align="center">
                                        <tr id="Mostrar_Tabla438" data-id="48" class="opciones">
                                            <td>
                                        
                                            </td>
                                        </tr>
                                        <tr id="Tabla_Mostrar48">
                                            <td align="center">
                                               <?php echo $vector[6][5] ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                             </a>
                         </td>
                         <td>
                              <a href="javascript:mostrar49();"><img src="imgs/incognita.png" width="30px" height="30px"/>
                                <div id="flotante49" style="display:none;">
                                  <div id="close"><a href="javascript:cerrar49();"><font color="#8dd8f8">.</font></a></div>
                                     <table align="center">
                                        <tr id="Mostrar_Tabla49" data-id="49" class="opciones">
                                            <td>
                                        
                                            </td>
                                        </tr>
                                        <tr id="Tabla_Mostrar49">
                                            <td align="center">
                                               <?php echo $vector[6][6] ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                             </a>
                         </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="javascript:mostrar50();"><img src="imgs/incognita.png" width="30px" height="30px"/>
                                <div id="flotante50" style="display:none;">
                                  <div id="close"><a href="javascript:cerrar50();"><font color="#8dd8f8">.</font></a></div>
                                     <table align="center">
                                        <tr id="Mostrar_Tabla50" data-id="50" class="opciones">
                                            <td>
                                        
                                            </td>
                                        </tr>
                                        <tr id="Tabla_Mostrar50">
                                            <td align="center">
                                               <?php echo $vector[7][0] ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                             </a>
                        </td>
                         <td>
                             <a href="javascript:mostrar51();"><img src="imgs/incognita.png" width="30px" height="30px"/>
                                <div id="flotante51" style="display:none;">
                                  <div id="close"><a href="javascript:cerrar51();"><font color="#8dd8f8">.</font></a></div>
                                     <table align="center">
                                        <tr id="Mostrar_Tabla51" data-id="51" class="opciones">
                                            <td>
                                        
                                            </td>
                                        </tr>
                                        <tr id="Tabla_Mostrar51">
                                            <td align="center">
                                               <?php echo $vector[7][1] ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                             </a>
                         </td>
                         <td>
                             <a href="javascript:mostrar52();"><img src="imgs/incognita.png" width="30px" height="30px"/>
                                <div id="flotante52" style="display:none;">
                                  <div id="close"><a href="javascript:cerrar52();"><font color="#8dd8f8">.</font></a></div>
                                     <table align="center">
                                        <tr id="Mostrar_Tabla52" data-id="52" class="opciones">
                                            <td>
                                        
                                            </td>
                                        </tr>
                                        <tr id="Tabla_Mostrar52">
                                            <td align="center">
                                               <?php echo $vector[7][2] ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                             </a>
                         </td>
                         <td>
                             <a href="javascript:mostrar53();"><img src="imgs/incognita.png" width="30px" height="30px"/>
                                <div id="flotante53" style="display:none;">
                                  <div id="close"><a href="javascript:cerrar53();"><font color="#8dd8f8">.</font></a></div>
                                     <table align="center">
                                        <tr id="Mostrar_Tabla53" data-id="53" class="opciones">
                                            <td>
                                        
                                            </td>
                                        </tr>
                                        <tr id="Tabla_Mostrar53">
                                            <td align="center">
                                               <?php echo $vector[7][3] ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                             </a>
                         </td>
                         <td>
                             <a href="javascript:mostrar54();"><img src="imgs/incognita.png" width="30px" height="30px"/>
                                <div id="flotante54" style="display:none;">
                                  <div id="close"><a href="javascript:cerrar54();"><font color="#8dd8f8">.</font></a></div>
                                     <table align="center">
                                        <tr id="Mostrar_Tabla54" data-id="54" class="opciones">
                                            <td>
                                        
                                            </td>
                                        </tr>
                                        <tr id="Tabla_Mostrar54">
                                            <td align="center">
                                               <?php echo $vector[7][4] ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                             </a>
                         </td>
                        <td>
                             <a href="javascript:mostrar55();"><img src="imgs/incognita.png" width="30px" height="30px"/>
                                <div id="flotante55" style="display:none;">
                                  <div id="close"><a href="javascript:cerrar55();"><font color="#8dd8f8">.</font></a></div>
                                     <table align="center">
                                        <tr id="Mostrar_Tabla55" data-id="55" class="opciones">
                                            <td>
                                        
                                            </td>
                                        </tr>
                                        <tr id="Tabla_Mostrar55">
                                            <td align="center">
                                               <?php echo $vector[7][5] ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                             </a>
                         </td>
                         <td>
                             <a href="javascript:mostrar56();"><img src="imgs/incognita.png" width="30px" height="30px"/>
                                <div id="flotante56" style="display:none;">
                                  <div id="close"><a href="javascript:cerrar56();"><font color="#8dd8f8">.</font></a></div>
                                     <table align="center">
                                        <tr id="Mostrar_Tabla56" data-id="56" class="opciones">
                                            <td>
                                        
                                            </td>
                                        </tr>
                                        <tr id="Tabla_Mostrar56">
                                            <td align="center">
                                               <?php echo $vector[7][6] ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                             </a>
                         </td>
                    </tr>
                </table>
                
                <button class="btn-group-sm campos submit" onclick="location.href='puntuaciones.php'">PUNTUACIONES</button>
            </div>
		</div>	
	</div>
</body>
</html>