<?php 
	/*Se muestran los datos de un permiso, para eso se toma el id del empleado
	Usado en la pantalla aceptarPermiso  en el modulo de personal*/
	$idEmpleado =  $_COOKIE["variable"];

	require '../../conexion.php';

	$conex = new Conexion();
	$conexion = $conex->conect();


	//----------------hay que cambiar el nombre de la fucnion-------------------
	$sql= 'SELECT *FROM "PERMISOS".F_DEVOLVER_ESPECIF_PERMISO_JPERSONAL($1)';

	$consulta = pg_query_params($conexion,$sql,array($idEmpleado));
	$numFilas = pg_num_rows($consulta);
	$datos=pg_fetch_array($consulta);
		/* datos arreglos que contiene el permiso en el siguiente orden
		0 P_NOMBRE_COMPLETO
		1 P_TIPO_AUSENCIA
		2 P_FECHA_SOLICITUD
		3 P_FECHA_INICIO
		4 P_FECHA_FIN
		5 DESCRIPCION
		6 P_NOMBRE_JEFE
		7 P_F_CAMBIO_ESTADO_JEFE

		--agregar el jefe que lo aprobo y la fecha en que lo aprobo
		*/

	$conex->cerrarConexion($conexion);
?>

<script type="text/javascript">
	var datos = <?php echo json_encode($datos);?>;
	document.getElementById("nombreEmpleado").innerHTML = datos[0];
	document.getElementById("tipoPermiso").innerHTML = datos[1];
	document.getElementById("fechaSolicitud").innerHTML = datos[2];
	document.getElementById("motivoPermiso").innerHTML = datos[5];
	
	document.getElementById("fechaInicio").innerHTML = datos[3];
	document.getElementById("fechaFin").innerHTML = datos[4];
	document.getElementById("jefeAprobo").innerHTML = datos[6];
	document.getElementById("fechaAprobo").innerHTML = datos[7];

</script>