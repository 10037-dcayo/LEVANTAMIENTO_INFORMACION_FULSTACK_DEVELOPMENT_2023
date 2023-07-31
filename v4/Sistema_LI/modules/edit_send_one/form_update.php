<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

$sql = "SELECT * FROM send_one WHERE archivopdf = '" . $_POST['txtuserid'] . "'";

if ($result = $conexion->query($sql)) {
  if ($row = mysqli_fetch_array($result)) {
    $_SESSION['user_id'] = $row['user'];
    $_SESSION['numero'] = $row['num'];
    $_SESSION['state'] = $row['estado'];
    $_SESSION['mensaje'] = $row['message'];
    $_SESSION['nombre'] = $row['archivopdf'];
  }
}

?>
<div class="form-data">
  <div class="head">
    <h1 class="titulo">Revisión de Documentación</h1>
  </div>
  <div class="body">
    <form action="#" method="post" autocomplete="off" autocapitalize="on" enctype="multipart/form-data">
      <div class="wrap">
        <div class="first">
          <label for="txtuserid" class="label">Usuario</label>
          <input id="txtuserid" style="display: none;" type="text" name="userid" value="<?php echo $_SESSION['user_id']; ?>" maxlength="50">
          <input class="text" type="text" name="txt" value="<?php echo $_SESSION['user_id']; ?>" maxlength="50" disabled />
         
          <label for="txtinfoqdescription" class="label">Descripción</label>
          <textarea name="descripcion" id="descripcion" class="textarea" cols="30" rows="10" value="<?php echo $_SESSION['mensaje']; ?>"><?php echo $_SESSION['mensaje']; ?></textarea>
        </div>
        <div class="first">
          <label for="txtname" class="label">Estado</label>
          <input id="txtname" class="text" style=" display: none;" type="text" name="name" value="<?php echo $_SESSION['state']; ?>" maxlength="50" required />
          <input class="text" type="text" name="txt" value="<?php echo $_SESSION['state']; ?>" required />
        </div>
        <div class="first">
          <label for="txtname" class="label">Nombre</label>
          <input id="txtname" class="text" style=" display: none;" type="text" name="name" value="<?php echo $_SESSION['nombre']; ?>" maxlength="50" required />
          <input class="text" type="text" name="txt" value="<?php echo $_SESSION['nombre']; ?>" required disabled />
        </div>
        <div class="first">
          <label for="txtname" class="label">N°PDF</label>
          <input id="txtname" class="text" style=" display: none;" type="text" name="name"
            value="<?php echo $_SESSION['numero']; ?>" maxlength="50" required />
          <input class="text" type="text" name="txt" value="<?php echo $_SESSION['numero']; ?>" required disabled />
        </div>
<<<<<<< HEAD

      </div>
      <form action="" method="POST">
        <input style="display:none;" type="text" name="txtuserid" value="<?php echo $_SESSION['user_id'][$i]; ?>"/>
        <button class="btn icon" name="btn" value="form_delete" autofocus type="submit">done</button>
      </form>

    </form>
  </div>
=======
</div>
			<button id="btnSave" class="btn icon" type="submit">save</button>
		</form>
	</div>
>>>>>>> d1c40e977cc5c5256698fa98523274757af63e2a
</div>
<div class="content-aside">
	<?php include_once "../sections/options-disabled.php"; ?>
</div>


<script src="/js/modules/students.js" type="text/javascript"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-0sCz7O9XlHUBlTepQg2tL/j/ZtMInzGRBfKv2n/bGEB1MkXkXpy0eMHvG+vcnBfACpJZl+S6Z5p5r5L5Hy5U2Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />





<?php

# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠

// Todos los derechos reservados © Quito - Ecuador || Estudiantes TIC's en línea || Levantamiento de Información || ESPE 2022-2023

// Ricardo Alejandro  Jaramillo Salgado, Michael Andres Espinosa Carrera, Steven Cardenas, Luis LLumiquinga

# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠

?>
