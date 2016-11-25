<h1>Alta de usuarios</h1>
<form action="registro_ejemplo.php" method="POST">
	<input type="hidden" name="txtOculto" value="guardaUsuario">
	<br>
	<input type="text" name="txtUsuario" id="txtUsuario">
	<br>
	<input type="text" name="txtNombre" id="txtNombre">
	<br>
	<input type="password" name="txtClave" id="txtClave">
	<br>
	<select name="txtTipo" id="txtTipo">	
		<option value="administrador">Administrador</option>
		<option value="invitado">Invitado</option>
		<option value="colado">Colado</option>
		<input type="submit" value="Enviar">
	</select>
</form>

<hr>
<?php  
	//Conexión al servidor.
	$conexion = mysql_connect("localhost", "root", "");
	mysql_select_db("db2163");
	$consulta = 'SELECT * FROM usuarios ORDER BY usuario';
	$resultado = mysql_query($consulta); //Ejecuta la consulta y se guarda en resultado.
	
	//Crear la tabla.
	$tabla ="<table border=1>";
	$tabla.="<tr>";
	$tabla.="<th>Usuario</th><th>Nombre</th><th>Clave</th><th>Tipo</th>";
	$tabla.="<tr>";
	
	while ($registro = mysql_fetch_array($resultado)) 
	{
		$tabla.="<tr>";
		$tabla.="<td>".$registro["usuario"]."</td>";
		$tabla.="<td>".$registro["nombre"]."</td>";
		$tabla.="<td>".$registro["clave"]."</td>";
		$tabla.="<td>".$registro["tipousuario"]."</td>";
		$tabla.="<tr>";
	}
	$tabla.="</table>";
	print $tabla;
?>