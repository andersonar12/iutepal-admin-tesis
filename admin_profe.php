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
	<body style = "background-image:url(images/Presentaci%C3%B3n1.png); background-attachment:fixed">
		<nav class = "navbar navbar-default navbar-fixed-top">
			<div class = "container-fluid" style="background-color: #2e6da4;">
				<div class = "navbar-header">
					<img src = "images/logo.png" width = "50px" height = "65px" />
					<h4 class = "navbar-text navbar-right">Sistema para la Consulta de Trabajos Especiales de Grado del I.U.T.E.P.A.L</h4>
				</div>
			</div>
		</nav>
		<div class = "container-fluid">
			<div class = "col-md-2 well" style = "margin-top:80px;">
				<div class = "container-fluid" style = "word-wrap:break-word;">
					<img src = "images/usuario.png" width = "95px" height = "95px">
					
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
					
					<li><a  style = "font-size:18px; border-bottom:1px solid #d3d3d3;" href = ""><i class = "glyphicon glyphicon-cog"></i> Sesión</a>
						<ul style = "list-style-type:none;">
							<li><a style = "font-size:15px;" href = "logout.php"><i class = "glyphicon glyphicon-log-out"></i> Cerrar Sesión</a></li>
						</ul>
					</li>
				</ul>
			</div>
			
			<div class = "col-md-10 well" style = "margin-top:80px;">
				<div class = "alert alert-info">Cuentas / Profesor</div>
					<button id = "add_admin" type = "button" class = "btn btn-primary"><span class = "glyphicon glyphicon-plus"></span> Agregar nuevo</button>
					<button id = "show_admin" type = "button" style = "display:none;" class = "btn btn-success"><span class = "glyphicon glyphicon-circle-arrow-left"></span> Volver</button>
					<br />
					<br />
					<div id = "admin_table">
						<table id = "table" class = "table table-bordered">
							<thead class = "alert-info">
								<tr>
									<th>Usuario</th>
									<th>Contraseña</th>
									<th>Primer nombre</th>
									<th>Segundo nombre</th>
									<th>Apellidos</th>
									<th>Acción</th>
								</tr>
							</thead>
							<tbody>
							<?php
								$q_admin = $conn->query("SELECT * FROM `profesor`") or die(mysqli_error());
								while($f_admin = $q_admin->fetch_array()){
									
							?>	
								<tr class = "target">
									<td><?php echo $f_admin['username']?></td>
									<td><?php echo md5($f_admin['password'])?></td>
									<td><?php echo $f_admin['firstname']?></td>
									<td><?php echo $f_admin['middlename']?></td>
									<td><?php echo $f_admin['lastname']?></td>
									<td><a href = "#" class = "btn btn-danger delprofe_id" value = "<?php echo $f_admin['profe_id']?>"><span class = "glyphicon glyphicon-remove"></span> Eliminar</a> <a href = "#" class = "btn btn-warning eprofe_id" value = "<?php echo $f_admin['profe_id']?>"><span class = "glyphicon glyphicon-edit"></span> Editar</a></td>
								</tr>
							<?php
								}
							?>	
							</tbody>
						</table>
					</div>
					<div id = "edit_form"></div>
					<div id = "admin_form" style = "display:none;">
						<div class = "col-lg-3"></div>
						<div class = "col-lg-6">
							<form method = "POST" action = "save_profe_query.php" enctype = "multipart/form-data">
								<div class = "form-group">
									<label>Usuario:</label>
									<input type = "text" required = "required" name = "username" class = "form-control" />
								</div>	
								<div class = "form-group">	
									<label>Contraseña:</label>
									<input type = "password" maxlength = "12" name = "password" required = "required" class = "form-control" />
								</div>	
								<div class = "form-group">	
									<label>Primer nombre:</label>
									<input type = "text" name = "firstname" required = "required" class = "form-control" />
								</div>	
								<div class = "form-group">	
									<label>Segundo nombre:</label>
									<input type = "text" name = "middlename" placeholder = "(Optional)" class = "form-control" />
								</div>	
								<div class = "form-group">	
									<label>Apellidos:</label>
									<input type = "text" required = "required" name = "lastname" class = "form-control" />
								</div>
								<div class = "form-group">	
									<button class = "btn btn-primary" name = "save_profe"><span class = "glyphicon glyphicon-save"></span> Enviar</button>
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
			<div class = "container-fluid" style="background-color: #2e6da4;">
				<label class = "navbar-text pull-right">
Departamento de Investigacion | Instituto Universitario Tecnológico Juan Pablo Pérez Alfonso © Todos los Derechos Reservados 2019.
</label>
			</div>
		</nav>
	</body>
	<script src = "js/jquery.js"></script>
	<script src = "js/bootstrap.js"></script>
	<script src = "js/login.js"></script>
	<script src = "js/sidebar.js"></script>
	<script src = "js/jquery.dataTables.js"></script>
    <script src="js/materialize.min.js"></script>
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
                 }
                 clearTimes();
                
                 $('#alert-accept').click(function () {
                 $.get('#!', function () {
                 clearTimes();
                 });
                 });
             </script>
	<script type = "text/javascript">
		$(document).ready(function(){
			$('#table').DataTable();
		});
	</script>
	<script type = "text/javascript">
		$(document).ready(function(){
			$('#add_admin').click(function(){
				$(this).hide();
				$('#show_admin').show();
				$('#admin_table').slideUp();
				$('#admin_form').slideDown();
				$('#show_admin').click(function(){
					$(this).hide();
					$('#add_admin').show();
					$('#admin_table').slideDown();
					$('#admin_form').slideUp();
				});
			});
		});
	</script>
	<script type = "text/javascript">
		$(document).ready(function(){
			$result = $('<center><label>Deleting...</label></center>');
			$('.delprofe_id').click(function(){
				$profe_id = $(this).attr('value');
				$(this).parents('td').empty().append($result);
				$('.delprofe_id').attr('disabled', 'disabled');
				$('.eprofe_id').attr('disabled', 'disabled');
				setTimeout(function(){
					window.location = 'delete_profe.php?profe_id=' + $profe_id;
				}, 1000);
			});
			$('.eprofe_id').click(function(){
				$profe_id = $(this).attr('value');
				$('#show_admin').show();
				$('#show_admin').click(function(){
					$(this).hide();
					$('#edit_form').empty();
					$('#admin_table').show();
					$('#add_admin').show();
				});
				$('#admin_table').fadeOut();
				$('#add_admin').hide();
				$('#edit_form').load('load_profe.php?profe_id=' + $profe_id);
			});
		});
	</script>
</html>