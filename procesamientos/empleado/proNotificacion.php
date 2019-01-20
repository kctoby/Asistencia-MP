<?php
	/*muestra las notificaciones de permisos, si se acepto o se denego*/
	require '../conexion.php';

	$idEmpleado= $_SESSION['idEmpleado'];
	$conex = new Conexion();
	$conexion = $conex->conect();
	$sql='SELECT * FROM "PERMISOS".F_VER_PERMISOS_APR_DNG($1)';
	$consulta = pg_query_params($conexion,$sql,array($idEmpleado));
	$numFilas = pg_num_rows($consulta);

	if($numFilas==0){
		$confirma = 0; //confirma sirve para saber cuando hay notificaciones 0:no hay , 1: hay notificaciones
	}else{
		$confirma=1;
		for($i=0; $i<$numFilas; $i++){
			$idPermiso[$i] = pg_fetch_result($consulta, $i,'P_ID_PERMISO');
			$tipoAusencia[$i] = pg_fetch_result($consulta, $i, 'P_TIPO_AUSENCIA');
			$veredicto[$i] = pg_fetch_result($consulta, $i, 'P_VEREDICTO');
		}
	}

	/*	
		P_ID_PERMISO INTEGER
		P_TIPO_AUSENCIA
		P_FECHA_SOLICITUD 
		P_FECHA_INICIO
		P_FECHA_FIN 
		P_VEREDICTO
	*/

?>

<script type="text/javascript">
var confirma = <?php echo $confirma;?>;

if (confirma == 0){
	//no hay notificaciones, mostrar imagen por no nitificacion
	document.getElementById("img-notificacion").setAttribute("src","../Imagenes/Notifiaciones.png");
}
else if (confirma == 1){
	//hay notificaciones 
	document.getElementById("img-notificacion").setAttribute("src","../Imagenes/NotifiacionesActiva.png");

	var idPermiso = <?php echo json_encode($idPermiso);?>;
	var tipoAusencia = <?php echo json_encode($tipoAusencia); ?>;
	var veredicto = <?php echo json_encode($veredicto);?>;
	var numDatos = idPermiso.length;
	var padre = document.getElementById('notificacion');
	for (var i = 0 ; i< numDatos ; i++){
		var mostrar = idPermiso[i];
		mostrar = mostrar.concat('-');
		mostrar = mostrar.concat(tipoAusencia[i]);
		mostrar = mostrar.concat('-');
		mostrar = mostrar.concat(veredicto[i]);
		var contenido = document.createTextNode(mostrar);
		
		nElemento= document.createElement('li');
		nuevoA= document.createElement('a');
		nuevoA.setAttribute('href', '../procesamientos/empleado/proHacerVisto.php'); //al historial
		nuevoA.setAttribute('onclick','enviarNotificacion(this.innerHTML)'); 
		nuevoA.appendChild(contenido);
		nElemento.appendChild(nuevoA);
		if (i==0){
			//remplazando el nodo por defecto
			remplazable = document.getElementById('porDefecto');
			padre.replaceChild(nElemento,remplazable);
		}else{
			padre.appendChild(nElemento);
		}
	}  
}
</script>