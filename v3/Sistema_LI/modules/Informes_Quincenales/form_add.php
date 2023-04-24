<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');
include_once '../conexion.php';

$sql = "SELECT * FROM users WHERE user = '" . $_SESSION['user'] . "'";

if ($result = $conexion->query($sql)) {
    if ($row = mysqli_fetch_array($result)) {
        $_SESSION['user_id'] = $row['user'];
    }
}



//$id = $_SESSION["user_id"];
//echo "Mi id es: " . $id;


/*$target_dir = "informesquincenalespdf/" . $id . "/";
if (!file_exists($target_dir)) {
    mkdir($target_dir, 0777, true);
}

// Obtener el archivo PDF enviado
$target_file = $target_dir . basename($_FILES["archivo"]["name"]);
$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Verificar que es un archivo PDF
if ($fileType != "pdf") {
    echo "Solo se permiten archivos PDF.";
} else {
    // Almacenar el archivo PDF en la carpeta
    if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $target_file)) {
        echo "El archivo ". basename( $_FILES["archivo"]["name"]). " ha sido almacenado.";
    } else {
        echo "Ocurrió un error al cargar el archivo.";
    }
}
*/    
		



function unique_id($l = 10)
{
    return substr(md5(uniqid(mt_rand(), true)), 0, $l);
}


$id_generate = 'Q-' . unique_id(5);
?>
<div class="form-data">
    <div class="head">
        <h1 class="titulo">Agregar</h1>
    </div>
    <div class="body">
        <form  action="insert.php" method="post" autocomplete="off" autocapitalize="on" enctype="multipart/form-data">
            <div class="wrap">
                <div class="first">
                    <label for="txtuserid" class="label">Usuario</label>
                    <input id="txtuserid" style="display: none;" type="text" name="userid" value="<?php echo $_SESSION['user_id']; ?>" maxlength="50">
                    <input class="text" type="text" name="txt" value="<?php echo $_SESSION['user_id']; ?>" maxlength="50" disabled />
                    <label for="txtinfoqdescription" class="label">Descripción</label>
                    <input id="txtinfoqdescription" maxlength="2000" class="textarea" type="text" name="descripcion" data-expandable/>
                    </div>
                    <div class="first">
                    <label for="txtusernum" class="label">N°PDF</label>
                    <input id="txtusernum" class="text" style=" display: none;" type="text" name="num" value="<?php echo $id_generate; ?>" maxlength="50" required />
                    <input class="text" type="text" name="txt" value="<?php echo $id_generate; ?>" required disabled />     
                    </div>
                    <div class="first">
                    <label for="txtuserarchivo" class="label">Archivo</label>
                    <input type="file" class="text" id="archivo" name="archivo" accept="application/pdf" required>
                    </div>
                    </div>
            
            <button class="btn icon" type="submit">save</button>
        </form>
    </div>
</div>
<div class="content-aside">
    <?php
    include_once "../sections/options-disabled.php";
    ?>
</div>
<script src="/js/modules/students.js" type="text/javascript"></script>


