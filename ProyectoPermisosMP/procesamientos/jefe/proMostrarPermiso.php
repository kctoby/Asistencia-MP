<?php 
	/*toma el cookie a partir de la lista de solicitudes, o a traves del buscador por nombre, de esta 
	forma se encuentra el id del permiso.
	Se toma el id de permiso para mostrar los datos asociados a ese permiso
	*/

	$idEmpleado =  $_COOKIE["variable"];

	require '../../conexion.php';

	$conex = new Conexion();
	$conexion = $conex->conect();
	$sql= 'SELECT *FROM "PERMISOS".F_DEVOLVER_ESPECIF_PERMISO($1)';

	$consulta = pg_query_params($conexion,$sql,array($idEmpleado));
	$numFilas = pg_num_rows($consulta);
	$datos=pg_fetch_array($consulta);
		/* datos arreglos que contiene el permiso en el siguiente orden
		0 nombre empleado
		1 tipo ausencia
		2 fecha solicitud 
		3 fecha inicio
		4 fecha fin 
		5 descripcion
		*/

	$conex->cerrarConexion($conexion);
?>

<script type="text/javascript">
	var datos = <?php echo json_encode($datos)?>;
	document.getElementById("nombreEmpleado").innerHTML = datos[0];
	document.getElementById("tipoPermiso").innerHTML = datos[1];
	document.getElementById("fechaSolicitud").innerHTML = datos[2];
	document.getElementById("fechaInicio").innerHTML = datos[3];
	document.getElementById("fechaFin").innerHTML = datos[4];
	document.getElementById("motivoPermiso").innerHTML = datos[5];

</script>