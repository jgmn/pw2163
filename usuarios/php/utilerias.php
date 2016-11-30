<?php 
	
	function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
	{
	  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

	  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

	  switch ($theType) {
	    case "text":
	      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
	      break;    
	    case "long":
	    case "int":
	      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
	      break;
	    case "double":
	      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
	      break;
	    case "date":
	      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
	      break;
	    case "defined":
	      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
	      break;
		}
		
		return $theValue;
	}
	
	function validaUsuario()
	{
		$respuesta = false;
		$usuario   = GetSQLValueString($_POST["usuario"], "text"); //Limpieza.
		$clave     = GetSQLValueString($_POST["clave"], "text"); //Limpieza.
		//Conexión a la base de datos.
		$conexion  = mysql_connect("localhost", "root", "");
		mysql_select_db("bd2163");
		$consulta  = sprintf("SELECT usuario, clave FROM usuarios WHERE usuario=%s AND clave=%s LIMIT 1", $usuario, $clave);
		$resultado = mysql_query($consulta);

		//Esperamos un solo resultado.
		if(mysql_num_rows($resultado) == 1)
		{
			$respuesta = true;
		}

		//Convertir respuesta a JSON.
		$JSON = array('respuesta' => $respuesta);
		print json_encode($JSON);
	}

	//Menú principal.
	$op = $_POST["opcion"];
	
	switch ($op) 
	{
		case 'valida':
			validaUsuario();
			break;
		default:
			# code...
			break;
	}
?>