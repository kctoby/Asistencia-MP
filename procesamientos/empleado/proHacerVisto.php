<?php
/*hace que un permiso se le de el valor visto en la base de datos, para ya no ser mostrado*/
$idPermiso= $_COOKIE["variableID"];
$visto='TRUE';

require '../../conexion.php';
$conex = new Conexion();
$conexion = $conex->conect();
$sql= 'SELECT * FROM "PERMISOS".F_ACT_PERMISO_CVISTO($1, $2)';

$consulta = pg_query_params($conexion, $sql, array($idPermiso,$visto));

$conex->cerrarConexion($conexion);



?>