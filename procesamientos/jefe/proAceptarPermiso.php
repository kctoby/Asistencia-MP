<?php 
	/*almacena en la base de datos si un permiso fue aprobado o negado. Veredicto por parte del jefe*/
	
	session_start();
	ob_start();

	$idEmpleado =  $_COOKIE["variable"];
	$valorRadio = $_POST['optionsRadios'];
	$justificacion = $_POST['justificacion'];

	/*
	option1 = true(acepto el permiso)
	option2 = false(nego el permiso)
	*/
	if ($valorRadio == 'option1'){
		$opcion= 'true';
	}
	if ($valorRadio == 'option2') {
		$opcion = 'false';
	}

	include('../../bitacora.php');
	$idUsuario = $_SESSION['idEmpleado'];
	$descripcion = 'dio veredicto sobre permiso  - '. $_SERVER['REMOTE_ADDR'];
	$time=time(); //hora del servidor
	$fechaHora = date("Y-m-d H:i:s", $time); 
	bitacora($idUsuario, $fechaHora, $descripcion);




	//require '../../conexion.php';

	$conex = new Conexion();
	$conexion = $conex->conect();
	$sql= 'SELECT "PERMISOS".F_APR_DNG_PERMISO_JEFE_INM($1,$2, $3)';

	$consulta = pg_query_params($conexion,$sql,array($idEmpleado,$opcion, $justificacion));
	$conex->cerrarConexion($conexion);

	//header('Location: ../../modelos/permisoJefe.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Guardando</title>
 	<meta http-equiv="Refresh" content="2;url=../../modelos/permisoJefe.php">
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
	<div class="container">
		<div class="main row">
			<div class="col-lg-6 col-lg-offset-3"> 
				<div class="alert alert-dismissible alert-success">
			  		<strong>Guardado con exito!</strong> </br>
			  		<a href="#" class="alert-link">El veredicto se guardo con &eacute;xito</a>.
				</div>
			</div>
		</div>
	</div>

</body>
</html>
