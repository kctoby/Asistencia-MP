<?php
	/*verifica que el tipo de horario que se esta ingresando no se este repitiendo
		Usado en la pantalla crearHorario (se hace uso de ajax para llamar este procedimiento)*/
	require '../../conexion.php';
	$conex = new Conexion();
	$conexion = $conex->conect();
	$sql= 'SELECT * FROM "PERMISOS".F_LISTA_HORARIOS()';
	$consulta = pg_query_params($conexion,$sql, array());
	$numFilas = pg_num_rows($consulta);
	
	for($i= 0; $i<$numFilas; $i++ ){
		$horarios[$i] = pg_fetch_result($consulta, $i, 'TIPO_HORARIO');
	}
	$conex->cerrarConexion($conexion);

	//tomando la cadena que se ingreso por nombre
	$nombre = $_REQUEST["q"];
	$mensaje= '';

	for ($j=0; $j<$numFilas; $j++){
		if($nombre == $horarios[$j]){
			$mensaje = "Nombre de horario repetido";
			$j = $numFilas;
		}
	}
	echo $mensaje;
?>