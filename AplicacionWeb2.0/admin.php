<?php
session_start();
$cod= $_SESSION['permisos'];
if ($cod == 1) {

	echo "Pulsa <a href='verlogs.php'>AQUI</a> para ver logs <br />";
	echo "Pulsa <a href='gestiondeusuarios.php'>AQUI</a> para ver usuarios";

}else{
	echo '<script language="javascript">alert("ADMIN INVALIDO");</script>';
	echo"
<html>
	<head>
		<meta http-equiv='REFRESH' content=0;url=principal.php>
	</head>
</html>";

}
?>