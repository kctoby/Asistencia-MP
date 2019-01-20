<?php
	$id = $_POST['idEmpleadoModificar2'];
 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimum-scale=1.0">
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="../../../css/bootstrap.min.css">	
	<link rel="stylesheet" type="text/css" href="../../../css/personalizado.css">

	<script src="../../../js/jqueryDP.js"></script>
 	<script src="../../../js/jquery-ui.js"></script>
 	<script src="../../../js/dp-es.js" ></script>
	<script src="../../../js/bootstrap.min.js"></script>

</head>
<body>

<body>
	<nav class="navbar navbar-inverse opciones-nav">
  		<div class="container-fluid">
    		<div class="navbar-header">
    			<div class="logo">
    				<img class="imagenes-bloque" src="../../../Imagenes/LogoMP.png" alt="" align="left" height="60">
    			</div>
    			<a class="navbar-brand header-pers"><p align="center">&nbsp;&nbsp;Sistema de Permisos, Ministerio P&uacute;blico</p></a>
    		</div>

	    	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
	      		<ul class="nav navbar-nav navbar-right">
	      			<br>
	      			<a href="../modificarEmpleado.php" title="volver atras"><img src="../../../Imagenes/Volver.png" height="35"></a>
	      			<a href="#" data-toggle="modal" data-target="#modal-transparent" title="Ayuda"><img src="../../../Imagenes/Ayuda.png" height="35" ></a>
	      			<a href="../../permisoPersonal.php" title="Pagina principal"><img src="../../../Imagenes/Inicio.png" height="35" ></a>
	      			<a href="../../../procesamientos/proCerrar.php" title="Cerrar Cesi&oacute;n"><img src="../../../Imagenes/cerrar.png" height="35" ></a>
	      		</ul>
	        		
	    	</div>
  		</div>
	</nav>


	</br></br>

	<div class="container">
		<div class="main row">
			<div class="col-lg-4 contenedor-AP"> 
				<h3 align="center" class="tema">Agregar nuevo Horario</h3>
				<hr class="linea"/>

				<form id="nuevo" method="POST" action="../../../procesamientos/personal/proModificarUsuarioHorarioNuevo.php">
					<p> <strong>Elija el nuevo horario: </strong> <select class="form-control" name="tipoHorario" id="selectHorario">
         				<option id="primerTipoHorario"></option>
				   	</select></p>

				   	<input type="hidden" id="id" name="id" value="<?php echo $id;?>"></input>
				  	<button type="reset" class="btn btn-default">Cancel</button>
    				<button type="submit" class="btn btn-primary">Guardar</button>
				</form>


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

<?php 
	include("../../../conexion.php");
	include("../../../procesamientos/personal/proListaHorario.php");
?>

<script type="text/javascript">
	var tipoHorario = <?php echo json_encode($tipoHorario);?>;
	var num = tipoHorario.length;
	var padre = document.getElementById("selectHorario");

	//para el primer dato, que remplace el contenido del primer option
	var primero = document.getElementById("primerTipoHorario");
	var mostrar = tipoHorario[0];
	var  contenido = document.createTextNode(mostrar);
	primero.appendChild(contenido);

	for(var i = 1 ; i<=num ;i++){
		//comienza en dos, para que no se muestre jefe temporal
		var nuevoElemento = document.createElement("option"); 
		var mostrar = tipoHorario[i];
		var contenido = document.createTextNode(mostrar);
  		nuevoElemento.appendChild(contenido);
  		padre.insertBefore(nuevoElemento, primero);
	}

</script>


</body>
</html>
