<?php
date_default_timezone_set('America/Guayaquil');

<<<<<<< Updated upstream
$conexion = mysqli_connect("localhost", "root", "Minerales99", "db_school");
=======
$conexion = mysqli_connect("localhost", "root", "1234", "db_school");
>>>>>>> Stashed changes

if (mysqli_connect_errno()) {
	printf("Falló la conexión: %s\n", mysqli_connect_error());
	exit();
}

mysqli_set_charset($conexion, 'utf8');