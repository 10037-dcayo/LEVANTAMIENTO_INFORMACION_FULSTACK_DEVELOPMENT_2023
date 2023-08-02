<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');



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
			echo '<h2 class="textList"> ' .$_POST['txtname'].' </h2>'
		?>
    <div class="textList">
      <div class="item upLeft">
        <h2 class="textList">Justificación</h2>
        <form action="form-name-repetido-1.php">
          <p><input type="submit" value="Ver"></p>
        </form>
      </div>
      <div class="item upRight">
        <h2 class="textList">Informes Quincenales</h2>
        <form action="form-name-repetido-2.php">
          <p><input type="submit" value="Ver"></p>
        </form>
      </div>
      <div class="item downLeft">
        <h2 class="textList">Envío 1</h2>
        <form action="form-name-repetido-3.php">
          <p><input type="submit" value="Ver"></p>
        </form>
      </div>
      <div class="item downRight">
        <h2 class="textList">Envío 2</h2>
        <form action="form-name-repetido-4.php">
          <p><input type="submit" value="Ver"></p>
        </form>
      </div>
    </div
  </table>
</div>