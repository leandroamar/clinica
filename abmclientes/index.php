<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if(file_exists("archivo.txt")){ //SI EL ARCHIVO EXISTE
   
    $strJson = file_get_contents("archivo.txt"); //LEER Y ALMACENAR EL CONMTENIDO JSON EN UNA VARIABLE
   
    $aClientes = json_decode($strJson, true);  //CONVERTIR EL JSON EN UN ARRAY CLIENTES

} else {
   
    $aClientes = array(); //ARRAY VACIO DE CLIENTES
}

$id = isset($_GET["id"])? $_GET["id"] : "";


if(isset($_GET["do"]) && $_GET["do"] == "eliminar"){ //ELIMINAR

    if(file_exists("imagenes/" . $aClientes[$id]["imagen"])){
        unlink("imagenes/" . $aClientes[$id]["imagen"]);
    }
    
    unset($aClientes[$id]); //ELIMINAR POSICIÓN

    
    $strJson = json_encode($aClientes); //CONVERTIR EL ARRAY EN JSON

    
    file_put_contents("archivo.txt", $strJson); //ACTUALIZAR ARCHIVO CON EL NUEVO ARRAY CLIENTES

    header("Location: index.php");
}

if($_POST){
    $dni = trim($_POST["txtDni"]);
    $nombre = trim($_POST["txtNombre"]);
    $telefono = trim($_POST["txtTelefono"]);
    $correo = trim($_POST["txtCorreo"]);

  
    if($_FILES["archivo"]["error"] === UPLOAD_ERR_OK){ //SI VIENE IMAGEN ADJUNTA
        if(isset($aClientes[$id]["imagen"]) && $aClientes[$id]["imagen"] != ""){
            if(file_exists("imagenes/" . $aClientes[$id]["imagen"])){
                unlink("imagenes/" . $aClientes[$id]["imagen"]);
            }
        }
        $nombreAleatorio = date("Ymdhmsi"); 
        $archivo_tmp = $_FILES["archivo"]["tmp_name"];
        $nombreArchivo = $_FILES["archivo"]["name"];
        $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
        $imagen = "$nombreAleatorio.$extension";

        if($extension == "png" || $extension == "jpg" || $extension == "jpeg"){
            move_uploaded_file($archivo_tmp, "imagenes/$imagen");
        }
    } else {  //SI NO VIENE IMAGEN
        
        if($id >= 0){
            $imagen = $aClientes[$id]["imagen"];
        } else {
            $imagen = "";
        }
    }

   
    if($id >= 0){  //ARRAY CON TODOS LOS DATOS
        //ACTUALIZAR
        $aClientes[$id] = array("dni" => $dni,
                            "nombre" => $nombre,
                            "telefono" => $telefono,
                            "correo" => $correo,
                            "imagen" => $imagen);
    } else {
        //NUEVO DATO
        $aClientes[] = array("dni" => $dni,
                        "nombre" => $nombre,
                        "telefono" => $telefono,
                        "correo" => $correo,
                        "imagen" => $imagen);
    }

    
    $strJson = json_encode($aClientes); //CONVERTIR EL ARRAY EN JSON

   
    file_put_contents("archivo.txt", $strJson); //ALMACERNAR EL JHSON EN ARCHIVO.TXT

}


if ($_POST) {
    if (isset($_REQUEST["btnGuardar"])) {
        $aMensaje = array("texto" => "¡Datos guardados exitosamente!",  "estado" => "success");
        } else {
            $aMensaje = "";
    }
}


?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABM Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/40e341f8f7.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 py-5 text-center">
                <h1>Registro de clientes</h1>
            </div>
        </div>
        <div class="col-6">
            <?php if(isset($aMensaje)): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <div>
                        <?php echo $aMensaje["texto"]; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="row">
            <div class="col-6">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div>
                        <label for="">DNI: *</label>
                        <input type="text" name="txtDni" id="txtDni" class="form-control" required value="<?php echo isset($aClientes[$id]["dni"])? $aClientes[$id]["dni"] : ""; ?>">
                    </div>
                    <div>
                        <label for="">Nombre: *</label>
                        <input type="text" name="txtNombre" id="txtNombre" class="form-control" required value="<?php echo isset($aClientes[$id]["nombre"])? $aClientes[$id]["nombre"] : ""; ?>">
                    </div>
                    <div>
                        <label for="">Teléfono:</label>
                        <input type="text" name="txtTelefono" id="txtTelefono" class="form-control" value="<?php echo isset($aClientes[$id]["telefono"])? $aClientes[$id]["telefono"] : ""; ?>">
                    </div>
                    <div>
                        <label for="">Correo: *</label>
                        <input type="text" name="txtCorreo" id="txtCorreo" class="form-control" required value="<?php echo isset($aClientes[$id]["correo"])? $aClientes[$id]["correo"] : ""; ?>">
                    </div>
                    <div>
                        <label for="">Archivo adjunto</label>
                        <input type="file" name="archivo" id="archivo" accept=".jpg, .jpeg, .png">
                        <small class="d-block">Archivos admitidos: .jpg, .jpeg, .png</small>
                    </div>
                    <div>
                        <a href="index.php"  class="btn btn-danger my-2">NUEVO</a>
                        <button type="submit" id= "btnGuardar" name="btnGuardar" class="btn btn-primary">GUARDAR</button>
                    </div>
                </form>
            </div>
            <div class="col-6">
                <table class="table table-hover border">
                    <tr>
                        <th>Imagen</th>
                        <th>DNI</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Acciones</th>
                    </tr>
                    <?php foreach($aClientes as $pos => $cliente): ?>
                        <tr>
                            <td><img src="imagenes/<?php echo $cliente["imagen"]; ?>" class="img-thumbnail"></td>
                            <td><?php echo $cliente["dni"]; ?></td>
                            <td><?php echo $cliente["nombre"]; ?></td>
                            <td><?php echo $cliente["correo"]; ?></td>
                            <td>
                                <a href="?id=<?php echo $pos; ?>"><i class="fas fa-edit"></i></a>
                                <a href="?id=<?php echo $pos; ?>&do=eliminar"><i class="fas fa-trash-alt"></i></a>
                            </td>
                          
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </main>
    
</body>
</html>