    function buscarUsuario(str){
		if (str.length == 0) {
       		document.getElementById("errorBuscar").innerHTML = "Debe ingresar un codigo de usuario";
        	return;
    	} else {
        	var xmlhttp = new XMLHttpRequest();
        	xmlhttp.onreadystatechange = function() {
           		if (this.readyState == 4 && this.status == 200) {
               		var capturado = this.responseText;
                  if (capturado == "El usuario no fue encontrado."){
                      document.getElementById("errorBuscar").innerHTML = capturado;
                  }else{
                      var limite = capturado.indexOf("-");
                      var largo = capturado.length;
                      var indice = capturado.slice(0, limite);
                      var nombre = capturado.slice(limite+1 , largo);
                      if (indice == '1'){
                          document.getElementById("errorBuscar").innerHTML = "El empleado ya tiene un usuario";
                          document.getElementById("nombreEmpleado").innerHTML = nombre;
                      }else if (indice == '2'){
                          document.getElementById("errorBuscar").innerHTML = "";
                          document.getElementById("nombreEmpleado").innerHTML = nombre;
                      }
                  }

           		}
        	};
        	xmlhttp.open("GET", "../../procesamientos/personal/proBuscarUsuario.php?q=" + str, true);
        	xmlhttp.send();
    	}
	}


  function isNumberKey(evt)
    {
       var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57))
          return false;

          return true;
    }