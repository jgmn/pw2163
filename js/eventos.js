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
		alert("Le di clic a un botón");
	}

	//Cuando es un id se antepone #.
	$("#dameClic").on("click", dameclic);
}

//Inicializar nuestro documento.
//ready -> Evento.
//inicio -> Función.
$(document).on("ready", inicio);
