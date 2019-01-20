<?php

	/* mostrar la lista de los tipos de usario que habran en el sistema.
		Usado en la pantalla crearUsuario.php
		modificarUsuario.php
	*/
	//require '../../conexion.php';

	$conex = new Conexion();
	$conexion = $conex->conect();
	$sql= 'SELECT * FROM "PERMISOS".F_LISTA_TIPOS_USUARIOS();';
	/*lista de todos los tipos de usuario*/

	$consulta = pg_query_params($conexion,$sql,array());
	$numFilas = pg_num_rows($consulta);
	
	for($i= 0; $i<$numFilas; $i++ ){
		$tipoUsuario[$i] = pg_fetch_result($consulta, $i, 'TIPO_USUARIO');
	}

	$conex->cerrarConexion($conexion);
?>

<script type="text/javascript">
	//crear un  arreglo de los tipos de permisos
	var listaTipoUsuario = <?php echo json_encode($tipoUsuario);?>;
	var num = listaTipoUsuario.length;
	var padre = document.getElementById("selectEmpleado");

	//para el primer dato, que remplace el contenido del primer option
	var primero = document.getElementById("primerTipoEmpleado");
	var mostrar = listaTipoUsuario[0];
	var contenido = document.createTextNode(mostrar);
	primero.appendChild(contenido);

	for(var i = 2 ; i<num ;i++){
		//comienza en dos, para que no se muestre jefe temporal
		var nuevoElemento = document.createElement("option"); 
		mostrar = listaTipoUsuario[i];
		var contenido = document.createTextNode(mostrar);
  		nuevoElemento.appendChild(contenido);
  		padre.insertBefore(nuevoElemento, primero);
	}

</script>