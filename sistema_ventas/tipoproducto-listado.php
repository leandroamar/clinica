<?php 

include_once("config.php");
include_once("entidades/tipoproducto.php");

$tipoProducto = new TipoProducto();
$aTipoProducto = $tipoProducto->obtenerTodos();


include_once("header.php"); ?>



 
<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800">Listado de tipo de productos</h1>
  <div class="row">
        <div class="col-12 mb-3">
            <a href="tipoproducto-formulario.php" class="btn btn-primary mr-2">Nuevo</a>
        </div>
  </div>
  <table class="table table-hover border">
    <tr>
        <th>Nombre</th>
        <th>Acciones</th>
    </tr>
  </table>
</div>

<?php include_once("footer.php"); ?>