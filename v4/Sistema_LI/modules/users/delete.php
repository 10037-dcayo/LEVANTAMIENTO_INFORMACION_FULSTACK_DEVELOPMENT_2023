<?php
include_once '../security.php';
include_once '../conexion.php';
include_once '../notif_info_msgbox.php';

require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin.php');

if (empty($_POST['txtuserid'])) {
	header('Location: /');
	exit();
}

$sql_delete = "DELETE FROM users WHERE user = '" . $_POST['txtuserid'] . "'";

if (mysqli_query($conexion, $sql_delete)) {
	$sql_delete = "DELETE FROM administratives WHERE user = '" . $_POST['txtuserid'] . "'";
		Error('Personal editor eliminado.');
} else {
	Error('Error al eliminar.');
}
header('Location: /modules/users');
exit();




# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠

// Todos los derechos reservados © Quito - Ecuador || Estudiantes TIC's en línea || Levantamiento de Información || ESPE 2022-2023

// Ricardo Alejandro  Jaramillo Salgado, Michael Andres Espinosa Carrera, Steven Cardenas, Luis LLumiquinga

# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠

