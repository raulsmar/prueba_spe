<?php


extract($_POST);	//extraer todos los valores del metodo post del formulario de actualizar
	require("conexion.php");
	$sentencia="update public.user set isactive='$isactive' where id='$id'";
	$resent=pg_query($dbconn,$sentencia);
	if ($resent==null) {
		echo "Error de procesamieno no se han actuaizado los datos";
		echo '<script>alert("ERROR EN PROCESAMIENTO NO SE ACTUALIZARON LOS DATOS")</script> ';
		header("location: ../admin.php");
		
		echo "<script>location.href='../admin.php'</script>";
	}else {
		echo '<script>alert("REGISTRO ACTUALIZADO")</script> ';
		
		echo "<script>location.href='../admin.php'</script>";
	}
?>