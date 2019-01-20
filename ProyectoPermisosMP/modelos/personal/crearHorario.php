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


	<script type="text/javascript">
		//funcion que valide antes de guardar

	function noRepetir(str){
		str = str.toUpperCase();
		if (str.length == 0) {
       		document.getElementById("mensajeError").innerHTML = "Debe ingresar un nombre";
        return;
    	} else {
        	var xmlhttp = new XMLHttpRequest();
        	xmlhttp.onreadystatechange = function() {
            	if (this.readyState == 4 && this.status == 200) {
                	document.getElementById("mensajeError").innerHTML = this.responseText;
            	}
        	};
        	xmlhttp.open("GET", "../../procesamientos/personal/proHorarioRepetido.php.php?q=" + str, true);
        	xmlhttp.send();
    	}
	}


	$(document).ready(function(){
  		$("form").submit(function(event){
  			//alert("entra a la funcion");			
  			var nombre = document.getElementById("horario").value;
  			var error = document.getElementById("mensajeError").innerHTML;

  			if (error != "" || nombre == ""){
  				document.getElementById("mensajeError2").innerHTML = "Hay algun error con el nombre del horario";
  				event.preventDefault();
  				//alert("a");
  			}else{
  				//pasar a mayuscula el nombre del horario
  				nombre = nombre.toUpperCase();
  				document.getElementById("horario").value = nombre;
  			}
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
	      			<a href="#" data-toggle="modal" data-target="#modal-transparent" title="Ayuda"><img src="../../Imagenes/Ayuda.png" height="35" ></a>
	      			<a href="../permisoPersonal.php" title="Pagina principal"><img src="../../Imagenes/Inicio.png" height="35" ></a>
	      			<a href="../procesamientos/proCerrar.php" title="Cerrar Cesi&oacute;n"><img src="../../Imagenes/cerrar.png" height="35" ></a>
	      		</ul>
	        		
	    	</div>
  		</div>
	</nav>


	<br>

	<div class="container">
		<div class="main row">
			<div class="col-lg-4 col-lg-offset-4"> 
				<form class="form-horizontal" id="CrHorario" method="POST" action="../../procesamientos/personal/proCrearHorario.php" >
		  			<fieldset>
		    			<legend>Crear Horario</legend>
		    			<div class="form-group">
		     			 	<div class="form-group">
		     			 		<label class="control-label" for="focusedInput">Nombre del Tipo de Horario</label>
						  		<input class="form-control" id="horario" name ="nombreHorario" type="text" onblur="noRepetir(this.value)">
						  		<label id="mensajeError" class="mensaje-rojo"></label>
						  		<br>
						  		<div class="tiempo-AH">
							  		<div>	
				    					<p> Hora Inicio <select class="input-hora-minuto form-control" name="horaInicio" id="select">
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
									        <option>24</option>


								   		</select></p>
									</div>
									<div class="minutosI">
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
									</div>
									<br>
							  		<div>	
				    					<p> Hora Fin <select class="input-hora-minuto form-control" name="horaFin" id="select">
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
									        <option>24</option>
								   		</select></p>
									</div>
									<div class="minutoF">
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
									</div>
								</div>
						  		<br>
							</div>
		    			</div>

			    		<div class="form-group">
			      			<div class="col-lg-10 col-lg-offset-2">
			        			<button type="reset" class="btn btn-default">Cancel</button>
			        			<button type="submit" class="btn btn-primary">Crear</button>
		    			  	</div>
		    			</div>
		    			<label id="mensajeError2" class="mensaje-rojo"></label>
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

	<script type="text/javascript">
			document.getElementById("horario").value = "";
	</script>

</body>
</html>
