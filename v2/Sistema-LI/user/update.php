<?php
include_once '../modules/security.php';
include_once '../modules/conexion.php';
include_once '../modules/notif_info_msgbox.php';

require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

$_POST['txtuserid'] = trim($_POST['txtuserid']);

if (empty($_POST['txtuserid'])) {
	header('Location: /');
	exit();
}
if ($_POST['txtuserid'] == '') {
	Error('Ingrese un ID correcto.');
	header('Location: /modules/emprendedor');
	exit();
}

/*
// aqui empieza estudiante

$sql_student = "SELECT * FROM students WHERE user = '" . $_POST['txtuserid'] . "'";
$sql_user = "SELECT * FROM users WHERE user = '" . $_POST['txtuserid'] . "'";
$sql = "SELECT * FROM emprendedor WHERE user = '" . $_POST['txtuserid'] . "'";


mysqli_begin_transaction($conexion);
try {
    // Actualizar tabla students
    if ($result = $conexion->query($sql_student)) {
        if ($row = mysqli_fetch_array($result)) {
            $date = date('Y-m-d H:i:s');

            $sql_update_student = "UPDATE students SET name = '" . trim($_POST['txtname']) . "', surnames = '" . trim($_POST['txtsurnames']) ."', email = '" . trim($_POST['txtemailupdate']). "', cedula = '" . trim($_POST['txtcedula']) . "', pass = '" . trim($_POST['txtpass']) . "', id = '" . trim($_POST['txtid']) . "', date_of_birth = '" . trim($_POST['dateofbirth']) . "', sede = '" . trim($_POST['selectSede']) . "', phone = '" . trim($_POST['txtphone']) . "', address = '" . trim($_POST['txtaddress']) . "', career = '" . trim($_POST['selectCareer']) . "', documentation = '" . trim($_POST['selectDocumentation']) . "', admission_date = '" . trim($_POST['dateadmission']) . "', updated_at = '" . $date . "' WHERE user = '" . trim($_POST['txtuserid']) . "'";

            if (mysqli_query($conexion, $sql_update_student)) {
                Info('Alumno actualizado.');
            } else {
                Error('Error al actualizar.');
            }
        } else {
            Error('Este ID de alumno no existe.');
        }
    }

    // Actualizar tabla users
    if ($result = $conexion->query($sql_user)) {
        if ($row = mysqli_fetch_array($result)) {
            $date = date('Y-m-d H:i:s');
            $sql_update_user = "UPDATE users SET name ='" . trim($_POST['txtname']) . "', surnames = '" . trim($_POST['txtsurnames']) ."', email = '" . trim($_POST['txtemailupdate']). "', pass = '" . trim($_POST['txtpass']) . "', permissions = 'editor', updated_at = '" . $date . "' WHERE user = '" . trim($_POST['txtuserid']) . "'";

            if (mysqli_query($conexion, $sql_update_user)) {
                Info('Usuario actualizado.');
            } else {
                Error('Error al actualizar.');
            }
        } else {
            Error('Este ID de usuario no existe.');
        }
    }

    mysqli_commit($conexion);
} catch (Exception $e) {
    mysqli_rollback($conexion);
    Error('Error al actualizar.');
}

header('Location: /user/');
exit();

*/
// aqui acaba estudiante





// aqui empieza emprendedor

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
		
		header('Location: /user');
		exit();
	} else {
		Error('Este ID de emprendedor no existe.');
		header('Location: /user');
		exit();
	}
}

// aquí termina emprendedor