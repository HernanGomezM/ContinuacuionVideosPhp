<?php
session_start();
$cod= $_SESSION['permisos'];
if ($cod == 1) {
echo "Tu usuario es: ".$_SESSION['usuario']."<br />"."Tu contrasena es: ".$_SESSION['contrasena'];
#---------------------------------------------------------------------------------------
#Crear conexion
$cone = new PDO('sqlite:favoritos.db') or die('ha sido imposible establecer la conexion');
//establecer una consulta
$consulta = "SELECT * FROM Usuarios ";
//ejercutar consulta
$result = $cone->query($consulta);
//imprimir consulta
echo "<table border=1 width=80%>
<tr>
	<td>Usuario</td>
	<td>Contrasena</td>
	<td>Nombre</td>
	<td>Apellido</td>
	<td>Edad</td>
	<td>permisos</td>
	<td></td>
	<td></td>
</tr>";
foreach ($result as $rows) {
	
	echo "<tr>
	<td>".$rows['usuario']."</td>
	<td>".$rows['contrasena']."</td>
	<td>".$rows['nombre']."</td>
	<td>".$rows['apellido']."</td>
	<td>".$rows['edad']."</td>
	<td>".$rows['permisos']."</td>

	<td><a href='eliminarusuario.php?
	usuario=".$rows['usuario']."&
	contrasena=".$rows['contrasena']."&
	nombre=".$rows['nombre']."&
	apellido=".$rows['apellido']."&
	edad=".$rows['edad']."&
	permisos=".$rows['permisos']."'>Eliminar</a></td>
	
	<td><a href='formularioactualizarusuario.php?
	usuario=".$rows['usuario']."&
	contrasena=".$rows['contrasena']."&
	nombre=".$rows['nombre']."&
	apellido=".$rows['apellido']."&
	edad=".$rows['edad']."'>Actualizar</td></tr>";
}
//añadir un registro
echo "<tr>
	<form action='crearusuario.php' method='POST'>
	<td><input type='text' name='usuario'></td>
	<td><input type='text' name='contrasena'></td>
	<td><input type='text' name='nombre'></td>
	<td><input type='text' name='apellido'></td>
	<td><input type='text' name='edad'></td>
	<td><input type='submit'></td>
</tr>";
echo"</table>";

//Cerrar conexion
$cone = NULL;
}else{
	echo "<h1>ACCESO DENEGADO </h1>";
}
?>