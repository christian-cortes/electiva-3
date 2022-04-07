<?php
	require_once('../functions.php');
	function queryVehiculos( $tipoQuery, $id = null, $data = null )
	{
		require ('../config/database.php');
		$result = null;
		switch ($tipoQuery) {
			case 1:
				$query  = $mysqli->query("SELECT * FROM vehiculos WHERE eliminado IS NULL");
				$result = $query->fetchAll(PDO::FETCH_OBJ);
				break;
			case 2:
				$query  = $mysqli->query("SELECT * FROM vehiculos WHERE id = $id");
				$result = $query->fetch(PDO::FETCH_ASSOC);
				break;
			case 3:
				$mysqli->prepare("INSERT INTO vehiculos ( modelo, referencia, color, placa, marca, precio )  VALUES (?,?,?,?,?,?)")->execute([
					$data['modelo'], $data['referencia'], $data['color'], $data['placa'], $data['marca'], $data['precio']
				]);
				$result = $mysqli->lastInsertId();
				if ( $result > 0 ) {
					$_SESSION["alerta"] = "<script>swal('Hecho!!', 'Se ha guardado correctamente el vehículo', 'success')</script>";
				}
				break;
			case 4:
				$result = $mysqli->prepare("UPDATE vehiculos SET modelo=?, referencia=?, color=?, placa=?, marca=?, precio=? WHERE id=?")->execute([
					$data['modelo'], $data['referencia'], $data['color'], $data['placa'], $data['marca'], $data['precio'], $id
				]);
				$_SESSION["alerta"] = "<script>swal('Hecho!!', 'Se ha actualizado correctamente el vehículo', 'success')</script>";
				break;
			case 5:
				$result = $mysqli->prepare("UPDATE vehiculos SET estado=? WHERE id=?")->execute([
					$data['estado'], $id
				]);
				if ( $data['estado'] ) {
					$_SESSION["alerta"] = "<script>swal('Hecho!!', 'Se ha activado correctamente el vehículo', 'success')</script>";
				} else {
					$_SESSION["alerta"] = "<script>swal('Hecho!!', 'Se ha desactivado correctamente el vehículo', 'info')</script>";
				}
				break;
			case 6:
				$result = $mysqli->prepare("UPDATE vehiculos SET eliminado=? WHERE id=?")->execute([
					date("Y-m-d H:i"), $id
				]);
				$_SESSION["alerta"] = "<script>swal('Hecho!!', 'Se ha eliminado correctamente el vehículo', 'warning')</script>";
				break;
			case 7:
				$query  = $mysqli->query("SELECT * FROM marcas WHERE eliminado IS NULL");
				$result = $query->fetchAll(PDO::FETCH_OBJ);
				break;
		}
		return $result;
	}
	//Guardar un usuario
	if ( empty( $_POST['idVehiculo'] ) && !empty( $_POST['modeloVehiculo'] ) && !empty( $_POST['referenciaVehiculo'] ) && !empty( $_POST['colorVehiculo'] ) && !empty( $_POST['placaVehiculo'] ) && !empty( $_POST['marcaVehiculo'] ) && !empty( $_POST['precioVehiculo'] ) ) {
		$dataUser = queryVehiculos(3, null,  [
			'modelo'     => removerXSS( $_POST['modeloVehiculo'] ),
			'referencia' => removerXSS( $_POST['referenciaVehiculo'] ),
			'color'      => removerXSS( $_POST['colorVehiculo'] ),
			'placa'      => removerXSS( $_POST['placaVehiculo'] ),
			'marca'      => removerXSS( $_POST['marcaVehiculo'] ),
			'precio'     => removerXSS( str_replace(",", "", $_POST['precioVehiculo']) )
		]);
		header('Location: ejercicioVehiculoBD.php');
	//Actualizar un usuario
	} else if ( !empty( $_POST['idVehiculo'] ) && !empty( $_POST['modeloVehiculo'] ) && !empty( $_POST['referenciaVehiculo'] ) && !empty( $_POST['colorVehiculo'] ) && !empty( $_POST['placaVehiculo'] ) && !empty( $_POST['marcaVehiculo'] ) && !empty( $_POST['precioVehiculo'] ) ) {
		$dataUser = queryVehiculos(4, $_POST['idVehiculo'],  [
			'modelo'     => removerXSS( $_POST['modeloVehiculo'] ),
			'referencia' => removerXSS( $_POST['referenciaVehiculo'] ),
			'color'      => removerXSS( $_POST['colorVehiculo'] ),
			'placa'      => removerXSS( $_POST['placaVehiculo'] ),
			'marca'      => removerXSS( $_POST['marcaVehiculo'] ),
			'precio'     => removerXSS( str_replace(",", "", $_POST['precioVehiculo']) )
		]);
		header('Location: ejercicioVehiculoBD.php');
	//Habilitar/Deshabilitar un usuario
	} else if ( !empty( $_POST['idVehiculo'] ) && isset( $_POST['estadoVehiculo'] ) ) {
		$dataUser = queryVehiculos(5, $_POST['idVehiculo'], ['estado' => $_POST['estadoVehiculo'] ] );
		echo json_encode( $dataUser );
	//Eliminar un usuario
	} else if ( !empty( $_POST['idVehiculo'] ) && !empty( $_POST['eliminarVehiculo'] ) ) {
		$dataUser = queryVehiculos(6, $_POST['idVehiculo'] );
		echo json_encode( $dataUser );
	//Buscar un usuario
	} else if ( !empty( $_POST['idVehiculo'] ) ) {
		$dataUser = queryVehiculos(2, $_POST['idVehiculo'] );
		echo json_encode( $dataUser );
	}
?>