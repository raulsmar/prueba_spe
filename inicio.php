<?php 
	session_start();
	$rol = $_SESSION['rol'];

	if(isset($_SESSION['user'])){
		if ($rol== "2"){
 ?>

 

 <!DOCTYPE html>
<html>
<head>
	<title>Inicio</title>
	<?php require_once "scripts.php"; ?>
</head>
<body style="background-color: gray">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="jumbotron">
				<a href="php/salir.php" class="btn btn-info">Salir del sistema</a>
				<a href="admin.php" class="btn btn-info">Dashboard</a>
				<a href="stats.php" class="btn btn-info">Estadisiticas</a>
					<h2>Entraste con exito</h2>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

<?php
	}else if ($rol == "1"){
?>
   <!DOCTYPE html>
<html>
<head>
	<title>Inicio</title>
	<?php require_once "scripts.php"; ?>
</head>
<body style="background-color: gray">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="jumbotron">
				<a href="php/salir.php" class="btn btn-info">Salir del sistema</a>
					<h2>Entraste con exito</h2>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<?php
	}
} else {
	header("location:index.php");
	}
 ?>
