<?php
	/*para llenar las tablas de los permisos otorgados por un jefe
	Usado en verPermisosOtorgados.php*/
//proVerPermisosOtorgados
	session_start();
	ob_start();

	$idEmpleado = $_SESSION['idEmpleado'];


	include('../../bitacora.php');
	//$idUsuario = $_SESSION['idEmpleado'];
	$descripcion = 'Vio los permisos otorgados - '. $_SERVER['REMOTE_ADDR'];
	$time=time(); //hora del servidor
	$fechaHora = date("Y-m-d H:i:s", $time); 
	bitacora($idEmpleado, $fechaHora, $descripcion);
	
	//require '../../conexion.php';

	$conex = new Conexion();
	$conexion = $conex->conect();
	$sql= 'SELECT * FROM "PERMISOS".F_VER_PERMISOS_OTORGADOS($1)';
	$consulta = pg_query_params($conexion, $sql, array($idEmpleado));

	/*
		0 P_NOMBRE_EMPLEADO
		1 P_TIPO_AUSENCIA
		2 P_FECHA_SOLICITUD
		3 P_FECHA_INICIO
		4 P_FECHA_FIN
	*/

	$numFilas = pg_num_rows($consulta); 

	for($i = 0; $i<$numFilas; $i++){
		$nombreEmpleado[$i] = pg_fetch_result($consulta, $i, 'P_NOMBRE_EMPLEADO');
		$tipoAusencia[$i] = pg_fetch_result($consulta, $i, 'P_TIPO_AUSENCIA');
		$fechaSolicitud[$i] = pg_fetch_result($consulta, $i, 'P_FECHA_SOLICITUD');
		$fechaInicio[$i] = pg_fetch_result($consulta, $i, 'P_FECHA_INICIO');
		$fechaFin[$i]= pg_fetch_result($consulta, $i, 'P_FECHA_FIN');
	}

	$conex->cerrarConexion($conexion);
?>

<script type="text/javascript">
	var nombreEmpleado = <?php echo json_encode($nombreEmpleado);?>;  //columna1
	var tipoAusencia = <?php echo json_encode($tipoAusencia);?>; 	//columna2
	var fechaSolicitud = <?php echo json_encode($fechaSolicitud);?>; //columna3
	var fechaInicio = <?php echo json_encode($fechaInicio);?>;	//columna4
	var fechaFin = <?php echo json_encode($fechaFin);?>;	//columna5

	var n = nombreEmpleado.length;
	var padre = document.getElementById("cuerpoTabla");

	//crear filas, el numero de elementos
	for(var i = 0; i<n ; i++ ){
		var fila = document.createElement("tr");
		//crear las columnas, se ocupan 5
			var columna1 = document.createElement("td");
			var contenido1 = document.createTextNode(nombreEmpleado[i]);
			columna1.appendChild(contenido1);
			fila.appendChild(columna1);

			var columna2 = document.createElement("td");
			var contenido2 = document.createTextNode(tipoAusencia[i]);
			columna2.appendChild(contenido2);
			fila.appendChild(columna2);

			var columna3 = document.createElement("td");
			var contenido3 = document.createTextNode(fechaSolicitud[i]);
			columna3.appendChild(contenido3);
			fila.appendChild(columna3);

			var columna4 = document.createElement("td");
			var contenido4 = document.createTextNode(fechaInicio[i]);
			columna4.appendChild(contenido4);
			fila.appendChild(columna4);

			var columna5 = document.createElement("td");
			var contenido5 = document.createTextNode(fechaFin[i]);
			columna5.appendChild(contenido5);
			fila.appendChild(columna5);

			padre.appendChild(fila);
	
	}

</script>


