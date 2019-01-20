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
	<link rel="stylesheet" type="text/css" href="../../css/jquery-estilos.css">
	<script src="../../js/jqueryDP.js"></script>
 	<script src="../../js/jquery-ui.js"></script>
 	<script src="../../js/dp-es.js" ></script>
	<script src="../../js/bootstrap.min.js"></script>

	<script src="../../js/personal/modificarPermiso.js"></script>

	<script type="text/javascript">
		var encontrado;
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
	      			<a href="#" data-toggle="modal" data-target="#modal-ayuda" title="Ayuda"><img src="../../Imagenes/Ayuda.png" height="35" ></a>
	      			<a href="../permisoPErsonal.php" title="Pagina principal"><img src="../../Imagenes/Inicio.png" height="35" ></a>
	      			<a href="../../procesamientos/proCerrar.php" title="Cerrar Cesi&oacute;n"><img src="../../Imagenes/cerrar.png" height="35" ></a>
	      		</ul>
	        		
	    	</div>
  		</div>
	</nav>


	</br></br>

	<div class="container">
		<div class="main row"> 
				<div class="col-md-4 contenedor-AP">
					<h3 align="center" class="tema">Modificar Permiso</h3>
					<hr class="linea"/>
					<label class="instrucciones-AP">Seleccione el permiso a modificar:</label>
					<div class="buscador-AP">
						<label>Buscar permiso, por nombre:</label>
						<input type="text" class="form-control tam-buscar-AP" id="buscador" name="buscado" >
						<a href="#" onclick="verificarExistencia()"><img class="btn-lupa ubica-lupa-AP" src="../../Imagenes/Lupa.png" height="35" ></a>
						<label class="mensaje-rojo" id="errorBuscador"></label>
						
						<div id="oculto" class="modicar-AP" style="display:none;">
							<label class="label-modif-AP" id="modificable"></label>
							<a href="#" onclick="tomarBuscador()" data-toggle="modal" class="btn btn-primary btn-modif-AP" data-target="#modal-buscar">Modificar</a>
						</div>
					</div>

					<div id="lista" class="list-group lista-AP">
						<a href="#" class="list-group-item">-</a>
						<a href="#" class="list-group-item">-</a>
						<a href="#" class="list-group-item">-</a>
						<a href="#" class="list-group-item">-</a>
						<a href="#" class="list-group-item">-</a>
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

<!-- MODAL -->
	<div class="modal modal-transparent fade " id="modal-buscar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  	<div class="modal-dialog">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        			<h4 class="modal-title">Modifique los campos</h4>
			    </div>
	      		<div class="modal-body">
					<form class="form-horizontal"  id="formPermiso" method="POST" action="../../procesamientos/personal/proModificarPermiso.php" >

		      			<label class="control-label" for="focusedInput">Nombre del Tipo del Permiso</label>
		  				<input class="form-control" id="nombrePermiso" name="nombrePermiso" type="text" value="Ingrese Tipo de Horario">
		  				
		  				<br>
						<div class="checkbox">
		          			<label>
		            			<input type="checkbox" name="sueldo"> Goce de Sueldo
		          			</label>
		        		</div>
		  				
		  				<br>
		  				<div class="Tiempo">	
							<p> El permiso se da en:<select class="input-D/H form-control" name="Tiempo" id="select">
								<option>D&iacute;as</option>
								<option>Horas</option>
			   				</select></p>
						</div>
				
						<br>
		  				<label class="control-label" for="focusedInput">Tiempo M&aacute;ximo</label>
		  				<input class="form-control" id="cantidad" name="cantidad" type="text" placeholder="Cantidad" onkeypress="return isNumberKey(event)">         
  				<!-- FALTA AGREGAR QUE SOLO SEAN NUMEROS -->
  						<br>		
      
			      		<div class="modal-footer">
		    				<button type="reset" class="btn btn-default">Cancel</button>
		    				<button type="submit" class="btn btn-primary">Guardar</button>
			      		</div>
			      		<label class="mensaje-rojo" id="errorGuardar"></label>
			      	</form>
	    		</div>
	  		</div>
		</div>
	</div>



<!-- <div class="container">
		<div class="main row">
			<div class="col-lg-6 col-lg-offset-3"> 
				<div class="alert alert-dismissible alert-success">
			  		<button type="button" class="close" data-dismiss="alert">&times;</button>
			  		<strong>Permiso Modificado!</strong> </br>
			  		<a href="#" class="alert-link">El permiso se modifico con &eacute;xito</a>.
				</div>
			</div>
		</div>
	</div> -->	

<!-- MODAL AYUDA -->
	<div class="modal modal-transparent fade" id="modal-ayuda" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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


<?php include("../../procesamientos/personal/proListaTipoPermisos.php") ?>
<script type="text/javascript">
	var n = tipoPermiso.length;
	var arreglo= new Array();
	for(var i =0; i<n; i++){

		arreglo[i] = {label: tipoPermiso[i], id: idPermiso[i]};  
	}

</script>

</body>
</html>