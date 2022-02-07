<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(file_exists("invitados.txt")){
    $aInvitados = explode(",",file_get_contents("invitados.txt"));
}else{
    $aInvitados = array();
}

$aInvitados = array("Pepe", "Ana", "Maca", "Juan");

if ($_POST) {
    if (isset($_REQUEST['btnInvitado'])) {
        $nombre = trim($_REQUEST['txtNombre']);
        if (in_array($nombre, $aInvitados)) {


            $aMensaje = array("texto" => "¡Bienvenid@ $nombre a la fiesta!", 
                              "estado" => "success");
        } else {
            $aMensaje = array("texto" => "No se encuentra en la lista de invitados.", 
                              "estado" => "danger");
        }
     } else if (isset($_REQUEST['btnCodigo'])) {
        $respuesta = $_REQUEST['txtCodigo'];
        if ($respuesta == "verde") {
            $aMensaje = array("texto" => "Su código de ingreso es " . rand(1000,9999), "estado" => "success");

        } else {
            $aMensaje = array("texto" => "Ud. no tiene pase VIP", "estado" => "danger");
        }
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Invitados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/40e341f8f7.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5">
                <h1> Lista de invitados </h1>
            </div>
            <div class="col-12 mb-4">
                <h5> Complete el siguiente formulario: </h5>
            </div>
        </div>
        <?php if(isset($aMensaje)): ?>
        <div class="col-6">
            <div class="alert alert-<?php echo $aMensaje["estado"]; ?>" role="alert">
                <?php echo $aMensaje["texto"]; ?>
            </div>
        </div>
        <?php endif; ?>
            <div class="col-6">
                <form action="" method="POST" enctype="multipart/fom-data">
                    <div class="row">
                        <div class="12-col bm-3">
                            <p>Nombre:<p>
                            <input type="text" name="txtNombre" class="form-control">
                            <input type="submit" name="btnInvitado" id="btnInvitado" value="Procesar invitado" class="btn-primary">
                        </div>
                    </div>
                    <div class="row">
                        <div class="12-col bm-3">
                            <p>Ingresa el código secreto para el pase VIP:<p>
                            <input type="text" name="txtCodigo" class="form-control">
                            <input type="submit" name="btnCodigo" id="btnCodigo" value="Procesar código" class="btn-primary">
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>
</html>