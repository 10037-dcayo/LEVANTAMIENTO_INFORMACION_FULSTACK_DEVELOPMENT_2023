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

$date = date('Y-m-d H:i:s');

$sql_update = "UPDATE infoq SET  estado = '" . trim($_POST['txtestado']) ."', message = '" . trim($_POST['descripcion']). "',updated_at='$date', evidencepdf = '" . trim($_POST['archivo']). "'  WHERE num = '" . trim($_POST['txtnum']) . "'";;

if (mysqli_query($conexion, $sql_update)) {
	$sql_update = "UPDATE infoq SET  estado = '" . trim($_POST['txtestado']) ."', message = '" . trim($_POST['descripcion']). "',updated_at='$date', evidencepdf = '" . trim($_POST['archivo']).  "'  WHERE num = '" . trim($_POST['txtnum']) . "'";;

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