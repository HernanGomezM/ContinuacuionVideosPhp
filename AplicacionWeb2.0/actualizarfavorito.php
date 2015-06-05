<?php
session_start();
//conexion
$cone = new PDO('sqlite:favoritos.db') or die('imposible conctarce a la base de datos');

$usuario = $_SESSION['usuario'];
$contrasena = $_SESSION['contrasena'];

$titulo = $_POST['titulo'];
$direccion = $_POST['direccion'];
$categoria = $_POST['categoria'];
$comentario = $_POST['comentario'];
$valoracion = $_POST['valoracion'];

$tituloAntiguo = $_SESSION['titulo'];
//consulta 
$consulta = "UPDATE favoritos SET
	titulo='".$titulo."',
	direccion='".$direccion."',
	categoria='".$categoria."',
	comentario='".$comentario."',
	valoracion='".$valoracion."'
	WHERE titulo='".$tituloAntiguo."'";
//ejecuto el query
$result = -$cone->exec($consulta);
//cierro la conexion
$cone = NULL;

echo "
<html>
	<head>
		<meta http-equiv='REFRESH' content=0;url=principal.php>
	</head>
</html>";


?>