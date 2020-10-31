<!DOCTYPE html>
<?php 
	session_start();
	if(ISSET($_SESSION['admin_id'])){
		header('location:home.php');
	}
?>
<html lang = "eng">
	<head>
		<title>
Sistema para la Consulta de Trabajos Especiales de Grado del I.U.T.E.P.A.L</title>
		<meta charset = "utf-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1" />
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
	</head>
	<body style="background-image: url(images/Presentaci%C3%B3n2.png)">
		<nav class = "navbar navbar-default navbar-fixed-top">
			<div class = "container-fluid" style="background-color: #2e6da4;">
				<div class = "navbar-header">
					<img src = "images/logo.png" width = "50px" height = "65px" />
					<h4 class = "navbar-text navbar-right">
Sistema para la Consulta de Trabajos Especiales de Grado del I.U.T.E.P.A.L</h4>
				</div>
			</div>
	</nav>
		<div class = "container-fluid" style = "margin-top:80px;">
			<div class = "col-md-3" style="background-image:url(images/Presentaci%C3%B3n1.png);margin-left:10px;" >
				<br />
				<br />
				<h4 style="font-size:18px">Debe iniciar sesion para gestionar los Trabajos de Grado</h4>
				<hr style = "border:1px solid #d3d3d3; width:100%;" />
				<form enctype = "multipart/form-data">	
					<div id = "username_warning" class = "form-group">
						<label class = "control-label">Usuario:</label>
						<input type = "text" class = "form-control" id = "username" />
					</div>
					<div id = "password_warning" class = "form-group">
						<label class = "control-label">Contraseña:</label>
						<input type = "password" class = "form-control" id = "password"/>
					</div>
					<br />
					<div class = "form-group">
						<button type = "button" id = "login" class = "btn btn-primary btn-block"><span class = "glyphicon glyphicon-save"></span> Iniciar Sesión</button>
					</div>
				</form>	
				<div id = "result"></div>
				<br />
				<ul id = "menu" class = "nav menu">
				   <li><a style = "font-size:18px; border-bottom:1px solid #d3d3d3;" href = "profesor.php"><i class = "glyphicon glyphicon-log-out"></i> Ir al Modulo Profesores </a></li>
					<li><a style = "font-size:18px; border-bottom:1px solid #d3d3d3;" href = "index.php"><i class = "glyphicon glyphicon-log-out"></i> Ir a Consultas </a></li>
				
				</ul>
          
		<br />
        <br />
				
			</div>
			
			<div class = "col-md-8 well" style="margin-left:10px;">
				<img src = "images/back.jpg" height = "449px" width = "100%" />
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
</html>