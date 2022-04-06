<?php include('../header.php')?>
<?php include('../navbar.php')?>
	<?php
		if ( empty( $_POST['numeroUsuario'] ) || $_POST['numeroUsuario'] < 1000 || $_POST['numeroUsuario'] > 9999 ) {
			header('Location: ejercicioUno.php');
			$_SESSION['flash_message'] = "El numero no es de 4 cifras o es un valor incorrecto";
		}
		$numeroUsuario   = removerXSS($_POST['numeroUsuario']);
		$numeroInvertido = strrev($numeroUsuario);
	?>
    <div class="container">
        <div class="text-center">
            <h1 class="mt-5">Desarrollo Web</h1>
        </div>
		<div class="card-header bg-dark text-light text-center">
			<strong>Ejercicio 5</strong>
        </div>
		<div class="card-body">
			<p>
				El numero es: <?=$numeroUsuario?><br>
				El numero invertido: <?=$numeroInvertido?><br>
			</p>
		</div>
    </div>
<?php include('../footer.php')?>