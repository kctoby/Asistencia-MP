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
 	<script src="../../js/dp-es.js" ></script>
	<script src="../../js/bootstrap.min.js"></script>

	<script src="../../js/personal/darBajaUsuario.js"></script>


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


	</br></br>

	<!-- <div class="container">
		<div class="main row">
			<div class="col-lg-6 col-lg-offset-3"> 
				<div class="alert alert-dismissible alert-success">
			  		<button type="button" class="close" data-dismiss="alert">&times;</button>
			  		<strong>Usuario Eliminado!</strong> </br>
			  		<a href="#" class="alert-link">El usuario se elimin&oacute; con &eacute;xito</a>.
				</div>
			</div>
		</div>
	</div>	 -->		

	<div class="container">
		<div class="main row">
			<div class="col-lg-4 contenedor-AP"> 
				<h3 align="center" class="tema">Dar de baja un Usuario</h3>
				<hr class="linea"/>
				<label class="instrucciones-AU">Busque el empleado que desea dar de baja.</label>
				<div class="contenedo-dar-baja">
					<form id="mdUsuario">
						<div class="buscador-baja">
							<label class="label-baja" for="focusedInput">Codigo de empleado: </label>
							<input type="text" class="form-control input-baja" id="buscador" name="buscado" onkeypress="return isNumberKey(event)">
							<a href="#" onclick="buscarId()" class="buscar-baja"><img class="btn-lupa" src="../../Imagenes/Lupa.png" height="35" ></a>
						</div>

						<label class="mensaje-rojo pregunta-nombre-baja" id="errorBuscador"></label>
						
						<div id="oculto" style="display:none;">
							<label class="pregunta-nombre-baja" id="modificable">¿Seguro que desea dar de baja a este usuario?</label>
							<label class="label-modif-AP pregunta-nombre-baja" id="modificable"></label>
							<div class="si-no-baja">
								<a href="#" class="btn btn-primary" style="width:50px;">No</a>	
								<a href="#" onclick="tomarBuscador()" style="width:50px;" class="btn btn-primary">Si</a>
							</div>
						</div>
					</form>
				</div>	
    		</div>		
		</div>
	</div>

	<!-- <div class="modal">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title">Dar de baja.</h4>
	      </div>
	      <form id="emUsuario">
	      <div class="modal-body">

	        <label class="control-label" for="focusedInput">ID de Empleado</label>
	  		<input class="form-control" id="focusedInput" type="text" value="Usuario">
	  		<label class="control-label" for="focusedInput">Nombre completo</label>
	  		<input class="form-control" id="focusedInput" type="text" value="Contrase&ntilde;a:">
	  		<br>		
	      </div>
	      <div class="modal-footer">
    			<button type="reset" class="btn btn-default">Cancel</button>
    			<button type="submit" class="btn btn-primary">Dar de Baja</button>
	      </div>
	     </form> 
	    </div>
	  </div>
	</div> -->


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