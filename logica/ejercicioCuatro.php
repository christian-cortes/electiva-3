<?php include('../header.php')?>
<?php include('../navbar.php')?>
    <div class="container">
        <div class="text-center">
            <h1 class="mt-5">Desarrollo Web</h1>
        </div>
        <form class="card bg-transparent mb-2 mt-2 text-center" method="POST" action="respuestaCuatro.php">
			<div class="card-header bg-dark text-light text-center">
				<strong>Ejercicio 4</strong>
            </div>
			<div class="card-body">
				<div class="form-row">
					<div class="form-group col-12">
						<label class="text-light" for="numeroUsuario">
							Numero de 4 Cifras <i class="fas fa-sort-numeric-down"></i>
						</label>
						<input type="number" class="form-control dark-mode" min="1000" max="9999" id="numeroUsuario" name="numeroUsuario" required>
					</div>
				</div>
			</div>
			<div class="card-footer">
				<div class="form-row text-center">
					<div class="col-12 text-center">
						<button type="submit" class="btn btn-primary">
							Convertir <i class="fas fa-rules"></i>
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