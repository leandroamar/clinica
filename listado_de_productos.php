<?php
$aProductos = array ();
$aProductos ["nombre"] = array ("Smart T.V. 55\" 4K UHD", "Samsung Galaxy A30 Blanco", "Aire Acondicionado Split Inverter Frío/Calor Surrey 2900F");
$aProductos ["marca"] = array ("Hitachi", "Samsung", "Surrey" );
$aProductos ["modelo"] = array ("554K520", "Galaxy A30", "55AIQ1201E" );
$aProductos ["stock"] = array ("Hay stock", "No hay stock", "Poco stock" );
$aProductos ["precio"] = array ("$58000", "$22000", "$45000" );

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
        <table class="table border table-hover">
            <tr>
                <th>Nombre</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Stock</th>
                <th>Precio</th>
                <th>Acción</th>
            </tr>
            <tr>
                <td><?php echo $aProductos ["nombre"] [0]; ?></td>
                <td><?php echo $aProductos ["marca"][0]; ?></td>
                <td><?php echo $aProductos ["modelo"] [0]; ?></td>
                <td><?php echo $aProductos ["stock"] [0]; ?></td>
                <td><?php echo $aProductos ["precio"] [0]; ?></td>
                <td> <button type="submit" name="btnComprar" id="btnComprar" class="p-1 pb-2 px-2 text-white bg-primary border-0 rounded">Comprar</button></td>
            </tr>
            <tr>
            <td><?php echo $aProductos ["nombre"] [1]; ?></td>
                <td><?php echo $aProductos ["marca"][1]; ?></td>
                <td><?php echo $aProductos ["modelo"] [1]; ?></td>
                <td><?php echo $aProductos ["stock"] [1]; ?></td>
                <td><?php echo $aProductos ["precio"] [1]; ?></td>
                <td> <button type="submit" name="btnComprar" id="btnComprar" class="p-1 pb-2 px-2 text-white bg-primary border-0 rounded">Comprar</button></td>
            </tr>
            <tr>
            <td><?php echo $aProductos ["nombre"] [2]; ?></td>
                <td><?php echo $aProductos ["marca"][2]; ?></td>
                <td><?php echo $aProductos ["modelo"] [2]; ?></td>
                <td><?php echo $aProductos ["stock"] [2]; ?></td>
                <td><?php echo $aProductos ["precio"] [2]; ?></td>
                <td> <button type="submit" name="btnComprar" id="btnComprar" class="p-1 pb-2 px-2 text-white bg-primary border-0 rounded">Comprar</button></td>
            </tr>
        </table>
    </main>
</body>
</html>
