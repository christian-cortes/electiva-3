<?php include('../header.php')?>
<?php include('../navbar.php')?>
	<?php
		$personajes = [
			[
				"Nombre"   => "Patricio",
				"Apellido" => "Estrella",
				"Edad"     => 34,
				"Dibujo"   => true,
				"Frutas"   => ["Mango", "Pera", "Banano"]
			],[
				"Nombre"   => "Bob",
				"Apellido" => "Esponja",
				"Edad"     => 30,
				"Dibujo"   => true,
				"Frutas"   => ["Fresa", "Manzana", "Papaya"]
			]
		];
	?>
	<div class="container">
		<div class="text-center text-light">
			<h1 class="mt-5">Desarrollo Web</h1>
		</div>
		<div class="card-header bg-dark text-light text-center">
			<strong>Ejercicio 1 JSON</strong>
		</div>
		<div class="card-body" id="jsonFormateado"></div>
	</div>
<?php include('../footer.php')?>
<script type="text/javascript">
	function syntaxHighlight(json) {
		if (typeof json != 'string') {
			json = JSON.stringify(json, undefined, 2);
		}
		json = json.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
		return json.replace(/("(\\u[a-zA-Z0-9]{4}|\\[^u]|[^\\"])*"(\s*:)?|\b(true|false|null)\b|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?)/g, function (match) {
			var cls = 'number';
			if (/^"/.test(match)) {
				if (/:$/.test(match)) {
					cls = 'key';
				} else {
					cls = 'string';
				}
			} else if (/true|false/.test(match)) {
				cls = 'boolean';
			} else if (/null/.test(match)) {
				cls = 'null';
			}
			return '<span class="' + cls + '">' + match + '</span>';
		});
	}
	$( document ).ready(function() {
		var json = JSON.parse('<?= !empty( $personajes ) ? json_encode($personajes) : null ?>');
		$("#jsonFormateado").html( "<pre>" + syntaxHighlight(json) + "<pre/>" );
	});
</script>