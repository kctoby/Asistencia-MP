<?php
	/* ya que los usuarios pueden tener mas de un horario, aqui se pueden agregar nuevos horarios
	usado en la pantalla nuevoHorario*/
	session_start();
	ob_start();

	include('../../bitacora.php');
	$idUsuario = $_SESSION['idEmpleado'];
	$descripcion = 'Agregar nuevo horario a un usario - '. $_SERVER['REMOTE_ADDR'];
	$time=time(); //hora del servidor
	$fechaHora = date("Y-m-d H:i:s", $time); 
	bitacora($idUsuario, $fechaHora, $descripcion);


	//require '../../conexion.php';
	$tipoHorario = $_POST['tipoHorario'];
	$id = $_POST['id'];

	$conex = new Conexion();
	$conexion = $conex->conect();

	$sql = 'SELECT * FROM "PERMISOS".F_ASIGNAR_NUEVO_HORARIO_EMPL($1, $2)';


	$consulta = pg_query_params($conexion, $sql, array($id, $tipoHorario));

	$conex->cerrarConexion($conexion);
	//echo "guardado con exito";


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
			  		<strong>Horario guardado con exito!</strong> </br>
			  		<a href="#" class="alert-link">El horario se guardo con &eacute;xito</a>.
				</div>
			</div>
		</div>
	</div>

</body>
</html>