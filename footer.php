
		<nav class = "navbar navbar-default navbar-fixed-bottom">
			<div class = "container-fluid"style="background-color: #2e6da4;" >
				<label class = "navbar-text pull-right">
                Departamento de Investigacion | 
                Instituto Universitario Tecnológico Juan Pablo Pérez Alfonso 
                 &copy; Todos los Derechos Reservados 
                 <?php echo date("Y") ?></label>
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
					$('#book_table').slideDown();
					$('#edit_form').empty();
					$('#book_admin').show();
				});
				$('#add_book').hide();
				$('#book_table').slideUp();
				$('#edit_form').load('load_book.php?tesis_id=' + $tesis_id).slideDown;
				
			});
		});
	</script>