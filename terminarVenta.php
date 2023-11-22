<?php
if(!isset($_POST["preciototal"])) exit;


session_start();


$preciototal = $_POST["preciototal"];
include_once "base_de_datos.php";


$ahora = date("Y-m-d H:i:s");


$sentencia = $base_de_datos->prepare("INSERT INTO ventas(fecha, preciototal) VALUES (?, ?);");
$sentencia->execute([$ahora, $preciototal]);

$sentencia = $base_de_datos->prepare("SELECT id FROM ventas ORDER BY id DESC LIMIT 1;");
$sentencia->execute();
$resultado = $sentencia->fetch(PDO::FETCH_OBJ);

$id_venta = $resultado === false ? 1 : $resultado->id;

$base_de_datos->beginTransaction();
$sentencia = $base_de_datos->prepare("INSERT INTO vehiculos_vendidos(id_vehiculo, id_venta, cantidad) VALUES (?, ?, ?);");
$sentenciaExistencia = $base_de_datos->prepare("UPDATE vehiculo SET existencia = existencia - ? WHERE id = ?;");
foreach ($_SESSION["carrito"] as $vehiculo) {
	$preciototal += $vehiculo->preciototal;
	$sentencia->execute([$vehiculo->id, $id_venta, $vehiculo->cantidad]);
	$sentenciaExistencia->execute([$vehiculo->cantidad, $vehiculo->id]);
}
$base_de_datos->commit();
unset($_SESSION["carrito"]);
$_SESSION["carrito"] = [];
header("Location: ./vender.php?status=1");
?>