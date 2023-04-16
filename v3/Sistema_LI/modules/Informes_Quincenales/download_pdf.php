<?php
include_once '../security.php';
include_once '../conexion.php';


require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

$sql = "SELECT archivo FROM infoq WHERE num = '" . $_SESSION['num'] . "'";

if ($result = $conexion->query($sql)) {
    if ($row = mysqli_fetch_array($result)) {
        $archivo = $row['archivo'];
        header("Content-type: application/pdf");
        header("Content-Disposition: attachment; filename= archivo.pdf ");
        echo $archivo;
        exit;
    }
}
?>

