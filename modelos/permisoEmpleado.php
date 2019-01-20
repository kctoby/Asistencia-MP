<?php 
	include("../seguridad.php"); 
?> 
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimum-scale=1.0">
	<!--Aqui referencias jquery-->
	
	<script src="../js/jqueryDP.js"></script>
 	<script src="../js/jquery-ui.js"></script>
 	<script src="../js/dp-es.js" ></script>
	<script src="../js/bootstrap.min.js"></script>

	<script src="../js/empleado/empleado.js"></script>
	
	<script type="text/javascript">

  		$(document).ready(function(){
  			$("form").submit(function(event){
  				//alert("entra a la funcion");
  				var error1= document.getElementById("error1").innerHTML;
  				var error2= document.getElementById("error2").innerHTML;
  				var descripcion = document.getElementById("textArea").value;

  				if (error1 != "" || error2 != ""){
  					document.getElementById("mensajeError").innerHTML = " *Hay algun error en las fechas";
  					event.preventDefault();
  					//alert("a");
   	 			}else if(descripcion ==""){
  					document.getElementById("mensajeError").innerHTML = " *Debe agregar una descripcion";
  					event.preventDefault();
  					//alert("b");
  				}else{
  				}
   	 		});
   	 	});	

  		function enviarNotificacion(str){
  			var limite = str.indexOf("-");
			var idPermisoCookie = str.slice(0, limite);
			document.cookie ='variableID='+ idPermisoCookie +'; expires=Thu, 2 Aug 2050 20:47:11 UTC; path=/';
  		}

	</script>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/personalizado.css">
	<link rel="stylesheet" type="text/css" href="../css/datepicker.css">

</head>

<body>
	<nav class="navbar navbar-inverse opciones-nav">
  		<div class="container-fluid">
    		<div class="navbar-header">
    			<div class="logo">
    				<img class="imagenes-bloque" src="../Imagenes/LogoMP.png" alt="" align="left" height="60">
    			</div>
    			<a class="navbar-brand header-pers"><p align="center">&nbsp;&nbsp;Sistema de Permisos, Ministerio P&uacute;blico</p></a>
    		</div>

	    	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
	      		<ul class="nav navbar-nav navbar-right">
	      			<br>
	      			<div class="menu1">
	      				<a href="#" title="Noticaci&oacute;n"
	      							class="dropdown-toggle"
	      				 			id="dropdownMenu1" 
	      				 			data-toggle="dropdown" 
	      				 			aria-haspopup="true" 
	      				 			aria-expanded="true" >
	      				 	<img src="../Imagenes/Notifiaciones.png" id="img-notificacion" height="35" >
	      				</a>
	      				<ul class="dropdown-menu" aria-labelledby="dropdownMenu1" id="notificacion">
    						<li id="porDefecto"><a href="#">No hay notificicaciones</a></li>
  						</ul>
	      			</div>
                    <div class="menu2">      
	      				<a href="#" data-toggle="modal" data-target="#modal-transparent" title="Ayuda">
	      					<img src="../Imagenes/Ayuda.png" height="35" >
	      				</a>
	      			</div>
	      			<div class="menu3">
	      				<a href="../procesamientos/proCerrar.php" title="Cerrar Cesi&oacute;n">
	      					<img src="../Imagenes/cerrar.png" height="35" >
	      				</a>
	      			</div>
	      		</ul>
	        		
	    	</div>
  		</div>
	</nav>



	<div id="informacion">
		<div class="col-lg-4 col-lg-offset-8" align="rigth">
		  	<div class="list-group-item">
			    <p class="list-group-item-text" align="center">
					<?php
						//mostrar el nombre de usuario que ingreso 
						$usuario =$_SESSION['nombre'];
					 	echo $usuario;
					 ?>
			    </p>
			</div>
		</div>
	</div>

	<div class="container cuerpo-PE">
		</br></br></br>
		<section class="main row">
		<form class="form-horizontal">
		 	<fieldset>
		  		<legend>Permiso</legend>
		    	</br></br>
		    	<div class="form-group" align="center">
		      		<div class="col-lg-12" >
		      			<a href="#" data-toggle="modal" data-target="#modal-pedir" class="btn btn-primary tam-boton-PE">Solicitar Permiso</a>
		      			</br></br>
		      			<a href="empleado/deduccionesEmpleado.php" class="btn btn-primary tam-boton-PE">Ver Deducciones</a>
		      			</br></br>
		      			<a href="empleado/historialPermisosEmpleado.php" class="btn btn-primary tam-boton-PE">Ver Historial de permisos</a>
		      		</div>
		    	</div>
		  	</fieldset>
		</form>
		</section>
	</div>

</br></br></br>
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



	<div class="modal modal-transparent fade " id="modal-pedir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  	<div class="modal-dialog  modal-grande">
	    	<div class="modal-content">
	      		<div class="modal-header">
	         		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
	         		<h4 class="modal-title" id="myModalLabel">Solicitar permiso</h4>
	         	</div>
				<div class="modal-body">
        			<div class="container center">
						<form class="form-horizontal"  id="formPermiso" method="POST" action="../procesamientos/empleado/proPedirPermisoEmpleado.php">
					  		<fieldset>
					    		<div class="form-group">
					    			<label class="col-lg-4 control-label">Jefe: </label>
						    		<div>	
						    			<input type="text" class="form-control ausencia-jefe" name="jefe" id="jefe" readOnly="true" />
						    		</div>
						    		<br/>
					    			<label class="col-lg-4 control-label">Tipo de Permiso: </label>
						    		<div>	
						    			<select class="ausencia-jefe form-control" name="tipoAusencia" id="ausencias">
	         								<option id="primerTipoPermiso"></option>
	         							</select>
						    		</div> 		

						    		<br/>
					    			<div class="form-group">	    				
						    			<label class="col-lg-4 control-label centrar-modal">Ingrese el Periodo de duraci&oacute;n del Permiso:</label>
							    		<br/><br/>


							    		<div class="radio check-dias">
										  	<label>
										    	<input type="radio" name="optionsRadios" id="optionsRadios1" onclick="dias()" value="dia">
										    	Por D&iacute;as
										  	</label>
										</div>
										<div class="radio check-dias">
										  	<label>
										    	<input type="radio" name="optionsRadios" id="optionsRadios2" onclick="horas()" value="hora">
										    	Por Horas
										  	</label>
										</div>

										<!-- DIAS -->
										<div class="tabla-dia" id="ocultoDias" style="display:none;">										
											<p>Numero de días:<input type="text" class="form-control input-hora-minuto" id="diasPedidos" name="diasPedidos" onkeypress="return isNumberKey(event)"></input></p>		
											<div class="fechaInicio">
							    				<p>Fecha inicio: 
								    				<input class="input-date form-control"
								    						type="text" 
								    						id="datepicker1" 
								    						name="fechaInicio"  
								    						onchange="validarFecha(this.value)">
							    				</p>        
							    			</div>
											<input type="button" class="btn btn-primary" onclick="validarDias()" value="Validar"></input>
						    			</div>	

						    			<!-- HORA -->
						    			<div class="tabla-hora" id="ocultoHoras" style="display:none;">
						    				<div class="fechaFin">
						    					<p>Fecha Inicio: 
						    						<input class="input-date form-control" 
						    								type="text" 
						    								id="datepicker3" 
						    								name="fechaSolicitud"
						    								onchange="validarFecha(this.value)">
						    					</p>
						    				</div>

							    			<table>
							    				<tr>
							    					<td>HoraInicio: </td>
							    					<td>
							    						<p> Hora <select class="input-hora-minuto form-control" name="horaInicio" id="selectHoraI">
					         								<option>00</option>
					         								<option>01</option>
					         								<option>02</option>
					         								<option>03</option>
					         								<option>04</option>
					         								<option>05</option>
					         								<option>06</option>
					          								<option>07</option>
													        <option>08</option>
													        <option>09</option>
													        <option>10</option>
													        <option>11</option>
				          									<option>12</option>												        
				          									<option>13</option>
													        <option>14</option>
													        <option>15</option>
													        <option>16</option>
					          								<option>17</option>
													        <option>18</option>
													        <option>19</option>
													        <option>20</option>
													        <option>21</option>
													        <option>22</option>
													        <option>23</option>
											   			</select></p>
							    					</td>
							    					<td>
							    						<p> Minutos <select class="input-hora-minuto form-control" name="minutoInicio" id="selectMinI">
					         								<option>00</option>
					         								<option>05</option>
					          								<option>10</option>
													        <option>15</option>
													        <option>20</option>
													        <option>25</option> 
													        <option>30</option>
					         								<option>35</option>
					          								<option>40</option>
													        <option>45</option>
													        <option>50</option>
													        <option>55</option>				 
											    		</select></p>
							    					</td>
							    				</tr>

							    				<tr>
							    					<td>Hora Fin: </td>
							    					<td>
							    						<p> Hora <select class="input-hora-minuto form-control" name="horaFin" id="selectHoraF">
					         								<option>00</option>
					         								<option>01</option>
					         								<option>02</option>
					         								<option>03</option>
					         								<option>04</option>
					         								<option>05</option>
					         								<option>06</option>
					          								<option>07</option>
													        <option>08</option>
													        <option>09</option>
													        <option>10</option>
													        <option>11</option>
				          									<option>12</option>												        
				          									<option>13</option>
													        <option>14</option>
													        <option>15</option>
													        <option>16</option>
					          								<option>17</option>
													        <option>18</option>
													        <option>19</option>
													        <option>20</option>
													        <option>21</option>
													        <option>22</option>
													        <option>23</option>
											    		</select></p>
							    					</td>
							    					<td>
							    						<p> Minutos <select class="input-hora-minuto form-control" name="minutoFin" id="selectMinF">
					         								<option>00</option>
					         								<option>05</option>
					          								<option>10</option>
													        <option>15</option>
													        <option>20</option>
													        <option>25</option> 
													        <option>30</option>
					         								<option>35</option>
					          								<option>40</option>
													        <option>45</option>
													        <option>50</option>
													        <option>55</option>		 
											    		</select></p>
							    					</td>
							    				</tr>
							    			</table>
							    			

							    			<input type="button" class="btn btn-primary" onclick="validarHoras()" value="Validar"></input>
						    			</div>

						    			<br/>
										<div class="cont-mensaje">
					    					<label id="error1"class="mensaje-rojo"></label>
					    				</div>
					    				<div class="cont-mensaje">
					    					<label id="error2"class="mensaje-rojo"></label>
					    				</div>
						    		</div>
					    		</div>
					    			<div class="form-group">
										<label for="textArea" class="col-lg-2 control-label">Descripci&oacute;n</label>
										<div class="col-lg-10">
					        				<textarea class="form-control" 
					        							style="width:600px;" 
					        							id="textArea" 
					        							name="descripcion"
					        							maxlength="100"
					        				></textarea>
					        				<span class="help-block">Describa la causa de su permiso, m&aacute;ximo 100 caracteres.</span>
					      				</div>
					    			</div>
					    			<div>
					    				<input type= "hidden" name= "guia" id = "guia"></input>
					    			</div>


					    			<div class="form-group">
					      				<div class="col-lg-10 col-lg-offset-2">
					       					<button type="close" class="btn btn-default"  data-dismiss="modal" onclick="limpiarCampo()">Cancelar</button>
					       					<button type="submit" class="btn btn-primary" disabled="true" id="guardar">Enviar</button>
					   					</div>
					    			</div>
					    			<div id="cont-mensaje">
					    				<label id="mensajeError"class="mensaje-rojo"> </label>
					    			</div>
					    		</div>
					  		</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!--scripts para datepicker-->
    <script>
 		$( function() {
    		$( "#datepicker1" ).datepicker($.datepicker.regional['es'] );
  		} );
 		$( function() {
    		$( "#datepicker2" ).datepicker($.datepicker.regional['es'] );
  		} );
  		$( function() {
    		$( "#datepicker3" ).datepicker($.datepicker.regional['es'] );
  		} );


  	</script> 

  	<?php  
  	include("../procesamientos/empleado/proNotificacion.php");
  	include("../procesamientos/empleado/proTipoPermisos.php"); 
  	include("../procesamientos/empleado/proListaJefes.php");
  	?>


</body>
</html>