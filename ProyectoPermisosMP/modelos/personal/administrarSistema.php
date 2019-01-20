<?php include("../../seguridad.php"); ?>
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
	<script src="../../js/personal/administrarSistema.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$("form").submit(function(event){
				var error = document.getElementById("errorBuscar").innerHTML;
				var idEmpleado = document.getElementById("idEmpleado").value;
				if (error != ""){
					document.getElementById("errorSubmit").innerHTML= "Problemas con el codigo de empledo";
					event.preventDefault();
				}else if(idEmpleado == ""){
					document.getElementById("errorSubmit").innerHTML= "Debe Ingresar un id de empleado";
					event.preventDefault();
				}

			});
		});



	</script>


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

	<br><br>
	<br><br>

	<div class="container">
		</br></br>
		<div class="col-lg-7 col-lg-offset-5">
			<div class="dropdown">
          		<a 
          			href="#" 
          			class="dropdown-toggle btn btn-primary administrar-dd" 
          			data-toggle="dropdown" 
          			role="button" 
          			aria-expanded="false"
          		>Usuarios <span class="caret caret-dd"></span>
          		</a>
      			<ul class="dropdown-menu" role="menu">
            		<li><a href="#" data-toggle="modal" data-target="#modal-buscar">Crear</a></li>
            		<li><a href="modificarEmpleado.php">Modificar</a></li>
            		<li><a href="darBajaUsuario.php">Dar de baja</a></li>
          		</ul>
          	</div>
        </div>  		
	</div>

	<br>

	<div class="container">
		</br></br>
		<div class="col-lg-7 col-lg-offset-5">
          		<a href="#" class="dropdown-toggle btn btn-primary administrar-dd" 
          		data-toggle="dropdown" role="button" aria-expanded="false">Horarios <span class="caret caret-dd"></span></a>
      			<ul class="dropdown-menu" role="menu">
            		<li><a href="crearHorario.php">Crear</a></li>
            		<li><a href="modificarHorario.php">Modificar</a></li>
          		</ul>
        </div>  		
	</div>

	<br>

	<div class="container">
		</br></br>
		<div class="col-lg-7 col-lg-offset-5">
          		<a href="#" class="dropdown-toggle btn btn-primary administrar-dd" 
          		data-toggle="dropdown" role="button" aria-expanded="false">Permisos <span class="caret caret-dd"></span></a>
      			<ul class="dropdown-menu" role="menu">
            		<li><a href="crearPermiso.php">Crear</a></li>
            		<li><a href="modificarPermiso.php">Modificar</a></li>
          		</ul>
        </div>  		
	</div>

	<br><br><br><br>
	<br><br><br><br>

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


<!-- MODAL PARA BUSCAR UN EMPLEADO-  PARA CREAR EL USUARIO -->
<div class="modal modal-transparent fade " id="modal-buscar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  	<div class="modal-dialog">
	    	<div class="modal-content">
	      		<div class="modal-header">
	         		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
	         		<h4 class="modal-title" id="myModalLabel">Buscar Empleado</h4>
	         	</div>
				<div class="modal-body">
					<div class="container center">
						<form class="form-horizontal"  id="formModificar" method="POST" action="crearUsuario.php">
					  		<fieldset>
					  			<div>
		     			 			<div class="div-input-AU">
			     			 			<label class="control-label" for="focusedInput">C&oacute;digo del Empleado</label>
							  			<input class="form-control input-busca-AU" name="idBuscado" id="idEmpleado" type="text"onkeypress="return isNumberKey(event)" onkeyup="buscarUsuario(this.value)">
							  		</div>
						  			<label  class="mensaje-rojo" id="errorBuscar"></label>
						  			<br/>
						  			<label  id="nombreEmpleado" class="usuarioBuscado"></label>
						  		</div>

					  			<div class="form-group">
					      			<div class="col-lg-10 col-lg-offset-2">
					       				<button type="close" class="btn btn-default"  data-dismiss="modal">Cancelar</button>
					       				<button type="submit" class="btn btn-primary">Crear</button>
					   				</div>
					   				<label class="mensaje-rojo" id="errorSubmit"></label>
					   			</div>
					  		</fieldset>
					  	</form>
					</div>
				</div>
			</div>
		</div>
	</div>



</body>
</html>

