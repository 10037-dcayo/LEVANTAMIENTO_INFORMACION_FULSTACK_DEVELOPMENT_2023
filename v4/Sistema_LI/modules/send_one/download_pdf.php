<?php
include_once '../security.php';
include_once '../conexion.php';

require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

// Realiza la consulta SQL para obtener el PDF
$sql = "SELECT evidencepdf FROM send_one WHERE num = '" . $_SESSION['numero'] . "'";
$result = $conexion->query($sql);

if ($result && $row = mysqli_fetch_assoc($result)) {
    // Configura las cabeceras para la descarga del PDF
    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="documento.pdf"'); // Cambia el nombre del archivo aquí

    // Muestra el contenido del PDF almacenado en la base de datos
    echo $row['evidencepdf'];
    exit; // Termina la ejecución después de la descarga o visualización
} else {
    // Si no se encontró el PDF, devuelve un código de error
    http_response_code(404);
    echo "El PDF no está disponible.";
    exit;
}
?>