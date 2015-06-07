<?php
session_start();
//obtener variables
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
//crear conexion
$cone = new PDO('sqlite:favoritos.db') or die('ha sido imposible establecer la conexion');
//consula
$consulta = "SELECT *  FROM Usuarios";
//ejecutar consulta
$result = $cone->query($consulta);
//repasar resultados
foreach ($result as $rows) {
	$usuariobasedatos = $rows['usuario'];
	$contrasenabasedatos = $rows['contrasena'];
	$permisosenBase = $rows['permisos'];
if ($usuario==$usuariobasedatos && $contrasena==$contrasenabasedatos) {
//Si el resultado es positivo
	$_SESSION['usuario'] = $usuario;
	$_SESSION['contrasena'] = $contrasena;
	$_SESSION['permisos']= $permisosenBase; 
	echo "
<html>
	<head>
		<meta = http-equiv='REFRESH' content = '0; url=admin.php'>
	</head>

</html>";
}else{
//si el resultado es negativo
}
}
//cerrar conexion
$cone =  NULL;
?>