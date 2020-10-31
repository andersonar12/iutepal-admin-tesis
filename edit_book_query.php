<?php
	require_once 'connect.php';

	
	if(ISSET($_POST['edit_book'])){
		$book_title = $_POST['book_title'];
		$book_desc = $_POST['book_desc'];
		$book_category = $_POST['book_category'];
		$book_author = $_POST['book_author'];
		$date_publish = $_POST['date_publish'];
		$type = explode('.', $_FILES['archivo']['name']);
	    $type = $type[count($type)-1];		
		$url = 'pdf/'.uniqid(rand()).'.'.$type;

		if(move_uploaded_file($_FILES['archivo']['tmp_name'], $url)) {

		$conn->query("UPDATE `tesis` SET `titulo` = '$book_title', `resumen` = '$book_desc', `carrera` = '$book_category', `autor` = '$book_author', `fecha_publicacion` = '$date_publish', `archivo` = '$url' WHERE `tesis_id` = '$_REQUEST[tesis_id]'") or die(mysqli_error());
		}
		
		echo '
			<script type = "text/javascript">
				alert("Guardar Cambios");
				window.location = "home.php";
			</script>
		';
	}
	?>