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
        <div class="first">
          <label for="txtname" class="label">N°PDF</label>
          <input id="txtname" class="text" style=" display: none;" type="text" name="name"
            value="<?php echo $_SESSION['evidencia']; ?>" maxlength="50" required />
          <input class="text" type="text" name="txt" value="<?php echo $_SESSION['evidencia']; ?>" required disabled />
        </div>

        <div class="first">
    <button id="btnMostrarPDF" class="btn" type="button">Mostrar PDF</button>
</div>

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

