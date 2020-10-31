<?php
	require_once 'connect.php';

	$q_book = $conn->query("SELECT * FROM `tesis` WHERE `tesis_id` = '$_REQUEST[tesis_id]'") or die(mysqli_error());
	$tesis = $q_book->fetch_array();

	
	if(ISSET($_POST['edit_book'])){
		$book_title = $_POST['book_title'];
		$book_desc = $_POST['book_desc'];
		$book_category = $_POST['book_category'];
		$book_author = $_POST['book_author'];
		$date_publish = $_POST['date_publish'];

		$type = explode('.', $_FILES['archivo']['name']);
	    $type = $type[count($type)-1];		
		$url = 'pdf/'.uniqid(rand()).'.'.$type;

		$filepath = __DIR__ . '/' . $tesis["archivo"];

		
		if (file_exists($filepath) && empty($_FILES["archivo"]["name"])) {

			$conn->query("UPDATE `tesis` SET `titulo` = '$book_title', `resumen` = '$book_desc', `carrera` = '$book_category', `autor` = '$book_author', `fecha_publicacion` = '$date_publish' WHERE `tesis_id` = '$_REQUEST[tesis_id]'") or die(mysqli_error());
			

		} else {
			
			if(move_uploaded_file($_FILES['archivo']['tmp_name'], $url)) {

				$conn->query("UPDATE `tesis` SET `titulo` = '$book_title', `resumen` = '$book_desc', `carrera` = '$book_category', `autor` = '$book_author', `fecha_publicacion` = '$date_publish', `archivo` = '$url' WHERE `tesis_id` = '$_REQUEST[tesis_id]'") or die(mysqli_error());
				}

		}
		
		echo '
			<script type = "text/javascript">
				alert("Guardar Cambios");
				window.location = "home.php";
			</script>
		';
	}
	?>