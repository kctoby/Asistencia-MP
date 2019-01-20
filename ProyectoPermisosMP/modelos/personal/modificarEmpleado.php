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

	<script src="../../js/personal/modificarUsuario.js"></script>




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
	      			<a href="../permisoPersonal.php" title="Pagina principal"><img src="../../Imagenes/Inicio.png" height="35" ></a>
	      			<a href="../../procesamientos/proCerrar.php" title="Cerrar Cesi&oacute;n"><img src="../../Imagenes/cerrar.png" height="35" ></a>
	      		</ul>
	        		
	    	</div>
  		</div>
	</nav>


	</br></br>

	<!-- <div class="container">
		<div class="main row">
			<div class="col-lg-6 col-lg-offset-3"> 
				<div class="alert alert-dismissible alert-success">
			  		<button type="button" class="close" data-dismiss="alert">&times;</button>
			  		<strong>Usuario Modificado!</strong> </br>
			  		<a href="#" class="alert-link">El usuario se modifico con &eacute;xito</a>.
				</div>
			</div>
		</div>
	</div> -->			

	<div class="container">
		<div class="main row">
			<div class="col-lg-4 contenedor-AP"> 
				<h3 align="center" class="tema">Modificar Usuario</h3>
				<hr class="linea"/>
				<label class="instrucciones-AU">Busque el empleado que desea modificar.</label>
				<div class="contenedo-dar-baja">
					<form id="mdUsuario">
						<div class="buscador-baja">
							<label class="label-baja" for="focusedInput">Codigo de empleado: </label>
							<input type="text" class="form-control input-baja" id="buscador" name="buscado" onkeypress="return isNumberKey(event)">
							<a href="#" onclick=" buscarUsuario()" class="buscar-baja"><img class="btn-lupa" src="../../Imagenes/Lupa.png" height="35" ></a>
						
							<label class="mensaje-rojo" id="errorBuscar"></label>
							<label  id="nombreEmpleado" class="usuarioBuscado"></label>
						</div>

						<label class="mensaje-rojo pregunta-nombre-baja" id="errorBuscador"></label>
						
						<div id="oculto" style="display:none;" class="contenedor-dropdown">
							<div class="container">
								</br></br>
								<div class="">
									<div class="dropdown">
		          						<a 	href="#" 
						          			class="btn btn-default dropdown-toggle" 
						          			data-toggle="dropdown" 
						          			role="button" 
						          			aria-expanded="false">¿Qué desea modificar? <span class="caret"></span>
						          		</a>
		      							<ul class="dropdown-menu" role="menu">
						            		<li><a href="#" data-toggle="modal" data-target="#modalContrasenia">Cambiar Contraseña</a></li>
						            		<li><a href="#" data-toggle="modal" data-target="#modalHorario">Modificar Horarios</a></li>
						          		</ul>
						          	</div>
        						</div>  		
							</div>
						</div>
					</form>
				</div>	
    		</div>		
		</div>
	</div>



	<!--MODALS-->
	<div class="modal" id="modalContrasenia">
	  	<div class="modal-dialog">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        		<h4 class="modal-title">Modifique los campos</h4>
	     		</div>
	      		<div class="modal-body">
	      			<form id="formContrasenia" method="POST" action="../../procesamientos/personal/proModificarUsuarioContrasenia.php">
				        <label class="control-label" for="focusedInput">Nueva Contrase&ntilde;a</label>
				  		<input class="form-control" id="password1"  name="password" type="password" onblur="longitudContrasenia(this.value)">
				  		<label class="mensaje-rojo" id="errorLogitud"></label>
				  		<br>
				  		<label class="control-label" for="focusedInput">Contrase&ntilde;a:</label>
		  				<input class="form-control" id="password2" type="password" onkeyup="validarContrasenia()">
				  		<label class="mensaje-rojo" id="errorContrasenia"></label>

				  		<input type="hidden" id="idEmpleadoModificar" name="idEmpleadoModificar"></input>

				  		<br>
				  		<div class="modal-footer">
    						<button type="reset" class="btn btn-default">Cancel</button>
    						<button type="submit" class="btn btn-primary">Guardar</button>
	      				</div>
	      				<label class="mensaje-rojo" id="mensajeError"></label>
			  		</form>		
	      		</div>
	      		
	    	</div>
	  	</div>
	</div>


	<div class="modal" id="modalHorario">
	  	<div class="modal-dialog">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        		<h4 class="modal-title">Modifique los campos</h4>
	     		</div>
	      		<div class="modal-body">
	      			
				        <label class="control-label" for="focusedInput">Elija una opción</label>
				        <div class="radio check-dias">	
				        	<label>						
						    	<input type="radio" name="optionsRadios" id="optionsRadios1" onclick="nuevo()">
						    	Agregar Nuevo Horario
						  	</label>
						</div>
						<div class="radio check-dias">
						  	<label>
						    	<input type="radio" name="optionsRadios" id="optionsRadios2" onclick="remplazar()">
						    	Remplazar horario
						  	</label>
						</div>
						<div class="radio check-dias">
						  	<label>
						    	<input type="radio" name="optionsRadios" id="optionsRadios3" onclick="eliminar()">
						    	Eliminar horario
						  	</label>
						</div>		
				  		


				  		<!-- +++++++++++++++PARA AGREGAR NUEVO HORARIO++++++++++++++++++ -->
				  		<div id="ocultoNuevo" style="display:none;">
				  			<form id="nuevo" method="POST" action="modificarHorario/nuevoHorario.php">
							   	<input type="hidden" id="idEmpleadoModificar2" name="idEmpleadoModificar2"></input>
				  				<button type="reset" class="btn btn-default">Cancel</button>
    							<button type="submit" class="btn btn-primary">Aceptar</button>
				  			</form>
				  		</div>

				  		<!-- +++++++++++++++PARA MODIFICAR UN HORARIO++++++++++++++++++ -->
				  		<div id="ocultoRemplazar" style="display:none;">
				  			<form id="remplazar" method="POST" action="">

				  				<input type="hidden" id="idEmpleadoModificar3" name="idEmpleadoModificar3"></input>
				  				<button type="reset" class="btn btn-default">Cancel</button>
    							<button type="submit" class="btn btn-primary">Guardar</button>
				  			</form>
				  		</div>

				  		<!-- +++++++++++++++PARA ELIMINAR HORARIO++++++++++++++++++ -->
				  		<div id="ocultoEliminar" style="display:none;">
				  			<form id="eliminar" method="POST" action="">

				  				<input type="hidden" id="idEmpleadoModificar4" name="idEmpleadoModificar4"></input>
				  				<button type="reset" class="btn btn-default">Cancel</button>
    							<button type="submit" class="btn btn-primary">Guardar</button>
				  			</form>
				  		</div>

				  		<br>
	      				<label class="mensaje-rojo" id="mensajeError"></label>
			  		</form>		
	      		</div>
	      		
	    	</div>
	  	</div>
	</div>




	</br>
	</br>
	</br>

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

</body>
</html>