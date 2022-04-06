<?php
	include('../functions.php');
	if ( empty( $_POST['medidaNorteSur'] ) || empty( $_POST['medidaEsteOeste'] ) || $_POST['medidaEsteOeste'] < 10 || $_POST['medidaNorteSur'] < 10 ) {
		$mensaje = "Las medidas son incorrectas o no han sido ingresadas";
	}
	$estado  = false;
	$mensaje = "Los pollitos no han recorrido el granero";
	//Se obtiene la dimension de la granja
	$granjaAncho = intval( $_POST['medidaEsteOeste'] );
	$granjaLargo = intval( $_POST['medidaNorteSur'] );
	//Se obtiene los valores de los pollitos
	$rowsChicks  = $_POST['posicionNorteSur'];
	$colsChicks  = $_POST['posicionEsteOeste'];
	$dirsChicks  = $_POST['direccionInicial'];
	$stepsChicks = $_POST['aguantePollito'];
	$countChicks = 0;
	//Se crea la matriz de la granja
	$granja = crearArray( $granjaLargo, $granjaAncho );
	//Se hace recorrer los pollitos la granja
	for ($i=0; $i < count( $rowsChicks ); $i++) {
		$counter = 1;
		$steps   = intval( $stepsChicks[$i] );
		$rowPos  = intval( $rowsChicks[$i] - 1 );
		$colPos  = intval( $colsChicks[$i] - 1 );
		$dirPos  = intval( $dirsChicks[$i] );
		$change  = 0;
		//Pollito come donde se despierta
		$granja[$rowPos][$colPos] += 1;
		//Ciclo para los pollos
		while ( $steps > 0 ) {
			//Ciclo de aumento de la cantidad e pasos por lado
			for ($k=0; $k < 2; $k++) {
				//ciclo para los pasos
				for ($l=0; $l < $counter; $l++) {
					if ( $rowPos < 0 && $colPos < 0 && $rowPos >= count( $granja ) && $colPos >= count( $granja[$i] ) || $steps <= 0 ) {
						$steps = 0;
						break 3;
					}
					//Se resta un paso
					$steps--;
					$countChicks++;
					//Norte
					if ( $dirPos == 1 ) {
						$rowPos -= 1;
					//Este
					} else if ( $dirPos == 2 ) {
						$colPos += 1;
					//Sur
					} else if ( $dirPos == 3 ) {
						$rowPos += 1;
					//Oeste
					} else if ( $dirPos == 4 ) {
						$colPos -= 1;
					}
					$granja[$rowPos][$colPos] += 1;
				}
				//Cambia direccion
				if ( $dirPos >= 4 ) {
					$dirPos = 1;
				} else {
					$dirPos++;
				}
			}
			//Aumenta el counter
			$counter++;
		}
	}
	if ( $countChicks > 0 ) {
		$estado  = true;
		$mensaje = "Los pollitos han recorrido el granero";
	}
	echo json_encode([
		'estado'  => $estado,
		'mensaje' => $mensaje,
		'datos'   => $granja
	]);