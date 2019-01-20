<?php
	/*para guardar las modificaciones de un permiso 
	llamado en la pantalla modificarPermiso*/
	session_start();
	ob_start();

	//require '../../conexion.php';
	include('../../bitacora.php');

	$idPermiso = $_COOKIE['variable'];

	$idUsuario = $_SESSION['idEmpleado'];
	$descripcion = 'Modifico el permiso '. $idPermiso .'- '. $_SERVER['REMOTE_ADDR'];
	$time=time(); //hora del servidor
	$fechaHora = date("Y-m-d H:i:s", $time); 
	bitacora($idUsuario, $fechaHora, $descripcion);

	
	$nombrePermiso= $_POST['nombrePermiso'];

	//verificar que el checkbox este marcado
	if(!isset($_POST['sueldo'])){
		$checkSueldo = 'false';
	}else if($_POST['sueldo'] == 'on'){
		$checkSueldo = 'true';
	}

	$tipoUnidad = $_POST['Tiempo'];
	$cantidad = $_POST['cantidad'];

	if($tipoUnidad == 'Horas'){
		$tipoUnidad = 'HORAS';
	}else{
		$tipoUnidad = 'DIAS';
	}

	$conex = new Conexion();
	$conexion = $conex->conect();
	$sql = 'SELECT * FROM "PERMISOS".F_MODIFICAR_TIPO_AUSENCIA($1,$2,$3,$4,$5)';
	/*	0.-id permiso
		1.- nombre permiso
		2.-si goza de sueldo- booleano
		3.-parametro gruia- saber si son HORAS  o   DIAS (deben ser escritos asi) 
		4.-tiempo maximo*/

	$consulta = pg_query_params($conexion, $sql, array($idPermiso,$nombrePermiso, $checkSueldo ,$tipoUnidad, $cantidad));

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
			  		<strong>Permiso Modificado</strong> </br>
			  		<a href="#" class="alert-link">El permiso se modifico con &eacute;xito</a>.
				</div>
			</div>
		</div>
	</div>

</body>
</html>