<?php 
/*proceso para mostrar una lista de los tipos de horario que hay
	Usado en: la pantalla crearUsuario
*/


	$conex = new Conexion();
	$conexion = $conex->conect();
	$sql= 'SELECT * FROM "PERMISOS".F_LISTA_HORARIOS()';
	/*lista de horarios*/

	$consulta = pg_query_params($conexion,$sql,array());
	$numFilas = pg_num_rows($consulta);
	
	for($i= 0; $i<$numFilas; $i++ ){
		$tipoHorario[$i] = pg_fetch_result($consulta, $i, 'TIPO_HORARIO');
	}

	$conex->cerrarConexion($conexion);


?>