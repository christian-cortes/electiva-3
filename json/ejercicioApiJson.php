<?php include('../header.php')?>
<?php include('../navbar.php')?>
	<?php
		$request  = file_get_contents("https://randomuser.me/api/?nat=ES&results=50");
		$response = json_decode( $request );
		$users    = $response->results;
	?>
    <div class="container">
        <div class="text-center text-light">
            <h1 class="mt-5">Ejercicio API JSON</h1>
        </div>
		<div class="card-body">
			<table class="table table-dark table-bordered table-sm" id="tblUsers" width="100%">
				<thead class="thead-dark text-center">
					<tr>
						<th> Foto </th>
						<th> Nombre </th>
						<th> Apellido </th>
						<th> Teléfono </th>
						<th> Direccion </th>
					</tr>
				</thead>
				<tbody class='text-center tbody-dark'>
					<?php if ( count($users) > 0 ): ?>
						<?php foreach ($users AS $row): ?>
							<tr>
								<td>
									<a onclick="showDataUser( '<?=$row->email?>' )">
										<img class="rounded" src="<?=$row->picture->thumbnail?>" height='24'>
									</a>
								</td>
								<td> <?=$row->name->first?> </td>
								<td> <?=$row->name->last?> </td>
								<td>
									<?=$row->location->street->name?>
									# <?=$row->location->street->number?>,
									<?=$row->location->city?>,
									<?=$row->location->state?>,
									<?=$row->location->country?>
								</td>
								<td>
									<?=$row->phone?> - <?=$row->cell?>
								</td>
							</tr>
						<?php endforeach; ?>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
    </div>
	<!-----Modal Info Usuario--->
	<div class="modal fade" tabindex="-1" role="dialog"  id="modalInfoUsuario" aria-labelledby="modalInfoUsuario" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-dark">
					<h5 class="modal-title text-light">
						Info Usuario <i class="fas fa-user-info"></i>
					</h5>
					<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
						<i class="fas fa-times-circle"></i>
					</button>
				</div>
				<div class="modal-body">
					<div class="container justify-content-center">
						<div class="card p-4 border-0">
							<div class="d-flex flex-column justify-content-center align-items-center text-center">
								<img class="img-thumbnail" id="userPicture" height="100" width="100"/>
								<span class="font-weight-bold text-primary h4 mb-2" id="userName"></span>
								<span class="font-weight-bold mb-2" id="userEmail"></span>
								<span class="mb-2" id="userId"></span>
								<span class="mb-2" id="userPhone"></span>
								<span class="mb-2" id="userCell"></span>
								<span class="font-weight-bold mb-2" id="userAddress"></span>
								<button class="btn btn-secondary">
									<span class="join" id="userRegistered"></span>
								</button>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">
						Cerrar <i class="fas fa-times-circle"></i>
					</button>
				</div>
			</div>
		</div>
	</div>
<?php include('../footer.php')?>
<script type="text/javascript">
	//Mover modales con el mouse
	$("#modalInfoUsuario").draggable({
		handle: ".modal-header"
	});
	var users = JSON.parse('<?= !empty( $users ) ? json_encode($users) : null ?>');
	function showDataUser( email ) {
		var data = users.filter(function(user) {
			return ( user.email == email )
		});
		var user = data[0];
		console.log( user );
		$("#userPicture").attr('src', user.picture.large);
		$("#userName").html(`<i class="fas fa-user"></i> ${user.name.title}, ${user.name.first} ${user.name.last}`);
		$("#userEmail").html(`<i class="fas fa-envelope"></i> ${user.email}`);
		$("#userId").html(`<i class="fas fa-user-shield"></i> ${user.login.username}`);
		$("#userPhone").html(`<i class="fas fa-phone"></i>${user.phone}`);
		$("#userCell").html(`<i class="fas fa-mobile"></i> ${user.cell}`);
		$("#userAddress").html(`<i class="fas fa-map"></i> ${user.location.street.name} # ${user.location.street.number}<br><i class="fas fa-globe-americas"></i> ${user.location.city}, ${user.location.state}, ${user.location.country}`);
		$("#userRegistered").html(`<i class="fas fa-user-clock"></i> ${moment(user.registered.date).fromNow()}`);
		$('#modalInfoUsuario').modal('toggle');
	}
	$(document).ready(function() {
		$('#tblUsers').DataTable({
			scrollY       : '50vh',
			scrollX       : true,
			scrollCollapse: true,
			select        : false,
			stripeClasses : false,
			language: {
				url: '../assets/js/spanish.json'
			},
			pagingType    : "simple_numbers",
			dom           : 'Bfrtip',
			buttons: [
				{
					titleAttr    : 'Exportar a Excel',
					text         : '<i class="fas fa-file-excel"></i>',
					extend       : 'excelHtml5',
					className    : 'btn btn-sm btn-success',
					filename     : 'Listado Usuarios',
					exportOptions: {
						columns: ':visible'
					}
				},{
					titleAttr    : 'Exportar a PDF',
					text         : '<i class="fas fa-file-pdf"></i>',
					extend       : 'pdfHtml5',
					alignment    : 'center',
					messageTop   : 'Reporte Detallado de Usuarios',
					margin       : [ 20, 10, 10, 20 ],
					orientation  : 'landscape',
					pageSize     : 'letter',
					image        : 'data:image/png;base64,',
					filename     : 'Listado Usuarios',
					className    : 'btn btn-sm btn-danger',
					exportOptions: {
						columns: ':visible'
					},
					messageBottom: 'PDF Creado por HelpDesk Support WebSoftware'
				},{
					titleAttr    : 'Imprimir',
					text         : '<i class="fa fa-print"></i>',
					extend       : 'print',
					className    : 'btn btn-sm btn-warning',
					exportOptions: {
						columns: ':visible'
					}
				}
			]
		});
	} );
</script>