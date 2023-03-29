<?php
date_default_timezone_set('America/Guayaquil');

<<<<<<< HEAD
$conexion = mysqli_connect("localhost", "root", "admin", "db_li");
=======
$conexion = mysqli_connect("localhost", "root", "root", "db_li");
>>>>>>> a505122d3e67aab673eb3ad4f471346ec6cb82f3

if (mysqli_connect_errno()) {
	printf("Falló la conexión a la base de datos: %s\n", mysqli_connect_error());
	exit();
}

mysqli_set_charset($conexion, 'utf8');