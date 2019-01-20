
	function permisoRepetido(str){
		str = str.toUpperCase();
		if (str.length == 0) {
       		document.getElementById("mensaje-repetido").innerHTML = "Debe ingresar un nombre.";
        	return;
    	} else {
        	var xmlhttp = new XMLHttpRequest();
        	xmlhttp.onreadystatechange = function() {
           		if (this.readyState == 4 && this.status == 200) {
               		document.getElementById("mensaje-repetido").innerHTML = this.responseText;
           		}
        	};
        	xmlhttp.open("GET", "../../procesamientos/personal/proPermisoRepetido.php?q=" + str, true);
        	xmlhttp.send();
    	}
	}

	function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }