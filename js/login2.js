$(document).ready(function(){
	$error = $('<center><label class = "text-danger">Por favor completar los campos</label></center>');
	$error1 = $('<center><label class = "text-danger">Usuario o Contraseña Incorrecta</label></center>');
	$loading = $('<center><img src = "images/378.gif" height = "10px"/></center>');
	$('#login').click(function(){
		$error.remove();
		$error1.remove();
		$('#username').focus(function(){	
			$('#username_warning').each(function(){
				$(this).removeClass('has-error has-feedback');
				$(this).find('span').remove();
			});
		});	
		$('#password').focus(function(){	
			$('#password_warning').each(function(){
				$(this).removeClass('has-error has-feedback');
				$(this).find('span').remove();
			});
		});	
		$username = $('#username').val();
		$password = $('#password').val();
		if($username == "" && $password == ""){
			$error.appendTo('#result');
			$('#username_warning').addClass('has-error has-feedback');
			$('<span class = "glyphicon glyphicon-remove form-control-feedback"></span>').appendTo('#username_warning');
			$('#password_warning').addClass('has-error has-feedback');
			$('<span class = "glyphicon glyphicon-remove form-control-feedback"></span>').appendTo('#password_warning');
		}else{
			$loading.appendTo('#result');
			setTimeout(function(){	
				$.post('check_profe.php', {username: $username, password: $password},
					function(result){
						if(result == 'Success'){
							window.location  = 'profesor.php';
						}else{
							$loading.remove();
							$error1.appendTo('#result');
						}
					}
				)
			}, 3000);	
		}
	});
});