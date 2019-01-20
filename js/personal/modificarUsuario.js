     function buscarUsuario(){
        str = document.getElementById("buscador").value;
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
                      document.getElementById("nombreEmpleado").innerHTML = "";
                      document.getElementById("oculto").style.display = 'none';
                  }else{
                      var limite = capturado.indexOf("-");
                      var largo = capturado.length;
                      var indice = capturado.slice(0, limite);
                      var nombre = capturado.slice(limite+1 , largo);
                      if (indice == '1'){
                          document.getElementById("errorBuscar").innerHTML = "";
                          document.getElementById("nombreEmpleado").innerHTML = nombre;
                          document.getElementById("oculto").style.display = 'block';
                          document.getElementById("idEmpleadoModificar").value = document.getElementById("buscador").value;
                          document.getElementById("idEmpleadoModificar2").value = document.getElementById("buscador").value;
                          document.getElementById("idEmpleadoModificar3").value = document.getElementById("buscador").value;
                          document.getElementById("idEmpleadoModificar4").value = document.getElementById("buscador").value;

                      }else if (indice == '2'){
                          document.getElementById("errorBuscar").innerHTML = "El empleado no cuenta con un usuario, debe crear el usuario.";
                          document.getElementById("nombreEmpleado").innerHTML = nombre;
                          document.getElementById("oculto").style.display = 'none';
                      }
                  }

                }
            };
            xmlhttp.open("GET", "../../procesamientos/personal/proBuscarUsuario.php?q=" + str, true);
            xmlhttp.send();
        }
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

        function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }




       $(document).ready(function(){
            $("#formContrasenia").submit(function(event){
                var pass1 = document.getElementById("password1").value;
                var pass2 = document.getElementById("password2").value;
                var error1= document.getElementById("errorContrasenia").innerHTML;
                var error2= document.getElementById("errorLogitud").innerHTML;

                if (error1 != "" || error2 != ""){
                    document.getElementById("mensajeError").innerHTML = " *Hay algun error en las contraseñas.";
                    event.preventDefault();
                }else if((pass1 == "")||(pass2 == "")){
                    document.getElementById("mensajeError").innerHTML = " *No deben haber campos vacios.";
                    event.preventDefault();
                    //alert("b");
                }else{

                }
            });
        }); 

//----------------Horarios--------------------
    function nuevo(){
        var verificar = document.getElementById("optionsRadios1").checked;
        if(verificar ==true){
          document.getElementById("ocultoNuevo").style.display = 'block';

          document.getElementById("ocultoRemplazar").style.display = 'none';
          document.getElementById("ocultoEliminar").style.display = 'none';
        }   
    }

    function remplazar(){
        var verificar = document.getElementById("optionsRadios2").checked;
        if(verificar ==true){
            document.getElementById("ocultoRemplazar").style.display = 'block';
            document.getElementById("ocultoNuevo").style.display = 'none';
            document.getElementById("ocultoEliminar").style.display = 'none';
        }   
    }

    function eliminar(){
         var verificar = document.getElementById("optionsRadios3").checked;
        if(verificar ==true){
            document.getElementById("ocultoEliminar").style.display = 'block';
            document.getElementById("ocultoRemplazar").style.display = 'none';
            document.getElementById("ocultoNuevo").style.display = 'none';

        }    
    }