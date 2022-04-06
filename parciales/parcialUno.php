<?php include('../header.php')?>
<?php include('../navbar.php')?>
    <div class="container">
        <div class="text-center">
            <h1 class="mt-5">Electiva 3</h1>
        </div>
        <form class="card bg-transparent mb-2 mt-2 text-center" action="<?=base_url()?>/parciales/respuestaUno.php" id="formGranjaPollitos">
			<div class="card-header bg-dark text-light text-center">
				<strong>Parcial 1 - Los Pollitos <i class="fas fa-kiwi-bird"></i> </strong>
            </div>
			<div class="card-body">
				<div class="form-row">
					<div class="form-group col-6">
						<label class="text-light" for="medidaNorteSur">
							Medida Norte-Sur <i class="fas fa-ruler-vertical"></i>
						</label>
						<input type="number" class="form-control dark-mode" min="10" max="50" id="medidaNorteSur" name="medidaNorteSur" required>
					</div>
					<div class="form-group col-6">
						<label class="text-light" for="medidaEsteOeste">
							Medida Este-Oeste <i class="fas fa-ruler-horizontal"></i>
						</label>
						<input type="number" class="form-control dark-mode" min="10" max="50" id="medidaEsteOeste" name="medidaEsteOeste" required>
					</div>
					<div class="row justify-content-center align-items-center w-100">
						<div class="col-12" style="overflow:auto;max-height:450px;">
							<table class="table table-sm w-100" id="tablaPollitos">
								<thead class="text-center text-light ">
									<tr class="font-weight-bold">
										<th colspan="6">Los Pollitos <i class="fas fa-tractor"></i> </th>
									</tr>
									<tr class="font-weight-bold">
										<th></th>
										<th> Norte-Sur <i class="fas fa-ruler-vertical"></i> </th>
										<th> Este-Oeste <i class="fas fa-ruler-horizontal"></i> </th>
										<th> Dirección <i class="fas fa-compass"></i> </th>
										<th> Aguante <i class="fas fa-battery-full"></i> </th>
										<th width="10%">
											<button type="button" class="btn btn-success btn-sm" onclick="agregarPollito()">
												<i class="fa fa-plus-circle"></i>
											</button>
										</th>
									</tr>
								</thead>
								<tbody id="bodyPollitos"></tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer">
				<div class="form-row text-center">
					<div class="col-12 text-center">
						<button type="submit" id="btnCalcular" class="btn btn-primary">
							Calcular <i class="fas fa-map"></i>
						</button>
						<button type="button" id="btnLimpiar" class="btn btn-success">
							Limpiar <i class="fas fa-broom"></i>
						</button>
					</div>
				</div>
			</div>
        </form>
	</div>
	<!-----Modal Camino Pollitos--->
	<div class="modal fade" tabindex="-1" role="dialog"  id="modalGranjaPollitos" aria-labelledby="modalGranjaPollitos" aria-hidden="true">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header bg-dark">
					<h5 class="modal-title text-light">
						Granja Pollitos <i class="fas fa-map"></i> <i class="fas fa-shoe-prints"></i>
					</h5>
					<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
						<i class="fas fa-times-circle"></i>
					</button>
				</div>
				<div class="modal-body">
					<div class="table-responsive text-sm">
						<table class="table table-sm table-bordered w-100" id="tablaGranjaPollitos">
							<tbody class="text-center" id="bodyGranjaPollitos"></tbody>
						</table>
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
<?php global $scripts;?>
<?php $scripts = 'parciales/scriptsUno.php'?>
<?php include('../footer.php')?>