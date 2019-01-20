<?php
	/*ver los permisos que a solicitado un empleado, no importa si han sido a aprobados o negados*/
	//proHistorialPermisoEmpleado.php

	//session_start();
	//ob_start();

	$idEmpleado = $_SESSION['idEmpleado'];

	
	require '../../conexion.php';

	$conex = new Conexion();
	$conexion = $conex->conect();
	$sql= 'SELECT * FROM "PERMISOS".F_VER_HISTORIAL_EMPLEADO($1)';
	$consulta = pg_query_params($conexion, $sql, array($idEmpleado));
	/*
		0 P_TIPO_AUSENCIA
		1 P_FECHA_SOLICITUD
		2 P_FECHA_INICIO
		3 P_FECHA_FIN
		4 P_VEREDICTO
	*/
	$numFilas = pg_num_rows($consulta);
	
	for($i = 0; $i < $numFilas; $i++){
		$tipoAusencia[$i] = pg_fetch_result($consulta, $i, 'P_TIPO_AUSENCIA');
		$fechaSolicitud[$i] = pg_fetch_result($consulta, $i, 'P_FECHA_SOLICITUD');
		$fechaInicio[$i] = pg_fetch_result($consulta, $i, 'P_FECHA_INICIO');
		$fechaFin[$i] = pg_fetch_result($consulta, $i, 'P_FECHA_FIN');
		$veredicto[$i] = pg_fetch_result($consulta, $i, 'P_VEREDICTO');
	}	

	$conex->cerrarConexion($conexion);
?>


<script type="text/javascript">
	var tipoAusencia = <?php echo json_encode($tipoAusencia);?>;	//columna1
	var fechaSolicitud = <?php echo json_encode($fechaSolicitud);?>; //columna2
	var fechaInicio = <?php echo json_encode($fechaInicio);?>;	//columna3
	var fechaFin = <?php echo json_encode($fechaFin);?>;	//columna4
	var veredicto = <?php echo json_encode($veredicto);?>	//columna5

	var n = tipoAusencia.length;
	var padre = document.getElementById('cuerpoTabla');

	//crear el numero de filas que se necesitan para todos los datos
	for(var i = 0 ; i < n; i++ ){
		var fila = document.createElement("tr");

		//crear las columnas
		var columna1 = document.createElement("td");
		var contenido1 = document.createTextNode(tipoAusencia[i]);
		columna1.appendChild(contenido1);
		fila.appendChild(columna1);

		var columna2 = document.createElement("td");
		var contenido2 = document.createTextNode(fechaSolicitud[i]);
		columna2.appendChild(contenido2);
		fila.appendChild(columna2);

		var columna3 = document.createElement("td");
		var contenido3 = document.createTextNode(fechaInicio[i]);
		columna3.appendChild(contenido3);
		fila.appendChild(columna3);

		var columna4 = document.createElement("td");
		var contenido4 = document.createTextNode(fechaFin[i]);
		columna4.appendChild(contenido4);
		fila.appendChild(columna4);

		var columna4 = document.createElement("td");
		var contenido4 = document.createTextNode(veredicto[i]);
		columna4.appendChild(contenido4);
		fila.appendChild(columna4);

		padre.appendChild(fila);

	}

</script>