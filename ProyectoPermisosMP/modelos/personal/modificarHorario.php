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
	      			<a href="../../procesamientos/proCerrar.php" title="Cerrar Cesi&oacute;n"><img src="../../Imagenes/cerrar.png" height="35" ></a>
	      		</ul>
	        		
	    	</div>
  		</div>
	</nav>


	</br></br>

	<div class="container">
		<div class="main row">
			<div class="col-lg-6 col-lg-offset-3"> 
				<div class="alert alert-dismissible alert-success">
			  		<button type="button" class="close" data-dismiss="alert">&times;</button>
			  		<strong>Horario Modificado!</strong> </br>
			  		<a href="#" class="alert-link">El horario se modifico con &eacute;xito</a>.
				</div>
			</div>
		</div>
	</div>			

	<div class="container">
		<div class="main row">
			<div class="col-lg-4 col-lg-offset-4"> 
				<legend>Modificar Horario</legend>
				<form id="mfHorario">
					<label class="control-label" for="focusedInput">Buscar Horario por Nombre</label>
		  			<input class="form-control" id="focusedInput" type="text" value="Ingrese el Tipo de Horario">
		  			</br>
		    		<div class="form-group">
	      				<div class="col-lg-4 col-lg-offset-4">
	      					<input type="text" class="form-control tam-buscar" id="buscador" name="buscado" >
							<a href=#><img class="btn-lupa" src="../../Imagenes/Lupa.png" height="35"></a>
    			  		</div>
    				</div>
    				</br>
    				</br>	    		
    			</form>	
			</div>	
		</div>
	</div>

	<div class="container">
		<div class="mainrow">
			<div class="col-lg-4 col-lg-offset-4">
				<div class="list-group">
				  <a  class="list-group-item">Horario</a>
				  <a  class="list-group-item">Horario</a>
				  <a  class="list-group-item">Horario</a>
				  <a  class="list-group-item">Horario</a>
				</div>	
			</div>
		</div>
	</div>

	<div class="modal">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title">Modifique los campos</h4>
	      </div>
	      <div class="modal-body">
	        <label class="control-label" for="focusedInput">Nombre Tipo Horario</label>
	  		<input class="form-control" id="focusedInput" type="text" value="Horario">
	  		<div class="horaInicio">	
				<p> Hora Inicio <select class="input-hora-minuto form-control" name="horaInicio" id="select">
						<option>06</option>
						<option>07</option>
			        <option>08</option>
			        <option>09</option>
		   		</select></p>
			</div>
			<br>
	  		<div class="horaFin">	
				<p> Hora Fin <select class="input-hora-minuto form-control" name="horaInicio" id="select">
						<option>06</option>
						<option>07</option>
			        <option>08</option>
			        <option>09</option>
		   		</select></p>
			</div>
	  		<br>		
	      </div>
	      <div class="modal-footer">
    			<button type="reset" class="btn btn-default">Cancel</button>
    			<button type="submit" class="btn btn-primary">Guardar</button>
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



</body>
</html>