<?php
	/*para guardar los datos de un nuevo usuario
	Usado en la pantalla crearUsuario*/

	session_start();
	ob_start();

	$id = $_COOKIE["idBuscar"];
	//require '../../conexion.php';
	include('../../bitacora.php');
	$idUsuario = $_SESSION['idEmpleado'];
	$descripcion = 'Creo la cuenta de usuario de '. $id .'- '. $_SERVER['REMOTE_ADDR'];
	$time=time(); //hora del servidor
	$fechaHora = date("Y-m-d H:i:s", $time); 
	bitacora($idUsuario, $fechaHora, $descripcion);




	
	$nombreUsuario = $_POST["nombreUsuario"];
	$contrasenia = $_POST["password"];
	$tipoUsuario = $_POST["tipoEmpleado"];
	$tipoHorario = $_POST["tipoHorario"];

	$contrasenia = sha1($contrasenia);

	//echo $id;

	$conex = new Conexion();
	$conexion = $conex->conect();
	$sql1 = 'SELECT * FROM "PERMISOS".F_GUARDAR_USUARIO_NUC($1, $2, $3)';
	/*  1.- idEmpleado
		2.-nombre usuario
		3.-contrasenia*/
	$sql2 = 'SELECT * FROM "PERMISOS".F_GUARDAR_USUARIO_TUSR($1, $2)';
	/*	1.-idEmpleado
		2.-TipoEmpleado*/

	$sql3 = 'SELECT * FROM "PERMISOS".F_GUARDAR_USUARIO_THORARIO($1,$2)';
	//falta guardar el horario

	$consulta1 = pg_query_params($conexion, $sql1, array($id, $nombreUsuario, $contrasenia));
	$consulta2 = pg_query_params($conexion, $sql2, array($id, $tipoUsuario));
	$consulta3 = pg_query_params($conexion, $sql3, array($id, $tipoHorario));


	$conex->cerrarConexion($conexion);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Guardando</title>
	<meta http-equiv="Refresh" content="3;url=../../modelos/personal/administrarSistema.php">
	<link rel="stylesheet" href="../../css/bootstrap.min.css">	
	<link rel="stylesheet" type="text/css" href="../../css/personalizado.css">
</head>
<body>
	<nav class="navbar navbar-inverse opciones-nav">
  		<div class="container-fluid">
    		<div class="navbar-header">
    			<div class="logo">
    				<img class="imagenes-bloque" src="../../Imagenes/LogoMP.png" alt="" align="left" height="60">
    			</div>
    			<a class="navbar-brand header-pers"><p align="center">&nbsp;&nbsp;Sistema de Permisos, Ministerio P&uacute;blico</p></a>
    		</div>
  		</div>
	</nav>

	<br/><br/>
	<br/><br/>
	<br/><br/>
	<h1 align="center"> GUARDANDO USUARIO</h1>

</body>
</html>