<?php
include_once '../security.php';
include_once '../conexion.php';
include_once '../notif_info_msgbox.php';


require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

if (empty($_POST['txtuserid'])) {
    header('Location: /');
    exit();
}


<<<<<<< HEAD
$sql_delete = "DELETE FROM send_one WHERE user = '" . $_POST['txtuserid'] . "'";
=======
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

>>>>>>> fb882e029088ce6f93ec185827d623fe9b0e5a46
$nombreArchivo = $_POST['txtuserid'];
$rutaArchivo = 'sendonepdf/' . $_SESSION["user"] . '/' . $nombreArchivo;
//file_exists($rutaArchivo) && 
//unlink($rutaArchivo) && 
if (mysqli_query($conexion, $sql_delete))
 { 
<<<<<<< HEAD
    $sql_delete = "DELETE FROM send_one WHERE user = '" . $_POST['txtuserid'] . "'";

    if (mysqli_query($conexion, $sql_delete)) {
=======
    if (unlink($rutaArchivo) & mysqli_query($conexion, $sql_delete)) {
>>>>>>> fb882e029088ce6f93ec185827d623fe9b0e5a46
        Error('Archivo Eliminado');
        
    } else {
        Error( 'No se pudo eliminar el archivo.');
    }
} else {
    Error('El archivo no existe');
}

header('Location: /modules/send_one');
exit();
