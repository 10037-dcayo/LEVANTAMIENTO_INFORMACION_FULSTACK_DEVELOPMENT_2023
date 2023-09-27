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




// Obtén el nombre del archivo de evidencia desde la base de datos
$sql_select = "SELECT evidencepdf from send_one WHERE user = '" . $_POST['txtuserid'] . "'";
// $result_select = mysqli_query($conexion, $sql_select);
// if (!$result_select) {
//     Error('Error al seleccionar el archivo.');
//     header('Location: /modules/send_one');
//     exit();
// }

// $row = mysqli_fetch_assoc($result_select);
// $nombreArchivoEvidencia = $row['evidencepdf'];

if ($result = $conexion->query($sql_select)) {
    if ($row = mysqli_fetch_array($result)) {
      $_SESSION['nombreArchivoEvidencia'] = $row['evidencepdf'];
    }
  }




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
// Elimina el archivo de evidencia del editor
$rutaArchivoEvidencia = '../edit_send_one/sendonepdf/' . $_SESSION["user"] . '/' . $nombreArchivoEvidencia;
echo "Ruta del archivo de evidencia: " . $rutaArchivoEvidencia; // Agrega esta línea para depuración


if (file_exists($rutaArchivoEvidencia)) {
    if (unlink($rutaArchivoEvidencia)) {
        Info('Archivo de evidencia eliminado.');
    } else {
        Error('No se pudo eliminar el archivo de evidencia en la ruta: ' . $rutaArchivoEvidencia);
    }
} else {
    Error('El archivo de evidencia no existe en la ruta: ' . $rutaArchivoEvidencia);
}

header('Location: /modules/send_one');
exit();
?>

