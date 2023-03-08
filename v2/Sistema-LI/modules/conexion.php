<?php
date_default_timezone_set('America/Guayaquil');

$conexion = mysqli_connect("localhost", "root", "1234", "db_school");

<<<<<<< Updated upstream
=======
$conexion = mysqli_connect("localhost", "root", "4189", "db_school");
>>>>>>> Stashed changes

if (mysqli_connect_errno()) {
	printf("Falló la conexión: %s\n", mysqli_connect_error());
	exit();
}

mysqli_set_charset($conexion, 'utf8');