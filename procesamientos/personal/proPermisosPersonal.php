<?php
	/*llena la lista de solicitudes de permiso. 
	creal los arreglos para la busqueda en permisoPersonal (datos, ausencias, ipPermiso)
	Usado en la pantalla permisoPersonal*/

	require '../conexion.php';

	$idEmpleado= $_SESSION['idEmpleado'];
	$conex = new Conexion();
	$conexion = $conex->conect();

	$sql= 'SELECT * FROM "PERMISOS".F_VER_PERMISOS_JPERSONAL($1)';
	$consulta = pg_query_params($conexion, $sql, array($idEmpleado));

	$numFilas = pg_num_rows($consulta);

	for($i=0;$i<$numFilas; $i++){
		//agregar el id de permiso
		$permisosPendientes[$i] = pg_fetch_result($consulta, $i, 'P_NOMBRE_EMPLEADO');    
		$tipoAusencia[$i] = pg_fetch_result($consulta, $i, 'P_TIPO_AUSENCIA');
		$idPermisos[$i] = pg_fetch_result($consulta, $i, 'P_ID_PERMISO');
	}

	$conex->cerrarConexion($conexion);
?>


<script type="text/javascript">
	var inicio =0;
	var datos = <?php echo json_encode($permisosPendientes );?> ;
	var ausencia = <?php echo json_encode($tipoAusencia);?> ;
	var idPermiso = <?php echo json_encode($idPermisos);?>;
	var padre = document.getElementById("lista");
	var numPermisos = datos.length;
	var numPaginas;

	if(numPermisos<=5){
		for(var i=0; i<5; i++ ){
			var remplazable = padre.getElementsByTagName("a")[i];
			var nElemento = document.createElement("a");		
			var nombre = datos[i], permiso = ausencia[i], numPermiso = idPermiso[i];
			numPermiso = numPermiso.concat('-');
			nombre = nombre.concat(' - ');
			mostrar = numPermiso.concat(nombre);
			mostrar = mostrar.concat(permiso);


			var contenido = document.createTextNode(mostrar);
			nElemento.appendChild(contenido); 
			nElemento.setAttribute("class","list-group-item")
			nElemento.setAttribute("href","personal/aceptarPermiso.php");
			nElemento.setAttribute("onClick", "tomarIdPermiso(this.innerHTML)");
			padre.insertBefore(nElemento,remplazable);
			padre.removeChild(remplazable);
		}
	}
	if(numPermisos>5){
		numPaginas = Math.ceil(numPermisos/5);
		var padrePagina = document.getElementById("paginas");
		document.getElementById("inicioPagina").setAttribute("class","");
		document.getElementById("inicioPagina").setAttribute("onClick","atras()");

		document.getElementById("finPagina").setAttribute("class","");
		document.getElementById("finPagina").setAttribute("onClick","adelante()");


		document.getElementById("primero").setAttribute("onClick","llenarPagina(this.innerHTML)");
		document.getElementById("primero").setAttribute("href","#");

		for(var p=2; p<numPaginas+1 ; p++){
			var nuevaPagina = document.createElement("li");
			var aContenido =document.createElement("a");
			var numero = document.createTextNode(p);
			aContenido.appendChild(numero);
			aContenido.setAttribute("onClick","llenarPagina(this.innerHTML)");
			aContenido.setAttribute("href","#");
			nuevaPagina.appendChild(aContenido);
			var anteriorPagina = document.getElementById("finPagina");
			padrePagina.insertBefore(nuevaPagina,anteriorPagina);
		}
		for(var i=0; i< 5; i++ ){
			var remplazable = padre.getElementsByTagName("a")[i];
			var nElemento = document.createElement("a");		
			var nombre = datos[i], permiso = ausencia[i],

			numPermiso = idPermiso[i];
			numPermiso = numPermiso.concat('-');
			nombre = nombre.concat(' - ');
			mostrar = numPermiso.concat(nombre);
			mostrar = mostrar.concat(permiso);
			
			var contenido = document.createTextNode(mostrar);
			nElemento.appendChild(contenido); 
			nElemento.setAttribute("class","list-group-item")
			nElemento.setAttribute("href","personal/aceptarPermiso.php");
			nElemento.setAttribute("onClick", "tomarIdPermiso(this.innerHTML)");
			padre.insertBefore(nElemento,remplazable);
			padre.removeChild(remplazable);
		}
	}
</script>