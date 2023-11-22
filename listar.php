<?php include_once "encabezado.php" ?>
<?php
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT * FROM vehiculo;");
$vehiculo = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

	<div class="col-xs-12">
		<h1>Vehiculo</h1>
		<div>
			<a class="btn btn-success" href="./formulario.php">Nuevo <i class="fa fa-plus"></i></a>
		</div>
		<br>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>ID</th>
					<th>Vin</th>
					<th>Modelo</th>
					<th>Costo</th>
					<th>Transmision</th>
					<th>Existencia</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($vehiculo as $vehiculo){ ?>
				<tr>
					<td><?php echo $vehiculo->id ?></td>
					<td><?php echo $vehiculo->vin ?></td>
					<td><?php echo $vehiculo->modelo ?></td>
					<td><?php echo $vehiculo->costo ?></td>
					<td><?php echo $vehiculo->transmision ?></td>
					<td><?php echo $vehiculo->existencia ?></td>
					<td><a class="btn btn-warning" href="<?php echo "editar.php?id=" . $vehiculo->id?>"><i class="fa fa-edit"></i></a></td>
					<td><a class="btn btn-danger" href="<?php echo "eliminar.php?id=" . $vehiculo->id?>"><i class="fa fa-trash"></i></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
<?php include_once "pie.php" ?>