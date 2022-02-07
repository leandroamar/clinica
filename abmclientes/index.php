<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//SI EL ARCHIVO EXISTE
if(file_exists("archivos.txt")){
    //LEER EL ARCHIVO Y ALMACENAR
    $strJson = file_get_contents("archivos.txt");
 //CONVERTIR EN ARRAY
    $aClientes = json_decode($strJson, true);
} else {
    //ARRAY VACIO
    $aClientes = array();
}
$id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : "";

if(isset($_GET["do"]) && $_GET["do"] == "eliminar"){
    unset($aClientes[$id]);
}

if ($_POST) {
    $dni = trim($_REQUEST["txtDni"]);
    $nombre = trim($_REQUEST["txtNombre"]);
    $telefono = trim($_REQUEST["txtTelefono"]);
    $correo = trim($_REQUEST["txtCorreo"]);
    $imagen = "";
    
      //CREAR UN ARRAY CON TODOS LOS DATOS
    if($id >= 0){
        $aClientes[$id] = array(
           "dni" => $dni,
           "nombre" => $nombre,
           "telefono" => $telefono,
           "correo" => $correo,
           "imagen" => $imagen,);
     } else {
       $aClientes[] = array(
          "dni" => $dni,
          "nombre" => $nombre,
          "telefono" => $telefono,
          "correo" => $correo,
          "imagen" => $imagen,);
   
   }
}
    if ($_FILES["archivo"]["error"] === UPLOAD_ERR_OK) {
        $nombreAleatorio = date("Ymdhmsi");
        $archivo_tmp = $_FILES["archivo"]["tmp_name"];
        $nombreArchivo = $_FILES["archivo"]["name"];
        $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
        $imagen = "$nombreAleatorio.$extension";
        move_uploaded_file($archivo_tmp, "imagenes/$imagen");
    }
    if ($id != "") {
                          //Actualizar cliente
        if ($_FILES["archivo"]["error"] !== UPLOAD_ERR_OK) {
            $imagen = $aClientes[$id]["imagen"];
        } else {
                          //Si está subiendo una nueva imagen, debe eliminar la imagen anterior
            unlink("imagenes/". $aClientes[$id]["imagen"]);
        }
    }


  


    // convertir el array en json
    $strJson= json_encode($aClientes);


   //almacenar el json en archivo.txt
   file_put_contents("archivos.txt", $strJson);
   header("Location: index.php");


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
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1> Registro de clientes </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <form action="" method="POST" enctype="multipart/fom-data">
                    <div>
                        <label for=""> DNI: *</label>
                        <input type="text" name="txtDni" id="txtDni" class="form-control" required value="<?php echo isset($aClientes[$id]["dni"]) ? $aClientes[$id]["dni"] : ""; ?>">
                    </div>
                    <div>
                        <label for=""> Nombre: *</label>
                        <input type="text" name="txtNombre" id="txtNombre" class="form-control" required value="<?php echo isset($aClientes[$id]["nombre"]) ? $aClientes[$id]["nombre"] : ""; ?>">
                    </div>
                    <div>
                        <label for=""> Telefono: </label>
                        <input type="text" name="txtTelefono" id="txtTelefono" class="form-control" value="<?php echo isset($aClientes[$id]["telefono"]) ? $aClientes[$id]["telefono"] : ""; ?>">
                    </div>
                    <div>
                        <label for=""> Correo: *</label>
                        <input type="text" name="txtCorreo" id="txtCorreo" class="form-control" required value="<?php echo isset($aClientes[$id]["correo"]) ? $aClientes[$id]["correo"] : ""; ?>">
                    </div>
                    <div class="pt-1">
                        <label for="">Archivo adjunto</label>
                        <input type="file" id="archivo" name="archivo" class="form-control-file" accept=".jpg, .jpeg, .png">
                        <small class="d-block">Archivos admitidos: .jpg, .jpeg, .png </small>
                    </div>
                    <div>
                        <button type="submit" id="btnGuardar" name="btnGuardar" class="btn btn-primary">Guardar</button>
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
                            <td><img src="" class="img-thumbnail"></td>
                            <td><?php echo $cliente["dni"]; ?></td>
                            <td><?php echo $cliente["nombre"]; ?></td>
                            <td><?php echo $cliente["correo"]; ?></td>
                            <td>
                                <a href="?id=<?php echo $pos; ?>"><i class="fas fa-edit"></i></a>
                                <a href="?id=<?php echo $pos; ?>&do=eliminar"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                </table>

            </div>
        </div>
    </div>
</body>

</html>