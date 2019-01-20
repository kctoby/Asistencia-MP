    function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }

    		function tomarLista(e){
			var limite = e.indexOf("-"); // longitud hasta encontrar -
			var tamanio = e.length; //longgitud de e
			var idPermisoEnviar = e.slice(0, limite);
			//alert(idPermisoEnviar);
			var nombrePermiso = e.slice(limite+1,tamanio);
			//la cookie es para el procesamiento
			document.cookie ='variable='+ idPermisoEnviar +'; expires=Thu, 2 Aug 2050 20:47:11 UTC; path=/';
			//para el formulario
			document.getElementById("nombrePermiso").value = nombrePermiso;

		}
   		function tomarBuscador(){
   			var nombrePermiso = document.getElementById("modificable").innerHTML;
   			document.getElementById("nombrePermiso").value = nombrePermiso;
			document.cookie = 'variable=' + encontrado +'; expires=Thu, 2 Aug 2050 20:47:11 UTC; path=/';
		}

		function verificarExistencia(){
			//comparar con los nombres del arreglo tipoPermiso	
			var nombrePermiso = document.getElementById("buscador").value;
			if(nombrePermiso == ""){
				document.getElementById("errorBuscador").innerHTML = "Nombre no encontrado";	
			}else{
				var n = tipoPermiso.length;
				for(var i = 0; i<n ; i++){
					if(tipoPermiso[i] === nombrePermiso){
						document.getElementById("errorBuscador").innerHTML = "";
						document.getElementById("oculto").style.display = 'block';
						document.getElementById("modificable").innerHTML = tipoPermiso[i];
						encontrado = idPermiso[i];
						return;
					}else{
						var no = 1; //significa que no se encontro resultado, para no repetir un script
					}
				}
				if (no == 1){
					document.getElementById("errorBuscador").innerHTML = "Nombre no encontrado";
					document.getElementById("oculto").style.display = 'none';
				}
			}	
		}



				$(document).ready(buscar);
   		function buscar(){
      		$("#buscador").autocomplete({source: arreglo,
      			select: function(event, ui) {
        			//ui.item.label; // display the selected text
       		    	encontrado = ui.item.id; // save selected id to hidden input
    			}
    		});	
   		}



		$(document).ready(function(){
		$("form").submit(function(event){
			var nombre = document.getElementById("nombrePermiso").value;
			var cantidad = document.getElementById("cantidad").value;

			if ((nombre == "") || (cantidad == "")){
				document.getElementById("errorGuardar").innerHTML = "No deben haber campos vacios";
				event.preventDefault();
			}else{}

		});
	});
