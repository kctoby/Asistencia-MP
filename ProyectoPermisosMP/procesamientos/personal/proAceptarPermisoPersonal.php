<?php 

	/*toma los datos de la pantalla aceptarPermiso, para validar que un 
	Usuario de personal acepto o nego un permiso*/
	session_start();
	ob_start();


	include('../../bitacora.php');

	$idPermiso =  $_COOKIE["variable"];

	$idUsuario = $_SESSION['idEmpleado'];
	$descripcion = 'Dio veredicto de permiso ' .$idPermiso. ' como encargado de personal - '. $_SERVER['REMOTE_ADDR'];
	$time=time(); //hora del servidor
	$fechaHora = date("Y-m-d H:i:s", $time); 
	bitacora($idUsuario, $fechaHora, $descripcion);


	
	$valorRadio = $_POST['optionsRadios'];
	$justificacion = $_POST['justificacion'];
	$idEmpleado = $_SESSION['idEmpleado'];
		//echo 'aun tengo el id : '.$idEmpleado;

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

	//echo $valorRadio . $idEmpleado . $justificacion . ' ' . $opcion;
	//require '../../conexion.php';

	$conex = new Conexion();
	$conexion = $conex->conect();
	$sql= 'SELECT * FROM "PERMISOS".F_APR_DNG_PERMISO_JPERSONAL($1,$2, $3, $4)';

	/* 	
		1 id jefe personal
		2 id permiso
		3 veredicto
		4 descripcion 
		*/

	$consulta = pg_query_params($conexion,$sql,array($idEmpleado, $idPermiso, $opcion, $justificacion));
	$conex->cerrarConexion($conexion);

	$SESSION['mensaje'] = "Proceso realizado con exito";


	//echo "guardado con exito";
	//header('Location: ../../modelos/permisoPersonal.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Guardando</title>
 	<meta http-equiv="Refresh" content="2;url=../../modelos/permisoPersonal.php">
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
