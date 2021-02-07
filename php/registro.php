<?php 

	require_once "conexion.php";
	
	$name = $_POST['name'];
	$apellido = $_POST['apellido'];
	$correo = $_POST['email'];
	$password = $_POST['password'];
	$ident = $_POST['mobno'];
	$username = $name[0].$apellido;

		$sql = "insert into public.user(name,username,apellido,email,password,mobno)values('".$name."','".$username."','".$apellido."','".$correo."','".md5($password)."','".$ident."')";
		$result=pg_query($dbconn,$sql);

		if ($result) {
			//Se configura el nombre de usuario
			$sql = "update public.user set username = CONCAT(username, id) WHERE mobno = '".$ident."'";
			$result = pg_query($dbconn, $sql);
			echo 1;
		} else {
			echo 2;
		}
 ?>