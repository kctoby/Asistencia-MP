<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimum-scale=1.0">
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/personalizado.css">
	<!--<link rel="stylesheet" type="text/css" href="css/loginPersonalizado.css">-->


</head>
<body>
	<nav class="navbar navbar-inverse opciones-nav">
  		<div class="container-fluid">
    		<div class="navbar-header">
    			<div class="logo">
    				<img class="imagenes-bloque" src="Imagenes/LogoMP.png" alt="" align="left" height="60">
    			</div>
      			<a class="navbar-brand header-pers"><p align="center">&nbsp;&nbsp;Sistema de Permisos, Ministerio P&uacute;blico</p></a>
      			<div class="opciones">
      				<a href="#"><img class="imagenes-bloque" src="Imagenes/ayuda.png" data-toggle="modal" data-target="#modal-transparent" title= "Ayuda" height="35"></a>
      			</div>
    		</div>
  		</div>
	</nav>

	<div class="container">
		</br></br></br>
		<section class="main row">
			<form class="form-horizontal container" method="post" action="procesamientos/proIndex.php">
			 	<fieldset>
			  		<legend class="aaa">Ingreso</legend>
			  		<section class="col-md-6 col-md-offset-3" id="login">
			  			</br></br>
			    		<div class="form-group centrar-login">
			      			<div class="col-lg-10">
			        			<input type="text" class="form-control tamanio-input-login" name="usuario" placeholder="Ingresar Usuario">
			      			</div>
			    		</div>
			    		</br>
			    		<div class="form-group centrar-login">
			      			<div class="col-lg-10">
			        			<input type="password" class="form-control tamanio-input-login" name="contrasenia" placeholder="Contrase&ntilde;a">
			      			</div>
			    		</div>
			    		</br></br>
				    	<div class="form-group">
				      		<div class="col-lg-10 col-lg-offset-2" >
				        		<button type="submit" class="btn btn-primary mejora-boton-login" >Ingresar</button>
				      		</div>
				    	</div>

			    	</section>
			 	
			  	</fieldset>
			</form>
		</section>
	</div>
	<label class="error-ingreso">
		  <?php 
		  		//muestra un error si el usuario o contraseña es incorrecto
		  		session_start();
			  	if(isset($_SESSION['error'])) {
	          		echo $_SESSION['error'];
	          		session_destroy();
	          	}    
          ?>
	</label>




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
	         			<h3 class="encabezado-modal">Bienvenido</h3>
	         			<div class="col-lg-5">
		         			<p class="well well-lg contenido-modal">
		         				Este es el sistema de permisos del 
		         				Ministerio Publico. Para poder hacer 
		         				uso de él debe ingresar su nombre 
		         				de usuario y contraseña. Si no cuenta 
		         				con ninguno, contáctese con el 
		         				administrador del sistema.
	 						</p>
 						</div>
	         		</div>
	        	</div>
	    	</div>
		</div>
	</div>  
		
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>

		

</body>
</html>