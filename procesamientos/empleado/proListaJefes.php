<?php 
	//muestra el jefe inmediato del empleado en el formulario para pedir permiso

	$idEmpleado= $_SESSION['idEmpleado'];
	$conex = new Conexion();
	$conexion = $conex->conect();
	$sql='SELECT * FROM "PERMISOS".F_LISTA_JEFES($1)';
	/*devuelve el nombre del jefe al que se le puede solicitar un permiso*/

	$consulta = pg_query_params($conexion,$sql,array($idEmpleado));
	$numFilas = pg_num_rows($consulta);

	$jefe = pg_fetch_result($consulta, 0, 'NOMBRE_COMPLETO');

	$conex->cerrarConexion($conexion);
?>

<script type="text/javascript">
	var jefe = '<?php echo $jefe; ?>';
	var elemento = document.getElementById("jefe");
	elemento.setAttribute("value", jefe);
</script>