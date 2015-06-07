<?php
session_start();

$utc = date('U');
$anio =  date('Y');
$mes =  date('m');
$dia =  date('d');
$hora =  date('H');
$segundo =  date('s');

$usuarilog = $_SESSION['usuario'];
$contrasenalog = $_SESSION['contrasena'];

@$ip = getenv(REMOTE_ADDR);
$navegador = $_SERVER["HTTP_USER_AGENT"];

//creo la coneccion
$cone = new PDO('sqlite:favoritos.db') or die('ha sido imposible establecer la conexion');
//crear consulta
$consulta = "INSERT INTO Logs 
VALUES (
	'$utc',
	'$anio',
	'$mes',
	'$dia',
	'$hora',
	'$segundo',
	'$ip',
	'$navegador', 
	'$usuarilog',
	'$contrasenalog');";
//ejecuto la consulta
$resul = $cone->exec($consulta);

//cerrar coneccion
$cone =  NULL;
?>