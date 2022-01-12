<?php
$fecha = date("29/12/2021");
$nombre = "Leandro Mathías Amar";
$edad = "33";
$aPeliculas = array("El rey Leon", "Esperando la Carroza", "Call me by your name")


?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha personal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <main class="container">
            <div class="row">
                <div class="col-12 py-5">
                    <h1 class="text-center">Ficha personal</h1>
                </div>
            </div>
        <table class="table border table-hover">
            <tr>
                <td><strong>Fecha:</strong></td>
                <td><?php echo $fecha; ?></td>
            </tr>
            <tr>
                <td><strong>Nombre y apellido:</strong></td>
                <td><?php echo $nombre; ?></td>
            </tr>
            <tr>
                <td><strong>Edad:</strong></td>
                <td><?php echo $edad; ?></td>
            </tr>
            <tr>
                <td><strong>Películas favoritas:</strong></td>
                <td><?php echo $aPeliculas [0]; ?><br>
                <?php echo $aPeliculas [1]; ?><br>
                <?php echo $aPeliculas [2]; ?></td>
            </tr>
        </table>
    </main>
</body>
</html>

