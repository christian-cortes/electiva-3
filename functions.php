<?php
	define('BASE_URL', "http://localhost/electiva-3");
	function removerXSS($html) {
		return htmlspecialchars($html, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
	}
	function base_url(){
		return BASE_URL;
	}
	function printArray( $array ) {
		for ($i=0; $i < count( $array ); $i++) {
			for ($j=0; $j < count( $array[$i] ); $j++) {
				echo $array[$i][$j];echo " ";
			}
			echo "<br>";
		}
	}
	function crearArray( $rows, $cols )
	{
		$array = array();
		for ($i=0; $i < $rows; $i++) {
			$array[$i] = array_fill(0, $cols, 0);
		}
		return $array;
	}
?>