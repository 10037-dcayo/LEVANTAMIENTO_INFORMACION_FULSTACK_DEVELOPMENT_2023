<?php
include_once '../security.php';
include_once '../conexion.php';
include_once '../notif_info_msgbox.php';


require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

$sql = "SELECT * FROM send_two WHERE archivopdf = '" . $_POST['txtuserid'] . "'";

// Verifica si se ha hecho clic en el botón de descarga
if (isset($_POST['download_pdf'])) {
  // Realiza la consulta SQL para obtener el PDF
  $sql = "SELECT evidencepdf FROM send_two WHERE num = '" . $_SESSION['numero'] . "'";
  $result = $conexion->query($sql);

  if ($result && $row = mysqli_fetch_assoc($result)) {
      // Configura las cabeceras para la descarga del PDF
      header('Content-Type: application/pdf');
      header('Content-Disposition: inline; filename="documento.pdf"'); // Puedes cambiar el nombre del archivo aquí

      // Muestra el contenido del PDF almacenado en la base de datos
      echo $row['evidencepdf'];
      exit; // Termina la ejecución después de la descarga o visualización
  } else {
      // Si no se encontró el PDF, muestra un mensaje de error
      echo "El PDF no está disponible.";
      exit;
  }
}

if ($result = $conexion->query($sql)) {
  if ($row = mysqli_fetch_array($result)) {
    $_SESSION['user_id'] = $row['user'];
    $_SESSION['numero'] = $row['num'];
    $_SESSION['state'] = $row['estado'];
    $_SESSION['mensaje'] = $row['message'];
    $_SESSION['nombre'] = $row['archivopdf'];
    $_SESSION['evidencia'] = $row['evidencepdf'];
  }
}

?>
<div class="form-data">
  <div class="head">
    <h1 class="titulo">Visualizar</h1>
  </div>
  <div class="body">
    <form action="#" method="post" autocomplete="off" autocapitalize="on" enctype="multipart/form-data">
      <div class="wrap">
        <div class="first">
          <label for="txtuserid" <label for="txtuserid" class="label">Usuario</label>
          <input id="txtuserid" style="display: none;" type="text" name="userid"
            value="<?php echo $_SESSION['user_id']; ?>" maxlength="50">
          <input class="text" type="text" name="txt" value="<?php echo $_SESSION['user_id']; ?>" maxlength="50"
            disabled />
          <label for="txtinfoqdescription" class="label">Descripción</label>
          <textarea name="descripcion" id="descripcion" class="textarea" cols="30" rows="10"
          value="<?php echo $_SESSION['user_id']; ?>" readonly><?php echo $_SESSION['mensaje']; ?></textarea>
        </div>
        <div class="first">
          <label for="txtname" class="label">Estado</label>
          <input id="txtname" class="text" style=" display: none;" type="text" name="name"
            value="<?php echo $_SESSION['state']; ?>" maxlength="50" required />
          <input class="text" type="text" name="txt" value="<?php echo $_SESSION['state']; ?>" required disabled />
        </div>
        <div class="first">
          <label for="txtname" class="label">Nombre</label>
          <input id="txtname" class="text" style=" display: none;" type="text" name="name"
            value="<?php echo $_SESSION['nombre']; ?>" maxlength="50" required />
          <input class="text" type="text" name="txt" value="<?php echo $_SESSION['nombre']; ?>" required disabled />
        </div>
        <div class="first">
          <label for="txtname" class="label">N°PDF</label>
          <input id="txtname" class="text" style=" display: none;" type="text" name="name"
            value="<?php echo $_SESSION['numero']; ?>" maxlength="50" required />
          <input class="text" type="text" name="txt" value="<?php echo $_SESSION['numero']; ?>" required disabled />
        </div>


        
        <button class="btn icon" type="button" onclick="downloadPDF()">PDF</button>

      </div>

      <button class="btn icon" type="submit" autofocus>done</button>
    </form>
  </div>
</div>
<div class="content-aside">
  <?php
  include_once "../sections/options-disabled.php";
  ?>
</div>
<script src="/js/modules/students.js" type="text/javascript"></script>

<script>
function downloadPDF() {
    // Hacer una solicitud AJAX para obtener el PDF
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'download_pdf.php', true); // Crea un archivo PHP separado para manejar la descarga
    xhr.responseType = 'blob';

    xhr.onload = function() {
        if (xhr.status === 200) {
            var blob = xhr.response;

            // Crea un enlace para descargar el PDF
            var a = document.createElement('a');
            a.href = window.URL.createObjectURL(blob);
            a.download = 'documento.pdf'; // Cambia el nombre del archivo aquí
            a.style.display = 'none';

            // Agrega el enlace al documento y haz clic en él
            document.body.appendChild(a);
            a.click();

            // Limpia el enlace
            window.URL.revokeObjectURL(a.href);
            document.body.removeChild(a);
        } else {
            alert('Error al descargar el PDF.');
        }
    };

    xhr.send();
}
</script>