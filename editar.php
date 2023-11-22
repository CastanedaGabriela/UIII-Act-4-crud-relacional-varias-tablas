<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM vehiculo WHERE id = ?;");
$sentencia->execute([$id]);
$vehiculo = $sentencia->fetch(PDO::FETCH_OBJ);
if($vehiculo === FALSE){
	echo "¡No existe algún producto con ese ID!";
	exit();
}

?>
<?php include_once "encabezado.php" ?>
	<div class="col-xs-12">
		<h1>Editar producto con el ID <?php echo $vehiculo->id; ?></h1>
		<form method="post" action="guardarDatosEditados.php">
			<input type="hidden" name="id" value="<?php echo $vehiculo->id; ?>">
	
			<label for="vin">Vin del vehiculo:</label>
			<input value="<?php echo $vehiculo->vin ?>" class="form-control" name="vin" required type="text" id="vin" placeholder="Escribe el vin">
			
			<label for="modelo">Modelo:</label>
			<input value="<?php echo $vehiculo->modelo ?>" class="form-control" name="modelo" required type="text" id="modelo" placeholder="Modelo del vehiculo">

			<label for="costo">Costo:</label>
			<input value="<?php echo $vehiculo->costo ?>" class="form-control" name="costo" required type="number" id="costo" placeholder="Precio de compra">

			<label for="transmision">Transmision:</label>
			<input value="<?php echo $vehiculo->transmision ?>" class="form-control" name="transmision" required type="text" id="transmision" placeholder="transmision del vehiculo">
			
			<label for="cilindraje">Cilindraje:</label>
			<input value="<?php echo $vehiculo->cilindraje ?>" class="form-control" name="cilindraje" required type="text" id="cilindraje" placeholder="cilindraje del vehiculo">
			
			<label for="color">Color:</label>
			<input value="<?php echo $vehiculo->color ?>" class="form-control" name="color" required type="text" id="color" placeholder="color del vehiculo">
			
			<label for="descripcion">Descripción:</label>
			<textarea required id="descripcion" name="descripcion" cols="30" rows="5" class="form-control"><?php echo $vehiculo->descripcion ?></textarea>

			<label for="existencia">Existencia:</label>
			<input value="<?php echo $vehiculo->existencia ?>" class="form-control" name="existencia" required type="text" id="existencia" placeholder="existencia del vehiculo">
			
			<br><br><input class="btn btn-info" type="submit" value="Guardar">
			<a class="btn btn-warning" href="./listar.php">Cancelar</a>
		</form>
	</div>
<?php include_once "pie.php" ?>
