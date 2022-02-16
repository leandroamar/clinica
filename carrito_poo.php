<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set("America/Argentina/Buenos_Aires");

class Cliente
{
    private $dni;
    private $nombre;
    private $correo;
    private $telefono;
    private $descuento;

    public function __construct() {
        $this->descuento = 0.0;
    }

    public function __get($propiedad) {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor) {
        $this->$propiedad = $valor;
    }

    public function imprimir()
    {
        echo "Documento: " . $this->dni . "<br>";
        echo "Nombre: " . $this->nombre . "<br>";
        echo "Correo: " . $this->correo . "<br>";
        echo "Telefono: " . $this->telefono . "<br>";
        echo "Descuento: " . $this->descuento . "<br><br>";

    }
}

class Producto{
    private $cod;
    private $nombre;
    private $precio;
    private $descripcion;
    private $iva;

    public function __construct(){
        $this->precio= 0.0;
        $this->iva = 0.0;
    }

    public function __get($propiedad) {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor) {
        $this->$propiedad = $valor;
    }
    
    public function imprimir(){
        echo "COD: " . $this->cod . "<br>";
        echo "Nombre: " . $this->nombre . "<br>";
        echo "Precio: " . $this->precio . "<br>";
        echo "Descripcion: " . $this->descripcion . "<br>";
        echo "IVA: " . $this->iva . "<br>";
    }

}

class Carrito{
    private $cliente; 
    private $aProductos; 
    private $subTotal;
    private $total;

    public function __construct(){
        $this->aProductos = array();
        $this->subTotal = 0.0;
        $this->total = 0.0;
    }

    public function __get($propiedad) {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor) {
        $this->$propiedad = $valor;
    }

    public function cargarProducto($producto){
        $this->aProductos[] = $producto;
    }

    public function imprimirTicket() {
        echo "<table class='table table-hover border' style='width:400px'>";
        echo "<tr><th colspan='2' class='text-center'>ECO MARKET</th></tr>
              <tr>
                <th>Fecha</th>
                <td>" . date("d/m/Y H:i:s") . "</td>
              </tr>
              <tr>
                <th>DNI</th>
                <td>" . $this->cliente->dni . "</td>
              </tr>
              <tr>
                <th>Nombre</th>
                <td>" . $this->cliente->nombre . "</td>
              </tr>
              <tr>
                <th colspan='2'>Productos:</th>
              </tr>";
              foreach ($this->aProductos as $producto) {
                echo "<tr>
                            <td>" . $producto->nombre . "</td>
                            <td>$ " . number_format($producto->precio, 2, ",", ".") . "</td>
                        </tr>";
                $this->subTotal += $producto->precio;
                $this->total += $producto->precio * (($producto->iva / 100)+1);
              }
             
        echo "<tr>
                <th>Subtotal s/IVA:</th>
                <td>$ " . number_format($this->subTotal, 2, ",", ".") . "</td>
              </tr>
            <tr>
                <th>TOTAL:</th>
                <td>$ " . number_format($this->total, 2, ",", ".") . "</td>
              </tr>
        </table>";
    }
}

//Programa
$cliente1 = new Cliente();
$cliente1->dni = "34765456";
$cliente1->nombre = "Bernabé";
$cliente1->correo = "bernabe@gmail.com";
$cliente1->telefono = "+541188598686";
$cliente1->descuento = 0.05;




$cliente2 = new Cliente();
$cliente2->dni = "29654852";
$cliente2->nombre = "Lucas";
$cliente2->correo = "lucas@gmail.com";
$cliente2->telefono = "+541123528686";
$cliente2->descuento = 0.25;


$producto1 = new Producto();
$producto1->cod = "AB8767";
$producto1->nombre = "Notebook 15\" HP";
$producto1->descripcion = "Esta es una computadora HP";
$producto1->precio = 30800;
$producto1->iva = 21;


$producto2 = new Producto();
$producto2->cod = "JBGH678";
$producto2->nombre = "TV Samsung 42\"";
$producto2->descripcion = "Televisor HD";
$producto2->precio = 60800;
$producto2->iva = 10.5;

$producto3 = new Producto();
$producto3->cod = "JBGH656";
$producto3->nombre = "TV Samsung 49\"";
$producto3->descripcion = "Televisor UHD";
$producto3->precio = 75800;
$producto3->iva = 21;



$carrito1 = new Carrito();
$carrito1->cliente = $cliente1;
$carrito1->cargarProducto($producto1);
$carrito1->cargarProducto($producto2);
$carrito1->cargarProducto($producto3);
$carrito1->imprimirTicket();


$carrito2 = new Carrito();
$carrito2->cliente = $cliente2;
$carrito2->cargarProducto($producto1);
$carrito2->cargarProducto($producto3);
$carrito2->imprimirTicket();


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ECO MARKET</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5">
                
            </div>
        </div>
    </div>
</body>
</html>