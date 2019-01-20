<?php 
	//para eliminar la session
	session_start();
	ob_start();

	include('../bitacora.php');
	$idUsuario = $_SESSION['idEmpleado'];
	$descripcion = 'Cerro Sesion - '. $_SERVER['REMOTE_ADDR'];
	$time=time(); //hora del servidor
	$fechaHora = date("Y-m-d H:i:s", $time); 
	bitacora($idUsuario, $fechaHora, $descripcion);
	
	session_destroy();
	header('Location: ../Index.php');
?>