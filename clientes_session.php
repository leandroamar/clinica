<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

if (!isset ($_SESSION["clientes"])){
    $_SESSION["clientes"] = array();
}


if($_POST){
    $_SESSION["clientes"][] = array (
    "nombre" => $_REQUEST["txtNombre"],
    "dni" => $_REQUEST["txtDni"],
    "telefono" => $_REQUEST["txtTelefono"],
    "edad" => $_REQUEST["txtEdad"],
    );
}

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
            <div class="row my-5">
                <div class="col-12 text-center">
                    <h1>Tabla de Clientes</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <form action="" method="POST">
                        <div class="my-3">
                            <label for="">Nombre:
                                <input type="text" name="txtNombre" id="txtNombre" class="form-control" placeholder="Ingrese el nombre y apellido">
                            </label>
                        </div>
                        <div class="my-3">
                            <label for="">DNI:
                                <input type="text" name="txtDni" id="txtDni" class="form-control" placeholder="11111111">
                            </label>
                        </div>
                        <div class="my-3">
                            <label for="">Telefono:
                                <input type="text" name="txtTelefono" id="txtTelefono" class="form-control" placeholder="1111111111">
                            </label>
                        </div>
                        <div class="my-3">
                            <label for="">Edad:
                                <input type="text" name="txtEdad" id="txtEdad" class="form-control" placeholder="99">
                            </label>
                        </div>
                        <div class="my-3">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </div>
                    </form>
                </div>
                <div class="col-8">
                    <table class="table table-hover border">
                        <tr>
                            <th>Nombre:</th>
                            <th>DNI:</th>
                            <th>Teléfono:</th>
                            <th>Edad:</th>
                        </tr>
                        <?php foreach ($_SESSION["clientes"] as $cliente) { ?>
                            <tr>
                                <td><?php echo $cliente["nombre"]; ?></td>
                                <td><?php echo $cliente["dni"]; ?></td>
                                <td><?php echo $cliente["telefono"]; ?></td>
                                <td><?php echo $cliente["edad"]; ?></td>
                            </tr>
                        <?php } ?>  
                    </table>
                </div>
            </div>
        </main>
    </body>
</html>