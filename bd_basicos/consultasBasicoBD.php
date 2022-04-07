<?php
	require_once('../functions.php');
	function queryUsuarios( $tipoQuery, $id = null, $data = null )
	{
		require ('../config/database.php');
		$result = null;
		switch ($tipoQuery) {
			case 1:
				$query  = $mysqli->query("SELECT * FROM usuarios WHERE eliminado IS NULL");
				$result = $query->fetchAll(PDO::FETCH_OBJ);
				break;
			case 2:
				$query  = $mysqli->query("SELECT * FROM usuarios WHERE id = $id");
				$result = $query->fetch(PDO::FETCH_ASSOC);
				break;
			case 3:
				$mysqli->prepare("INSERT INTO usuarios ( nombres, apellidos, email )  VALUES (?,?,?)")->execute([
					$data['nombres'], $data['apellidos'], $data['email']
				]);
				$result = $mysqli->lastInsertId();
				if ( $result > 0 ) {
					$_SESSION["alerta"] = "<script>swal('Hecho!!', 'Se ha guardado correctamente el usuario', 'success')</script>";
				}
				break;
			case 4:
				$result = $mysqli->prepare("UPDATE usuarios SET nombres=?, apellidos=?, email=? WHERE id=?")->execute([
					$data['nombres'], $data['apellidos'], $data['email'], $id
				]);
				$_SESSION["alerta"] = "<script>swal('Hecho!!', 'Se ha actualizado correctamente el usuario', 'success')</script>";
				break;
			case 5:
				$result = $mysqli->prepare("UPDATE usuarios SET estado=? WHERE id=?")->execute([
					$data['estado'], $id
				]);
				if ( $data['estado'] ) {
					$_SESSION["alerta"] = "<script>swal('Hecho!!', 'Se ha activado correctamente el usuario', 'success')</script>";
				} else {
					$_SESSION["alerta"] = "<script>swal('Hecho!!', 'Se ha desactivado correctamente el usuario', 'info')</script>";
				}
				break;
			case 6:
				$result = $mysqli->prepare("UPDATE usuarios SET eliminado=? WHERE id=?")->execute([
					date("Y-m-d H:i"), $id
				]);
				$_SESSION["alerta"] = "<script>swal('Hecho!!', 'Se ha eliminado correctamente el usuario', 'warning')</script>";
				break;
		}
		return $result;
	}
	//Guardar un usuario
	if ( empty( $_POST['idUsuario'] ) && !empty( $_POST['nombresUsuario'] ) && !empty( $_POST['nombresUsuario'] ) && !empty( $_POST['nombresUsuario'] ) ) {
		$dataUser = queryUsuarios(3, null,  [
			'nombres'   => removerXSS( $_POST['nombresUsuario'] ),
			'apellidos' => removerXSS( $_POST['apellidosUsuario'] ),
			'email'     => removerXSS( $_POST['correoUsuario'] )
		]);
		header('Location: ejercicioBasicoBD.php');
	//Actualizar un usuario
	} else if ( !empty( $_POST['idUsuario'] ) && !empty( $_POST['nombresUsuario'] ) && !empty( $_POST['nombresUsuario'] ) && !empty( $_POST['nombresUsuario'] ) ) {
		$dataUser = queryUsuarios(4, $_POST['idUsuario'],  [
			'nombres'   => removerXSS( $_POST['nombresUsuario'] ),
			'apellidos' => removerXSS( $_POST['apellidosUsuario'] ),
			'email'     => removerXSS( $_POST['correoUsuario'] )
		]);
		header('Location: ejercicioBasicoBD.php');
	//Habilitar/Deshabilitar un usuario
	} else if ( !empty( $_POST['idUsuario'] ) && isset( $_POST['estadoUsuario'] ) ) {
		$dataUser = queryUsuarios(5, $_POST['idUsuario'], ['estado' => $_POST['estadoUsuario'] ] );
		echo json_encode( $dataUser );
	//Eliminar un usuario
	} else if ( !empty( $_POST['idUsuario'] ) && !empty( $_POST['eliminarUsuario'] ) ) {
		$dataUser = queryUsuarios(6, $_POST['idUsuario'] );
		echo json_encode( $dataUser );
	//Buscar un usuario
	} else if ( !empty( $_POST['idUsuario'] ) ) {
		$dataUser = queryUsuarios(2, $_POST['idUsuario'] );
		echo json_encode( $dataUser );
	}
?>