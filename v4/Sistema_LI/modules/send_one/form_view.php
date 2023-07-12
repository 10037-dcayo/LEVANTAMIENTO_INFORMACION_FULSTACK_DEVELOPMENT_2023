<?php
include_once '../security.php';
include_once '../conexion.php';
include_once '../notif_info_msgbox.php';


$sql = "SELECT * FROM send_one";
if ($resultado = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($resultado)) {
		$_SESSION['status'] = $row['estado'];
	}
}

require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

if (empty($_POST['txtuserid'])) {
  header('Location: /');
  exit();
}

$archivopdf = $_POST['txtuserid'];

$sql = "SELECT * FROM send_one";
if ($resultado = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($resultado)) {
		$_SESSION['status'] = $row['estado'];
	}
}


$usuario = $_SESSION["user"];
$numero = $_SESSION["num"];
?>
<div class="form-data">
  <div class="head">
    <h1 class="titulo">Visualizar</h1>
  </div>
  <div class="body">
    <form action="insert.php" method="post" autocomplete="off" autocapitalize="on" enctype="multipart/form-data">
      <div class="wrap">
        <div class="first">
          <label for="txtuserid" class="label">Usuario</label>
          <input id="txtuserid" style="display: none;" type="text" name="userid" value="<?php echo $usuario; ?>"
            maxlength="50">
          <input class="text" type="text" name="txt" value="<?php echo $usuario; ?>" maxlength="50" disabled />
        </div>
        <div class="first">
          <label for="txtusernum" class="label">N°PDF</label>
          <input id="txtusernum" class="text" style=" display: none;" type="text" name="num"
            value="<?php echo $numero; ?>" maxlength="50" required />
          <input class="text" type="text" name="txt" value="<?php echo implode(", ", $numero); ?>" required disabled />
        </div>

        <div class="first">
          <label for="txtname" class="label">Nombre</label>
          <input id="txtname" class="text" style=" display: none;" type="text" name="name"
            value="<?php echo $archivopdf; ?>" maxlength="50" required />
          <input class="text" type="text" name="txt" value="<?php echo $archivopdf; ?>" required disabled />
        </div>

        <div class="first">
          <label for="txtstate" class="label">Estado</label>
          <input id="txtestate" class="text" style=" display: none;" type="text" name="state"
            value="<?php echo '.$_SESSION["status"];.' ?>" maxlength="50" required />
          <input class="text" type="text" name="txt" value="<?php echo $estado; ?>" required disabled />
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