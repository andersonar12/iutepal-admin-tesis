<?php
	require_once 'connect.php';
	if(ISSET($_POST['edit_profe'])){	
		$username = $_POST['username'];
		$password = $_POST['password'];
		$firstname = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$lastname = $_POST['lastname'];
		$q_admin = $conn->query("SELECT * FROM `profesor` WHERE `username` = '$username'") or die(mysqli_error());
		$v_admin = $q_admin->num_rows;
		
			$conn->query("UPDATE `profesor` SET `username` = '$username', `password` = '$password', `firstname` = '$firstname', `middlename` = '$middlename', `lastname` = '$lastname' WHERE `profe_id` = '$_REQUEST[profe_id]'") or die(mysqli_error());
			echo '
				<script type = "text/javascript">
					alert("Guardar Cambios");
					window.location = "admin_profe.php";
				</script>
			';
		
	}	