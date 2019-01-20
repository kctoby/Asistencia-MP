<?php

	/*para saber si en el buscador de permisoPersonal hay alguna conicidencia*/
	session_start();
	ob_start();

	$idPermiso =  $_COOKIE["variable"];
	

	if($idPermiso == "undefined"){
		$_SESSION['mensaje']= "nombre no encontrado";
		header('Location: ../../modelos/permisoPersonal.php'); 
	}
	else{
		header('Location: ../../modelos/personal/aceptarPermiso.php');
	}
?>