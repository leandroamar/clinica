<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if($_POST){

    $usuario = $_REQUEST["txtUsuario"];
    $clave = $_REQUEST["txtClave"];

 
    if($usuario != "" && $clave != ""){
        header("Location: acceso-confirmado.php");
    } else {
        $mensaje = "Válido para usuarios registrados";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inicio</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">  
    </head>
    <body>
        <main class="container">
            <div class="row">
                <div class= "col-12 py-3">
                    <h1>Formulario</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <?php if (isset($mensaje)){ ?>
                        <div class="alert alert-danger" role="alert"> <?php echo $mensaje; ?></div>
                    <?php } ?>
                    <form method="POST" action="">
                        <div class= "col-4">
                            <label for="">Usuario:</label>
                            <input type="text" name="txtUsuario" id="txtUsuario" class="form-control">
                        </div>
                        <div class= "col-4">
                            <label for="">Clave:</label>
                            <input type="password" name="txtClave" id="txtClave" class="form-control">
                        </div>
                    </form>
                    <button type="submit" class="btn btn-primary my-3">ENVIAR</button>
                </div>
            </div>
        </main>
    </body>
</html>
