<?php
session_start();
#crear bariables
$usuario = $_SESSION['usuario'];
$contrasena = $_SESSION['contrasena'];

$addtitulo = $_POST['titulo'];
$adddireccion = $_POST['direccion'];
$addcategoria = $_POST['categoria'];
$addcomentario = $_POST['comentario'];
$addvaloracion = $_POST['valoracion'];
#------------------------------------------------------------------------

//creo la coneccion
$cone = new PDO('sqlite:favoritos.db') or die('ha sido imposible establecer la conexion');
//crear consulta
$consulta = "INSERT INTO Favoritos 
VALUES ('$usuario',
	'$contrasena',
	'$addtitulo',
	'$adddireccion',
	'$addcategoria',
	'$addcomentario',
	'$addvaloracion');";
//ejecuto la consulta
$resul = $cone->exec($consulta);

echo "
<html>
	<head>
		<meta http-equiv='REFRESH' content=0;url=principal.php>
	</head>
</html>";
//cerrar coneccion
$cone =  NULL;
?>