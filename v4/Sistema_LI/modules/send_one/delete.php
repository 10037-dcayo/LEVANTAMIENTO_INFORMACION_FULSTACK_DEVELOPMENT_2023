<?php
include_once '../security.php';
include_once '../conexion.php';
include_once '../notif_info_msgbox.php';


require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

if (empty($_POST['txtuserid'])) {
    header('Location: /');
    exit();
}


$sql_delete = "DELETE FROM send_one WHERE archivopdf = '" . $_POST['txtuserid'] . "'";

if (mysqli_query($conexion, $sql_delete)) {
	$sql_delete = "DELETE FROM send_one WHERE archivopdf = '" . $_POST['txtuserid'] . "'";

	if (mysqli_query($conexion, $sql_delete)) {
		Error('Alumno eliminado.');
	} else {
		Error('Error al eliminar.');
	}
} else {
	Error('Error al eliminar.');
}

$nombreArchivo = $_POST['txtuserid'];
$rutaArchivo = 'sendonepdf/' . $_SESSION["user"] . '/' . $nombreArchivo;

<<<<<<< HEAD
if (file_exists($rutaArchivo))
 { 
    if (unlink($rutaArchivo)) {
=======
if (file_exists($rutaArchivo) & mysqli_query($conexion, $sql_delete))
 { 
    if (unlink($rutaArchivo) & mysqli_query($conexion, $sql_delete)) {
>>>>>>> ad5e6b3d410ebffa3c18fc98b4867fa70efc83e9
        Error('Archivo Eliminado');
        
    } else {
        Error( 'No se pudo eliminar el archivo.');
    }
} else {
    Error('El archivo no existe');
}

header('Location: /modules/send_one');
exit();