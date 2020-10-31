<meta charset = "utf-8" />
<?php
	require_once 'connect.php';
	$q_book = $conn->query("SELECT * FROM `tesis` WHERE `tesis_id` = '$_REQUEST[tesis_id]'") or die(mysqli_error());
	$f_book = $q_book->fetch_array();
?>
<div class = "col-lg-3"></div>
<div class = "col-lg-6">
	<form method = "POST" action = "edit_book_query.php?tesis_id=<?php echo $f_book['tesis_id']?>" enctype = "multipart/form-data">
		<div class = "form-group">
			<br>
			<label>Titulo:</label>
			<input type = "text" value = "<?php echo $f_book['titulo']?>" name = "book_title" required = "required" class = "form-control" />
		</div>
		<div class = "form-group">
			<label>Resumen:</label>
			<p class = "form-control-static"><?php echo $f_book['resumen']?></p>
            
		</div>
		<div class = "form-group">
			<label>Carrera:</label>
			<input type = "text" name = "book_category" value = "<?php echo $f_book['carrera']?>" class = "form-control" required = "required"/>
		</div>
		<div class = "form-group">
			<label>Autor:</label>
			<input type = "text" name = "book_author" value = "<?php echo $f_book['autor']?>" class = "form-control" required = "required" />
		</div>
		<div class = "form-group">
			<label>Fecha de Publicación:</label>
			<input type = "text" name = "date_publish" value = "<?php echo $f_book['fecha_publicacion']?>" required = "required" class = "form-control" />
		</div>
		<div class = "form-group">
			<label>Archivo</label>
			<br>
			<a href="<?php echo $f_book['archivo']?>" target="_blank" style="font-size: 25px;"> <img src="images\PDF2.png"> </a>
		</div>
		 <!--<div class = "form-group">
			<button name = "edit_book" class = "btn btn-warning"><span class = "glyphicon glyphicon-edit"></span> Guardar Cambios</button>
		</div> -->
	</form>		
</div>
