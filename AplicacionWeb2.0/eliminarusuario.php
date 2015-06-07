<?php
session_start();
//conexion
$cone = new PDO('sqlite:favoritos.db') or die('ha sido imposible establecer la conexion');
//retomo las bariables enviadas
/*
$usuario =  $_SESSION['usuario'];
$contrasena = $_SESSION['contrasena'];
*/

$usuario =  $_GET['usuario'];
$contrasena = $_GET['contrasena'];
$nombre = $_GET['nombre'];
$apellido = $_GET['apellido'];
$edad = $_GET['edad'];
//consulta
$consulta = "DELETE FROM Usuarios WHERE usuario = '".$usuario."' AND contrasena = '".$contrasena."' AND
usuario = '".$usuario."' AND
contrasena = '".$contrasena."' AND
nombre = '".$nombre."' AND
apellido = '".$apellido."' AND
edad = '".$edad."';";
//ejecutamos consulta
$result =  $cone->exec($consulta);
echo"
<html>
	<head>
		<meta http-equiv='REFRESH' content=0;url=gestiondeusuarios.php>
	</head>
</html>";
//cerrar conexion
$cone =  NULL;
?>