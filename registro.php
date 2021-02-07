<!DOCTYPE html>
<html>
<head>
	<title>Registro</title>
	<?php require_once "scripts.php"; ?>
</head>
<body style="background-color: gray">
<br><br><br>
<div class="container">
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
			<div class="panel panel-danger">
				<div class="panel panel-heading">Registro de usuario</div>
				<div class="panel panel-body">
					<form id="frmRegistro">
					<label>Nombre</label>
					<input type="text" class="form-control input-sm" id="nombre" name="">
					<label>Apellido</label>
					<input type="text" class="form-control input-sm" id="apellido" name="">
					<label>Identificacion</label>
					<input type="text" class="form-control input-sm" id="ident" name="">
					<label>Correo</label>
					<input type="text" class="form-control input-sm" id="correo" name="">
					<label>Password</label>
					<input type="text" class="form-control input-sm" id="password" name="">
					<p></p>
					<span class="btn btn-primary" id="registrarNuevo">Registrar</span>
					</form>
					<div style="text-align: right;">
						<a href="index.php" class="btn btn-default">Login</a>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-4"></div>
	</div>
</div>
</body>
</html>



<script type="text/javascript">
	$(document).ready(function(){
		$('#registrarNuevo').click(function(){

			var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])([A-Za-z\d$@$!%*?&]|[^ ]){8,15}$/;
			var password = $('#password').val();

			if($('#nombre').val()==""){
				alertify.alert("Debes ingresar el nombre");
				return false;
			}else if($('#apellido').val()==""){
				alertify.alert("Debes ingresar el apellido");
				return false;
			}else if($('#ident').val()==""){
				alertify.alert("Debes ingresar tu identificacion");
				return false;
			}else if($('#correo').val()==""){
				alertify.alert("Debes ingresar el correo");
				return false;
			}else if(password==""){
				alertify.alert("Debes ingresar la clave");
				return false;
    		}else if (!password.match(regex) ) {
				alertify.alert("La contraseña debe contener letras mayúsculas, minúsculas, números y caracteres especiales. \nLa contraseña debe ser mínimo de 8 caracteres. \nTodos los campos son obligatorios. ");
				return false;
    		} 

			cadena="name=" + $('#nombre').val() +
					"&apellido=" + $('#apellido').val() +
					"&mobno=" + $('#ident').val() + 
					"&email=" + $('#correo').val() +
					"&password=" + $('#password').val();

					$.ajax({
						type:"POST",
						url:"php/registro.php",
						data:cadena,
						success:function(r){

							if(r==2){
								alertify.alert("Fallo al agregar");
							}
							else if(r==1){
								$('#frmRegistro')[0].reset();
								alertify.success("Agregado con exito");
							}else{
								alertify.error("Fallo al agregar");
							}
						}
					});
		});
	});
</script>

