<?php
	/*para almacenar nuevos permisos
	Usado en la pantalla crearPermiso*/
	//require '../../conexion.php';

	session_start();
	ob_start();

	include('../../bitacora.php');
	$idUsuario = $_SESSION['idEmpleado'];
	$descripcion = 'Creo un nuevo tipo de permiso- '. $_SERVER['REMOTE_ADDR'];
	$time=time(); //hora del servidor
	$fechaHora = date("Y-m-d H:i:s", $time); 
	bitacora($idUsuario, $fechaHora, $descripcion);


	$nombrePermiso = $_POST["nombrePermiso"];
	$goseSueldo = $_POST["goseSueldo"];
	$tipoUnidad = $_POST["tipoUnidad"];
	$cantidad = $_POST["cantidad"];

	if ($goseSueldo == 'Si'){
		$goseSueldo = 'TRUE';
	}else{
		$goseSueldo = 'FALSE';
	}

	if($tipoUnidad == 'Horas'){
		$tipoUnidad = 'HORAS';
	}else{
		$tipoUnidad = 'DIAS';
	}

	$conex = new Conexion();
	$conexion = $conex->conect();
	$sql = 'SELECT * FROM "PERMISOS".F_GUARDAR_TIPO_AUSENCIA($1,$2,$3,$4)';
	/*	1.- nombre permiso
		2.-si goza de sueldo- booleano
		3.-parametro gruia- saber si son HORAS  o   DIAS (deben ser escritos asi) 
		4.-tiempo maximo*/

	$consulta = pg_query_params($conexion, $sql, array($nombrePermiso, $goseSueldo,$tipoUnidad,$cantidad));

	//echo 'guardado con exito';
	$conex->cerrarConexion($conexion);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Guardando</title>
	<meta http-equiv="Refresh" content="2;url=../../modelos/personal/administrarSistema.php">
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
			  		<strong>Permiso Creado con exito!</strong> </br>
			  		<a href="#" class="alert-link">El permiso se creo con &eacute;xito</a>.
				</div>
			</div>
		</div>
	</div>

</body>
</html>