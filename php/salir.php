<?php 

	session_start();

	require_once "conexion.php";
	$user = $_SESSION['user'];

	$sql = "update public.user set online='1' where username='$user'";
	$result=pg_query($dbconn,$sql);

	if ($result) {
        unset($_SESSION['user']);
        unset($_SESSION['rol']);
	}
	header("location:../index.php");

 ?>