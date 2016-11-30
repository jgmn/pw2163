var inicioUsuarios = function()
{
	validaUsuario = function()
	{
		//Extraer los datos de los input en el HTML.
		var usuario = $("#txtUsuario").val();
		var clave = $("#txtClave").val();

		//Preparar los parámetros para AJAX.
		var parametros = "opcion=valida"+
						 "&usuario="+usuario+
						 "&clave="+clave+
						 "&id="+Math.random();


		//Validamos que no estén vacíos.
		if(usuario!="" && clave!="")
		{
			//Hacemos la petición remota.
			$.ajax({
				cache:false,
				type:"POST",
				dataType:"json",
				url:"php/utilerias.php",
				data: parametros,
				success: function(response){
					//Si todo sale bien.
					if(response.respuesta)
					{
						$("#entradaUsuario").hide("slow");
						$("nav").show("slow");
					}
					else
					{
						alert("Datos incorrectos.");
					}
				},
				error: function(xhr, ajaxOptions, thrownError){
					//Si todo sale mal.
				}
			});

		}
		else
		{
			alert("Usuario y clave obligatorios.");
		}
	}

	$("#btnValidaUsuario").on("click", validaUsuario);
}

//Evento inicial.
$(document).on("ready", inicioUsuarios);