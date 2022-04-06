<?php include('../header.php')?>
<?php include('../navbar.php')?>
    <div class="container">
        <div class="text-center">
            <h1 class="mt-5">Desarrollo Web</h1>
        </div>
		<div class="card-header bg-dark text-light text-center">
			<strong>Ejercicio 2</strong>
        </div>
		<div class="card-body">
			<p>
				Bienvenido <strong><?=removerXSS($_POST['nombresUsuario'])?></strong> <strong><?=removerXSS($_POST['apellidosUsuario'])?></strong> con No de identificación <strong><?=number_format( $_POST['documentoUsuario'], 0 ) ?></strong>, usted se ha registrado correctamente. Hemos enviado un correo a <strong><?=removerXSS($_POST['correoUsuario'])?></strong> validando su identidad.
			</p>
		</div>
    </div>
<?php include('../footer.php')?>