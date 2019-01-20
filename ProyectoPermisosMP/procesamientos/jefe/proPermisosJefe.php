<?php
/*  1.-busca todos los permisos que estaran en la lista de solicitud de permiso.
	2.- Crea la paginacion necesaria para mostrar las solicitudes de permiso
	3.- llena la primera lista (pagina 1, segun paginacion)
	4.- crea los arreglos que se usan en el buscador (datos, ausencias, idPermiso)
*/

	require '../conexion.php';

	$idEmpleado= $_SESSION['idEmpleado'];

	$conex =new Conexion();
	$conexion = $conex->conect();

	$sql = 'SELECT * FROM "PERMISOS".F_VER_PERMISOS_JEFE_INM($1)';
	$consulta = pg_query_params($conexion, $sql, array($idEmpleado));
	$numFilas = pg_num_rows($consulta);

	/*Retorna:
		1.- P_ID_PERMISO
		2.- NOMBRE_COMPLETO
		3.- TIPO_AUSENCIA

	*/

	for($i=0; $i<$numFilas;$i++){
		$permisosPendientes[$i] = pg_fetch_result($consulta, $i, 'NOMBRE_COMPLETO' );
		$tipoAusencia[$i] = pg_fetch_result($consulta, $i, 'TIPO_AUSENCIA');
		$idPermiso[$i] = pg_fetch_result($consulta, $i, 'P_ID_PERMISO');
	}

	$conex->cerrarConexion($conexion);

?>

<script type="text/javascript">
	var inicio =0;
	var datos = <?php echo json_encode($permisosPendientes)?>;
	var ausencia = <?php echo json_encode($tipoAusencia );?> ;
	var idPermiso = <?php echo json_encode($idPermiso ); ?>;
	var padre = document.getElementById("lista");
	var numPermisos = datos.length;
	var numPaginas;

	/*si hay menos de 5 solicitudes, solo se remplazan elementos a por los que tengan los datos del permiso*/
	/*la paginacion se da por defecto, solo una pagina*/
	if(numPermisos<=5){
		for(var i=0; i<5; i++ ){
			var remplazable = padre.getElementsByTagName("a")[i];
			var nElemento = document.createElement("a");		
			var nombre = datos[i], permiso = ausencia[i],
			
			numPermiso = idPermiso[i],
			numPermiso = numPermiso.concat('-');
			nombre = nombre.concat(' - ');
			mostrar = numPermiso.concat(nombre);
			mostrar = mostrar.concat(permiso);

			var contenido = document.createTextNode(mostrar);
			nElemento.appendChild(contenido); 
			nElemento.setAttribute("class","list-group-item")
			nElemento.setAttribute("href","jefe/aceptarPermiso.php")

			nElemento.setAttribute("onClick", "tomarIdPermiso(this.innerHTML)");

			padre.insertBefore(nElemento,remplazable);
			padre.removeChild(remplazable);
		}
	}

	/*si hay mas de 5 permisos se crea la paginacion necesaria. Como el maximo de 
	datos permitidos en la lista es 5 se divide el numero de permisos entre 5 y 
	se toma el mayor entero*/

	if(numPermisos>5){
		//inicio de la creacion de la paginacion
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
		//fin de crear la paginacion

		//se llenan los primeros 5 datos de la lista
		for(var i=0; i< 5; i++ ){
			var remplazable = padre.getElementsByTagName("a")[i];
			var nElemento = document.createElement("a");		
			var nombre = datos[i], permiso = ausencia[i],


			numPermiso = idPermiso[i],
			numPermiso = numPermiso.concat('-');
			nombre = nombre.concat(' - ');
			mostrar = numPermiso.concat(nombre);
			mostrar = mostrar.concat(permiso);
			var contenido = document.createTextNode(mostrar);
			nElemento.appendChild(contenido); 
			nElemento.setAttribute("class","list-group-item")
			nElemento.setAttribute("href","jefe/aceptarPermiso.php")

			nElemento.setAttribute("onClick", "tomarIdPermiso(this.innerHTML)");

			padre.insertBefore(nElemento,remplazable);
			padre.removeChild(remplazable);
		}
	}
</script>

