<?php
	require_once 'connect.php';
	session_start();
		if(!ISSET($_SESSION['profe_id'])){
		header('location: login_profe.php');
	}