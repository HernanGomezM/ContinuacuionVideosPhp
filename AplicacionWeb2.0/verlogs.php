<?php
session_start();
$cod= $_SESSION['permisos'];
if ($cod == 1) {
echo "Tu usuario es: ".$_SESSION['usuario']."<br />"." Tu contrasena es: ".$_SESSION['contrasena'];
#---------------------------------------------------------------------------------------
#Crear conexion
$cone = new PDO('sqlite:favoritos.db') or die('ha sido imposible establecer la conexion');
//establecer una consulta
$consulta = "SELECT * FROM Logs ";
//ejercutar consulta
$result = $cone->query($consulta);
//imprimir consulta
/*
	utc int,
	anio int,
	mes int,
	dia int,
	hora int,
	segundo int,
	ip char (50),
	navegador char(100),
	usuario char(40),
	contrasena char(40)
*/
echo "<table border=1 width=80%>
<tr>
	<td>Marca de tiempo</td>
	<td>Anio</td>
	<td>Mes</td>
	<td>Dia</td>
	<td>Hora</td>
	<td>Segundo</td>
	<td>IP</td>
	<td>Navegador</td>
	<td>Usuario</td>
	<td>Contraseña</td>
</tr>";
foreach ($result as $rows) {
	
	echo "<tr>
	<td>".$rows['utc']."</td>
	<td>".$rows['anio']."</td>
	<td>".$rows['mes']."</td>
	<td>".$rows['dia']."</td>
	<td>".$rows['hora']."</td>
	<td>".$rows['segundo']."</td>
	<td>".$rows['ip']."</td>
	<td>".$rows['navegador']."</td>
	<td>".$rows['usuario']."</td>
	<td>".$rows['contrasena']."</td>

";
}

echo"</table>";

//Cerrar conexion
$cone = NULL;
}else{
	echo "<h1>ACCESO DENEGADO </h1>";
}
?>