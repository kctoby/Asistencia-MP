<?php
	session_start();
	ob_start();


	include('../bitacora.php');
	//require '../conexion.php';
	

	$usuario = $_POST['usuario'];
	$contrasenia = $_POST['contrasenia'];
	//$contrasenia = sha1($contrasenia);

	$conex = new Conexion();
	$conexion = $conex->conect();
	$sql='SELECT * FROM "PERMISOS".F_VERIFICAR_USUARIO($1 , $2)';
	$consulta = pg_query_params($conexion, $sql, array($usuario, $contrasenia));
	$filas = pg_num_rows($consulta);
	$datos=pg_fetch_array($consulta);
	/* arreglo de los datos 
	0.-nombre
	1.-funcion (tipo usuario)
	2.-id empleado*/
	$conex->cerrarConexion($conexion); 


	//echo $datos[0];
	
	if ($filas == 0){
		$_SESSION['error'] = 'Nombre o contraseña incorrectos.';
		header('Location: ../Index.php');
		exit;

	}
	if ($filas == 1){	
		$tipoUsuario = $datos[1];  
		$_SESSION['nombre'] = $datos[0];
		$_SESSION['idEmpleado'] = $datos[2];
		$_SESSION['nombreUsuario'] = $usuario;
		$id = $datos[2];
		
		$descripcion = 'Usuario ingreso al sistema' . $_SERVER['REMOTE_ADDR'];

		switch ($tipoUsuario){
			case 1: 
				$time=time(); //hora del servidor
				$tiempoInicio = date("Y-m-d H:i:s", $time); 
				bitacora($id, $tiempoInicio, $descripcion);
				header('Location: ../modelos/permisoJefe.php');

				break;
			case 2:
				$time=time(); //hora del servidor
				$tiempoInicio = date("Y-m-d H:i:s", $time);
				bitacora($id, $tiempoInicio, $descripcion);
				header('Location: ../modelos/permisoJefeTemporal.php');
				break;
			case 3:
				$time=time(); //hora del servidor
				$tiempoInicio = date("Y-m-d H:i:s", $time);
				bitacora($id, $tiempoInicio, $descripcion);
				header('Location: ../modelos/permisoEmpleado.php');
				break;
			case 4:
				$time=time(); //hora del servidor
				$tiempoInicio = date("Y-m-d H:i:s", $time);
				bitacora($id, $tiempoInicio, $descripcion);
				header('Location: ../modelos/permisoPersonal.php');
				break;
			default:
				header('Location: ../Index.php');
				break;
		}
	}

	
?>