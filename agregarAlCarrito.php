<?php
if (!isset($_POST["vin"])) {
    return;
}

$vin = $_POST["vin"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM vehiculo WHERE vin = ? LIMIT 1;");
$sentencia->execute([$vin]);
$vehiculo = $sentencia->fetch(PDO::FETCH_OBJ);
# Si no existe, salimos y lo indicamos
if (!$vehiculo) {
    header("Location: ./vender.php?status=4");
    exit;
}
# Si no hay existencia...
if ($vehiculo->existencia < 1) {
    header("Location: ./vender.php?status=5");
    exit;
}
session_start();
# Buscar producto dentro del cartito
$indice = false;
for ($i = 0; $i < count($_SESSION["carrito"]); $i++) {
    if ($_SESSION["carrito"][$i]->vin === $vin) {
        $indice = $i;
        break;
    }
}
# Si no existe, lo agregamos como nuevo
if ($indice === false) {
    $vehiculo->cantidad = 1;
    $vehiculo->preciototal = $vehiculo->costo;
    array_push($_SESSION["carrito"], $vehiculo);
} else {
    # Si ya existe, se agrega la cantidad
    # Pero espera, tal vez ya no haya
    $cantidadExistente = $_SESSION["carrito"][$indice]->cantidad;
    # si al sumarle uno supera lo que existe, no se agrega
    if ($cantidadExistente + 1 > $vehiculo->existencia) {
        header("Location: ./vender.php?status=5");
        exit;
    }
    $_SESSION["carrito"][$indice]->cantidad++;
    $_SESSION["carrito"][$indice]->preciototal = $_SESSION["carrito"][$indice]->cantidad * $_SESSION["carrito"][$indice]->costo;
}
header("Location: ./vender.php");
