<?php
 /*muesta la lista de permisos con su id 
 usada en la pantalla de modificarPermiso*/
	require'../../conexion.php';

	$conex = new Conexion();
	$conexion = $conex->conect();
	$sql= ' SELECT * FROM "PERMISOS".F_LISTA_TIPOS_AUSENCIAS_CON_ID()';
	$consulta = pg_query_params($conexion,$sql, array());
	/*1.- ID_TIPO_AUSENCIA
	  2.- TIPO_AUSENCIA*/

	$numFilas = pg_num_rows($consulta);
	
	for($i= 0; $i<$numFilas; $i++ ){
		$tipoAusencia[$i] = pg_fetch_result($consulta, $i, 'TIPO_AUSENCIA');
		$idPermiso[$i] = pg_fetch_result($consulta, $i, 'ID_TIPO_AUSENCIA');
	}

	$conex->cerrarConexion($conexion);
?>

<script type="text/javascript">
	var tipoPermiso = <?php echo json_encode($tipoAusencia);?>;
	var idPermiso = <?php echo json_encode($idPermiso);?>;
	var padre = document.getElementById("lista");
	var numPermisos = tipoPermiso.length;

	//remplazar los nodos por defecto
	for(var i=0; i<5; i++ ){
		var remplazable = padre.getElementsByTagName("a")[i];
		var nElemento = document.createElement("a");		
		var permiso = tipoPermiso[i], id = idPermiso[i];
		id = id.concat('-');
		id = id.concat(permiso);

		var contenido = document.createTextNode(id);
		nElemento.appendChild(contenido); 
		nElemento.setAttribute("class","list-group-item")
		nElemento.setAttribute("href","#");
		nElemento.setAttribute("onClick", "tomarLista(this.innerHTML)");
		nElemento.setAttribute("data-toggle","modal");
		nElemento.setAttribute("data-target","#modal-buscar");
		padre.insertBefore(nElemento,remplazable);
		padre.removeChild(remplazable);
	}

	//crear nuevos nodos para mostrar
	for( var j=5; j< numPermisos; j++){
		var nElemento = document.createElement("a");		
		var permiso = tipoPermiso[j], id = idPermiso[j];
		id = id.concat('-');
		id = id.concat(permiso);

		var contenido = document.createTextNode(id);
		nElemento.appendChild(contenido); 
		nElemento.setAttribute("class","list-group-item")
		nElemento.setAttribute("href","#");
		nElemento.setAttribute("onClick", "tomarLista(this.innerHTML)");
		nElemento.setAttribute("data-toggle","modal");
		nElemento.setAttribute("data-target","#modal-buscar");
		padre.appendChild(nElemento);
	}
</script>