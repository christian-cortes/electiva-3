<?php include('../header.php')?>
<?php include('../navbar.php')?>
	<?php
		if ( empty( $_POST['gradosUsuario'] ) || $_POST['gradosUsuario'] <= 0 ) {
			header('Location: ejercicioUno.php');
			$_SESSION['flash_message'] = "El radio no fue ingresado o es un valor incorrecto";
		}
		$gradosUsuario   = removerXSS($_POST['gradosUsuario']);
		$radianesUsuario = deg2rad( $gradosUsuario );
	?>
    <div class="container">
        <div class="text-center">
            <h1 class="mt-5">Desarrollo Web</h1>
        </div>
		<div class="card-header bg-dark text-light text-center">
			<strong>Ejercicio 3</strong>
        </div>
		<div class="card-body">
			<p>
				Los grados son: <?=$gradosUsuario?><br>
				En radianes es: <?=number_format( $radianesUsuario, 2 )?>
			</p>
		</div>
    </div>
<?php include('../footer.php')?>