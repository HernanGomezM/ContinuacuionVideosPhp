<?php
session_start();
//obtener variables
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
//crear conexion
$cone =  new  PDO('sqlite:favoritos.db') or die('Ha sido imposible establecer la conexion');
//consula
$consulta = "SELECT *  FROM Usuario";
//ejecutar consulta
$result = $cone->query($consulta);
//repasar resultados
foreach ($result as $key) {
	$usuariobasedatos = $key['usuario'];
	$contrasenabasedatos = $key['contrasena'];

if ($usuario==$usuariobasedatos & $contrasena==$contrasenabasedatos) {
//Si el resultado es positivo
	$_SESSION['usuario'] = $usuario;
	$_SESSION['contrasena'] = $contrasena;
	echo "
<html>
	<head>
		<meta = http-equiv='REFRESH' content = '0; url=principal.php'>
	</head>

</html>";
}else{
//si el resultado es negativo
echo "datos incorrectos";
}
}
//cerrar conexion
$cone =  NULL;
?>