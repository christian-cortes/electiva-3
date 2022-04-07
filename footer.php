	<!-- JQUERY 3.4.1 -->
	<script src="<?=base_url()?>/assets/libraries/jquery/dist/js/jquery.min.js"></script>
	<!-- JQUERY UI 1.12.1 -->
	<script src="<?=base_url()?>/assets/libraries/jquery-ui/dist/js/jquery-ui.min.js"></script>
	<!-- BOOTSTRAP 4.5.3 -->
	<script src="<?=base_url()?>/assets/libraries/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- BOOTSTRAP SELECT -->
	<script src="<?=base_url()?>/assets/libraries/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script src="<?=base_url()?>/assets/libraries/bootstrap-select/dist/locale/defaults-es_ES.js"></script>
	<!-- DATE TIME PICKER FLATPICKR-->
	<script src="<?=base_url()?>/assets/libraries/flatpickr/dist/flatpickr.js"></script>
	<script src="<?=base_url()?>/assets/libraries/flatpickr/dist/l10n/es.js"></script>
	<!-- BOOTSTRAP COLOR PICKER -->
	<script src="<?=base_url()?>/assets/libraries/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
	<!-- MOMENT JS-->
	<script src="<?=base_url()?>/assets/libraries/moment/min/moment-with-locales.js"></script>
	<script src="<?=base_url()?>/assets/libraries/moment/min/es.js"></script>
	<!-- DATA TABLES 1.11.3 -->
	<script type="text/javascript" src="<?=base_url()?>/assets/libraries/DataTables/JSZip-2.5.0/jszip.js"></script>
	<script type="text/javascript" src="<?=base_url()?>/assets/libraries/DataTables/pdfmake-0.1.36/pdfmake.js"></script>
	<script type="text/javascript" src="<?=base_url()?>/assets/libraries/DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>
	<script type="text/javascript" src="<?=base_url()?>/assets/libraries/DataTables/DataTables-1.11.3/js/jquery.dataTables.js"></script>
	<script type="text/javascript" src="<?=base_url()?>/assets/libraries/DataTables/DataTables-1.11.3/js/dataTables.bootstrap4.js"></script>
	<script type="text/javascript" src="<?=base_url()?>/assets/libraries/DataTables/Buttons-2.0.1/js/dataTables.buttons.js"></script>
	<script type="text/javascript" src="<?=base_url()?>/assets/libraries/DataTables/Buttons-2.0.1/js/buttons.bootstrap4.js"></script>
	<script type="text/javascript" src="<?=base_url()?>/assets/libraries/DataTables/Buttons-2.0.1/js/buttons.colVis.js"></script>
	<script type="text/javascript" src="<?=base_url()?>/assets/libraries/DataTables/Buttons-2.0.1/js/buttons.html5.js"></script>
	<script type="text/javascript" src="<?=base_url()?>/assets/libraries/DataTables/Buttons-2.0.1/js/buttons.print.js"></script>
	<script type="text/javascript" src="<?=base_url()?>/assets/libraries/DataTables/FixedColumns-4.0.1/js/dataTables.fixedColumns.js"></script>
	<script type="text/javascript" src="<?=base_url()?>/assets/libraries/DataTables/FixedHeader-3.2.0/js/dataTables.fixedHeader.js"></script>
	<script type="text/javascript" src="<?=base_url()?>/assets/libraries/DataTables/Responsive-2.2.9/js/dataTables.responsive.js"></script>
	<script type="text/javascript" src="<?=base_url()?>/assets/libraries/DataTables/Responsive-2.2.9/js/responsive.bootstrap4.js"></script>
	<script type="text/javascript" src="<?=base_url()?>/assets/libraries/DataTables/Select-1.3.3/js/dataTables.select.js"></script>
	<!-- SWEET ALERT-->
	<script src="<?=base_url()?>/assets/libraries/sweetalert/dist/sweetalert.min.js"></script>
	<!-- SWEET ALERT-->
	<script src="<?=base_url()?>/assets/js/custom.js"></script>
<?php if ( !empty( $_SESSION["alerta"] ) ) :?>
	<?=$_SESSION["alerta"]?>
	<?php unset($_SESSION["alerta"])?>
<?php endif?>
<?php if ( !empty( $scripts ) ) :?>
	<?php include( $scripts)?>
<?php else:?>
	</body>
	</html>
<?php endif?>