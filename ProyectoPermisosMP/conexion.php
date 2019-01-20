<?php
	class Conexion{
		function __construct(){			
		}

		public function conect(){
			$cadena="host='localhost' port='5432' dbname='BD_PERMISOS' user='PERMISOS' password='permisos.MP'";
			$conexion= pg_connect($cadena) or die("ERROR EN LA CONEXION :( ");

			if(!$conexion){
				echo 'fallo la conexion';
				exit;
			}
			else{
				//echo 'conexion exitosa';
			}

			return $conexion;
		}

		public function cerrarConexion($conex){
			$conex.pg_close();	

		}

	}

?>