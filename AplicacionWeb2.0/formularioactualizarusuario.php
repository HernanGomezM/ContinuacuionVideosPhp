<?php
session_start();
//recupero las bariables

$usuario = $_SESSION['usuario'];


$usuario  =  $_GET['usuario'];
$contrasena  =  $_GET['contrasena'];
$nombre  =  $_GET['nombre'];
$apellido  =  $_GET['apellido'];
$edad  =  $_GET['edad'];
//conexion
$cone = new PDO('sqlite:favoritos.db') or die('imposible conctarce a la base de datos');
//consulta
$consulta = "SELECT *  FROM Usuarios WHERE 
usuario='".$usuario."' AND
contrasena = '".$contrasena."' AND
nombre = '".$nombre."' AND
apellido = '".$apellido."' AND 
edad = ".$edad."";
//ejecuto la consulta
$result = $cone->query($consulta);

echo "<table border=1 width=75%>
<tr>
	<td>usuario</td>
	<td>contrasena</td>
	<td>nombre</td>
	<td>apellido</td>
	<td>edad</td>
	<td></td>
</tr>";
foreach ($result as $key) {
	echo "<tr><form action='actualizarusuario.php' method='post'>
		<td><input type='text' name='usuario' value='".$key['usuario']."'></td>
		<td><input type='text' name='contrasena' value='".$key['contrasena']."'></td>
		<td><input type='text' name='nombre' value='".$key['nombre']."'></td>
		<td><input type='text' name='apellido' value='".$key['apellido']."'></td>
		<td><input type='text' name='edad' value='".$key['edad']."'></td>
		<td><input type='submit'></td>
	</form></tr>";
}
echo "</table>";
$_SESSION['usuario']=$usuario;
//cierro Conexion 
$cone =  NULL;
?>