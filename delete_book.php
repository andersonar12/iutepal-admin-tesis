<?php
	require_once 'connect.php';

	$q_book = $conn->query("SELECT * FROM `tesis` WHERE `tesis_id` = '$_REQUEST[tesis_id]'") or die(mysqli_error());
	$datos_tesis = $q_book->fetch_array();

	function borrarFichero($datos_tesis)
	{
		$filename = __DIR__ . '/' . $datos_tesis["archivo"];

    	$success = unlink($filename);
    
		if (!$success) {
			throw new Exception("Cannot delete $filename");
		}	
	}

	borrarFichero($datos_tesis);

	$conn->query("DELETE FROM `tesis` WHERE `tesis_id` = '$_REQUEST[tesis_id]'") or die(mysqli_error());
	
	header("location: home.php");