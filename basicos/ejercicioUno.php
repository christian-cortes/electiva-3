<?php include('../header.php')?>
<?php include('../navbar.php')?>
    <div class="container">
        <div class="text-center">
            <h1 class="mt-5">Desarrollo Web</h1>
        </div>
        <form class="card bg-transparent mb-2 mt-2 text-center" method="POST" action="respuestaUno.php">
			<div class="card-header bg-dark text-light text-center">
				<strong>Ejercicio 1</strong>
            </div>
			<div class="card-body">
				<div class="form-row">
					<div class="form-group col-6">
						<label class="text-light" for="numeroUno">
							Numero Uno <i class="fas fa-sort-numeric-down"></i>
						</label>
						<input type="number" class="form-control dark-mode" id="numeroUno" name="numeroUno" required>
					</div>
					<div class="form-group col-6">
						<label class="text-light" for="numeroDos">
							Numero Dos <i class="fas fa-sort-numeric-up"></i>
						</label>
						<input type="number" class="form-control dark-mode" id="numeroDos" name="numeroDos" required>
					</div>
				</div>
			</div>
			<div class="card-footer">
				<div class="form-row text-center">
					<div class="col-12 text-center">
						<button type="submit" class="btn btn-primary">
							Calcular <i class="fas fa-plus"></i> <i class="fas fa-less-than-equal"></i> <i class="fas fa-greater-than-equal"></i>
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