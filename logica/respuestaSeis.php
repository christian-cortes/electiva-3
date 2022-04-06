<?php include('../header.php')?>
<?php include('../navbar.php')?>
	<?php
		if ( empty( $_POST['nacimientoUsuario'] ) ) {
			header('Location: ejercicioUno.php');
			$_SESSION['flash_message'] = "No ingreso la fecha o es un valor incorrecto";
		}
		$nacimientoUsuario = removerXSS($_POST['nacimientoUsuario']);
		$fechaUsuario      = strtotime($nacimientoUsuario);
		$añoUsuario        = date("Y") - date("Y", $fechaUsuario);
		$añoFuturo         = 2030 - date("Y", $fechaUsuario);
	?>
    <div class="container">
        <div class="text-center">
            <h1 class="mt-5">Desarrollo Web</h1>
        </div>
		<div class="card-header bg-dark text-light text-center">
			<strong>Ejercicio 6</strong>
        </div>
		<div class="card-body">
			<p>
				La fecha de nacimiento es: <?=$nacimientoUsuario?><br>
				Años actuales: <?=$añoUsuario?><br>
				Años en el 2030: <?=$añoFuturo?><br>
			</p>
		</div>
    </div>
<?php include('../footer.php')?>