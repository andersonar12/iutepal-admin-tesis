<?php
	require_once 'connect.php';
	$qedit_admin = $conn->query("SELECT * FROM `profesor` WHERE `profe_id` = '$_REQUEST[profe_id]'") or die(mysqli_error());
	$fedit_admin = $qedit_admin->fetch_array();
?> 
<div class = "col-lg-3"></div>
<div class = "col-lg-6">
	<form method = "POST" action = "edit_profe_query.php?profe_id=<?php echo $fedit_admin['profe_id']?>" enctype = "multipart/form-data">
		<div class = "form-group">
			<label>Usuario:</label>
			<input type = "text" value = "<?php echo $fedit_admin['username']?>" required = "required" name = "username" class = "form-control" />
		</div>	
		<div class = "form-group">	
			<label>Contraseña:</label>
			<input type = "password" value = "<?php echo $fedit_admin['password']?>"  maxlength = "12" name = "password" required = "required" class = "form-control" />
		</div>	
		<div class = "form-group">	
			<label>Primer nombre:</label>
			<input type = "text" value = "<?php echo $fedit_admin['firstname']?>"  name = "firstname" required = "required" class = "form-control" />
		</div>	
		<div class = "form-group">	
			<label>Segundo nombre:</label>
			<input type = "text" value = "<?php echo $fedit_admin['middlename']?>"  name = "middlename" placeholder = "(Optional)" class = "form-control" />
		</div>	
		<div class = "form-group">	
			<label>Apellidos:</label>
			<input type = "text" value = "<?php echo $fedit_admin['lastname']?>"  required = "required" name = "lastname" class = "form-control" />
		</div>
		<div class = "form-group">	
			<button class = "btn btn-warning" name = "edit_profe"><span class = "glyphicon glyphicon-edit"></span> Guardar Cambios</button>
		</div>
	</form>		
</div>	
