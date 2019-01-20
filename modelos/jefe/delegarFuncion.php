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
		<br><br>
			<div class="main-row">
				<legend>Introduzca:</legend> 
				<div class="col-md-4 col-md-offset-2">
					<label><strong>Departamento: </strong></label>
					<div class="Selecto">	
						<p> Departamentos <select class="input-depto" name="depto" id="select">
							<option>Tegucigalpa</option>
							<option>San Pedro Sula</option>
					        <option>Otro</option>
				   		</select></p>
					</div>
				</div>
				<div class="col-md-6">
					<label><strong>Departamento: </strong></label>
					<div class="Selecto">	
						<p> Region <select class="input-reg" name="reg" id="select">
							<option>Tegucigalpa</option>
							<option>San Pedro Sula</option>
					        <option>Otro</option>
				   		</select></p>
					</div>
				</div>
			</div>
			<br><br>
    		<div class="form-group">
      			<div class="col-lg-6 col-lg-offset-6">
        			<button type="submit" class="btn btn-primary">Buscar</button>
			</div>
		<br><br>	
	</div>

	<div class="container">
		<div class="main-row">
			<div class="col-lg-6 col-lgoffset-3">
				<div class="buscador-emp">
					<label class="buscaremp" for="focusedInput">Empleado: </label>
					<input type="text" class="form-control input-baja" id="buscador" name="buscado">
					<a class="buscar-emp"><img class="btn-lupa" src="../../Imagenes/Lupa.png" height="35" ></a>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="main-row">
			<table class="table table-striped table-hover ">
			  <thead>
			    <tr>
			      <th>Tipo de Permiso</th>
			      <th>Fecha de Solcitud</th>
			      <th>Fecha de Inicio</th>
			      <th>Fecha Fin</th>
			      <th>Veredicto</th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr>
			      <td>1</td>
			      <td>Column content</td>
			      <td>Column content</td>
			      <td>Column content</td>
			      <td>Column content</td>
			    </tr>
			    <tr>
			      <td>2</td>
			      <td>Column content</td>
			      <td>Column content</td>
			      <td>Column content</td>
			      <td>Column content</td>
			    </tr>
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


	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>

</body>
</html>