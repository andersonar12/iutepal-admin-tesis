<?php
	$conn = new mysqli('localhost', 'root', '12345678', 'tesis') or die(mysqli_error());
	mysqli_set_charset($conn, "utf8");
	if(!$conn){
		die("Error fatal: error de conexión!");
	}
?>