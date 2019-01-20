<?php  include("../../seguridad.php");

	/*formulario para la creacion de un usuario, recupera el id de empleado, 
	el cual se consigue en administrar sistema*/
	require '../../conexion.php';

	$idEmpleado = $_POST['idBuscado'];

	$conex = new Conexion();
	$conexion = $conex->conect();
	$sql = 'SELECT * FROM "PERMISOS".F_VERIFICAR_ASIGNACION_NOMUSR($1);';
	$consulta = pg_query_params($conexion, $sql, array($idEmpleado));

	$nombreEmpleado = pg_fetch_result($consulta, 0, 'P_NOMBRE_APELLIDO');

	$conex->cerrarConexion($conexion); 
?> 
<!DOCTYPE html> 
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimum-scale=1.0">
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="../../css/bootstrap.min.css">	
	<link rel="stylesheet" type="text/css" href="../../css/personalizado.css">
	
	<script src="../../js/jqueryDP.js"></script>
 	<script src="../../js/jquery-ui.js"></script>
 	<script src="../../js/dp-es.js" ></script>
	<script src="../../js/bootstrap.min.js"></script>
	<script src="../../js/personal/crearUsuario.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$("form").submit(function(event){
				var nombreUsuario = document.getElementById("nombreUsuario").value;
				var contrasenia1 = document.getElementById("password1").value;
				var contrasenia2 = document.getElementById("password2").value;

				var mensajeError2 = document.getElementById("errorUsuario").innerHTML;
				var mensajeError3 = document.getElementById("errorLogitud").innerHTML;
				var mensajeError4 = document.getElementById("errorContrasenia").innerHTML;

				if((nombreUsuario=="") || (contrasenia1 =="") || (contrasenia2 =="")){
					document.getElementById("errorGuardar").innerHTML = "No deben haber campos vacios";
					event.preventDefault();
				}if ((mensajeError2 != "")||(mensajeError3 != "")||(mensajeError4 != "")){
					document.getElementById("errorGuardar").innerHTML = "Hay algun error en el formulario.";
					event.preventDefault();
				}else{
					var idEnviar = <?php echo json_encode($idEmpleado);?>;
					document.cookie ='idBuscar='+ idEnviar +'; expires=Thu, 2 Aug 2050 20:47:11 UTC; path=/';
					//alert("guardo la cookie");
					//event.preventDefault();
				}
				//event.preventDefault();
			});
		});
	</script>


</head>
<body>

<body>
	<nav class="navbar navbar-inverse opciones-nav">
  		<div class="container-fluid">
    		<div class="navbar-header">
    			<div class="logo">
    				<img class="imagenes-bloque" src="../../Imagenes/LogoMP.png" alt="" align="left" height="60">
    			</div>
    			<a class="navbar-brand header-pers"><p align="center">&nbsp;&nbsp;Sistema de Permisos, Ministerio P&uacute;blico</p></a>
    		</div>

	    	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
	      		<ul class="nav navbar-nav navbar-right">
	      			<br>
	      			<a href="administrarSistema.php" title="volver atras"><img src="../../Imagenes/Volver.png" height="35"></a>
	      			<a href="#" data-toggle="modal" data-target="#modal-transparent" title="Ayuda"><img src="../../Imagenes/Ayuda.png" height="35" ></a>
	      			<a href="../permisoPErsonal.php" title="Pagina principal"><img src="../../Imagenes/Inicio.png" height="35" ></a>
	      			<a href="../../procesamientos/proCerrar.php" title="Cerrar Cesi&oacute;n"><img src="../../Imagenes/cerrar.png" height="35" ></a>
	      		</ul>
	        		
	    	</div>
  		</div>
	</nav>


	<br>

	<div class="container">
		<div class="main row">
			<div class="col-lg-4 col-lg-offset-4"> 
				<form class="form-horizontal" id="CrUsuario"  method="POST" action="../../procesamientos/personal/proCrearUsuario.php">
		  			<fieldset>
		    			<legend>Crear Usuario</legend>
		    			<div class="form-group">
		     			 	<div class="form-group">
		     			 		
		     			 		<dt>
						  			<dd>Código de empleado:</dd>
						  				<dl id="idEmpleado" name="idEmpleado" class="usuarioBuscado"></dl>
						  		</dt>

						  		<dt>
						  			<dd>Nombre del empleado:</dd>
						  				<dl id="nombreEmpleado" class="usuarioBuscado"><?php echo $nombreEmpleado; ?></dl>
						  		</dt>
						  		
						  		<div>	
			    					<p><strong> Tipo Empleado </strong> <select class="form-control" name="tipoEmpleado" id="selectEmpleado">
         								<option id="primerTipoEmpleado"></option>
							   		</select></p>
								</div>
								<br/>
				          		<div>	
			    					<p> <strong>Tipo Horario </strong> <select class="form-control" name="tipoHorario" id="selectHorario">
         								<option id="primerTipoHorario"></option>
							   		</select></p>
								</div>
						  		<label class="control-label" for="focusedInput">Nombre Usuario</label>
						  		<input class="form-control" id="nombreUsuario" name="nombreUsuario" type="text" onblur="usuarioRepetido(this.value)">
						  		<label class="mensaje-rojo" id="errorUsuario"></label>
						  			<br/>
						  		<label class="control-label" for="focusedInput">Contrase&ntilde;a:</label>
						  		<input class="form-control" id="password1"  name="password" type="password" onblur="longitudContrasenia(this.value)">
						  		<label class="mensaje-rojo" id="errorLogitud"></label>
						  			<br/>
						  		<label class="control-label" for="focusedInput">Confirmar Contrase&ntilde;a:</label>
	  							<input class="form-control" id="password2" type="password" onkeyup="validarContrasenia()">
						  		<label class="mensaje-rojo" id="errorContrasenia"></label>
							</div>
		    			</div>

			    		<div class="form-group">
			      			<div class="col-lg-10 col-lg-offset-2">

			        			<a href="administrarSistema.php" class="btn btn-default">Cancelar</a>
			        			<button type="submit" class="btn btn-primary">Guardar</button>
			        			<label class="mensaje-rojo" id="errorGuardar"></label>
		    			  </div>
		    			</div>
		  			</fieldset>
				</form>
			</div>	
		</div>
	</div>


	

<footer id="pie">
 	<div class="navbar navbar-down footer-down navbar-default  color-footer">
    	<div class="container">
      		<div class="row"> 
        		<div class="column-md-4">
          			<p align="center" class="footer-contenido">
						Ministerio P&uacute;blico, Rep&uacute;blica de Honduras 
					</p>
        		</div>  
      		</div>
    	</div>
  	</div>  
</footer>


<div class="modal modal-transparent fade" id="modal-transparent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  	<div class="modal-dialog">
	    	<div class="modal-content">
	      		<div class="modal-header">
	         		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
	         		<h4 class="modal-title" id="myModalLabel">Ayuda</h4>
      			</div>
      			<div class="modal-body">
        			<div class="container center">
	         			<h3 class="encabezado-modal">
	         				Hola 
	         				<?php
								//mostrar el nombre de usuario que ingreso 
								$usuario =$_SESSION['nombre'];
				 				echo $usuario;
							?>
	         			</h3>
	         			<div class="col-lg-5">
		         			<p class="well well-lg contenido-modal">
		         				AYUDA PARA EL USUARIO...
	 						</p>
 						</div>
	         		</div>
	        	</div>
	    	</div>
		</div>
	</div>


<?php 
	include("../../procesamientos/personal/proListaHorario.php");
	include("../../procesamientos/personal/proListaTipoUsuario.php");
?>

<script type="text/javascript">
	var NodoIdEmpleado = <?php echo json_encode($idEmpleado);?>;
	var nodo = document.createTextNode(NodoIdEmpleado);
	document.getElementById('idEmpleado').appendChild(nodo);


	var tipoHorario = <?php echo json_encode($tipoHorario);?>;
	var num = listaTipoUsuario.length;
	var padre = document.getElementById("selectHorario");

	//para el primer dato, que remplace el contenido del primer option
	var primero = document.getElementById("primerTipoHorario");
	var mostrar = tipoHorario[0];
	var  contenido = document.createTextNode(mostrar);
	primero.appendChild(contenido);

	for(var i = 1 ; i<=num ;i++){
		//comienza en dos, para que no se muestre jefe temporal
		var nuevoElemento = document.createElement("option"); 
		var mostrar = tipoHorario[i];
		var contenido = document.createTextNode(mostrar);
  		nuevoElemento.appendChild(contenido);
  		padre.insertBefore(nuevoElemento, primero);
	}

</script>
</body>
</html>
