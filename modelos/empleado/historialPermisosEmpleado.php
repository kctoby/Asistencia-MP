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
	      			<li><a href="../permisoEmpleado.php" title="Pagina principal"><img src="../../Imagenes/Inicio.png" height="35" ></a></li>
	      			<li><a href="../../procesamientos/proCerrar.php" title="Cerrar Cesi&oacute;n"><img src="../../Imagenes/cerrar.png" height="35" ></a></li>
	      		</ul>	
    		</div>
  		</div>
	</nav>

	<div class="container" style="display:none;">
	<!-- Cuando es aceptado -->
		<div class="alert alert-dismissible alert-success">
  			<button type="button" class="close" data-dismiss="alert">&times;</button>
	  		<strong>Permiso Aceptado!</strong> </br>
	  		<a href="#" class="alert-link">Su permiso fue aprobado con &eacute;xito</a>.
		</div>

		<!-- Cuando es denegado -->
		<div class="alert alert-dismissible alert-danger">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>Permiso Denegado!</strong>  </br>
			<a href="#" class="alert-link">Su permiso no fue aprobado, intente de nuevo pronto!</a> 
		</div>
	</div>

	<div class="container">
		<table class="table table-striped table-hover ">
	  		<thead>
	    		<tr>
				    <th>Tipo de ausencia</th>
					<th>Fecha Solicitud</th>
					<th>Fecha Inicio</th>
					<th>Fecha Fin</th>
					<th>Veredicto</th>
	    		</tr>
	  		</thead>
	  		<tbody id="cuerpoTabla">
	    		
  			</tbody>
		</table> 	
	</div>


	</br></br>
	</br></br>
	</br></br>
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
	

	<?php include('../../procesamientos/empleado/proHistorialPermisoEmpleado.php');?>
</body>
</html>