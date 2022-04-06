<?php include('../header.php')?>
<?php include('../navbar.php')?>
<?php include('consultasBasicoBD.php')?>
<?php $usuarios = queryUsuarios(1) ?>
    <div class="container">
        <div class="text-center">
            <h1 class="mt-5">Ejercicio Base de Datos #1</h1>
        </div>
		<div class="card-body">
			<table class="table table-dark table-sm w-100" id="tblUsuarios">
				<thead class="thead-dark text-center">
					<tr>
						<th>ID</th>
						<th>Nombres</th>
						<th>Apellidos</th>
						<th>Correo</th>
						<th>Estado</th>
					</tr>
				</thead>
				<tbody class='text-center'>
					<?php if ( !empty( $usuarios ) ): ?>
						<?php foreach ($usuarios AS $row) : ?>
							<tr>
								<td class='font-weight-bold'><?=$row->id?></td>
								<td><?=$row->nombres?></td>
								<td><?=$row->apellidos?></td>
								<td><?=$row->email?></td>
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
<?php include('modalesBasicoBD.php')?>
<?php include('../footer.php')?>
<?php include('scriptsBasicoBD.php')?>