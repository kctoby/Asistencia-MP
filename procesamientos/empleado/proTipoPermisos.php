<?php
	/*muestra la lista de tipos de permiso, en el formulario para pedir permiso*/

  //require '../../conexion.php';
	$conex = new Conexion();
	$conexion = $conex->conect();
	$sql= ' SELECT * FROM "PERMISOS".F_LISTA_TIPOS_AUSENCIAS()';
	$consulta = pg_query_params($conexion,$sql, array());
	$numFilas = pg_num_rows($consulta);

  /*
    1 P_TIPO_AUSENCIA 
    2 P_TIEMPO_MAXIMO_DIAS
    3 P_TIEMPO_MAXIMO_HORAS
    4 P_GUIA_HD    si el permiso es en DIAS o HORAS
  */
	
	for($i= 0; $i<$numFilas; $i++ ){
		$tipoAusencia[$i] = pg_fetch_result($consulta, $i, 'P_TIPO_AUSENCIA');
    $CantidadDias[$i] = pg_fetch_result($consulta, $i, 'P_TIEMPO_MAXIMO_DIAS');
    $CantidadHoras[$i] = pg_fetch_result($consulta, $i, 'P_TIEMPO_MAXIMO_HORAS');
    $guiaHD[$i] = pg_fetch_result($consulta, $i, 'P_GUIA_HD');
	}
	$conex->cerrarConexion($conexion);
    
  //crear una sola cadena para enviar a javascript y llenar las option del select
  for($i=0; $i<$numFilas; $i++){
    $str = $tipoAusencia[$i];
    if($guiaHD[$i] === "DIAS"){
      $str = $str . ' MAX(' .$CantidadDias[$i] . ' ' . $guiaHD[$i] . ')'; 
    }
    if($guiaHD[$i] === "HORAS"){
      $str = $str . ' MAX(' .$CantidadHoras[$i] . ' ' . $guiaHD[$i] . ')';
    }

    $ausencia[$i] = $str;
  }

  //echo $ausencia[0];

  ?>


  <script type="text/javascript">
  	var ausencias = <?php echo json_encode($ausencia); ?>;
  	var numAusencias = ausencias.length;
  	var padre= document.getElementById('ausencias');

  	var primero=document.getElementById('primerTipoPermiso');
  	var mostrar = ausencias[0];
  	var contenido = document.createTextNode(mostrar);
  	primero.appendChild(contenido);

  	for(var i = 1; i < numAusencias ; i++){
  		var nuevoElemento = document.createElement("option");
  		var mostrar = ausencias[i];
  		var contenido = document.createTextNode(mostrar);
  		nuevoElemento.appendChild(contenido);
  		padre.insertBefore(nuevoElemento, primero);
  	}
  </script>
