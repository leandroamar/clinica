<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Definición
function calcularAreaRect($base, $altura) {
    return $base * $altura;
}

//Uso
echo "El área es " .calcularAreaRecT(100,0.60). "<br>";
echo "El área es " .calcularAreaRecT(800,300). "<br>";
?>

<?php

//Definición
function calcularNeto($bruto) {
    return $bruto - ($bruto * 0.17);
}
//Uso
echo "El sueldo neto es " .calcularNeto(50000). "<br>";
?>






?>

<?php

$aNotas = array(9, 8, 9.50, 4, 7, 8);


$aProductos = array();
$aProductos[] = array("nombre" => "Smart TV 55\" 4K UHD",
                   "marca" => "Hitachi",
                   "modelo" => "554KS20",
                   "stock" => 60,
                   "precio" => 58000
);
$aProductos[] = array("nombre" => "Samsung Galaxy A30 Blanco",
                   "marca" => "Samsung",
                   "modelo" => "Galaxy A30",
                   "stock" => 0,
                   "precio" => 22000
);
$aProductos[] = array("nombre" => "Aire Acondicionado Split Inverter Frío/Calor Surrey 2900F",
                   "marca" => "Surrey",
                   "modelo" => "553AIQ1201E",
                   "stock" => 15,
                   "precio" => 45000
);

$aProductos[] = array("nombre" => "Impresora HP Laser",
                   "marca" => "HP",
                   "modelo" => "P1102w",
                   "stock" => 20,
                   "precio" => 20000
);
$aPacientes= array();
$aPacientes[] = array("dni" => "33.4584.764",
                   "nombre" => "Ana Acuña",
                   "edad" => "45",
                   "peso" => 81.50,
);

$aPacientes[] = array("dni" => "23.4584.764",
                   "nombre" => "Gonzalo Bustamante",
                   "edad" => "66",
                   "peso" => 79,
);

$aPacientes[] = array("dni" => "28.4584.764",
                   "nombre" => "Juan Irraola",
                   "edad" => "28",
                   "peso" => 79,
);

$aPacientes[] = array("dni" => "30.4584.764",
                   "nombre" => "Beatriz Ocampo",
                   "edad" => "50",
                   "peso" => 79,
);

//Definición
function contar($aArray) {
    $contador = 0;
   foreach ($aArray as $item){
       $contador++;
   }
   return $contador;
 }
//Uso

echo "Cantidad de notas " . contar($aNotas) . "<br>";
echo "Cantidad de productos " . contar($aProductos) . "<br>";
echo "Cantidad de pacientes " . contar($aPacientes) . "<br>";
?>

