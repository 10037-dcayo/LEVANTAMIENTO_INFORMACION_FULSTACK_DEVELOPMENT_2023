<?php
include_once '../security.php';
include_once '../conexion.php';
include_once '../notif_info_msgbox.php';
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

$id = $_POST['txtuserid'];

$sql = "SELECT * FROM send_one WHERE archivopdf = '" . $_POST['txtuserid'] . "'";

if ($result = $conexion->query($sql)) {
  if ($row = mysqli_fetch_array($result)) {
    $_SESSION['user_id'] = $row['user'];
    $_SESSION['numero'] = $row['num'];
    $_SESSION['state'] = $row['estado'];
    $_SESSION['mensaje'] = $row['message'];
    $_SESSION['nombre'] = $row['archivopdf'];
    $_SESSION['evidencia'] = $row['evidencepdf'];
    $_SESSION['coment'] = $row['message_student'];
  }
}
$id = $_SESSION['user_id'];
//obtenemos los comentarios del estudiante
$comenario_estudiante = $_SESSION['coment'];
// Obtén el nombre del archivo desde la base de datos o alguna otra fuente
$nombre_del_archivo = $_SESSION['evidencia'];
// Construye la URL completa al archivo PDF
$url_archivo_pdf = '/modules/edit_send_one/sendonepdf/' . $id . '/' . $nombre_del_archivo;



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
        </div>
        <div class="first">
          <label for="txtname" class="label">Estado</label>
          <input id="txtname" class="text" style=" display: none;" type="text" name="name"
            value="<?php echo $_SESSION['state']; ?>" maxlength="50" required />
          <input class="text" type="text" name="txt" value="<?php echo $_SESSION['state']; ?>" required disabled />
        </div>
        <div class="first">
          <label for="txtinfoqdescription" class="label">Comentario de documentación</label>
          <textarea name="descripcion" id="descripcion" class="textarea" cols="30" rows="10"
            value="<?php echo $_SESSION['user_id']; ?>" readonly><?php echo $_SESSION['mensaje']; ?></textarea>
        </div>
        <div class="first">
          <label for="txtcomentario" class="label">Comentarios del estudiante</label>
          <textarea name="comentario" id="comentario" class="textarea" cols="30" rows="10"
            value="<?php echo $_SESSION['user_id']; ?>"><?php echo $comenario_estudiante; ?></textarea>
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
        <div class="first">
          <label for="txtname" class="label">Nombre PDF</label>
          <input id="txtname" class="text" style="display: none;" type="text" name="name"
            value="<?php echo $_SESSION['evidencia']; ?>" maxlength="50" required />
          <input class="text" type="text" name="txt" value="<?php echo $_SESSION['evidencia']; ?>" required disabled />
        </div>

        <?php if (!empty($_SESSION['evidencia'])): ?>
          <div class="first">
            <a href="<?php echo $url_archivo_pdf; ?>" download class="btn-download">Descargar Documento</a>
          </div>
        <?php endif; ?>

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