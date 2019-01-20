    function usuarioRepetido(str){
		str = str.toUpperCase();
		if (str.length == 0) {
       		document.getElementById("errorUsuario").innerHTML = "Debe ingresar un nombre de usuario";
        	return;
    	} else {
        	var xmlhttp = new XMLHttpRequest();
        	xmlhttp.onreadystatechange = function() {
           		if (this.readyState == 4 && this.status == 200) {
               		document.getElementById("errorUsuario").innerHTML = this.responseText;
           		}
        	};
        	xmlhttp.open("GET", "../../procesamientos/personal/proUsuarioRepetido.php?q=" + str, true);
        	xmlhttp.send();
    	}
	}

    function tomarID(){
         var id = document.getElementById("idEmpleado").value;
         document.cookie ='idBuscar='+ id +'; expires=Thu, 2 Aug 2050 20:47:11 UTC; path=/';
    }

    function longitudContrasenia(str){
        var longitud = str.length;
        if (longitud<5){
            document.getElementById("errorLogitud").innerHTML= "La contraseña debe tener mas de 5 caracteres";
        }else{
            document.getElementById("errorLogitud").innerHTML= "";
        }

    }

    function validarContrasenia(){
        var pass1 = document.getElementById("password1").value;
        var pass2 = document.getElementById("password2").value;
        if(pass1 != pass2){
            document.getElementById("errorContrasenia").innerHTML = "Las contraseñas no son iguales."
        }else if(pass1 == pass2){
            document.getElementById("errorContrasenia").innerHTML = ""
        }
    }

    function limpiar(){
        document.getElementById('limpia').innerHTML="<?php session_start(); ob_start();$_SESSION['nombreBuscado'] = '';?>";
    }

    function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }