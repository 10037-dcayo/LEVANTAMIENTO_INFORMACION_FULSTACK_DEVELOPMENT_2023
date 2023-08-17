<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

$name = $_POST['txtname'];
$id = $_POST['txtuserid'];

?>

<div class="content-aside">
  <?php
  include_once '../notif_info.php';
  include_once "../sections/options.php";
  ?>
</div>

<div class="form-gridview">
  <table class="default">
    <?php
    echo '<h2 class="textList"> ' . $_POST['txtname'] . ' </h2>';
    ?>
    <div class="textList">
    <div class="item downLeft rounded-blue-box">
        <h2>Justificaciones</h2>
        <form action="" method="POST">
          <input style="display:none;" type="text" id="texuserid" name="txtuserid" value="<?php echo $id; ?>" />
          <input style="display:none;" type="text" id="texname" name="txtname" value="<?php echo $name; ?>" />
          <button class="btn" id="btnSave" value="form_justificaciones" name="btn" type="submit">Ver</button>
        </form>
      </div>
      <div class="item downLeft rounded-blue-box">
        <h2>Informes Quincenales</h2>
        <form action="" method="POST">
          <input style="display:none;" type="text" id="texuserid" name="txtuserid" value="<?php echo $id; ?>" />
          <input style="display:none;" type="text" id="texname" name="txtname" value="<?php echo $name; ?>" />
          <button class="btn" id="btnSave" value="form_infoq" name="btn" type="submit">Ver</button>
        </form>
      </div>

      <div class="item downLeft rounded-blue-box">
        <h2 >Envío 1</h2>
        <form action="" method="POST">
          <input style="display:none;" type="text" id="texuserid" name="txtuserid" value="<?php echo $id; ?>" />
          <input style="display:none;" type="text" id="texname" name="txtname" value="<?php echo $name; ?>" />
          <button class="btn" id="btnSave" value="form_documents" name="btn" type="submit">Ver</button>
        </form>
      </div>
      <div class="item downLeft rounded-blue-box">
        <h2 >Envío 2</h2>
        <form action="" method="POST">
          <input style="display:none;" type="text" id="texuserid" name="txtuserid" value="<?php echo $id; ?>" />
          <input style="display:none;" type="text" id="texname" name="txtname" value="<?php echo $name; ?>" />
          <button class="btn" id="btnSave" value="form_sendtwo" name="btn" type="submit">Ver</button>
        </form>
      </div>
    </div </table>
</div>