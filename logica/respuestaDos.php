<?php include('../header.php')?>
<?php include('../navbar.php')?>
	<?php
		if ( empty( $_POST['radioEsfera'] ) || $_POST['radioEsfera'] <= 0 ) {
			header('Location: ejercicioUno.php');
			$_SESSION['flash_message'] = "El radio no fue ingresado o es un valor incorrecto";
		}
		$radioEsfera   = removerXSS($_POST['radioEsfera']);
		$volumenEsfera = 4 * pi() * pow( $radioEsfera, 3  ) / 3;
	?>
    <div class="container">
        <div class="text-center">
            <h1 class="mt-5">Desarrollo Web</h1>
        </div>
		<div class="card-header bg-dark text-light text-center">
			<strong>Ejercicio 2</strong>
        </div>
		<div class="card-body">
			<p>
				El radio es: <?=$radioEsfera?><br>
				El volumen es: <?=number_format( $volumenEsfera )?>
			</p>
		</div>
    </div>
<?php include('../footer.php')?>