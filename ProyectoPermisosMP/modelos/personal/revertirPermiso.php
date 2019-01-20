<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimum-scale=1.0">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../css/personalizado.css">
	<link rel="stylesheet" type="text/css" href="../../css/datepicker.css">

	<script src="../../js/jqueryDP.js"></script>
 	<script src="../../js/jquery-ui.js"></script>
 	<script src="../../js/dp-es.js" ></script>
	<script src="../../js/bootstrap.min.js"></script>
</head>
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
	      			
	      			<a href="#" data-toggle="modal" data-target="#modal-transparent" title="Ayuda"><img src="../../Imagenes/Ayuda.png" height="35" ></a>
	      			<a href="../permisoPersonal.php" title="Pagina principal"><img src="../../Imagenes/Inicio.png" height="35" ></a>
	      			<a href="../../procesamientos/proCerrar.php" title="Cerrar Cesi&oacute;n"><img src="../../Imagenes/cerrar.png" height="35" ></a>
	      		</ul>
	        		
	    	</div>
  		</div>
	</nav>

	<div class="container">
		<div class="main-row">
			<div class="col-lg-6 col-lg-offset-3">
				<legend>Revertir Permiso</legend>
				<p>Ingrese el nombre completo del empleado que solicit&oacute; el permiso</p>
				<div class="">
					<label class="label-baja" for="focusedInput">Nombre Empleado: </label>
					<input type="text" class="form-control" id="buscador" name="buscado" onkeypress="return isNumberKey(event)">
					<a href="#" onclick=" buscarUsuario()" class="buscar-baja"><img class="btn-lupa" src="../../Imagenes/Lupa.png" height="35" ></a>
						
					<label class="mensaje-rojo" id="errorBuscar"></label>
					<label  id="nombreEmpleado" class="usuarioBuscado"></label>
				</div>
			</div>	
		</div>	
	</div>

	<div class="container">
		<div class="main-row">
			<div class="col-lg-8 col-lg-offset-2">
				<ul class="list-group">
	  				<li class="list-group-item">
				    Cras justo odio
				    </li>
				    <li class="list-group-item">
				    Dapibus ac facilisis in
				  	</li>
				  	<li class="list-group-item">
				    Morbi leo risus
				  </li>
				</ul>
			</div>
		</div>
	</div>

	<div class="modal">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title">Seguro que quiere eliminar este Permiso</h4>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
	        <button type="button" class="btn btn-primary">Si</button>
	      </div>
	    </div>
	  </div>
	</div>

	<footer id="pie">
	  <div class="navbar navbar-down footer-down navbar-default  color-footer">
	    <div class="container">
	      <div class="row"> 
	        <div class="column-md-4">
	          	<p align="center">
					Ministerio P&uacute;blico, Rep&uacute;blica de Honduras 
				</p>
	        </div>  
	      </div>
	    </div>
	  </div>  
	</footer>


</body>
</html>