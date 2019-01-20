<?php
	/*busca, por id de empleado, el nombre de un empleado
	Usado en la pantalla administrarSistema.  Al seleccionar Usuario -> crear 
		(uso de ajax para hacer uso de este procedimiento )
	Usado en la pantalla modificarUsuario (uso de AJAX)
	*/
	require '../../conexion.php';

	$id = $_REQUEST["q"];
	$conex = new Conexion();
	$conexion = $conex->conect();
	$sql= 'SELECT * FROM "PERMISOS".F_VERIFICAR_ASIGNACION_NOMUSR($1);';
	/*retorna: nombre del empleado y si ya tiene un usuario*/
	/*devuelve:
		1.-nombre empleado
		2.-parametro guia: si tiene usaurio creado o no
	*/


	$consulta = pg_query_params($conexion,$sql, array($id));
	$numFilas = pg_num_rows($consulta);

	$mensaje= "";

	if($numFilas == 0){
		$mensaje= "El usuario no fue encontrado.";
	} else{
		$guia = pg_fetch_result($consulta, 0, 'P_GUIA');
		$nombre =  pg_fetch_result($consulta, 0, 'P_NOMBRE_APELLIDO');

		if($guia == "Ya tiene usuario creado."){
			$mensaje = "1-".$nombre;
		}else if ($guia == "No tiene usuario creado."){
			$mensaje = "2-".$nombre;
		}
		// retorno 1 y el empleado ya tiene usuario
		// retorno 2 y el usuario no tiene usuario
	}
		echo $mensaje;


	$conex->cerrarConexion($conexion);

?>