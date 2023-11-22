<?php include_once "encabezado.php" ?>

<div class="col-xs-12">
	<h1>Nuevo producto</h1>
	<form method="post" action="nuevo.php">
		<label for="vin">Vin:</label>
		<input class="form-control" name="vin" required type="text" id="vin" placeholder="Escribe el vin">

		<label for="modelo">Modelo:</label>
		<input class="form-control" name="modelo" required type="text" id="modelo" placeholder="Escribe el modelo">

		<label for="costo">Costo:</label>
		<input class="form-control" name="costo" required type="number" id="costo" placeholder="Costo">

		<label for="transmision">Transmision:</label>
		<input class="form-control" name="transmision" required type="text" id="transmision" placeholder="Escribe la transmision">

		<label for="cilindraje">Cilindraje:</label>
		<input class="form-control" name="cilindraje" required type="text" id="cilindraje" placeholder="Escribe el cilindraje">

		<label for="color">Color:</label>
		<input class="form-control" name="color" required type="text" id="color" placeholder="Escribe el color">

		<label for="descripcion">Descripción:</label>
		<input class="form-control" name="descripcion" required type="text" id="descripcion" placeholder="Escribe la descripcion">
		
		<label for="existencia">Existencia:</label>
		<input class="form-control" name="existencia" required type="number" id="existencia" placeholder="Cantidad o existencia">
		<br><br><input class="btn btn-info" type="submit" value="Guardar">
	</form>
</div>
<?php include_once "pie.php" ?>