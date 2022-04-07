<?php include('../header.php')?>
<?php include('../navbar.php')?>
<?php include('consultasVehiculoBD.php')?>
<?php $vehiculos = queryVehiculos(1) ?>
    <div class="container">
        <div class="text-center">
            <h1 class="mt-5">Ejercicio Vehículos #1</h1>
        </div>
		<div class="card-body">
			<table class="table table-dark table-sm w-100" id="tblVehiculos">
				<thead class="thead-dark text-center">
					<tr>
						<th>ID</th>
						<th>Modelo</th>
						<th>Referencia</th>
						<th>Color</th>
						<th>Placa</th>
						<th>Marca</th>
						<th>Precio</th>
						<th>Estado</th>
					</tr>
				</thead>
				<tbody class='text-center'>
					<?php if ( !empty( $vehiculos ) ): ?>
						<?php foreach ($vehiculos AS $row) : ?>
							<tr>
								<td class='font-weight-bold'><?=$row->id?></td>
								<td><?=$row->modelo?></td>
								<td><?=$row->referencia?></td>
								<td> <i class="fas fa-square" style="color: <?=$row->color?>;"></i> </td>
								<td><?=$row->placa?></td>
								<td><?=$row->marca?></td>
								<td>$ <?=number_format($row->precio, 0)?></td>
								<td class='font-weight-bold text-<?=$row->estado?'info':'warning'?>'>
									<?=$row->estado?'Activo':'Inactivo'?>
								</td>
							</tr>
						<?php endforeach; ?>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
    </div>
<?php include('modalesVehiculoBD.php')?>
<?php include('../footer.php')?>
<?php include('scriptsVehiculoBD.php')?>