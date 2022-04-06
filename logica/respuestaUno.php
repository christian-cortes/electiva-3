<?php include('../header.php')?>
<?php include('../navbar.php')?>
	<?php
		if ( empty( $_POST['medidaUsuario'] ) || $_POST['medidaUsuario'] <= 0 ) {
			header('Location: ejercicioUno.php');
			$_SESSION['flash_message'] = "La medida no existe o tiene el formato incorrecto";
		}
		$medidaUsuario = removerXSS($_POST['medidaUsuario']);
		$medidaCm      = floatval( $medidaUsuario ) * 100;
		$medidaMm      = floatval( $medidaCm ) * 100;
	?>
    <div class="container">
        <div class="text-center">
            <h1 class="mt-5">Desarrollo Web</h1>
        </div>
		<div class="card-header bg-dark text-light text-center">
			<strong>Ejercicio 1</strong>
        </div>
		<div class="card-body">
			<p>
				La medida es: <?=$medidaUsuario?><br>
				Medida en CM: <?=number_format( $medidaCm )?><br>
				Medida en MM: <?=number_format( $medidaMm )?><br>
			</p>
		</div>
    </div>
	<?php include('../footer.php')?>