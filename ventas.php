<?php include_once "encabezado.php" ?>
<?php
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT ventas.preciototal, ventas.fecha, ventas.id, GROUP_CONCAT(	vehiculo.vin, '..',  vehiculo.modelo, '..', vehiculos_vendidos.cantidad SEPARATOR '__') AS vehiculo FROM ventas INNER JOIN vehiculos_vendidos ON vehiculos_vendidos.id_venta = ventas.id INNER JOIN vehiculo ON vehiculo.id = vehiculos_vendidos.id_vehiculo GROUP BY ventas.id ORDER BY ventas.id;");
$ventas = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

	<div class="col-xs-12">
		<h1>Ventas</h1>
		<div>
			<a class="btn btn-success" href="./vender.php">Nueva <i class="fa fa-plus"></i></a>
		</div>
		<br>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Número</th>
					<th>Fecha</th>
					<th>Vehiculos vendidos</th>
					<th>Total</th>
					<th>Ticket</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($ventas as $venta){ ?>
				<tr>
					<td><?php echo $venta->id ?></td>
					<td><?php echo $venta->fecha ?></td>
					<td>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Vin</th>
									<th>Modelo</th>
									<th>Cantidad</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach(explode("__", $venta->vehiculo) as $vehiculosConcatenados){ 
								$vehiculo = explode("..", $vehiculosConcatenados)
								?>
								<tr>
									<td><?php echo $vehiculo[0] ?></td>
									<td><?php echo $vehiculo[1] ?></td>
									<td><?php echo $vehiculo[2] ?></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</td>
					<td><?php echo $venta->preciototal ?></td>
					<td><a class="btn btn-info" href="<?php echo "imprimirTicket.php?id=" . $venta->id?>"><i class="fa fa-print"></i></a></td>
					<td><a class="btn btn-danger" href="<?php echo "eliminarVenta.php?id=" . $venta->id?>"><i class="fa fa-trash"></i></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
<?php include_once "pie.php" ?>