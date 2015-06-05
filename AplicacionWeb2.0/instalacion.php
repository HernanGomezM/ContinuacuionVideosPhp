<?php
#crear una tabla de favoritos
//concexion
$cone = new PDO('sqlite:favoritos.db') or die('ha sido imposible establecer la conexion');
//Crear tabla
$consultaCrearTabla = 'CREATE TABLE Favoritos(
	usuario char(40) NOT NULL,
	contrasena char(40) NOT NULL,
	titulo char(40) NOT NULL,
	direccion char(100)NOT NULL,
	categoria char(40)NOT NULL,
	comentario char(200)NOT NULL,
	valoracion int
	)';
//Insertar en tabla
$resultadoCrearTabla = $cone->exec($consultaCrearTabla);
//Cerrar conexion
$cone = NULL;
#--------------------------------------------------------------------------------------------------
#crear Contenido de Prueba
//concexion
$coneContenido = new PDO('sqlite:favoritos.db') or die('ha sido imposible establecer la conexion');
//Crear tabla
$consultaContenidoPrueba = 'INSERT INTO Favoritos VALUES(
	"videos",
	"videos",
	"Google",
	"http://www.google.com",
	"tecnologias",
	"Este es un buscador famoso",
	10
	);
INSERT INTO Favoritos VALUES(
	"videos",
	"videos",
	"Youtube",
	"http://www.google.com",
	"tecnologias",
	"Esta es uan pagina de videos muy buena",
	10
	);';
//Insertar en tabla
$resultadoContenidoPrueba = $coneContenido->exec($consultaContenidoPrueba);
//Cerrar conexion
$cone=NULL;
#--------------------------------------------------------------------------------------------------
#crear una tabla de usuarios
//concexion
$cone = new PDO('sqlite:favoritos.db') or die('ha sido imposible establecer la conexion');
//Crear tabla
$consultaTablaUsuarios = 'CREATE TABLE Usuarios(
	usuario char(40)NOT NULL,
	contrasena char(40)NOT NULL,
	nombre char(40)NOT NULL,
	apellido char(100)NOT NULL,
	edad int,
	permisos int
	)';
//Insertar en tabla
$resultadoTablaUsuario = $cone->exec($consultaTablaUsuarios);
//Cerrar conexion
$cone = NULL;
#--------------------------------------------------------------------------------------------------
#crear Contenido de Prueba para usuarios
//concexion
$cone = new PDO('sqlite:favoritos.db') or die('ha sido imposible establecer la conexion');
//Crear tabla
$consultaPruebaUsuario = 'INSERT INTO Usuarios (usuario,contrasena,nombre,apellido,edad,permisos)
VALUES(
	"videos",
	"videos",
	"Hernan",
	"Gomez",
	21,
	1
	)';
//Insertar en tabla
$resultadoPruebaUsuario = $cone->exec($consultaPruebaUsuario);
//Cerrar conexion
$cone = NULL;
#--------------------------------------------------------------------------------------------------
#crear una tabla de Logs
//concexion
$cone = new PDO('sqlite:favoritos.db') or die('ha sido imposible establecer la conexion');
//Crear tabla
$consultaTablaLogs = 'CREATE TABLE Logs(
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
	)';
//Insertar en tabla
$resultadoTablaLogs = $cone->exec($consultaTablaLogs);
//Cerrar conexion
$cone = NULL;
#--------------------------------------------------------------------------------------------------
#crear Contenido de Prueba para Logs
//concexion
$cone = new PDO('sqlite:favoritos.db') or die('ha sido imposible establecer la conexion');
//Crear tabla
$consultaPruebaLogs = 'INSERT INTO Logs (utc,anio,mes,dia,hora,segundo,ip,navegador,usuario,contrasena)
VALUES(
	00000,
	2015,
	02,
	07,
	21,
	03,
	"192.198.200.254",
	"chrome",
	"Hernan",
	"Hernan"
	)';
//Insertar en tabla
$resultadoPruebaLogs = $cone->exec($consultaPruebaLogs);
//Cerrar conexion
$cone = NULL;
?>