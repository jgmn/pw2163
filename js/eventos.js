//$ = jquery
//DOM = Document Object Model

/*
Hay dos tipos de funciones: 
-Anónima: No tiene nombre y puede ser asignada a una variable. Por ejemplo: var f = funcion(){alert("Hola Mundo");}
*/

var inicio = function()
{
	var dameclic = function()
	{
		$.ajax({
		  url: 'https://randomuser.me/api/',
		  dataType: 'json',
		  success: function(data) {
		  	$("#imgFoto").show("slow");
		  	$("#txtNombre").show("slow");
		  	$("#txtNombre").val(data.results[0].name.first+" "+data.results[0].name.last);
		  	$("#imgFoto").attr("src", data.results[0].picture.large);
		  	console.log(data.results[0].name.first+" "+data.results[0].name.last);
		  	$("#miArticle").html("Ejemplo"); /*Cuando no sé como llenarlo utilizamos html*/
		  }
		});
	}

	//Cuando es un id se antepone #.
	$("#dameClic").on("click", dameclic);
}

//Inicializar nuestro documento.
//ready -> Evento.
//inicio -> Función.
$(document).on("ready", inicio);
