<!DOCTYPE html>
<?php
session_start();
$rol = $_SESSION['rol'];

if (@!$_SESSION['user']) {
	header("Location:index.php");
}
else if ($rol != "2") {
		header("Location:inicio.php");
}
?>



<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Admin</title>
 

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
  </head>
<body style="background-color: gray">
<header class="header">
</header>

<!-- ============================================= Container ================================= -->

<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="jumbotron">
				<a href="php/salir.php" class="btn btn-info">Salir del sistema</a>
				<a href="stats.php" class="btn btn-info">Estadisticas</a>
				<a href="inicio.php" class="btn btn-info">Inicio</a>
				<h2> Administración de usuarios registrados</h2>	
					<div class="well well-small">
						<hr class="soft"/>
						<h4>Tabla de Usuarios</h4>
							<div class="row-fluid">

								<?php

									require("php/conexion.php");
									$sql="select * from public.user where isadmin = '1'";
						
									$query=pg_query($dbconn,$sql);

									echo "<table id='table' border='1'; class='table table-hover';>";
										echo "<tr class='warning'>";
											echo "<td>Id</td>";
											echo "<td>Nombre</td>";
											echo "<td>Apellido</td>";
											echo "<td>Identificacion</td>";
											echo "<td>Usuario</td>";
											echo "<td>Correo</td>";
											echo "<td>Editar</td>";
											echo "<td>Borrar</td>";
										echo "</tr>";

									
								?>
								
								<?php 
									while($arreglo=pg_fetch_array($query)){
										
										echo "<tr class='success'>";
											echo "<td>$arreglo[0]</td>";
											echo "<td>$arreglo[1]</td>";
											echo "<td>$arreglo[5]</td>";
											echo "<td>$arreglo[4]</td>";
											echo "<td>$arreglo[6]</td>";
											echo "<td>$arreglo[2]</td>";

											echo "<td><a href='update.php?id=$arreglo[0]'><img src='img/actualizar.png' class='img-rounded'></td>";
											echo "<td><a href='admin.php?id=$arreglo[0]&idborrar=2'><img src='img/borrar.png' class='img-rounded'/></a></td>";
											

											
										echo "</tr>";
									}

									echo "</table>";

										extract($_GET);
										if(@$idborrar==2){
							
											$sqlborrar="delete from public.user where id=$id";
											$resborrar=pg_query($dbconn,$sqlborrar);
											echo '<script>alert("REGISTRO ELIMINADO")</script> ';
											echo "<script>location.href='admin.php'</script>";
										}

								?>
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- ============================================= End Container ================================= -->
	</style>
  </body>
</html>