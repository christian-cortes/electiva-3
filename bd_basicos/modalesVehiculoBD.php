	<!--Modal Vehiculo-->
	<div class="modal fade" role="dialog"  id="modalVehiculo" aria-labelledby="modalVehiculo" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header" id="headerVehiculo">
					<strong class="modal-title font-weight-bold h3 text-white" id="titleVehiculo"></strong>
					<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<form id="formVehiculo" method="POST">
					<div class="modal-body bg-dark">
						<div class="form-row">
						<input type="hidden" id="idVehiculo" name="idVehiculo" required>
							<div class="form-group col-6">
								<label class="text-light" for="modeloVehiculo">
									Modelo <i class="fas fa-calendar-alt"></i>
								</label>
								<input type="number" class="form-control dark-mode" id="modeloVehiculo" name="modeloVehiculo" required>
							</div>
							<div class="form-group col-6">
								<label class="text-light" for="referenciaVehiculo">
									Referencia <i class="fas fa-barcode"></i>
								</label>
								<input type="text" class="form-control dark-mode" id="referenciaVehiculo" name="referenciaVehiculo" required>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-6">
								<label class="text-light" for="colorVehiculo">
									Color <i class="fas fa-palette"></i>
								</label>
								<input type="text" class="form-control dark-mode" id="colorVehiculo" name="colorVehiculo" required>
							</div>
							<div class="form-group col-6">
								<label class="text-light" for="placaVehiculo">
									Placa <i class="fas fa-address-card"></i>
								</label>
								<input type="text" class="form-control dark-mode" id="placaVehiculo" name="placaVehiculo" required>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-6">
								<label class="text-light" for="marcaVehiculo">
									Marca <i class="fas fa-car"></i>
								</label>
								<input type="text" class="form-control dark-mode" id="marcaVehiculo" name="marcaVehiculo" required>
							</div>
							<div class="form-group col-6">
								<label class="text-light" for="precioVehiculo">
									Precio <i class="fas fa-hand-holding-usd"></i>
								</label>
								<input type="text" class="form-control dark-mode" id="precioVehiculo" name="precioVehiculo" onkeyup="autoFormato(this)" required>
							</div>
						</div>
					</div>

					<div class="modal-footer bg-dark">
						<button type="submit" class="btn" id="btnVehiculo"></button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">
							<i class="fas fa-times-circle"></i> Cancelar
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>