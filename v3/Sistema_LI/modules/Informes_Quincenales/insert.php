<?php
include_once '../security.php';
include_once '../conexion.php';
include_once '../notif_info_msgbox.php';

require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

$sql = "SELECT * FROM infoq WHERE num = '" . $_POST['txtnum'] . "'";
if ($result = $conexion->query($sql)) {
    if ($row = mysqli_fetch_array($result)) {
        Error('Ya existe un archivo con este ID.');
        header('Location: /modules/Informes_Quincenales');
        exit();
    } else {
        $date = date('Y-m-d H:i:s');
        $sql_insert = "INSERT INTO infoq (user, num, archivopdf, descripcion, created_at, updated_at) VALUES ('" . trim($_POST['txtuserid']) . "', '" . trim($_POST['txtnum']) . "', '" . trim($_POST['archivo']) . "', '" . trim($_POST['txtinfoqdescription']) . "','" . $date . "', '" . $date . "')";

        if (mysqli_query($conexion, $sql_insert)) {
            Info('Archivo creado.');
        } else {
            Error('Error al crear.');
        }
        
        header('Location: /modules/Informes_Quincenales');
        exit();
    }
} else {
    Error('Error en la consulta.');
    header('Location: /modules/Informes_Quincenales');
    exit();
}





