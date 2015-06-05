<?php
session_start();

//conexion
$cone = new PDO('sqlite:favoritos.db') or die('ha sido imposible establecer la conexion');
//retomo las bariables enviadas
$usuario =  $_SESSION['usuario'];
$contrasena = $_SESSION['contrasena'];

$titulo = $_GET['titulo'];
$direccion = $_GET['direccion'];
$categoria = $_GET['categoria'];
$comentario = $_GET['comentario'];
$valoracion = $_GET['valoracion'];
//consulta
$consulta = "DELETE FROM Favoritos WHERE usuario = '".$usuario."' AND contrasena = '".$contrasena."' AND
titulo = '".$titulo."' AND
direccion = '".$direccion."' AND
categoria = '".$categoria."' AND
comentario = '".$comentario."' AND
valoracion = '".$valoracion."';";
echo $consulta;
//ejecutamos consulta
$result =  $cone->exec($consulta);
echo"
<html>
	<head>
		<meta http-equiv='REFRESH' content=0;url=principal.php>
	</head>
</html>";
//cerrar conexion
$cone =  NULL;
 
?>