<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

$name = $_POST['txtname'];
$id = $_POST['txtuserid'];

$sql = "SELECT students.*, careers.name AS career_name
        FROM students
        INNER JOIN careers ON students.career = careers.career
        WHERE students.user = '" . $_POST['txtuserid'] . "'";


if ($result = $conexion->query($sql)) {
  if ($row = mysqli_fetch_array($result)) {
    $_SESSION['user_email'] = $row['email'];
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['user_cedula'] = $row['cedula'];
    $_SESSION['user_carrera'] = $row['career_name'];
    $_SESSION['user_sede'] = $row['sede'];
    $_SESSION['user_departamento'] = $row['departamento'];
    $_SESSION['user_telefono'] = $row['phone'];
  }
}
?>

<div class="content-aside">
  <?php
  include_once '../notif_info.php';
  include_once "../sections/options.php";
  ?>
</div>
<div class="form-gridview">
  <h2 class="title-info">Información del Estudiante</h2>
  <div class="contenedor-info">
      <?php
      echo '<h2 class="information_student"> ' . $_POST['txtname'] . ' </h2>';
      ?>
      <h2 class="information_student">Id: <?php echo $_SESSION['user_id']; ?></h2> 
      <h2 class="information_student">Cedula: <?php echo $_SESSION['user_cedula']; ?></h2>
      <h2 class="information_student">Carrera: <?php echo $_SESSION['user_carrera']; ?></h2>
      <h2 class="information_student">Sede: <?php echo $_SESSION['user_sede']; ?></h2>
      <h2 class="information_student">Departamento: <?php echo $_SESSION['user_departamento']; ?></h2>
      <h2 class="information_student">Telefono: <?php echo $_SESSION['user_telefono']; ?></h2>
  </div>
</div>
<div class="form-gridview">
  <table class="default">
    <div class="textList">
      <div class="item downLeft rounded-blue-box">
        <h2>Justificaciones</h2>
        <form action="" method="POST">
          <input style="display:none;" type="text" id="texuserid" name="txtuserid" value="<?php echo $id; ?>" />
          <input style="display:none;" type="text" id="texname" name="txtname" value="<?php echo $name; ?>" />
          <button class="btn-menu-editor" id="btnSave" value="form_justificaciones" name="btn" type="submit">Ver</button>
        </form>
      </div>
      <div class="item downLeft rounded-blue-box">
        <h2>Informes Quincenales</h2>
        <form action="" method="POST">
          <input style="display:none;" type="text" id="texuserid" name="txtuserid" value="<?php echo $id; ?>" />
          <input style="display:none;" type="text" id="texname" name="txtname" value="<?php echo $name; ?>" />
          <button class="btn-menu-editor" id="btnSave" value="form_infoq" name="btn" type="submit">Ver</button>
        </form>
      </div>

      <div class="item downLeft rounded-blue-box">
        <h2 >Envío 1</h2>
        <form action="" method="POST">
          <input style="display:none;" type="text" id="texuserid" name="txtuserid" value="<?php echo $id; ?>" />
          <input style="display:none;" type="text" id="texname" name="txtname" value="<?php echo $name; ?>" />
          <button class="btn-menu-editor" id="btnSave" value="form_documents" name="btn" type="submit">Ver</button>
        </form>
      </div>
      <div class="item downLeft rounded-blue-box">
        <h2 >Envío 2</h2>
        <form action="" method="POST">
          <input style="display:none;" type="text" id="texuserid" name="txtuserid" value="<?php echo $id; ?>" />
          <input style="display:none;" type="text" id="texname" name="txtname" value="<?php echo $name; ?>" />
          <button class="btn-menu-editor" id="btnSave" value="form_sendtwo" name="btn" type="submit">Ver</button>
        </form>
      </div>
    </div>
</div>