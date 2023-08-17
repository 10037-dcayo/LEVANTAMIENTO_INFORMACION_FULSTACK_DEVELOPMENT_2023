<?php
include_once '../security.php';
include_once '../conexion.php';
include_once '../notif_info_msgbox.php';

require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

$_POST['txtnum'] = trim($_POST['txtnum']);


if (empty($_POST['txtnum'])) {
	header('Location: /');
	exit();
}


$sql_update = "UPDATE send_two SET  estado = '" . trim($_POST['txtestado']) ."', message = '" . trim($_POST['descripcion']). "' WHERE num = '" . trim($_POST['txtnum']) . "'";;

if (mysqli_query($conexion, $sql_update)) {
	$sql_update = "UPDATE send_two SET  estado = '" . trim($_POST['txtestado']) ."', message = '" . trim($_POST['descripcion']). "' WHERE num = '" . trim($_POST['txtnum']) . "'";;

	if (mysqli_query($conexion, $sql_update)) {
		Info('Documento actualizado.');
	} else {
		Error('Error al atualizar.');
	}
} else {
	Error('Error al actualizar.');
}
header('Location: /modules/edit_send_one');
exit();