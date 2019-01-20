<?php
/*al hacer una busqueda en permisoJefe, proBusquedaPermiso notifica que no existe ese nombre.
No verifica en la base de datos, pues la lista que autocompleta en permisoJefe muestra los unicos nombres 
que se encuentran disponibles.

El buscador toma el nombre sugerido con su indice para saber que permiso es el que se busca, el cookie toma 
el valor del indice para saber de que permiso se trata. Por eso si el cookie no esta definido entonces sabe
que no hay permis. Si hay cockie solo se envia a la pantalla aceptarPermiso.
*/
	session_start();
	ob_start();

	$idPermiso =  $_COOKIE["variable"];
	
	if($idPermiso == "undefined"){
		$_SESSION['mensaje']= "nombre no encontrado";
		header('Location: ../../modelos/permisoJefe.php'); 
	}
	else{
		header('Location: ../../modelos/jefe/aceptarPermiso.php');
	}
?>