    function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }

    function buscarId(){
 		str = document.getElementById("buscador").value;
 		if (str.length == 0) {
       		document.getElementById("errorBuscador").innerHTML = "Debe ingresar un código de empleado.";
        	return;
    	} else {
        	var xmlhttp = new XMLHttpRequest();
        	xmlhttp.onreadystatechange = function() {
           		if (this.readyState == 4 && this.status == 200) {
               		document.getElementById("errorBuscador").innerHTML = this.responseText;
           		}
        	};
        	xmlhttp.open("GET", ".php?q=" + str, true); //usar la funcion F_VERIFICAR_ASIGNACION_NOMUSR
        	xmlhttp.send();
    	}

 	}