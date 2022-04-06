<?php include('functions.php')?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="<?=base_url()?>/assets/favicon.ico" />
    <title>Clase Desarrollo Web</title>
	<!-- BOOTSTRAP -->
	<link rel="stylesheet" href="<?=base_url()?>/assets/libraries/bootstrap/css/bootstrap.min.css">
	<!-- FONT AWESOME 5.15.1-->
	<link rel="stylesheet" href="<?=base_url()?>/assets/libraries/@fortawesome/css/brands.css">
	<link rel="stylesheet" href="<?=base_url()?>/assets/libraries/@fortawesome/css/regular.css">
	<link rel="stylesheet" href="<?=base_url()?>/assets/libraries/@fortawesome/css/solid.css">
	<link rel="stylesheet" href="<?=base_url()?>/assets/libraries/@fortawesome/css/fontawesome.css">
	<!-- BOOTSTRAP SELECT -->
	<link rel="stylesheet" href="<?=base_url()?>/assets/libraries/bootstrap-select/dist/css/bootstrap-select.min.css">
	<!-- DATE TIME PICKER FLATPICKR-->
	<link rel="stylesheet" href="<?=base_url()?>/assets/libraries/flatpickr/dist/themes/dark.css"/>
	<!-- JQuery UI -->
	<link rel="stylesheet" href="<?=base_url()?>/assets/libraries/jquery-ui/dist/css/jquery-ui.min.css"/>
	<!-- DATA TABLES 1.11.3 -->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/libraries/DataTables/DataTables-1.11.3/css/dataTables.bootstrap4.css"/>
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/libraries/DataTables/Buttons-2.0.1/css/buttons.bootstrap4.css"/>
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/libraries/DataTables/FixedColumns-4.0.1/css/fixedColumns.bootstrap4.css"/>
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/libraries/DataTables/FixedHeader-3.2.0/css/fixedHeader.bootstrap4.css"/>
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/libraries/DataTables/Responsive-2.2.9/css/responsive.bootstrap4.css"/>
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/libraries/DataTables/Select-1.3.3/css/select.bootstrap4.css"/>
	<!-- Core theme CSS (includes Bootstrap)-->
    <link type="text/css" href="<?=base_url()?>/assets/css/dark-mode.css" rel="stylesheet"/>
	<link type="text/css" href="<?=base_url()?>/assets/css/styles.css" rel="stylesheet"/>
	<link type="text/css" href="<?=base_url()?>/assets/css/custom.css" rel="stylesheet"/>
</head>
<script type="text/javascript">
	//Función variables de sesión de PHP a JS.
	const base_url = (link = '') => '<?=base_url()?>'+link;
</script>
<body class="dark-mode bg-secondary h-100 w-100">