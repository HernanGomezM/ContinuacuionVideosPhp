<?php
session_start();

$contador = 0;

//variables
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$edad = $_POST['edad'];
//comprobar si el usuario existe con la base de datos
$cone = new PDO('sqlite:favoritos.db');

$consu =  "SELECT *  FROM Usuarios";
$resultado =  $cone->query($consu);

foreach ($resultado as $row) {
	if ($row['usuario'] == $usuario) {
		$contador++;
	}else{
	}
}
if($contador ==0){
//conexion
$cone = new PDO('sqlite:favoritos.db') or die('ha sido imposible establecer la conexion');
//consulta
/*Privilegios =
1=Admin
2=Controlador
3=Usuario registrado
4=Usuario Invitado
*/
$consulta = "INSERT INTO Usuarios VALUES ('$usuario','$contrasena','$nombre','$apellido','$edad',3)";
//ejecucion de consulta
$result = $cone->exec($consulta);
echo"
<html>
	<head>
		<meta http-equiv='REFRESH' content=0;url=gestiondeusuarios.php>
	</head>
</html>";
//crerrar conexion
$cone =  NULL;
}else{
	echo '<script language="javascript">alert("USUARIO YA REGISTRADO");</script>';
	echo"
<html>
	<head>
		<meta http-equiv='REFRESH' content=0;url=gestiondeusuarios.php>
	</head>
</html>"; 
}
?>