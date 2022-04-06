<?php include('../header.php')?>
<?php include('../navbar.php')?>
	<?php
		function sumarDosNumeros( $numeroUno, $numeroDos ) {
			return intval( $numeroUno ) + intval( $numeroDos );
		}
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
				Los números son:<br>
				Numero Uno: <strong><?=$_POST['numeroUno']?></strong><br>
				Numero Dos: <strong><?=$_POST['numeroDos']?></strong><br>
			</p>
			<p>
				La suma de los dos números es:<br>
				<strong><?=sumarDosNumeros($_POST['numeroUno'], $_POST['numeroDos'] )?></strong>
			</p>
			<p>
				El numero mayor es:<br>
				<strong>
					<?=intval( $_POST['numeroUno'] ) > intval( $_POST['numeroDos'] ) ? $_POST['numeroUno'] :(intval( $_POST['numeroUno'] ) < intval( $_POST['numeroDos'] ) ? $_POST['numeroDos'] : "Iguales") ?>
				</strong>
			</p>
			<p>
				Los números intercambiados son:<br>
				<?php
					$_POST['numeroUno'] = intval( $_POST['numeroUno'] ) + intval( $_POST['numeroDos'] );
					$_POST['numeroDos'] = intval( $_POST['numeroUno'] ) - intval( $_POST['numeroDos'] );
					$_POST['numeroUno'] = intval( $_POST['numeroUno'] ) - intval( $_POST['numeroDos'] );
				?>
				Numero Uno: <strong><?=$_POST['numeroUno']?></strong><br>
				Numero Dos: <strong><?=$_POST['numeroDos']?></strong><br>
			</p>
		</div>
    </div>
	<?php include('../footer.php')?>