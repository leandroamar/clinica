<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">  
</head>
<body>
    <main class="container">
    <div class="row">
            <div class="col-12 py-5">
                <h1 class="text-center">Listado de Productos</h1>
            </div>
        </div>
        <div class= "row">
            <div class= col-12>
                <table class="table border table-hover">
                    <tr>
                        <th>Nombre</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Stock</th>
                        <th>Precio</th>
                        <th>Acción</th>
                    </tr>
                        <?php
                            $subtotal = 0;
                            for ($i = 0; $i < count($aProductos); $i++){
                            echo "<tr>";
                            echo "<td>" . $aProductos[$i]["nombre"] . "</td>";
                            echo "<td>" . $aProductos[$i]["marca"] . "</td>";
                            echo "<td>" . $aProductos[$i]["modelo"] . "</td>";
                            echo "<td>" . $aProductos[$i]["stock"] . "</td>";
                            echo "<td>" . $aProductos[$i]["precio"] . "</td>";
                            echo "<td><button type=\"submit\" name=\"btnComprar\" id=\"btnComprar\" class=\"p-1 pb-2 px-2 text-white bg-primary border-0 rounded\">Comprar</button></td>";
                            echo "<tr>";
                            $subtotal += $aProductos[$i]["precio"];
                         }
                        ?>
                </table>
            </div>
        </div>
        <div class= "row">
            <div class= "col-12">
                <h3> El subtotal es $ <?php echo $subtotal?></h3>

    </main>
</body>
</html>