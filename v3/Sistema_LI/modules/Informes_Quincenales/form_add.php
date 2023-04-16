<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

$sql = "SELECT * FROM users WHERE user = '" . $_SESSION['user'] . "'";

if ($result = $conexion->query($sql)) {
    if ($row = mysqli_fetch_array($result)) {
        $_SESSION['user_id'] = $row['user'];
    }
}

if (isset($_POST['btnSave'])) {
    // obtener los datos del formulario
    $user_id = $_POST['txtuserid'];
    $pdf_descripcion = $_POST['txtdescripcion'];
    $pdf_archivo = $_FILES['pdf_archivo']['tmp_name']; // archivo PDF cargado

    // verificar si se cargó un archivo PDF
    if (!empty($pdf_archivo)) {
        // Verificar si hubo errores al subir el archivo
        if ($_FILES["pdf_archivo"]["error"] == 0) {
            // leer el archivo PDF y codificarlo como base64
            $pdf_base64 = base64_encode(file_get_contents($pdf_archivo));

            // crear carpeta si no existe
            $directory = "./uploads/" . $user_id;
            if (!is_dir($directory)) {
                mkdir($directory, 0777, true);
            }

            // guardar archivo en la carpeta con el nombre del user_id
            $file_name = basename($_FILES["pdf_archivo"]["name"]);
            $file_path = $directory . "/" . $file_name;
            if (move_uploaded_file($pdf_archivo, $file_path)) {
                // archivo guardado correctamente
            } else {
                // hubo un error al guardar el archivo
            }
        } else {
            // hubo un error al subir el archivo
        }
    }
}

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
        <form name="form-add-students" action="insert.php" method="POST" autocomplete="off" autocapitalize="on">
            <div class="wrap">
                <div class="first">
                    <label for="txtuserid" class="label">Usuario</label>
                    <input id="txtuserid" style="display: none;" type="text" name="txtuserid" value="<?php echo $_SESSION['user_id']; ?>" maxlength="50">
                    <input class="text" type="text" name="txt" value="<?php echo $_SESSION['user_id']; ?>" maxlength="50" disabled />
                    <label for="txtinfoqdescription" class="label">Descripción</label>
                    <input id="txtinfoqdescription" maxlength="2000" class="textarea" type="text" name="txtinfoqdescription" data-expandable/>
                    </div>
                    <div class="first">
                    <label for="txtusernum" class="label">N°PDF</label>
                    <input id="txtusernum" class="text" style=" display: none;" type="text" name="txtnum" value="<?php echo $id_generate; ?>" maxlength="50" required />
                    <input class="text" type="text" name="txt" value="<?php echo $id_generate; ?>" required disabled />     
                    </div>
                    <div class="first">
                    <label for="txtuserarchivo" class="label">Archivo</label>
                    <input id="txtuserarchivo" class="text" type="file" name="pdf_archivo" accept="application/pdf" required />

                    </div>
                    </div>
            
            <button id="btnSave" class="btn icon" type="submit">save</button>
        </form>
    </div>
</div>
<div class="content-aside">
    <?php
    include_once "../sections/options-disabled.php";
    ?>
</div>
<script src="/js/modules/students.js" type="text/javascript"></script>


