<?php
#Salir si alguno de los datos no está presente
if(!isset($_POST["vin"]) || !isset($_POST["modelo"]) || !isset($_POST["costo"]) || !isset($_POST["transmision"]) || !isset($_POST["cilindraje"]) || !isset($_POST["color"]) || !isset($_POST["descripcion"]) ||  !isset($_POST["existencia"])) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$vin = $_POST["vin"];
$modelo = $_POST["modelo"];
$costo = $_POST["costo"];
$transmision = $_POST["transmision"];
$cilindraje = $_POST["cilindraje"];
$color = $_POST["color"];
$descripcion = $_POST["descripcion"];
$existencia = $_POST["existencia"];

$sentencia = $base_de_datos->prepare("INSERT INTO vehiculo(vin, modelo, costo, transmision, cilindraje, color, descripcion, existencia) VALUES (?, ?, ?, ?, ?, ? ,? ,? );");
$resultado = $sentencia->execute([$vin, $modelo, $costo, $transmision, $cilindraje, $color, $descripcion, $existencia]);

if($resultado === TRUE){
	header("Location: ./listar.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista";


?>
<?php include_once "pie.php" ?>