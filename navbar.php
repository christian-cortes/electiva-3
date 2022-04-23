    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Web</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="ejerciciosBasicos" role="button" data-toggle="dropdown" aria-expanded="false">
							Ejercicios Básicos #1
						</a>
						<div class="dropdown-menu" aria-labelledby="ejerciciosBasicos">
							<a class="dropdown-item" href="<?=base_url()?>/basicos/ejercicioUno.php">
								Ejercicio #1
							</a>
							<a class="dropdown-item" href="<?=base_url()?>/basicos/ejercicioDos.php">
								Ejercicio #2
							</a>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="ejericciosLogica1" role="button" data-toggle="dropdown" aria-expanded="false">
							Ejercicio Lógica #1
						</a>
						<div class="dropdown-menu" aria-labelledby="ejericciosLogica1">
							<a class="dropdown-item" href="<?=base_url()?>/logica/ejercicioUno.php">
								Ejercicio #1
							</a>
							<a class="dropdown-item" href="<?=base_url()?>/logica/ejercicioDos.php">
								Ejercicio #2
							</a>
							<a class="dropdown-item" href="<?=base_url()?>/logica/ejercicioTres.php">
								Ejercicio #3
							</a>
							<a class="dropdown-item" href="<?=base_url()?>/logica/ejercicioCuatro.php">
								Ejercicio #4
							</a>
							<a class="dropdown-item" href="<?=base_url()?>/logica/ejercicioCinco.php">
								Ejercicio #5
							</a>
							<a class="dropdown-item" href="<?=base_url()?>/logica/ejercicioSeis.php">
								Ejercicio #6
							</a>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="ejerciciosJson1" role="button" data-toggle="dropdown" aria-expanded="false">
							Ejercicios JSON #1
						</a>
						<div class="dropdown-menu" aria-labelledby="ejerciciosJson1">
							<a class="dropdown-item" href="<?=base_url()?>/json/ejercicioJson.php">
								JSON
							</a>
							<a class="dropdown-item" href="<?=base_url()?>/json/ejercicioApiJson.php">
								JSON - API
							</a>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="ejerciciosBDs" role="button" data-toggle="dropdown" aria-expanded="false">
							Ejercicios BD #1
						</a>
						<div class="dropdown-menu" aria-labelledby="ejerciciosBDs">
							<a class="dropdown-item" href="<?=base_url()?>/bd_basicos/ejercicioBasicoBD.php">
								Básico BD
							</a>
							<a class="dropdown-item" href="<?=base_url()?>/bd_basicos/ejercicioVehiculoBD.php">
								Vehículo BD
							</a>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="ejerciciosBDs" role="button" data-toggle="dropdown" aria-expanded="false">
							Ejercicios Git
						</a>
						<div class="dropdown-menu" aria-labelledby="ejerciciosBDs">
							<a class="dropdown-item" href="<?=base_url()?>/ejercicios_git/ejercicioGit.php">
								Básico Git
							</a>
						</div>
					</li>
				</ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?=base_url()?>/index.php">
                            Inicio
                        </a>
                    </li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="parciales" role="button" data-toggle="dropdown" aria-expanded="false">
							Parciales
						</a>
						<div class="dropdown-menu" aria-labelledby="parciales">
							<a class="dropdown-item" href="<?=base_url()?>/parciales/parcialUno.php">
								Parcial #1
							</a>
						</div>
					</li>
                </ul>
            </div>
        </div>
    </nav>