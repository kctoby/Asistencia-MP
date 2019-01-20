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
	      			<li><a href="../permisoJefe.php" title="Pagina principal"><img src="../../Imagenes/Inicio.png" height="35" ></a></li>
	      			<li><a href="../../procesamientos/proCerrar.php" title="Cerrar Cesi&oacute;n"><img src="../../Imagenes/cerrar.png" height="35" ></a></li>
	      		</ul>	
    		</div>
  		</div>
	</nav>


	<div class="container">
		<div class="main-row">
		<legend>Permisos Otorgados</legend>
			<table class="table table-striped table-hover ">
			  <thead>
			    <tr>
			      <th>Solicitante</th>
			      <th>Tipo de Permiso</th>
			      <th>Fecha de Solicitud</th>
			      <th>Fecha de Inicio</th>
			      <th>Fecha Fin</th>
			    </tr>
			  </thead>
			  <tbody id="cuerpoTabla">
			    
			  </tbody>
			</table> 
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

	<?php 
		include('../../procesamientos/jefe/proVerPermisosOtorgados.php');
	?>

</body>
</html>