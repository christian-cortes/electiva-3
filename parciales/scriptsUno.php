	<script type="text/javascript">
		//Mover modales con el mouse
		$("#modalGranjaPollitos").draggable({
			handle: ".modal-header"
		});
		var direcciones = `<option value="1" data-icon="fas fa-arrow-up">Norte</option>
							<option value="2" data-icon="fas fa-arrow-right">Este</option>
							<option value="3" data-icon="fas fa-arrow-down">Sur</option>
							<option value="4" data-icon="fas fa-arrow-left">Oeste</option>`;
		var limiteNorteSur  = 1;
		var limiteEsteOeste = 1;
		function agregarPollito(){
			var formClass   = ' type="number" min="1" class="form-control dark-mode form-control-sm text-sm';
			var selectClass = `${formClass} selectpicker" data-container="body" data-style="border"`;
			var row ='<tr>';
			row += `<td><i class="fas fa-kiwi-bird"></i></td>`;
			row += `<td><input ${formClass} norte-sur" max="${limiteNorteSur}" name="posicionNorteSur[]" required/></td>`;
			row += `<td><input ${formClass} este-oeste" max="${limiteEsteOeste}" name="posicionEsteOeste[]" required/></td>`;
			row += `<td><select ${selectClass} name="direccionInicial[]" required title="Seleccione la dirección...">${direcciones}</select></td>`;
			row += `<td><input ${formClass}" name="aguantePollito[]" required/></td>`;
			row += `<td>
						<button type="button" class="btn btn-danger btn-sm" onclick="eliminarPollito(this)">
							<i class="fa fa-times-circle"></i>
						</button>
					</td>`;
			row += '</tr>';
			$('#bodyPollitos').append(row);
			$('.selectpicker').selectpicker('refresh');
		}
		function eliminarPollito(button) {
			$(button).closest('tr').remove();
		}
		$('#medidaNorteSur').change(function() {
			limiteNorteSur = $(this).val();
			$('.norte-sur').attr("max", limiteNorteSur);
		});
		$('#medidaEsteOeste').change(function() {
			limiteEsteOeste = $(this).val();
			$('.este-oeste').attr("max", limiteEsteOeste);
		});
		$(document).ready(function () {
			agregarPollito();
		});
		$("#btnLimpiar").click(function(){
			$('.form-control').val(null);
			$("#bodyPollitos").empty();
			agregarPollito();
		});
		$("#formGranjaPollitos").submit(function(e){
			e.preventDefault();
			$('#btnCalcular').attr('disabled', true);
			if ( $('#tablaPollitos tr').length ) {
				$.ajax({
					type    : 'POST',
					url     : $('#formGranjaPollitos').attr('action'),
					data    : $('#formGranjaPollitos').serialize(),
					dataType: 'JSON',
					success : function(data) {
						if ( data.estado ) {
							var granja = data.datos;
							var cad = "";
							$("#bodyGranjaPollitos").empty();
							for (let i = 0; i < granja.length; i++) {
								cad += `<tr>`;
								for (let j = 0; j < granja[i].length; j++) {
									if ( granja[i][j] > 0 ) {
										cad += `<td>
													<i class="fas fa-kiwi-bird text-warning" data-count="${granja[i][j]}"></i>
												</td>`;
									} else {
										cad += `<td><i class="fas fa-seedling text-success"></i></td>`;
									}
								}
								cad += `</tr>`;
							}
							$("#bodyGranjaPollitos").html(cad);
							$('#modalGranjaPollitos').modal('toggle');
						} else {
							swal("Error!", data.mensaje, "error");
						}
					}
				});
			} else {
				swal("Error!", "Debe agregar por lo menos un pollito para ver su recorrido", "error");
			}
			$('#btnCalcular').removeAttr('disabled');
		});
	</script>
</body>
</html>