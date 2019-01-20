<?php include("../../seguridad.php"); ?> 
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
	<script src="../../js/bootstrap.min.js"></script>

	<script type="text/javascript">


	$(document).ready(function(){
  			$("form").submit(function(event){
  				//alert("entra a la funcion");
  				opciones = document.getElementsByName("optionsRadios");
  				var descripcion = document.getElementById("textArea").value;
   
  				if(opciones[0].checked == false && opciones[1].checked == false ) {
  					//no seleccionado, mensaje y detenga el sumbmit
  						document.getElementById("mensajeError").innerHTML = " *Debe seleccionar una opción antes de enviar respuesta.";
  						event.preventDefault();
  						//alert("a");
  				}else if((opciones[1].checked == true) && (descripcion == "")){
  					document.getElementById("mensajeError").innerHTML = " *Al negar un permiso debe dar una justificación.";
  					event.preventDefault();
  					
  				}
  				
   	 		});
   	 	});

	</script>


</head>
<body>
	<nav class="navbar navbar-inverse">
  		<div class="container-fluid">
    		<div class="navbar-header">
    			<div class="logo">
    				<img class="imagenes-bloque" src="../../Imagenes/LogoMP.png" alt="" align="left" height="60">
    			</div>
    			<a class="navbar-brand header-pers"><p align="center">&nbsp;&nbsp;Sistema de Permisos, Ministerio P&uacute;blico</p></a>
    		</div>
      			
    		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      			<ul class="nav navbar-nav navbar-right">
	      			<li><a href="#" data-toggle="modal" data-target="#modal-transparent" title="Ayuda"><img src="../../Imagenes/Ayuda.png" height="35" ></a></li>
	      			<li><a href="../permisoPersonal.php" title="Pagina principal"><img src="../../Imagenes/Inicio.png" height="35" ></a></li>
	      			<li><a href="../../procesamientos/proCerrar.php" title="Cerrar Cesi&oacute;n"><img src="../../Imagenes/cerrar.png" height="35" ></a></li>
	      		</ul>	
    		</div>
  		</div>
	</nav>

	</br></br>

	<div class="container cuerpo-APJ">
		<section class="main row">
			<form class="section-APJ" method="POST" action="../../procesamientos/personal/proAceptarPermisoPersonal.php">
				<legend>Solicitud de Permiso</legend>
				<div class="form-group datos1-APJ">
						<dt>
							<dd>Nombre del Empleado:</dd>
								<dl id= "nombreEmpleado"></dl>	
							<dd>Tipo de Permiso:</dd>
								<dl id= "tipoPermiso"></dl>
							<dd>Motivo del Permiso:</dd>
								<dl><p id= "motivoPermiso"></p></dl>
							<dd>Fecha de solicitud:</dd>
								<dl id= "fechaSolicitud"></dl>
							<dd>Periodo de permiso:</dd>
								<dl><label id="fechaInicio"></label> &nbsp;&nbsp;al&nbsp;&nbsp; <label id="fechaFin"></label></dl>
							<dd>Jefe que aprobo el permiso:</dd>
								<dl><p id= "jefeAprobo"></p></dl>
							<dd>Fecha de aprovación del jefe:</dd>
								<dl><p id= "fechaAprobo"></p></dl>

						</dt>
			    </div>



			   
				<div class="form-group datos3-APJ">
					<div class="col-lg-8">
						<label>Opciones:</label>
				   		<div class="radio">
				   			<label>
				      			<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">Aceptar
				       		</label>
				   		</div>
				   		<div class="radio">
				   			<label>
			        			<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Rechazar
				        	</label>
				    	</div>
				  	</div>



					<div class="col-lg-8">
			    		<label>Justificación:</label>
			      		<textarea class="form-control"
			      					id="textArea" 
					        		name="justificacion"
					        		maxlength="100"></textarea>
			       		<span class="help-block">Justificación, porque se niega o acepta el permiso</span>
			    	</div>




		    		<div class="form-group">
			      		<div class="col-lg-8">
			      			<a href="../permisojefe.php" class="btn btn-primary">&nbsp;Cancelar&nbsp;</a>
			       			<button type="submit" class="btn btn-primary">Responder</button>
			   			</div>
			   			<label class="mensaje-rojo" id="mensajeError"></label>
			   		</div>
				</div>
			</form>
		</section>
	</div>

	<br/><br/><br/><br/>
	<br/><br/><br/>
	<br/><br/><br/>
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
	
	<?php 	include("../../procesamientos/personal/proMostrarPermiso.php"); ?>

</body>
</html>