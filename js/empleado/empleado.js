
	function limpiarCampo(){
  		document.getElementById("datepicker1").value = "";
  		document.getElementById("datepicker3").value = "";
  		document.getElementById("textArea").value = "";
  		document.getElementById("mensajeError").innerHTML ="";
  		document.getElementById("error1").innerHTML = "";
  		document.getElementById("error2").innerHTML = "";
  	}

  	function validarFechaFin(cadena){
  		if(cadena.length == 0){
  			//alerta color rojo
  			document.getElementById("error2").innerHTML = "Debe ingresar una fecha" ;
  			return;
  		}else{
  				var inicio = document.getElementById("datepicker1").value;

  				if(cadena<inicio){  					
  					document.getElementById("error2").innerHTML = "*Fecha incorrecta, la fecha de fin no puede ser anterior a la fecha de inicio";
  					return;
  				}
  				document.getElementById("error2").innerHTML = "";
  				if (document.getElementById("error1").innerHTML == "*Fecha incorrecta, la fecha de fin no puede ser anterior a la fecha de inicio.") {
  						document.getElementById("error1").innerHTML = "";
  				};
  				return;
  			}
  	}


  	function validarFechaInicio(cadena){
  			if(cadena.length == 0){
  				//alerta color rojo
  				document.getElementById("error1").innerHTML = "Debe ingresar una fecha" ;
  				return;
  			}else{
  				var f = new Date();
  				var fechaActual = f.getFullYear() + "-" + (f.getMonth() +1) + "-" + f.getDate();
  				//
  				var fin = document.getElementById("datepicker2").value;

  				
  				if(fechaActual>cadena){  					
  					document.getElementById("error1").innerHTML = "*Fecha incorrecta, la fecha de inicio ya paso.";
  					return;
  				}
  				//
  				if(cadena>fin && fin!=""){
  					document.getElementById("error1").innerHTML = "*Fecha incorrecta, la fecha de fin no puede ser anterior a la fecha de inicio.";
  					return;
  				}

  				document.getElementById("error1").innerHTML = "";
  				return;
  			}
  		}

  		function bloquearHoras(){
  			var verificar = document.getElementById("diaSi").checked;

			if (verificar == true){
				//se bloquean las horas
				document.getElementById("selectHoraI").disabled=true;
				document.getElementById("selectHoraI").value="00";

				document.getElementById("selectMinI").disabled=true;
				document.getElementById("selectMinI").value= "00"

				document.getElementById("selectHoraF").disabled=true;
				document.getElementById("selectHoraF").value= "00"

				document.getElementById("selectMinF").disabled=true;
				document.getElementById("selectMinF").value = "00"
			}
			if (verificar == false){
				document.getElementById("selectHoraI").disabled=false;
				document.getElementById("selectMinI").disabled=false;
				document.getElementById("selectHoraF").disabled=false;
				document.getElementById("selectMinF").disabled=false;
			}

  		}

//PARA PEDIR PERMISOS

//document.getElementById("oculto").style.display = 'block';

      //muestra el div oculto para solicitar permisos por dia
      function dias(){
        document.getElementById("guardar").disabled = true;
        var verificar = document.getElementById("optionsRadios1").checked;
        if(verificar ==true){
          document.getElementById("ocultoDias").style.display = 'block';
          document.getElementById("ocultoHoras").style.display = 'none';
          document.getElementById("guia").value = "DIAS";
        }
      }

      //muestra el div oculto para solicitar permiso por hora
      function horas(){
        document.getElementById("guardar").disabled = true;
        var verificar = document.getElementById("optionsRadios2").checked;
        if(verificar ==true){
          document.getElementById("ocultoHoras").style.display = 'block';
          document.getElementById("ocultoDias").style.display = 'none';
          document.getElementById("guia").value = "HORAS";
        }

      }

      //obtener la cantidad de dias o horas que tiene un permiso, de la lista de tipo permiso
      function obtenerCantidad(){
        var cadena = document.getElementById("ausencias").value;
        var inicio = cadena.indexOf('X(');  //sumar 2
        var fin = cadena.indexOf(')');
        var nuevaCadena = cadena.slice(inicio+2, fin);//tengo la cantidad y si es dia o hora
        var espacio = nuevaCadena.indexOf(" ");
        var cantidad = nuevaCadena.slice(0,espacio);
        return cantidad;
      }

      //obtener un parametro guia que indique si un permiso es en dias o horas, de la lista de tipo permiso
      function obtenerGuia(){
        var cadena = document.getElementById("ausencias").value;
        var inicio = cadena.indexOf('X(');  //sumar 2
        var fin = cadena.indexOf(')');
        var nuevaCadena = cadena.slice(inicio+2, fin);//tengo la cantidad y si es dia o hora
        var espacio = nuevaCadena.indexOf(" ");
        fin = nuevaCadena.length;
        //var cantidad = nuevaCadena.slice(0,espacio);
        var guia = nuevaCadena.slice(espacio+1,fin);
        return guia;
      }

      function validarDias(){


        //validar con el maximo de dias del permiso
        var cantidadMax = obtenerCantidad();
        var guia = obtenerGuia();
        var fechaInicio = document.getElementById("datepicker1").value;
        var diasPedidos = document.getElementById("diasPedidos").value;
        
        if(guia === "HORAS"){
          document.getElementById("error1").innerHTML = "Solicito un tipo de permiso por horas.";
          return;
        }
        if(diasPedidos === ""){
          document.getElementById("error1").innerHTML = "Debe ingresar una cantidad.";
          return;
        }
        if(fechaInicio == ""){
          document.getElementById("error1").innerHTML = "Debe ingresar la fecha de inicio.";
          return;
        }

        if(parseInt(diasPedidos)>parseInt(cantidadMax)){
          alert(diasPedidos);
          alert(cantidadMax);
          document.getElementById("error1").innerHTML = "El número de dias solicitado excede la cantidad de días permitido para el tipo de permiso";
          return;
        }
        document.getElementById("error1").innerHTML ="";
        document.getElementById("guardar").disabled = false;
        //bloquear o desbloquear boton guardar
      }

      function validarHoras(){
        var fechaInicio = document.getElementById("datepicker3").value;
        var hI =document.getElementById("selectHoraI").value;
        var mI =document.getElementById("selectMinI").value;
        var hF =document.getElementById("selectHoraF").value;
        var mF =document.getElementById("selectMinF").value;

        var horasSolicitadas = (hF-hI);
        var minutosSolicitados = Math.abs(mI-mF);

        var cantidadMax = obtenerCantidad();
        var guia = obtenerGuia();
        
        //tomar el tiempo solicitado en horas
        var tiempoHoras = horasSolicitadas + (minutosSolicitados/60);
        var d = new Date();

        //tiempo actual
        var horaActual =  d.getHours();
        var minutoActual = d.getMinutes();
        var fechaActual = d.getFullYear() + "-" + (d.getMonth() +1) + "-" + d.getDate();

       //validaciones
        if(fechaInicio === ""){
          document.getElementById("error1").innerHTML = "Debe ingresar la fecha de inicio." ;
          return;
        }
        if((fechaActual === fechaInicio) && (horaActual == hI)){
          document.getElementById("error1").innerHTML = "El permiso no podra ser aceptado a tiempo.";
          return;
        }
        if(tiempoHoras == 0){
          document.getElementById("error1").innerHTML = "No ha seleccionado un tiempo valido. ";
          return; 
        }
        if(parseInt(hI)>parseInt(hF)){
          document.getElementById("error1").innerHTML = "La hora debe ser despues de la hora de inicio. ";
          return;  
        }
        if(guia === "HORAS"){
          if(cantidadMax < tiempoHoras){
             document.getElementById("error1").innerHTML = "El número de horas solicitado excede la cantidad de horas permitidas para el tipo de permiso.";
             return;
          }
        }

        document.getElementById("error1").innerHTML ="";
        document.getElementById("guardar").disabled = false;
        //bloquear o desbloquear boton guardar
      }

      function validarFecha(str){
        if(str.length == 0){
          //alerta color rojo
          document.getElementById("error2").innerHTML = "Debe ingresar una fecha" ;
          return;
          }else{
            var f = new Date();
            var fechaActual = f.getFullYear() + "-" + (f.getMonth() +1) + "-" + f.getDate();
            if(fechaActual>str){           
              document.getElementById("error2").innerHTML = "*Fecha incorrecta, la fecha de inicio ya paso.";
              return;
            }
          }
          document.getElementById("error2").innerHTML = "";
          return;
      }

      function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }

       function prueba(){
          var cantidadMax = obtenerCantidad();
          var diasPedidos = document.getElementById("diasPedidos").value;

          return cantidadMax<diasPedidos;
       }

