<!DOCTYPE html>
<?php
	require_once 'valid.php';
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
	<body style="background-image:url(images/Presentaci%C3%B3n1.png); background-attachment:fixed">
   
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
					<img src = "images/usuario.png" width = "95px" height = "95px"/>
					
					<br />
					<label class = "text-muted"><?php require'account.php'; echo $name;?></label>
				</div>
				<hr style = "border:1px dotted #d3d3d3;"/>
				<ul id = "menu" class = "nav menu">
					
					<li><a style = "font-size:18px; border-bottom:1px solid #d3d3d3;" href = ""><i class = "glyphicon glyphicon-tasks"></i> Cuentas</a>
						<ul style = "list-style-type:none;">
							<li><a href = "admin.php" style = "font-size:15px;"><i class = "glyphicon glyphicon-user"></i> Administrador</a></li>
							<li><a href = "admin_profe.php" style = "font-size:15px;"><i class = "glyphicon glyphicon-user"></i> Profesores</a></li>
						</ul>
					</li>
					<li><a style = "font-size:18px; border-bottom:1px solid #d3d3d3;" href = "home.php"><i class = "glyphicon glyphicon-book"></i> Gestion de Trabajos de Grado</a></li>
	
					</li>
					<li><a  style = "font-size:18px; border-bottom:1px solid #d3d3d3;" href = ""><i class = "glyphicon glyphicon-cog"></i> Sesión</a>
						<ul style = "list-style-type:none;">
							<li><a style = "font-size:15px;" href = "logout.php"><i class = "glyphicon glyphicon-log-out"></i> Cerrar Sesión</a></li>
						</ul>
					</li>
				</ul>
			</div>
			
			<div class = "col-md-10 well" style = "margin-top:80px;">
				<div class = "alert alert-info">Trabajos de Grado</div>
					<button id = "add_book" type = "button" class = "btn btn-primary"><span class = "glyphicon glyphicon-plus"></span> Agregar nuevo</button>
					<button id = "show_book" type = "button" style = "display:none;" class = "btn btn-success"><span class = "glyphicon glyphicon-circle-arrow-left"></span> Volver</button>
					<br />
					<br />
					<div id = "book_table">
						<table id = "table" class = "table table-bordered">
							<thead class = "alert-info">
								<tr>
									<th>Titulo</th>
									<th>Carrera</th>
									<th>Autor</th>
									<th>Fecha de Publicación</th>
									<th>Archivo</th>
									<th>Acción</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$qbook = $conn->query("SELECT * FROM `tesis`") or die(mysqli_error());
									while($fbook = $qbook->fetch_array()){
										
								?>
								<tr>
									<td align="justify"><?php echo $fbook['titulo']?></td>
									<td align="justify"><?php echo $fbook['carrera']?></td>
									<td align="justify"><?php echo $fbook['autor']?></td>
									<td align="justify"><?php echo date("d-m-Y", strtotime($fbook['fecha_publicacion']))?></td>
									<td align="justify"><a class = "imagenampliada" href="<?php echo $fbook['archivo']?>" target="_blank" ><img src="images/PDF2.png" width="60px" height="50px"></a></td>
									<td align="justify"><a class = "btn btn-danger deltesis_id" value = "<?php echo $fbook['tesis_id']?>"><span class = "glyphicon glyphicon-remove"></span> Eliminar</a>
									                    <div id = "pregunta"></div>
														<center><a class="btn btn-success yes_borrar" style="display:none;" value="si" ><span class = "glyphicon glyphicon-circle-arrow-right"></span> Si</a></center>
														<center><a class="btn btn-danger no_borrar" style="display:none;" value="no" ><span class = "glyphicon glyphicon-remove"></span>No</a></center> <p id="br"></p>
														 <a value = "<?php echo $fbook['tesis_id']?>" class = "btn btn-warning etesis_id"><span class = "glyphicon glyphicon-edit"></span> Editar</a></td>
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
									<label>Titulo:</label>
									<input type = "text" name = "book_title" required = "required" class = "form-control" />
								</div>
								<div class = "form-group">
									<label>Resumen:</label>
									<textarea  name = "book_desc" style="resize:vertical;" class = "form-control" required = "required"></textarea>
								</div>
								<div class = "form-group">
									<label>Carrera:</label>
									<select class="form-control selectpicker" name="book_category">
										<option value="Informatica">Informatica</option>
										<option value="Preescolar">Preescolar</option>
										<option value="Enfermeria">Enfermeria</option>
										<option value="Administracion de Empresas">Administracion de Empresas</option>
										<option value="Electronica Industrial">Electronica Industrial</option>
										<option value="Contabilidad y Finanzas">Contabilidad y Finanzas</option>
										<option value="Produccion Industrial">Produccion Industrial</option>
										
									</select>
									<!-- <input type = "text" name = "book_category" class = "form-control" required = "required"/> -->
								</div>
								<div class = "form-group">
									<label>Autor:</label>
									<input type = "text" name = "book_author" class = "form-control" required = "required" />
								</div>
								<div class = "form-group">
									<label>Fecha de Publicación:</label>
                                   <input type = "date" name = "date_publish" required = "required" class = "form-control hasDatepicker" autocomplete="off"/>
									
								</div>
								<div class = "form-group">
									<label>Archivo</label>
									<input type = "file" name= "archivo" required = "required" class = "form-control" />
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
		
            <div id="message-alert-logout" class="modal">
            <div class="modal-content">
            <p>No se ha detectado actividad durante los ultimos 5 minutos.</p>
            <p>Si no se detecta actividad en el Sistema de Consulta en los próximos 6
            minutos serás redireccionado a la página de inicio.</p>
             </div>
            <div class="modal-footer">
            <a id="alert-accept" href="#!" class="modal-action modal-close waveseffect btn" style = "font-size:18px; border-bottom:1px solid #d3d3d3;"><i class = "glyphicon glyphicon-log-out"></i>Aceptar</a>
            
             </div>
            </div>
		<nav class = "navbar navbar-default navbar-fixed-bottom">
			<div class = "container-fluid" style="background-color: #2e6da4;" >
				<label class = "navbar-text pull-right">Departamento de Investigacion | Instituto Universitario Tecnológico Juan Pablo Pérez Alfonso  &copy; Todos los Derechos Reservados 2019.</label>
			</div>
		</nav>
	</body>
	
	<script src = "js/jquery.js"></script>
    <script src= "js/jquery.min.js"></script>
	<script src = "js/bootstrap.js"></script>
	<script src = "js/login.js"></script>
	<script src = "js/sidebar.js"></script>
	<script src = "js/jquery.dataTables.js"></script>
    <script src="js/materialize.min.js"></script>
	<script src="js/fileinput/canvas-to-blob.min.js'); ?&gt;" type="text/javascript"></script>
	<script src="js/fileinput/sortable.min.js" type="text/javascript"></script>
	<script src="js/fileinput/purify.min.js" type="text/javascript"></script>
	<script src="js/fileinput/fileinput.min.js"></script>

		<script type="text/javascript">
                 $('#message-alert-logout').modal();
                 var timeLogout;
                 var timeMessage;
                
                function clearTimes() {
                 clearTimeout(timeMessage);
                 clearTimeout(timeLogout);
                
                 timeMessage = setTimeout(function () {
                 $('#message-alert-logout').modal('open');
                 }, 300000);
                
                 timeLogout = setTimeout(function () {
                 window.location = 'logout.php';
                 }, 360000);
				 
				 console.log(timeMessage);
                 }
                
                 clearTimes();
                
                 $('#alert-accept').click(function () {
                 $.get('#!', function () {
                 clearTimes();
                 });
                 });
				 
				 $('body').click(function (){
					 clearTimes();
				 })
             </script>
     <!--  <script type = "text/javascript">
	$(function() {
		var sesion = function(){
		   alert("Ha expirado la sesión, inicie sesion nuevamente");
		 window.location = "logout.php";
		};
		setTimeout(sesion, 4000);
	}()) 
    </script> -->
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
			$pregunta = $('<center><label>¿Esta seguro?</label></center>');

			var timeMessage;
		
			$('.deltesis_id').click(function(){
				clearTimeout(timeMessage);
				$('.yes_borrar').slideUp();
				$('.no_borrar').slideUp();
				$(this).parents('td').find('div').append($pregunta).find('p');
				$(this).parents('td').find('a').slideDown();
				$(this).hide();
				$tesis_id = $(this).attr('value');

            
					$('.yes_borrar').click(function(){
						$(this).parents('td').empty().append($result);
						$('.deltesis_id').attr('disabled', 'disabled');
						$('.etesis_id').attr('disabled', 'disabled');
						setTimeout(function(){
						window.location = 'delete_book.php?tesis_id=' + $tesis_id;
						}, 1000);

					})
					$('.no_borrar').click(function(){
						$pregunta.remove();
						$('.deltesis_id').show();
						$('.yes_borrar').slideUp();
						$('.no_borrar').slideUp();
						clearTimeout(timeMessage);
					}) 

				/* codigo del temporizador */
			timeMessage = setTimeout(function(){
			$pregunta.remove();
			$('.deltesis_id').show();
			$('.yes_borrar').slideUp();
			$('.no_borrar').slideUp();
			}, 4000);

			
		});
			$('.etesis_id').click(function(){
				$tesis_id = $(this).attr('value');
				$('#show_book').show();
				$('#show_book').click(function(){
					$(this).hide();
					$('#edit_form').empty();
					$('#book_table').show();
					$('#book_admin').show();
					$('#add_book').show();
				});
				$('#book_table').fadeOut();
				$('#add_book').hide();
				$('#edit_form').load('load_book_2.php?tesis_id=' + $tesis_id);
				
			});
		});
	</script>
   
</html>