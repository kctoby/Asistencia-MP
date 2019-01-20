function llenarPagina(e){
		//inicio define cuando inicia la cuenta en el arreglo de los datos que se van a mostrar
		inicio = (e*5)-5;
		console.log(datos);
		console.log(inicio);
		if(datos == undefined){

		}
		else
		{
			for(var i=0; i< 5; i++ ){
				var remplazable = padre.getElementsByTagName("a")[i];
				var nElemento = document.createElement("a");		
				var nombre = datos[inicio], permiso = ausencia[inicio], numPermiso = idPermiso[inicio];
				
				if(datos[inicio]==undefined){
					var contenido = document.createTextNode(' - ');
					nElemento.appendChild(contenido); 
					nElemento.setAttribute("class","list-group-item");
					nElemento.setAttribute("href","");
					padre.insertBefore(nElemento,remplazable);
					padre.removeChild(remplazable);
					inicio++;
				}
				else{
					
					numPermiso = numPermiso.concat('-');
					nombre = nombre.concat(' - ');
					mostrar = numPermiso.concat(nombre);
					mostrar = mostrar.concat(permiso);		

					var contenido = document.createTextNode(mostrar);
					nElemento.appendChild(contenido); 
					nElemento.setAttribute("class","list-group-item");
					nElemento.setAttribute("href","personal/aceptarPermiso.php");

					nElemento.setAttribute("onClick", "tomarIdPermiso(this.innerHTML)");
					padre.insertBefore(nElemento,remplazable);
					padre.removeChild(remplazable);
					inicio++;
					//al final inicio termina en inicio + 5 
				}
			}
		}
	}



	function adelante(){
		//inicio = inicio;
		var maximo = (numPaginas *5) 
		console.log(maximo);
		if(inicio >= maximo){

		}else{
			for(var i=0; i< 5; i++ ){
				var remplazable = padre.getElementsByTagName("a")[i];
				var nElemento = document.createElement("a");		
				var nombre = datos[inicio], permiso = ausencia[inicio],numPermiso = idPermiso[inicio];
				
				if(datos[inicio]==undefined){
					var contenido = document.createTextNode(' - ');
					nElemento.appendChild(contenido); 
					nElemento.setAttribute("class","list-group-item")
					nElemento.setAttribute("href","")
					padre.insertBefore(nElemento,remplazable);
					padre.removeChild(remplazable);
					inicio++;
				}
				else{
					numPermiso = numPermiso.concat('-');
					nombre = nombre.concat(' - ');
					mostrar = numPermiso.concat(nombre);
					mostrar = mostrar.concat(permiso);


					var contenido = document.createTextNode(mostrar);
					nElemento.appendChild(contenido); 
					nElemento.setAttribute("class","list-group-item");
					nElemento.setAttribute("href","personal/aceptarPermiso.php");

					nElemento.setAttribute("onClick", "tomarIdPermiso(this.innerHTML)");

					padre.insertBefore(nElemento,remplazable);
					padre.removeChild(remplazable);
					inicio++;
					//al final inicio termina en inicio + 5 
				}
			}
		}
	}

	function atras(){
		inicio = inicio - 10;
		if(inicio<0){

		}
		else{
			for(var i=0; i< 5; i++ ){
				var remplazable = padre.getElementsByTagName("a")[i];
				var nElemento = document.createElement("a");		
				var nombre = datos[inicio], permiso = ausencia[inicio],numPermiso = idPermiso[inicio];
				
				if(datos[inicio]==undefined){
					var contenido = document.createTextNode(' - ');
					nElemento.appendChild(contenido); 
					nElemento.setAttribute("class","list-group-item")
					nElemento.setAttribute("href","")
					padre.insertBefore(nElemento,remplazable);
					padre.removeChild(remplazable);
					inicio++;
				}
				else{
					
					numPermiso = numPermiso.concat('-');
					nombre = nombre.concat(' - ');
					mostrar = numPermiso.concat(nombre);
					mostrar = mostrar.concat(permiso);
					var contenido = document.createTextNode(mostrar);
					nElemento.appendChild(contenido); 
					nElemento.setAttribute("class","list-group-item");
					nElemento.setAttribute("href","personal/aceptarPermiso.php");
					nElemento.setAttribute("onClick", "tomarIdPermiso(this.innerHTML)");
					padre.insertBefore(nElemento,remplazable);
					padre.removeChild(remplazable);
					inicio++;
					//al final inicio termina en inicio + 5 
				}
			}

		}
	}