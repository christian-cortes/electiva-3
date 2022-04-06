<script type="text/javascript">
	//Mover modales con el mouse
	$("#modalUsuario").draggable({
		handle: ".modal-header"
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
		var table = $('#tblUsuarios').DataTable({
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
				{ data: 'nombres' },
				{ data: 'apellidos' },
				{ data: 'correo' },
				{ data: 'estado' }
			],
			buttons: [
				{
					titleAttr:'Crear Usuario',
					text: '<i class="fas fa-user-plus">',
					action: function () {
						resetModalForm( 'formUsuario' );
						$('#formUsuario').attr( 'action', 'consultasBasicoBD.php' );
						$('#headerUsuario').removeClass('bg-success').addClass( 'bg-primary' );
						$('#titleUsuario').html('<i class="fas fa-user-plus"></i> Agregar Usuario');
						$('#btnUsuario').removeClass('btn-success').addClass( 'btn-primary' );
						$('#btnUsuario').html('<i class="fas fa-plus-circle"></i> Guardar');
						$('#modalUsuario').modal('toggle');
					},
					className: 'btn btn-sm btn-primary'
				},{
					titleAttr: 'Editar Usuario',
					text     : '<i class="fas fa-user-edit"></i>',
					extend   : 'selected',
					action   : function () {
						var datos = table.row({selected: true}).data();
						if (datos['estado'] == 'Activo') {
							$.ajax({
								type    : "POST",
								url     : 'consultasBasicoBD.php',
								data    : { idUsuario: datos['id'] },
								dataType: 'JSON',
								success : function(data) {
									resetModalForm( 'formUsuario' );
									$('#formUsuario').attr( 'action', 'consultasBasicoBD.php' );
									$('#headerUsuario').removeClass('bg-primary').addClass( 'bg-success' );
									$('#titleUsuario').html('<i class="fas fa-edit"></i> Editar Usuario');
									$('#btnUsuario').removeClass('btn-primary').addClass( 'btn-success' );
									$('#btnUsuario').html('<i class="fas fa-sync-alt"></i> Actualizar');
									$('#idUsuario').val(data.id);
									$('#nombresUsuario').val(data.nombres);
									$('#apellidosUsuario').val(data.apellidos);
									$('#correoUsuario').val(data.email);
									$('#modalUsuario').modal('toggle');
								}
							});
						} else if (datos['estado'] == 'Inactivo') {
							sweetAlertConfirm( 'Info!', `Usuario inactivo`, null, 'warning' );
						}
					},
					className: 'btn btn-sm btn-success'
				},{
					titleAttr: 'Activar Usuario',
					text     : '<i class="fas fa-user-check">',
					extend   : 'selected',
					action   : function () {
						var datos = table.row({selected: true}).data();
						if (datos['estado'] == 'Activo') {
							sweetAlertConfirm( 'Info!', `Usuario activo`, null, 'info' );
						} else if (datos['estado'] == 'Inactivo') {
							btnModificarUsuario(datos['id'], 1);
						}
					},
					className: 'btn btn-sm btn-info'
				},{
					titleAttr: 'Desactivar Usuario',
					text     : '<i class="fas fa-user-minus"></i>',
					extend   : 'selected',
					action   : function () {
						var datos = table.row({selected: true}).data();
						if (datos['estado'] == 'Activo') {
							btnModificarUsuario(datos['id'], 0);
						} else if (datos['estado'] == 'Inactivo') {
							sweetAlertConfirm( 'Info!', `Usuario inactivo`, null, 'warning' );
						}
					},
					className: 'btn btn-sm btn-warning'
				},{
					titleAttr: 'Borrar Usuario',
					text     : '<i class="fas fa-user-times"></i>',
					extend   : 'selected',
					action   : function () {
						var datos = table.row({selected: true}).data();
						btnModificarUsuario(datos['id'], 2);
					},
					className: 'btn btn-sm btn-danger'
				},{
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
	function btnModificarUsuario(id, estado) {
		swal({
			title   : `¿Desea ${ estado == 1 ? 'habilitar' : estado == 2 ? 'eliminar' :'deshabilitar'} este usuario?`,
			text    : `${ estado == 1  ? 'Podrá' : 'No podrá'} modificar la información del usuario`,
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
					var dataUsuario = { idUsuario: id, estadoUsuario: estado };
				} else if ( estado == 2 ) {
					var dataUsuario = { idUsuario: id, eliminarUsuario: moment().format('YYYY-MM-DD') };
				} else {
					return false;
				}
				$.ajax({
					type    : "POST",
					url     : 'consultasBasicoBD.php',
					data    : dataUsuario,
					dataType: 'JSON',
					success : function(data) {
						location.href = "";
					}
				});
			} else {
				swal('Cancelado', `No se ha ${ estado == 1 ? 'habilitado' : estado == 2 ? 'eliminado' : 'deshabilitado'} el usuario`, 'error');
			}
		});
	}
</script>