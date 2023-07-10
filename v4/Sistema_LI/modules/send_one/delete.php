<?php
include_once '../security.php';
include_once '../conexion.php';
include_once '../notif_info_msgbox.php';


require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

if (empty($_POST['txtuserid'])) {
    header('Location: /');
    exit();
}

$nombreArchivo = $_POST['txtuserid'];
$rutaArchivo = 'sendonepdf/' . $_SESSION["user"] . '/' . $nombreArchivo;

if (file_exists($rutaArchivo)) { 
    if (unlink($rutaArchivo)) {
        echo 'El archivo "' . $nombreArchivo . '" ha sido eliminado correctamente.';
    } else {
        echo 'No se pudo eliminar el archivo.';
    }
} else {
    echo 'El archivo "' . $nombreArchivo . '""' . $rutaArchivo . '" no existe.';
}
