<?php 
	/*envia el permiso a la base de datos*/
	session_start();
	ob_start();

	$idEmpleado = $_SESSION['idEmpleado'];
	$jefe=$_POST['jefe'];
	$tipoAusencia = $_POST['tipoAusencia'];
	$guia = $_POST['guia'];
	$descripcion = $_POST['descripcion'];

	include('../../bitacora.php');
	$idUsuario = $_SESSION['idEmpleado'];
	$descripcion = 'Pidio un permiso - '. $_SERVER['REMOTE_ADDR'];
	$time=time(); //hora del servidor
	$fechaHora = date("Y-m-d H:i:s", $time); 
	bitacora($idUsuario, $fechaHora, $descripcion);




	if($guia == 'HORAS'){
		$fechaInicio = $_POST['fechaSolicitud'];
		$horaInicio=$_POST['horaInicio'];
		$minutoInicio= $_POST['minutoInicio'];
		$horaFin= $_POST['horaFin'];
		$minutoFin=$_POST['minutoFin'];

		$fechaCompletaInicio = $fechaInicio . ' ' . $horaInicio . ':' . $minutoInicio . ':00';
		$fechaCompletaFin = $fechaInicio . ' ' . $horaFin . ':' . $minutoFin . ':00';
	}
	if($guia == 'DIAS'){
		$fechaInicio = $_POST['fechaInicio'];
		$cantidadDias = $_POST['diasPedidos'];

		$nuevafecha= $fechaInicio;
		$fechaFin = date('Y-m-d', strtotime("$nuevafecha + ".$cantidadDias."day"));

		$fechaCompletaInicio = $fechaInicio .' 00:00:00';
		$fechaCompletaFin = $fechaFin . ' 23:59:59';
	}

	$ausencia = explode(" MAX(", $tipoAusencia);
	//echo $ausencia[0];
	
	//echo $jefe .'-' . $tipoAusencia .'-' . $idEmpleado .'-' . $fechaCompletaInicio .'-' . $fechaCompletaFin .'-' . $descripcion;

	//require'../../conexion.php';

	$conex = new Conexion();
	$conexion = $conex->conect();
	$sql= 'SELECT * FROM "PERMISOS".F_SOLICITAR_PERMISO($1, $2, $3, $4, $5, $6)';
 	/* 1 tipo ausencia
 	   2 idEmpleado
 	   3 fecha inicio
 	   4 fecha fin 
 	   5 descripcion
 	   6 jefe */

 	$consulta = pg_query_params($conexion,$sql, 
 								array(
 									$ausencia[0],
 									$idEmpleado,
 									$fechaCompletaInicio,
 									$fechaCompletaFin,
 									$descripcion,
 									$jefe
 								));


 	//echo "guardado con exito";
 	$conex->cerrarConexion($conexion);

 	//header('Location: ../../modelos/permisoEmpleado.php');

?>

<!DOCTYPE html>
<html>
<head>
	<title>Guardando</title>
 	<meta http-equiv="Refresh" content="2;url=../../modelos/permisoEmpleado.php">
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
			  		<strong>Permiso Enviado con exito!</strong> </br>
			  		<a href="#" class="alert-link">El permiso se envio con &eacute;xito</a>.
				</div>
			</div>
		</div>
	</div>

</body>
</html>
