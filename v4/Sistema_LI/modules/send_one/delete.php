<?php
include_once '../security.php';
include_once '../conexion.php';
include_once '../notif_info_msgbox.php';


require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

if (empty($_POST['txtuserid']) || empty($_POST['txtevidencefile'])) {
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
$nombreArchivoEvidencia = $_POST['txtevidencefile'];

// Elimina la entrada de la base de datos
$sql_delete = "DELETE FROM send_one WHERE archivopdf = '" . $nombreArchivo . "'";
if (mysqli_query($conexion, $sql_delete)) {
    Info('Entrada eliminada de la base de datos.');
} else {
    Error('Error al eliminar la entrada de la base de datos.');
}

// Elimina el archivo del usuario
$rutaArchivo = 'sendonepdf/' . $_SESSION["user"] . '/' . $nombreArchivo;
if (file_exists($rutaArchivo) && unlink($rutaArchivo)) {
    Info('Archivo del usuario eliminado.');

    // Verifica si el archivo de evidencia existe y elimínalo si es necesario.
    $rutaArchivoEvidencia = '../edit_send_one/sendonepdf/' . $_SESSION["user"] . '/' . $nombreArchivoEvidencia;

    if (file_exists($rutaArchivoEvidencia)) {
        if (unlink($rutaArchivoEvidencia)) {
            Info('Archivo de evidencia eliminado.');
        } else {
            Error('No se pudo eliminar el archivo de evidencia en la ruta: ' . $rutaArchivoEvidencia);
        }
    } else {
        Error('El archivo de evidencia no existe en la ruta: ' . $rutaArchivoEvidencia);
    }
} else {
    Error('No se pudo eliminar el archivo del usuario.');
}

header('Location: /modules/send_one');
exit();
?>
