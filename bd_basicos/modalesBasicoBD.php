	<!--Modal Usuario-->
	<div class="modal fade" role="dialog"  id="modalUsuario" aria-labelledby="modalUsuario" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header" id="headerUsuario">
					<strong class="modal-title font-weight-bold h3 text-white" id="titleUsuario"></strong>
					<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<form id="formUsuario" method="POST">
					<div class="modal-body bg-dark">
						<div class="form-row">
						<input type="hidden" id="idUsuario" name="idUsuario" required>
							<div class="form-group col-6">
								<label class="text-light" for="nombresUsuario">
									Nombres <i class="fas fa-user"></i>
								</label>
								<input type="text" class="form-control dark-mode" id="nombresUsuario" name="nombresUsuario" required>
							</div>
							<div class="form-group col-6">
								<label class="text-light" for="apellidosUsuario">
									Apellidos <i class="fas fa-user-tie"></i>
								</label>
								<input type="text" class="form-control dark-mode" id="apellidosUsuario" name="apellidosUsuario" required>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-6">
								<label class="text-light" for="correoUsuario">
									Email <i class="fas fa-at"></i>
								</label>
								<input type="email" class="form-control dark-mode" id="correoUsuario" name="correoUsuario" required>
							</div>
						</div>
					</div>

					<div class="modal-footer bg-dark">
						<button type="submit" class="btn" id="btnUsuario"></button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">
							<i class="fas fa-times-circle"></i> Cancelar
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>