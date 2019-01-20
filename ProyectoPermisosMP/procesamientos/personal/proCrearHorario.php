<?php
	/*para almacenar nuevos horarios
	Usado en la pantalla crearHorario*/
	require '../../conexion.php';

	$nombreHorario= $_POST["nombreHorario"];
	$horaInicio= $_POST["horaInicio"];
	$minInicio = $_POST["minutoInicio"];
	$horaFin = $_POST["horaFin"];
	$minFin = $_POST["minutoFin"];

	$inicio = $horaInicio. ':' . $minInicio . ':00';
	$fin =	$horaFin. ':' . $minFin. ':00';

	$conex = new Conexion();
	$conexion = $conex->conect();
	$sql = 'SELECT "PERMISOS".F_GUARDAR_HORARIO($1,$2,$3)';

	$consulta = pg_query_params($conexion, $sql, array($nombreHorario, $inicio, $fin));

	echo 'guardado con exito';
	$conex->cerrarConexion($conexion);

?>