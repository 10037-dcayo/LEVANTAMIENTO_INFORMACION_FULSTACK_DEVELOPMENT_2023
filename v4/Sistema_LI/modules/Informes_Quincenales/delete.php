<?php
include_once '../security.php';
include_once '../conexion.php';
include_once '../notif_info_msgbox.php';


require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

if (empty($_POST['txtuserid'])) {
    header('Location: /');
    exit();
}


$sql_delete = "DELETE FROM infoq WHERE archivopdf = '" . $_POST['txtuserid'] . "'";

if (mysqli_query($conexion, $sql_delete)) {
	$sql_delete = "DELETE FROM infoq WHERE archivopdf = '" . $_POST['txtuserid'] . "'";

	if (mysqli_query($conexion, $sql_delete)) {
		Error('Alumno eliminado.');
	} else {
		Error('Error al eliminar.');
	}
} else {
	Error('Error al eliminar.');
}

$nombreArchivo = $_POST['txtuserid'];
$rutaArchivo = 'informesquincenalespdf/' . $_SESSION["user"] . '/' . $nombreArchivo;

if (file_exists($rutaArchivo) & mysqli_query($conexion, $sql_delete))
 { 
    if (unlink($rutaArchivo) & mysqli_query($conexion, $sql_delete)) {
        Error('Archivo Eliminado');
        
    } else {
        Error( 'No se pudo eliminar el archivo.');
    }
} else {
    Error('El archivo no existe');
}

header('Location: /modules/Informes_Quincenales');
exit();