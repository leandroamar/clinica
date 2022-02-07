<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//OPCION 1
//Definición
function print_f($variable){
    $contenido = "";
	if(is_array($variable)){
        foreach($variable as $item){
            $contenido .= $item . "\n";
        }
        file_put_contents("datos.txt", $contenido);
    } else {
        file_put_contents("datos.txt", $variable);
    }
}

//Uso
$aNotas = array(8, 5, 7, 9, 10, 9);
$msg = "Este es un mensaje";

print_f($msg);



/*OPCION 2
//Definición
function print_f($variable){
    $archivo = fopen ("datos.txt", "a+");

	if(is_array($variable)){
        //si es un array, lo recorro y guardo el contenido en el archivo "datos.txt"
        foreach($variable as $item){
            fwrite($archivo, $item . "\n");
        }
    } else {
        file_put_contents("datos.txt", $variable);
    }
}

//Uso
$aNotas = array(8, 5, 7, 9, 10, 9);
$msg = "Este es un mensaje";

print_f($aNotas);
*/

?>