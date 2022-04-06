<?php include('../header.php')?>
<?php include('../navbar.php')?>
    <div class="container">
        <div class="text-center">
            <h1 class="mt-5">Desarrollo Web</h1>
        </div>
        <form class="card bg-transparent mb-2 mt-2 text-center" method="POST" action="respuestaDos.php">
			<div class="card-header bg-dark text-light text-center">
				<strong>Ejercicio 2</strong>
            </div>
			<div class="card-body">
				<div class="form-row">
					<div class="form-group col-4">
						<label class="text-light" for="documentoUsuario">
							Identificación <i class="fas fa-id-card"></i>
						</label>
						<input type="number" class="form-control dark-mode" id="documentoUsuario" name="documentoUsuario" required>
					</div>
					<div class="form-group col-4">
						<label class="text-light" for="nombresUsuario">
							Nombres <i class="fas fa-user"></i>
						</label>
						<input type="text" class="form-control dark-mode" id="nombresUsuario" name="nombresUsuario" required>
					</div>
					<div class="form-group col-4">
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
					<div class="form-group col-6">
						<label class="text-light" for="passwordUsuario">
							Password <i class="fas fa-key"></i>
						</label>
						<input type="password" class="form-control dark-mode" id="passwordUsuario" name="passwordUsuario" required>
					</div>
				</div>
			</div>
			<div class="card-footer">
				<div class="form-row text-center">
					<div class="col-12 text-center">
						<button type="submit" class="btn btn-primary">
							Enviar <i class="fas fa-user-plus"></i>
						</button>
						<button type="reset" class="btn btn-success">
							Limpiar <i class="fas fa-broom"></i>
						</button>
					</div>
				</div>
			</div>
        </form>
    </div>
<?php include('../footer.php')?>