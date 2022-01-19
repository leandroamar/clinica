<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$iva = 0;
$resPrecioSinIva = 0;
$resPrecioConIva= 0;
$resIvaCantidad = 0;

if($_POST) {
    $iva = $_REQUEST["lstIva"];
    $precioSinIva = $_REQUEST["txtImporteSinIva"];
    $precioConIva = $_REQUEST["txtImporteConIva"];

  if($precioSinIva > 0){
      $resPrecioConIva = $precioSinIva * ($iva/100+1);
  } else {
      $resPrecioConIva = $precioConIva;
  }

  if($precioConIva > 0){
    $resPrecioSinIva = $precioConIva / ($iva/100+1);
} else {
    $resPrecioSinIva = $precioSinIva;
}

  if ($resPrecioConIva > 0 && $resPrecioSinIva > 0) {
    $resIvaCantidad = $resPrecioConIva - $resPrecioSinIva;
  } else {
      $resIvaCantidad = "0";
  }


}

?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Calculadora de IVA</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="htdocs\php\estilos.css">   
    </head>
</head>
<body><div class="container">
        <div class="row my-5">
            <div class="col-12 text-center">
                <h1>Calculadora de IVA</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-4 offset-3">
                <form action="" method="POST">
                    <div class="my-3">
                        <label for="">IVA
                        <select name="lstIva" class="form-control">
                            <option value="21">21</option>
                            <option value="10.5">10.5</option>
                            <option value="27">27</option>
                        </select>
                        </label>
                    </div>
                    <div class="my-3">
                        <label for="">Precio sin IVA:
                            <input type="text" name="txtImporteSinIva" id="txtImporteSinIva" class="form-control">
                        </label>
                    </div>
                    <div class="my-3">
                        <label for="">Precio con IVA:
                            <input type="text" name="txtImporteConIva" id="txtImporteConIva" class="form-control">
                        </label>
                    </div>
                    <div class="my-3">
                        <button type="submit" class="btn btn-primary">CALCULAR</button>
                    </div>
                </form>
            </div>
            <div class="col-4 my-3">
                <table class="table table-hover border">
                    <tr>
                        <th>IVA:</th>
                        <td><?php echo $iva; ?></td>
                    </tr>
                    <tr>
                        <th>Precio sin IVA:</th>
                        <td><?php echo $resPrecioSinIva; ?></td>
                    </tr>
                    <tr>
                        <th>Precio con IVA:</th>
                        <td><?php echo $resPrecioConIva; ?></td>
                    </tr>
                    <tr>
                        <th>IVA cantidad:</th>
                        <td><?php echo $resIvaCantidad; ?></td>
                    </tr>
                </table>
            </div>
        </div>
        </main>
    </body>
</html>
