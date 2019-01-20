<?php
	/*para saber si un nombre de permiso se repite, se llama de un una funcion javascript
	 llamada crearPermiso.js que usa ajax para saber si se esta escribiendo un
	  nombre de permiso repetido 

	  Usado en la pantalla crearPermiso*/

	require '../../conexion.php';
	$conex = new Conexion();
	$conexion = $conex->conect();
	$sql= 'SELECT * FROM "PERMISOS".F_LISTA_TIPOS_AUSENCIAS()';
	/*lista de todas las ausencias*/

	$consulta = pg_query_params($conexion,$sql, array());
	$numFilas = pg_num_rows($consulta);
	
	for($i= 0; $i<$numFilas; $i++ ){
		$permiso[$i] = pg_fetch_result($consulta, $i, 'P_TIPO_AUSENCIA');
	}
	$conex->cerrarConexion($conexion);

	$nombre = $_REQUEST["q"];
	$mensaje= "";

	for ($j=0; $j<$numFilas; $j++){
		$permisoMay = strtoupper($permiso[$j]);
		if($nombre == $permisoMay){
			$mensaje = "El nombre de permiso ya existe";
			$j = $numFilas;
		}
	}
	echo $mensaje;

?>