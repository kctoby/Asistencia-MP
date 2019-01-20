<?php 
	/*verifica que un nombre de usuario no este repetido

	Usado en la pantalla crearUsuario (se hace uso de ajax para llamar a este procedimiento)*/
	require '../../conexion.php';
	$conex = new Conexion();
	$conexion = $conex->conect();
	$sql= 'SELECT * FROM "PERMISOS".F_LISTA_USUARIOS_CREADOS()';
	$consulta = pg_query_params($conexion,$sql, array());
	$numFilas = pg_num_rows($consulta);
	
	for($i= 0; $i<$numFilas; $i++ ){
		$usuarios[$i] = pg_fetch_result($consulta, $i, 'NOMBRE_USUARIO');
	}
	$conex->cerrarConexion($conexion);

	$nombre = $_REQUEST["q"];
	$mensaje= "";

	for ($j=0; $j<$numFilas; $j++){
		$usuarioMay = strtoupper($usuarios[$j]);
		if($nombre == $usuarioMay){
			$mensaje = "Nombre de usuario ya existe";
			$j = $numFilas;
		}
	}
	echo $mensaje;
?>