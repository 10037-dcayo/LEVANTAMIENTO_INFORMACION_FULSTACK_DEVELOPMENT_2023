<?php
include_once '../modules/security.php';
include_once '../modules/conexion.php';

require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

if (empty($_POST['txtuseridUpdate'])) {
	header('Location: /');
	exit();
} else {
	$pass = mysqli_real_escape_string($conexion, $_POST['txtuserpassOldUpdate']);

	$sql = "SELECT * FROM users WHERE user = '" . $_POST['txtuseridUpdate'] . "' and BINARY pass = '" . $pass . "' LIMIT 1";

	if ($result = $conexion->query($sql)) {
		if ($row = mysqli_fetch_array($result)) {
			$sql = "SELECT user, email FROM users WHERE email = '" . $_POST['txtemailupdate'] . "' AND user != '" . $_POST['txtuseridUpdate'] . "' LIMIT 1";

			if ($result = $conexion->query($sql)) {
				if ($row = mysqli_fetch_array($result)) {
					$_SESSION['msgbox_info'] = 0;
					$_SESSION['msgbox_error'] = 1;
					$_SESSION['text_msgbox_error'] = 'Este correo electrónico ya está en uso.';
					header('Location: /user');
					exit();
				} else {
					if ($_POST['txtuserpassNewUpdate'] == $_POST['txtuserpassConfirmUpdate'] and $_POST['txtuserpassNewUpdate'] != "" and $_POST['txtuserpassConfirmUpdate'] != "") {
						$sql_update = "UPDATE users SET email = '" . $_POST['txtemailupdate'] . "', pass = '" . $_POST['txtuserpassNewUpdate'] . "' WHERE user = '" . $_POST['txtuseridUpdate'] . "'";
					} else {
						$sql_update = "UPDATE users SET email = '" . $_POST['txtemailupdate'] . "' WHERE user = '" . $_POST['txtuseridUpdate'] . "'";
					}

					if (mysqli_query($conexion, $sql_update)) {
						$_SESSION['msgbox_error'] = 0;
						$_SESSION['msgbox_info'] = 1;
						$_SESSION['text_msgbox_info'] = 'Usuario actualizado.';
					} else {
						$_SESSION['msgbox_info'] = 0;
						$_SESSION['msgbox_error'] = 1;
						$_SESSION['text_msgbox_error'] = 'Error al actualizar.';
					}
					header('Location: /user');
					exit();
				}
			}
		} else {
			$_SESSION['msgbox_info'] = 0;
			$_SESSION['msgbox_error'] = 1;
			$_SESSION['text_msgbox_error'] = 'Contraseña incorrecta.';
			header('Location: /user');
			exit();
		}
	}
}

$sql = "SELECT * FROM emprendedor WHERE user = '" . $_POST['txtuserid'] . "'";

if ($result = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($result)) {
		$date = date('Y-m-d H:i:s');
	
		$sql_update = "UPDATE emprendedor SET name = '" . trim($_POST['txtname']) . "', surnames = '" . trim($_POST['txtsurnames']) . "', cedula = '" . trim($_POST['txtcurp']) . "', address = '" . trim($_POST['txtrfc']) . "', date_of_birth = '" . trim($_POST['dateofbirth']) . "', gender = '" . trim($_POST['selectGender']) . "', phone = '" . trim($_POST['txtphone']) . "', email = '" . trim($_POST['txtaddress']) . "', pass = '" . trim($_POST['txtpass']) . "', updated_at = '" . $date . "' WHERE user = '" . trim($_POST['txtuserid']) . "'";

		if (mysqli_query($conexion, $sql_update))
			$sql_update = "UPDATE users SET name = '" . trim($_POST['txtname']) . "', surnames = '" . trim($_POST['txtsurnames']) . "', email = '" . trim($_POST['txtaddress']) . "', pass = '" . trim($_POST['txtpass']) . "' WHERE user = '" . trim($_POST['txtuserid']) . "'";

		if (mysqli_query($conexion, $sql_update)) {
			Info('Emprendedor actualizado.');
		} else {
			Error('Error al actualizar.');
		}
		
		header('Location: /modules/emprendedor');
		exit();
	} else {
		Error('Este ID de emprendedor no existe.');
		header('Location: /modules/emprendedor');
		exit();
	}
}