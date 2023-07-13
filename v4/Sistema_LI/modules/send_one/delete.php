<?php
include_once '../security.php';
include_once '../conexion.php';
include_once '../notif_info_msgbox.php';


require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

if (empty($_POST['txtuserid'])) {
    header('Location: /');
    exit();
}


$sql_delete = "DELETE FROM users WHERE user = '" . $_POST['txtuserid'] . "'";
$nombreArchivo = $_POST['txtuserid'];
$rutaArchivo = 'sendonepdf/' . $_SESSION["user"] . '/' . $nombreArchivo;

if (file_exists($rutaArchivo) & mysqli_query($conexion, $sql_delete))
 { 
    $sql_delete = "DELETE FROM send_one WHERE user = '" . $_POST['txtuserid'] . "'";
    if (unlink($rutaArchivo) & mysqli_query($conexion, $sql_delete)) {
        Error('Archivo Eliminado');
        
    } else {
        Error( 'No se pudo eliminar el archivo.');
    }
} else {
    Error('El archivo no existe');
}
header('Location: /modules/send_one');
exit();


# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠

// Todos los derechos reservados © Quito - Ecuador || Estudiantes TIC's en línea || Levantamiento de Información || ESPE 2022-2023

// Ricardo Alejandro  Jaramillo Salgado, Michael Andres Espinosa Carrera, Steven Cardenas, Luis LLumiquinga

# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠