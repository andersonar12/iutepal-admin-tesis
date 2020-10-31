<?php
	require_once 'connect.php';
	$qadmin = $conn->query("SELECT * FROM `profesor` WHERE `profe_id` = '$_SESSION[profe_id]'") or die(mysqli_error());
	$fadmin = $qadmin->fetch_array();
	$name = $fadmin['firstname']." ".$fadmin['lastname'];