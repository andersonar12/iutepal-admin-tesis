<?php
	require_once 'connect.php';

	if(ISSET($_POST['save_book'])){
		
		$book_title = $_POST['book_title'];
		$book_desc = $_POST['book_desc'];
		$book_category = $_POST['book_category'];
		$book_author = $_POST['book_author'];
		$date_publish = $_POST['date_publish'];
				
		$type = explode('.', $_FILES['archivo']['name']);
	    $type = $type[count($type)-1];		
		$url = 'pdf/'.uniqid(rand()).'.'.$type;

		if(move_uploaded_file($_FILES['archivo']['tmp_name'], $url)) {

				$conn->query("INSERT INTO `tesis` VALUES(0,'$book_title', '$book_desc', '$book_category', '$book_author', '$date_publish', '$url')");
				echo'
			<script type = "text/javascript">
				alert("Guardado Exitosamente");
				window.location = "home.php";
			</script>
		';
		
		}

		
		
	}