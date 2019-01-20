<?php include("../seguridad.php"); ?> 
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimum-scale=1.0">
	
	<script src="../js/jqueryDP.js"></script>
 	<script src="../js/jquery-ui.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/jefe/paginacion.js"></script>


	<script type="text/javascript">
	var encontrado;
		function tomarIdPermiso(e){
			var limite = e.indexOf("-");
			var idPermisoEnviar = e.slice(0, limite);
			document.cookie ='variable='+ idPermisoEnviar +'; expires=Thu, 2 Aug 2050 20:47:11 UTC; path=/';
		}

		$(document).ready(buscar);
   		function buscar(){
      		$("#buscador").autocomplete({source: arreglo,
      			select: function(event, ui) {
        			//ui.item.label; // display the selected text
       		    	encontrado = ui.item.id; // save selected id to hidden input
    			}
    		});
   		}

   		function enviarIdEncotrado(){
			document.cookie = 'variable=' + encontrado +'; expires=Thu, 2 Aug 2050 20:47:11 UTC; path=/';
		}

	</script>

			

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="../css/bootstrap.min.css">	
	<link rel="stylesheet" type="text/css" href="../css/personalizado.css">
	<link rel="stylesheet" type="text/css" href="../css/jquery-estilos.css">

</head>
<body>
	<nav class="navbar navbar-inverse">
	 	<div class="container-fluid">
	    	<div class="navbar-header">
	    		<div class="logo">
	      			<img class="imagenes-bloque" src="../Imagenes/LogoMP.png" alt="" align="left" height="60">
	      		</div>
	      	<a class="navbar-brand header-pers" href="#"><p align="center">&nbsp;&nbsp;Sistema de Permisos, Ministerio P&uacute;blico</p></a>
	    </div>

	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
	      	<ul class="nav navbar-nav navbar-right">
	      		<li><a href="#" title="Noticaci&oacute;n"><img src="../Imagenes/Notifiaciones.png" height="35" ></a></li>
	      		<li><a href="#" data-toggle="modal" data-target="#modal-transparent" title="Ayuda"><img src="../Imagenes/Ayuda.png" height="35" ></a></li>
	      		<li><a href="../procesamientos/proCerrar.php" title="Cerrar Cesi&oacute;n"><img src="../Imagenes/cerrar.png" height="35" ></a></li>        	
	      </ul>
	    </div>
	  </div>
	</nav>


	<div id="informacion" class="nombre-empleado">
		<div class="col-lg-4 col-lg-offset-8">
	  		<div class="list-group-item">
		    	<p class="list-group-item-text" align="center">
					<?php 
						$usuario =$_SESSION['nombre'];
					 	echo $usuario;
				 	?>
		    	</p>
			</div>
		</div>
	</div>

	<label class="alerta-roja" id="mensajeRojo">
		<?php
			if(!isset($_SESSION['mensaje'])){
				echo "";
			}else{
				echo $_SESSION['mensaje'];
				$_SESSION['mensaje']="";
			}
		?>
	</label>

	<div class="container">
		<section class="main row">
			<div class="col-md-8 opciones-PP">
				</br></br></br>
				<section class="main row">
					<form class="form-horizontal">
  						<legend>Permiso</legend>
    					</br></br>
    					<!--<div class="form-group" align="center">-->
	    				<div class="form-group" align="center">
		    				</br></br>
		    				</br></br>
	      					<div class="col-lg-8 posicion-botones-JE" >
					      		<a href="jefe/verPermisosOtorgados.php" class="btn btn-primary tam-boton-PP">Ver Permiso Otorgados</a>
					      		</br></br>
					      		<a href="jefe/delegarFuncion.php" class="btn btn-primary tam-boton-PP">Delegar funci&oacute;n</a>
					      		</br></br>
				      		</div>
				      		</br></br>
	    				</div>
					</form>
					</br></br>
				</section>
			</div>
			</br></br></br>
			</br></br>
		
	  		<div class="col-md-4 lista-permiso-PP">
	  			<h3 align="center" class="tema">Solicitudes de Permiso</h3>
				<hr class="linea"/>
				<div>
					<label>Buscar permiso, por nombre:</label>
					<input type="text" class="form-control tam-buscar" id="buscador" name="buscado" >
					<a href="../procesamientos/jefe/proBuscarPermiso.php" onclick="enviarIdEncotrado()"><img class="btn-lupa ubica-lupa" src="../Imagenes/Lupa.png" height="35"></a>
				</div>


				<div id="lista" class="list-group lista-PP">
			   		<!--<a href="#" class="list-group-item active">Solicitud de permiso</a>Boton-->
					<a href="#" class="list-group-item">-</a>
					<a href="#" class="list-group-item">-</a>
					<a href="#" class="list-group-item">-</a>
					<a href="#" class="list-group-item">-</a>
					<a href="#" class="list-group-item">-</a>
				</div>

				<div class="paginacion-PP">
				<nav aria-label="...">
					<ul id="paginas" class="pagination" data-toggle="buttons">
					  	<li id="inicioPagina" class="disabled"><a href="#">&laquo;</a></li>
					  	<li><a id="primero">1</a></li>
					  	<li id="finPagina" class="disabled"><a href="#">&raquo;</a></li>
					</ul>
				</nav>
				</div>
			</div>	
		</section>
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
	         				Bienvenido  
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

	<?php 
		include("../procesamientos/jefe/proPermisosJefe.php");
	?>

	<script type="text/javascript">
		var n = datos.length;
		var arreglo= new Array();
		for(var i =0; i<n; i++){

			arreglo[i] = {label: datos[i], id: idPermiso[i]};  
		}

</script>

</body>
</html>
