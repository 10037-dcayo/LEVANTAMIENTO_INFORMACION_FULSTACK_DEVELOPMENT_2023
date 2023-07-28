<?php
include_once '../security.php';
include_once '../conexion.php';
include_once '../notif_info_msgbox.php';

require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

$_POST['txtuserid'] = trim($_POST['txtuserid']);

if (empty($_POST['txtuserid'])) {
	header('Location: /');
	exit();
}
if ($_POST['txtuserid'] == '') {
	Error('Ingrese un ID correcto!!');
	header('Location: /modules/edit_send_one');
	exit();
}

// aqui empieza el update de estudiante

$sql_student = "SELECT * FROM send_one WHERE user = '" . $_POST['txtuserid'] . "'";


mysqli_begin_transaction($conexion);
try {
    // Actualizar tabla students
    if ($result = $conexion->query($sql_student)) {
        if ($row = mysqli_fetch_array($result)) {
            $date = date('Y-m-d H:i:s');

            $sql_update_student = "UPDATE send_one SET  estado = '" . trim($_POST['txtname']) ."', message = '" . trim($_POST['descripcion']). "' WHERE user = '" . trim($_POST['txtuserid']) . "'";

            if (mysqli_query($conexion, $sql_update_student)) {
                Info('Documento actualizado.');
            } else {
                Error('Error al actualizar.');
            }
        }
    }

    mysqli_commit($conexion);
} catch (Exception $e) {
    mysqli_rollback($conexion);
    Error('Error al actualizar.');
}

header('Location: /modules/edit_send_one');
exit();







# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠

// Todos los derechos reservados © Quito - Ecuador || Estudiantes TIC's en línea || Levantamiento de Información || ESPE 2022-2023

// Ricardo Alejandro  Jaramillo Salgado, Michael Andres Espinosa Carrera, Steven Cardenas, Luis LLumiquinga

# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠

