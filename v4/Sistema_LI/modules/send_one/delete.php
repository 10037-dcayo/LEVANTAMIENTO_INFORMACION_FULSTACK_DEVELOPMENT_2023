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
} else {
    Error('No se pudo eliminar el archivo del usuario.');
}
// Vacía la carpeta del usuario en edit_send_one/sendonepdf
$rutaCarpetaUsuario = '../edit_send_one/sendonepdf/' . $_SESSION["user"] . '/';
if (is_dir($rutaCarpetaUsuario)) {
    // Obtiene una lista de archivos en la carpeta
    $archivosUsuario = glob($rutaCarpetaUsuario . '*');
    
    if ($archivosUsuario) {
        foreach ($archivosUsuario as $archivo) {
            if (is_file($archivo) && unlink($archivo)) {
                Info('Archivo del usuario eliminado. ' );
            } else {
                Error('No se pudo eliminar el archivo del usuario. ' );
            }
        }
    } else {
        Info('No se encontraron archivos en la carpeta del usuario.');
    }
} else {
    Info('La carpeta del usuario no existe.');
}


header('Location: /modules/send_one');
exit();
?>