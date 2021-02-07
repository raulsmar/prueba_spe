<!DOCTYPE html>
<?php
session_start();
if (@!$_SESSION['user']) {
	header("Location:index.php");
}
?>		
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Dashboard</title>

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
	
  </head>

<body style="background-color: gray">
<br><br><br>
<div class="container">
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-5">
			<div class="panel panel-primary">
				<div class="panel panel-body">
					<div style="text-align: center;">
					</div>
					<p></p>
					<!-- interfaz -->

					<h2> Administración de usuarios registrados</h2>	
					<div class="well well-small">
						<hr class="soft"/>
						<h4>Edición de usuarios</h4>
							<div class="row-fluid">
		
					<?php
					extract($_GET);
					require("php/conexion.php");

					$sql="select * from public.user where id=$id";
				//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
					$ressql=pg_query($dbconn,$sql);
					while ($row=pg_fetch_row ($ressql)){
							$id=$row[0];
							$name=$row[1];
							$apellido=$row[5];
							$ident=$row[4];
							$user=$row[6];
							$correo=$row[2];
							$isactive=$row[7];
						}



					?>

					<form action="php/update.php" method="post">
							Id<br><input type="text" name="id" value= "<?php echo $id ?>" readonly="readonly"><br>
							Nombre<br> <input type="text" name="nombre" value="<?php echo $name?>"><br>
							Apellido<br> <input type="text" name="apellido" value="<?php echo $apellido?>"><br>
							Identificacion<br> <input type="text" name="identificacion" value="<?php echo $ident?>"><br>
							Usuario<br> <input type="text" name="user" value="<?php echo $user?>"><br>
							Correo<br> <input type="text" name="email" value="<?php echo $correo?>"><br>
							Usuario Activo<br> <input type="text" name="isactive" value="<?php echo $isactive?>"><br>
							
							
							<br>
							<input type="submit" value="Guardar" class="btn btn-success btn-primary">
							<a href="admin.php" class="btn btn-danger">Atras</a>
						</form>

					</div>	

					<!-- end interfaz -->
				</div>
			</div>
		</div>
		<div class="col-sm-5"></div>
	</div>
</div>
</body>