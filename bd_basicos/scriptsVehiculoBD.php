<script type="text/javascript">
	//Mover modales con el mouse
	$("#modalVehiculo").draggable({
		handle: ".modal-header"
	});
	// Bootstrap Color Picker
	$('#cp3').colorpicker({
		format: 'hex'
	});
	function resetModalForm( idModal = null, idButton = null ) {
		if ( idModal != '' ) {
			idModal = '#'+idModal;
		}
		$(idModal+' .form-control').removeClass('is-valid is-invalid').val(null);
		$(idModal+' .selectpicker').selectpicker('setStyle', 'btn-outline-valid btn-outline-invalid', 'remove').selectpicker('val', null);
		idButton   != null ? $('#'+idButton).removeAttr('disabled'):'';
	}
	$(document).ready(function() {
		var table = $('#tblVehiculos').DataTable({
			scrollY       : '50vh',
			scrollX       : true,
			scrollCollapse: true,
			select        : {
				style    : 'single',
				blurable : true
			},
			language: {
				url: '../assets/js/spanish.json'
			},
			stripeClasses : false,
			pagingType    : "simple_numbers",
			dom           : 'Bfrtip',
			columns: [
				{ data: 'id' },
				{ data: 'modelo' },
				{ data: 'referencia' },
				{ data: 'color' },
				{ data: 'placa' },
				{ data: 'marca' },
				{ data: 'precio' },
				{ data: 'estado' }
			],
			buttons: [
				{
					titleAttr:'Crear Vehiculo',
					text: '<i class="fas fa-plus">',
					action: function () {
						resetModalForm( 'formVehiculo' );
						$('#formVehiculo').attr( 'action', 'consultasVehiculoBD.php' );
						$('#headerVehiculo').removeClass('bg-success').addClass( 'bg-primary' );
						$('#titleVehiculo').html('<i class="fas fa-plus"></i> Agregar Vehiculo');
						$('#btnVehiculo').removeClass('btn-success').addClass( 'btn-primary' );
						$('#btnVehiculo').html('<i class="fas fa-plus-circle"></i> Guardar');
						$('#modalVehiculo').modal('toggle');
					},
					className: 'btn btn-sm btn-primary'
				},{
					titleAttr: 'Editar Vehiculo',
					text     : '<i class="fas fa-edit"></i>',
					extend   : 'selected',
					action   : function () {
						var datos = table.row({selected: true}).data();
						if (datos['estado'] == 'Activo') {
							$.ajax({
								type    : "POST",
								url     : 'consultasVehiculoBD.php',
								data    : { idVehiculo: datos['id'] },
								dataType: 'JSON',
								success : function(data) {
									resetModalForm( 'formVehiculo' );
									$('#formVehiculo').attr( 'action', 'consultasVehiculoBD.php' );
									$('#headerVehiculo').removeClass('bg-primary').addClass( 'bg-success' );
									$('#titleVehiculo').html('<i class="fas fa-edit"></i> Editar Vehiculo');
									$('#btnVehiculo').removeClass('btn-primary').addClass( 'btn-success' );
									$('#btnVehiculo').html('<i class="fas fa-sync-alt"></i> Actualizar');
									$('#idVehiculo').val(data.id);
									$('#modeloVehiculo').val(data.modelo);
									$('#referenciaVehiculo').val(data.referencia);
									$('#colorVehiculo').val(data.color).trigger('change');
									$('#placaVehiculo').val(data.placa);
									$('#marcaVehiculo').val(data.marca);
									$('#precioVehiculo').val(data.precio).trigger('keyup');
									$('#modalVehiculo').modal('toggle');
								}
							});
						} else if (datos['estado'] == 'Inactivo') {
							sweetAlertConfirm( 'Info!', `Vehiculo inactivo`, null, 'warning' );
						}
					},
					className: 'btn btn-sm btn-success'
				},{
					titleAttr: 'Activar Vehiculo',
					text     : '<i class="fas fa-check">',
					extend   : 'selected',
					action   : function () {
						var datos = table.row({selected: true}).data();
						if (datos['estado'] == 'Activo') {
							sweetAlertConfirm( 'Info!', `Vehiculo activo`, null, 'info' );
						} else if (datos['estado'] == 'Inactivo') {
							btnModificarVehiculo(datos['id'], 1);
						}
					},
					className: 'btn btn-sm btn-info'
				},{
					titleAttr: 'Desactivar Vehiculo',
					text     : '<i class="fas fa-minus"></i>',
					extend   : 'selected',
					action   : function () {
						var datos = table.row({selected: true}).data();
						if (datos['estado'] == 'Activo') {
							btnModificarVehiculo(datos['id'], 0);
						} else if (datos['estado'] == 'Inactivo') {
							sweetAlertConfirm( 'Info!', `Vehiculo inactivo`, null, 'warning' );
						}
					},
					className: 'btn btn-sm btn-warning'
				},{
					titleAttr: 'Borrar Vehiculo',
					text     : '<i class="fas fa-times"></i>',
					extend   : 'selected',
					action   : function () {
						var datos = table.row({selected: true}).data();
						btnModificarVehiculo(datos['id'], 2);
					},
					className: 'btn btn-sm btn-danger'
				},{
					titleAttr    : 'Exportar a Excel',
					text         : '<i class="fas fa-file-excel"></i>',
					extend       : 'excelHtml5',
					className    : 'btn btn-sm btn-success',
					filename     : 'Listado Vehiculos',
					exportOptions: {
						columns: ':visible'
					}
				},{
					titleAttr    : 'Exportar a PDF',
					text         : '<i class="fas fa-file-pdf"></i>',
					extend       : 'pdfHtml5',
					alignment    : 'center',
					messageTop   : 'Reporte Detallado de Vehiculos',
					margin       : [ 20, 10, 10, 20 ],
					orientation  : 'landscape',
					pageSize     : 'letter',
					image        : 'data:image/png;base64,',
					filename     : 'Listado Vehiculos',
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
	function btnModificarVehiculo(id, estado) {
		swal({
			title   : `¿Desea ${ estado == 1 ? 'habilitar' : estado == 2 ? 'eliminar' :'deshabilitar'} este vehiculo?`,
			text    : `${ estado == 1  ? 'Podrá' : 'No podrá'} modificar la información del vehiculo`,
			icon    : estado == 1 ? 'info' : estado == 2 ? 'error' : 'warning',
			buttons : {
				confirm: {
					text       : `Si, Lo quiero ${ estado == 1 ? 'habilitar' : estado == 2 ? 'eliminar' :'deshabilitar'}!`,
					value      : true,
					visible    : true,
					className  : `btn-${estado == 1 ? 'info' : estado == 2 ? 'danger' : 'warning'}`,
					closeModal : true
				},
				cancel: {
					text       : "Cancelar",
					value      : false,
					visible    : true,
					className  : "btn-secondary",
					closeModal : true
				},
			},
			dangerMode : false,
		}).then((isConfirm) => {
			if (isConfirm) {
				if ( estado == 1 || estado == 0 ) {
					var dataVehiculo = { idVehiculo: id, estadoVehiculo: estado };
				} else if ( estado == 2 ) {
					var dataVehiculo = { idVehiculo: id, eliminarVehiculo: moment().format('YYYY-MM-DD') };
				} else {
					return false;
				}
				$.ajax({
					type    : "POST",
					url     : 'consultasVehiculoBD.php',
					data    : dataVehiculo,
					dataType: 'JSON',
					success : function(data) {
						location.href = "";
					}
				});
			} else {
				swal('Cancelado', `No se ha ${ estado == 1 ? 'habilitado' : estado == 2 ? 'eliminado' : 'deshabilitado'} el vehiculo`, 'error');
			}
		});
	}
</script>