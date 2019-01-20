<?php 
	include('conexion.php');
	function bitacora($id, $fechaHora, $descripcion){
		$conex = new Conexion();
		$conexion = $conex->conect();
		$sql='SELECT "PERMISOS".F_GUARDAR_BITACORA($1,$2,$3)';
		$consulta = pg_query_params($conexion, $sql, array($id, $fechaHora, $descripcion));
		$conex->cerrarConexion($conexion); 
	}


?>