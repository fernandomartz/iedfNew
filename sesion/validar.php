<?php
	$usuario = $_POST['nnombre'];
	$pass = $_POST['npassword'];

	if(empty($usuario) || empty($pass)){
		header("Location: ../principal.php");
		exit();
	} else {
		header("Location: ../index.html");
	}

	mysql_connect('localhost','root','123') or die("Error al conectar " . mysql_error());
	mysql_select_db('iedf') or die ("Error al seleccionar la Base de datos: " . mysql_error());

	$result = mysql_query("SELECT * from usuarios where usuario = '$user' and '$password' = '$password'");

	if($row = mysql_fetch_array($result)){
		if($row['Password'] ==  $pass){
			session_start();
			$_SESSION['usuario'] = $usuario;
			header("Location: ../principal.php");
		}else{
			header("Location: ../principal.php");
			exit();
		}
	}else{
		header("Location: ../principal.php");
		exit();
	}
?>