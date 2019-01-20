<?php
	/*Se modifica la contrasenia de un empleado*/
	//require '../../conexion.php';

	session_start();
	ob_start();

	include('../../bitacora.php');

	$id = $_POST['idEmpleadoModificar'];

	$idUsuario = $_SESSION['idEmpleado'];
	$descripcion = 'Cambio contrasenia del usuario '.$id. ' - '. $_SERVER['REMOTE_ADDR'];
	$time=time(); //hora del servidor
	$fechaHora = date("Y-m-d H:i:s", $time); 
	bitacora($idUsuario, $fechaHora, $descripcion);



	
	$contrasenia = $_POST['password'];

	$contrasenia = sha1($contrasenia);

	$conex = new Conexion();
	$conexion = $conex->conect();

	$sql = 'SELECT * FROM "PERMISOS".F_MODIFICAR_USR_CONTRASENIA($1, $2)';

	$consulta = pg_query_params($conexion, $sql, array($id, $contrasenia));

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
	<h1 align="center"> Contraseña modificada con exito.</h1>

</body>
</html>