<?php
session_start();
//conexion
$cone = new PDO('sqlite:favoritos.db') or die('imposible conctarce a la base de datos');

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$edad = $_POST['edad'];

$usuarioAntiguo = $_SESSION['usuario'];
//consulta 
$consulta = "UPDATE Usuarios SET
	usuario='".$usuario."',
	contrasena='".$contrasena."',
	nombre='".$nombre."',
	apellido='".$apellido."',
	edad='".$edad."'
	WHERE usuario='".$usuarioAntiguo."';";
//ejecuto el query
$result = -$cone->exec($consulta);
//cierro la conexion
$cone = NULL;

echo "
<html>
	<head>
		<meta http-equiv='REFRESH' content=0;url=gestiondeusuarios.php>
	</head>
</html>";
?>