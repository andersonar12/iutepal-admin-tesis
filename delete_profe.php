<?php
	require_once 'connect.php';
	$conn->query("DELETE FROM `profesor` WHERE `profe_id` = '$_REQUEST[profe_id]'") or die(mysqli_error());
	header('location: admin_profe.php');