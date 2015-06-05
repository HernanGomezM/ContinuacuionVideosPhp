<?php
session_start();
//recupero las bariables
$usuario = $_SESSION['usuario'];
$contrasena = $_SESSION['contrasena'];

$titulo  =  $_GET['titulo'];
$direccion  =  $_GET['direccion'];
$categoria  =  $_GET['categoria'];
$comentario  =  $_GET['comentario'];
$valoracion  =  $_GET['valoracion'];
//conexion
$cone = new PDO('sqlite:favoritos.db') or die('imposible conctarce a la base de datos');
//consulta
$consulta = "SELECT *  FROM Favoritos WHERE 
usuario='".$usuario."' AND
contrasena = '".$contrasena."' AND
titulo = '".$titulo."' AND
direccion = '".$direccion."' AND 
categoria = '".$categoria."' AND
comentario = '".$comentario."' AND
valoracion = '".$valoracion."';";
//ejecuto la consulta
$result = $cone->query($consulta);

echo "<table border=1 width=75%>
<tr>
	<td>titulo</td>
	<td>direccion</td>
	<td>categoria</td>
	<td>comentario</td>
	<td>valoracion</td>
	<td></td>
</tr>";
foreach ($result as $key) {
	echo "<tr><form action='actualizarfavorito.php' method='post'>
		<td><input type='text' name='titulo' value='".$key['titulo']."'></td>
		<td><input type='text' name='direccion' value='".$key['direccion']."'></td>
		<td>
			<select name='categoria'>
				<option value='salud'>salud</option>
				<option value='trabajo'>trabajo</option>
				<option value='hobby'>hobby</option>
				<option value='personal'>personal</option>
				<option value='otros'>otros</option>
				<option value='".$key['categoria']."' selected>".$key['categoria']."</option>
			</select>
		</td>
		<td><input type='text' name='comentario' value='".$key['comentario']."'></td>
		<td><input type='text' name='valoracion' value='".$key['valoracion']."'></td>
		<td><input type='submit'></td>
	</form></tr>";
}
echo "</table>";
$_SESSION['titulo']=$titulo;
//cierro Conexion 
$cone =  NULL;
?>