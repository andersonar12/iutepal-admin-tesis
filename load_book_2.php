<meta charset = "utf-8" />
<?php
	require_once 'connect.php';
	$q_book = $conn->query("SELECT * FROM `tesis` WHERE `tesis_id` = '$_REQUEST[tesis_id]'") or die(mysqli_error());
	$f_book = $q_book->fetch_array();
?>
<div class = "col-lg-3"></div>
<div class = "col-lg-6">
	<form method = "POST" action = "edit_book2_query.php?tesis_id=<?php echo $f_book['tesis_id']?>" enctype = "multipart/form-data">
		<div class = "form-group">
			<label>Titulo:</label>
			<input type = "text" value = "<?php echo $f_book['titulo']?>" name = "book_title" required = "required" class = "form-control" />
		</div>
		<div class = "form-group">
			<label>Resumen:</label>
			
            <textarea  name = "book_desc" style="resize:vertical;" class = "form-control" required = "required"><?php echo $f_book['resumen']?></textarea>
		</div>
		<div class = "form-group">
			<label>Carrera:</label>
			<select class="form-control selectpicker" name="book_category">
				<option value="<?php echo $f_book['carrera']?>"><?php echo $f_book['carrera']?></option>			
				<option value="Informatica">Informatica</option>
				<option value="Preescolar">Preescolar</option>
				<option value="Enfermeria">Enfermeria</option>
				<option value="Administracion de Empresas">Administracion de Empresas</option>
				<option value="Electronica Industrial">Electronica Industrial</option>
				<option value="Contabilidad y Finanzas">Contabilidad y Finanzas</option>
				<option value="Produccion Industrial">Produccion Industrial</option>
				
			</select>
			
		</div>
		<div class = "form-group">
			<label>Autor:</label>
			<input type = "text" name = "book_author" value = "<?php echo $f_book['autor']?>" class = "form-control" required = "required" />
		</div>
		<div class = "form-group">
			<label>Fecha de Publicación:</label>
			<input type = "date" name = "date_publish" value = "<?php echo $f_book['fecha_publicacion']?>" required = "required" class = "form-control" />
		</div>
		<div class = "form-group">
			<label>Archivo</label>

			<a class = "imagenampliada" href="<?php echo $f_book['archivo']?>" target="_blank" ><img src="images/PDF2.png" width="60px" height="50px"></a> 

			<button name = "edit_pdf" id="edit_pdf" class = "btn btn-danger"><span class = "glyphicon glyphicon-edit"></span> Cambiar PDF</button>
			
			<input type = "file" style="display:none" size = "9000000" name = "archivo" class = "form-control pdf" value="<?php echo $f_book['archivo']?>"/>

		</div>

		<script type = "text/javascript">
			$('#edit_pdf').click(function (e) { 
				e.preventDefault();
				$('.pdf').show();
			});
		</script>

		<div class = "form-group">
			<button name = "edit_book" class = "btn btn-warning"><span class = "glyphicon glyphicon-edit"></span> Guardar Cambios</button>
		</div>
	</form>		
</div>