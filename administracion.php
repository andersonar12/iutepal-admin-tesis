<!DOCTYPE html>
<?php
	require_once 'connect.php';
?>	
<html lang = "eng">
	<head>
		<title>Sistema para la Consulta de Trabajos Especiales de Grado</title>
		<meta charset = "utf-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1" />
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/jquery.dataTables.css" />
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
	</head>
	<body style="background-image:url(images/Presentaci%C3%B3n1.png); background-attachment:fixed" >
		<nav class = "navbar navbar-default navbar-fixed-top">
			<div class = "container-fluid" style="background-color: #2e6da4;">
				<div class = "navbar-header">
					<img src = "images/logo.png" width = "50px" height = "65px" />
					<h4 class = "navbar-text navbar-right" >  Sistema para la Consulta de Trabajos Especiales de Grado del I.U.T.E.P.A.L</h4>
				</div>
			</div>
		</nav>
		<div class = "container-fluid">
			<div class = "col-md-2 well" style = "margin-top:80px;">
				<div class = "container-fluid" style = "word-wrap:break-word;">
					<img src = "images/carreras/admin empresas.jpg"  width = "80px" height = "80px"/>
				
				</div>
				<hr style = "border:1px dotted #d3d3d3;"/>
				<ul id = "menu" class = "nav menu">
			<li><a style = "font-size:13px; border-bottom:1px solid #d3d3d3;" href = "index.php"><i class = "glyphicon glyphicon-search"></i> Ir a Consultas Generales</a></li>			
			<li><a style = "font-size:13px; border-bottom:1px solid #d3d3d3;" href = "informatica.php"><i class = "glyphicon glyphicon-book"></i> Informatica</a></li>
			<li><a style = "font-size:13px; border-bottom:1px solid #d3d3d3;" href = "produccion.php"><i class = "glyphicon glyphicon-book"></i> Produccion Industrial</a></li>
			<li><a style = "font-size:13px; border-bottom:1px solid #d3d3d3;" href = "administracion.php"><i class = "glyphicon glyphicon-book"></i> Administracion de Empresas</a></li>
			<li><a style = "font-size:13px; border-bottom:1px solid #d3d3d3;" href = "contabilidad.php"><i class = "glyphicon glyphicon-book"></i> Contabilidad y Finanzas</a></li>
			<li><a style = "font-size:13px; border-bottom:1px solid #d3d3d3;" href = "enfermeria.php"><i class = "glyphicon glyphicon-book"></i> Enfermeria</a></li>
			<li><a style = "font-size:13px; border-bottom:1px solid #d3d3d3;" href = "electronica.php"><i class = "glyphicon glyphicon-book"></i> Electronica Industrial</a></li>
			<li><a style = "font-size:13px; border-bottom:1px solid #d3d3d3;" href = "preescolar.php"><i class = "glyphicon glyphicon-book"></i> Preescolar</a></li>
				</ul>
			</div>
			
			<div class = "col-md-10 well" style = "margin-top:80px;">
				<div class = "alert alert-info">ADMINISTRACION DE EMPRESAS</div>
					
					<button id = "show_book" type = "button" style = "display:none;" class = "btn btn-success"><span class = "glyphicon glyphicon-circle-arrow-left"></span> Volver</button>
					
					<div id = "book_table">
						<table id = "table" class = "table table-bordered">
							<thead class = "alert-info">
								<tr>
									<th>Titulo</th>
									<th>Carrera</th>
									<th>Autor</th>
									<th>Fecha de Publicación</th>
									<th>Acción</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$qbook = $conn->query("SELECT * FROM tesis WHERE carrera='Administracion de Empresas'") or die(mysqli_error());
									while($fbook = $qbook->fetch_array()){
										
								?>
								<tr>
									<td><?php echo $fbook['titulo']?></td>
									<td><?php echo $fbook['carrera']?></td>
									<td><?php echo $fbook['autor']?></td>
									<td><?php echo date("m-d-Y", strtotime($fbook['fecha_publicacion']))?></td>
									<td><a value = "<?php echo $fbook['tesis_id']?>" class = "btn btn-warning etesis_id"><span class = "glyphicon glyphicon-search"></span>Ver</a></td>
								</tr>
								<?php
									}
								?>
							</tbody>
						</table>
					</div>
					<div id = "edit_form"></div>
					<div id = "book_form" style = "display:none;">
						<div class = "col-lg-3"></div>
						<div class = "col-lg-6">
							<form method = "POST" action = "save_book_query.php" enctype = "multipart/form-data">
								<div class = "form-group">
									<label>Titulo del libro:</label>
									<input type = "text" name = "book_title" required = "required" class = "form-control" />
								</div>
								<div class = "form-group">
									<label>Descripcion:</label>
									<textarea  name = "book_desc" class = "form-control" required = "required"></textarea>
								</div>
								<div class = "form-group">
									<label>Carrera de libro:</label>
									<input type = "text" name = "book_category" class = "form-control" required = "required"/>
								</div>
								<div class = "form-group">
									<label>Autor:</label>
									<input type = "text" name = "book_author" class = "form-control" required = "required" />
								</div>
								<div class = "form-group">
									<label>Fecha de Publicación:</label>
                                   <input type = "date" name = "date_publish" required = "required" class = "form-control hasDatepicker" autocomplete="off"/>
									<!--  <input type = "date" name = "date_publish" required = "required" class = "form-control" />-->
								</div>
								<div class = "form-group">
									<label>Cantidad</label>
									<input type = "number" min = "0" name = "archivo" required = "required" class = "form-control" />
								</div>
								<div class = "form-group">
									<button name = "save_book" class = "btn btn-primary"><span class = "glyphicon glyphicon-save"></span> Enviar</button>
								</div>
							</form>		
						</div>	
					</div>
			</div>
		</div>
		<br />
		<br />
		<br />
		<nav class = "navbar navbar-default navbar-fixed-bottom">
			<div class = "container-fluid"style="background-color: #2e6da4;" >
				<label class = "navbar-text pull-right">Departamento de Investigacion | Instituto Universitario Tecnológico Juan Pablo Pérez Alfonso  &copy; Todos los Derechos Reservados 2019.</label>
			</div>
		</nav>
	</body>
	<script src = "js/jquery.js"></script>
	<script src = "js/bootstrap.js"></script>
	<script src = "js/login.js"></script>
	<script src = "js/sidebar.js"></script>
	<script src = "js/jquery.dataTables.js"></script>
	<script type = "text/javascript">
		$(document).ready(function(){
			$('#table').DataTable();
		});
	</script>
	<script type = "text/javascript">
		$(document).ready(function(){
			$('#add_book').click(function(){
				$(this).hide();
				$('#show_book').show();
				$('#book_table').slideUp();
				$('#book_form').slideDown();
				$('#show_book').click(function(){
					$(this).hide();
					$('#add_book').show();
					$('#book_table').slideDown();
					$('#book_form').slideUp();
				});
			});
		});
	</script>
	<script type = "text/javascript">
		$(document).ready(function(){
			$result = $('<center><label>Deleting...</label></center>');
			$('.deltesis_id').click(function(){
				$tesis_id = $(this).attr('value');
				$(this).parents('td').empty().append($result);
				$('.deltesis_id').attr('disabled', 'disabled');
				$('.etesis_id').attr('disabled', 'disabled');
				setTimeout(function(){
					window.location = 'delete_book.php?tesis_id=' + $tesis_id;
				}, 1000);
			});
			$('.etesis_id').click(function(){
				$tesis_id = $(this).attr('value');
				$('#show_book').show();
				$('#show_book').click(function(){
					$(this).hide();
					$('#edit_form').empty();
					$('#book_table').slideDown();
				});
				$('#add_book').hide();
				$('#book_table').slideUp();
				$('#edit_form').load('load_book.php?tesis_id=' + $tesis_id).slideDown;
				
			});
		});
	</script>
</html>