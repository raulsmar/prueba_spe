<?php 


	session_start();
	require_once "conexion.php";

		$username=$_POST['user'];
		$pass=md5($_POST['password']);

		$sql ="select * from public.user where username = '".$username."' and password ='".$pass."'";
		$result=pg_query($dbconn,$sql);
		$consulta = pg_fetch_array($result);

		if ($result) {
			$sql1 = "update public.user set online='2' where username='$username' and password ='$pass'";
			$result1=pg_query($dbconn,$sql1);

			if(pg_num_rows($result) > 0){
				$_SESSION['user']=$username;
				$_SESSION['rol']=$consulta['isadmin'];
				echo 1;
			}else{
				echo 0;
			}
		}
 ?>