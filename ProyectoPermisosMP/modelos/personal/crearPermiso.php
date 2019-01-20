<?php  include("../../seguridad.php"); ?>
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

	<script src="../../js/personal/crearPermiso.js"></script>

	<script type="text/javascript">
	//validar campos
	$(document).ready(function(){
		$("form").submit(function(event){
			var nombre = document.getElementById("nombrePermiso").value;
			var cantidad = document.getElementById("cantidad").value;
			var error1 = document.getElementById("mensaje-repetido").innerHTML;

			if ((nombre == "") || (cantidad == "")){
				document.getElementById("errorGuardar").innerHTML = "No deben haber campos vacios";
				event.preventDefault();
			}
			if(error1 != ""){
				document.getElementById("errorGuardar").innerHTML = "Existe algun error en el formulario.";
				event.preventDefault();
			}else{}

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
				<form class="form-horizontal" id="CrPermiso" method="POST" action="../../procesamientos/personal/proCrearPermiso.php">
		  			<fieldset>
		    			<legend>Crear Permiso</legend>
		    			<div class="form-group">
		     			 	<div class="form-group">
		     			 		<label class="control-label" for="focusedInput">Nombre del Tipo del Permiso</label>
						  		<input class="form-control" id="nombrePermiso" name="nombrePermiso" type="text" placeholder="Ingrese Tipo de Permiso" onkeyup="permisoRepetido(this.value)">
						  		<label class="mensaje-rojo" id="mensaje-repetido" ></label>	
						  		<br>
						  		<div class="goseSueldo">	
			    					<p> Goce de Sueldo <select class="form-control" name="goseSueldo" id="select">
	     								<option>Si</option>
	      								<option>No</option>
							   		</select></p>
								</div>
						  		<br>

						  		<div class="option">

									<p> El permiso se da en: <select class="form-control" name="tipoUnidad" id="select">
											<option>D&iacute;as</option>
											<option>Horas</option>
								   		</select></p>
									</div>

			    					<label class="control-label" for="focusedInput">Tiempo M&aacute;ximo</label>
	  								<input class="form-control" id="cantidad" name="cantidad" type="text" placeholder="Ingrese una cantidad" onkeypress="return isNumberKey(event)">
									<p>*Agregue una cantidad de tiempo</p>
						  		<br>
							</div>
		    			</div>

			    		<div class="form-group">
			      			<div class="col-lg-10 col-lg-offset-2">
			        			<button type="reset" class="btn btn-default">Cancel</button>
			        			<button type="submit" class="btn btn-primary">Crear</button>
		    			  </div>
		    			  <label class="mensaje-rojo" id="errorGuardar"></label>
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



</body>
</html>
