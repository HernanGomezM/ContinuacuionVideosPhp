<?php
include('log.php');
echo "Tu usuario es: ".$_SESSION['usuario']."<br />"."Tu contrasena es: ".$_SESSION['contrasena'];
#---------------------------------------------------------------------------------------
echo "<br />Pulsa <a href='unlog.php'>AQUI></a> para cerrar sesion";
#Crear conexion
$cone = new PDO('sqlite:favoritos.db') or die('ha sido imposible establecer la conexion');
//establecer una consulta
$consulta = "SELECT * FROM Favoritos WHERE usuario ='".$_SESSION['usuario']."' AND contrasena='".$_SESSION['contrasena']."';";
//ejercutar consulta
$result = $cone->query($consulta);
//imprimir consulta
echo "<table border=1 width=80%>
<tr>
	<td>titulo</td>
	<td>direccion</td>
	<td>categoria</td>
	<td>comentario</td>
	<td>valoracion</td>
	<td>Eliminar</td>
	<td>Actualiza</td>
</tr>";
foreach ($result as $rows) {
	
	echo "<tr><td>".$rows['titulo']."</td><td>".$rows['direccion']."</td><td>".$rows['categoria']."</td><td>".$rows['comentario']."</td><td>".$rows['valoracion']."</td>
	<td><a href='eliminarfavorito.php?
	titulo=".$rows['titulo']."&
	direccion=".$rows['direccion']."&
	categoria=".$rows['categoria']."&
	comentario=".$rows['comentario']."&
	valoracion=".$rows['valoracion']."'>Eliminar</a></td>
	
	<td><a href='formularioactualizar.php?
	titulo=".$rows['titulo']."&
	direccion=".$rows['direccion']."&
	categoria=".$rows['categoria']."&
	comentario=".$rows['comentario']."&
	valoracion=".$rows['valoracion']."'>Actualizar</td></tr>";
}
//añadir un registro
echo "
<tr>
	<form action='crearfavorito.php' method='POST'>
	<td><input type='text' name='titulo'></td>
	<td><input type='text' name='direccion'></td>
	
	<td><select name='categoria'>
	<option value='salud'>salud</option>
	<option value='trabajo'>trabajo</option>
	<option value='hobby'>hobby</option>
	<option value='personal'>personal</option>
	<option value='otros'>otros</option>
	</td>
	<td><input type='text' name='comentario'></td>
	<td><input type='text' name='valoracion'></td>
	<td><input type='submit'></td>
</tr>";
echo"</table>";
//Cerrar conexion
$cone = NULL;
#SOCIALIZACION------------------------------------------------------------------------------------------------
function MuestraCategoria($dameCategoria){

echo "Algunos Favoritos de la categoria ".$dameCategoria." que talves te gusten <br /><br />";
//conexion
$cone = new PDO('sqlite:favoritos.db') or die('ha sido imposible establecer la conexion');
//consulta
$consultasocia = "SELECT * FROM Favoritos WHERE usuario != '".$_SESSION['usuario']."' AND categoria = '".$dameCategoria."' ORDER BY RANDOM() LIMIT 3;";
//ejecuto la consulta
$resultadosocia = $cone->query($consultasocia);
//
echo "<table border=1 width=80%>
<tr>
	<td>titulo</td>
	<td>direccion</td>
	<td>categoria</td>
	<td>comentario</td>
	<td>valoracion</td>
</tr>
";
	foreach ($resultadosocia as $rows){
	echo "<tr>
			<td>".$rows['titulo']."</td>
			<td>".$rows['direccion']."</td>
			<td>".$rows['categoria']."</td>
			<td>".$rows['comentario']."</td>
			<td>".$rows['valoracion']."</td>
	</tr>";
	}
	

echo "</table>";
//cierro conexion
$cone = NULL;
}
MuestraCategoria('trabajo'); 

?>