<?php  
	//Preguntar si los valores existen.
	//Inicializando las variables.
	$oculto  = ""; 
	$usuario = "";
	$nombre  = "";
	$clave   = "";
	$tipo    = "";
	
	if (isset($_POST["txtOculto"])) //Si trae valores. 
	{
		$oculto = $_POST["txtOculto"];
	}

	if (isset($_POST["txtUsuario"])) //Si trae valores. 
	{
		$usuario = $_POST["txtUsuario"];
	}

	if (isset($_POST["txtNombre"])) //Si trae valores. 
	{
		$nombre = $_POST["txtNombre"];
	}

	if (isset($_POST["txtClave"])) //Si trae valores. 
	{
		$clave = $_POST["txtClave"];
	}

	if (isset($_POST["txtTipo"])) //Si trae valores. 
	{
		$tipo= $_POST["txtTipo"];
	}

	function guardaUsuario($usuario, $nombre, $clave, $tipo)
	{
		//Conectarse al servidor MYSQL.
		//mysql_conect(servidor, usuario, contraseña);
		$conexion = mysql_connect("localhost", "root", ""); 
		//Seleccionamos la base d;e datos.
		mysql_select_db("bd2163");
		$consulta = "INSERT INTO usuarios VALUES ('".$usuario."','".$nombre."','".$clave."','".$tipo."')";
		mysql_query($consulta);	
		//Preguntamos si hubo inserción.
		if(mysql_affected_rows() > 0)
		{
			print "Registro guardado";
			print "<br>";
			print "<a href='ejemplo.php'>Regresar<a/>";
		}
		else
		{
			print "No se pudo guardar el registro";
		}
	}

	switch ($oculto) {
		case 'guardaUsuario':
			guardaUsuario($usuario, $nombre, $clave, $tipo);
			break;
		
		default:
			# code...
			break;
	}	
?>
