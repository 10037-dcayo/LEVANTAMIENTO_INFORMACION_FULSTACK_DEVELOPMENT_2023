<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

$sql = "SELECT * FROM emprendedor WHERE user = '" . $_POST['txtuserid'] . "'";

if ($result = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['user_id'] = $row['user'];
		$_SESSION['student_name'] = $row['name'];
		$_SESSION['student_surnames'] = $row['surname'];
		$_SESSION['student_gender'] = $row['gender'];
		$_SESSION['student_date_of_birth'] = $row['date_of_birth'];
		$_SESSION['student_curp'] = $row['curp'];	
		$_SESSION['student_phone'] = $row['phone'];
		$_SESSION['student_address'] = $row['address'];		
		$_SESSION['student_documentation'] = $row['documentation'];		
	}
} 
?>
<div class="form-data">
	<div class="head">
		<h1 class="titulo">Consultar</h1>
	</div>
	<div class="body">
		<form name="form-consult-emprendedor" action="#" method="POST">
			<div class="wrap">
				<div class="first">
					<label class="label">Usuario</label>
					<input style="display: none;" type="text" name="btn" value="form_default" />
					<input class="text" type="text" name="txt" value="<?php echo $_SESSION['user_id']; ?>" disabled />
					<label class="label">Nombre</label>
					<input class="text" type="text" name="txtname" value="<?php echo $_SESSION['student_name']; ?>" disabled />
					<label class="label">Apellidos</label>
					<input class="text" type="text" name="txtsurnames" value="<?php echo $_SESSION['student_surnames']; ?>" disabled />
					<label for="dateofbirth" class="label">Fecha de nacimiento</label>
					<input id="dateofbirth" class="date" type="text" name="dateofbirth" value="<?php echo $_SESSION['student_date_of_birth']; ?>" disabled />
					<label for="selectgender" class="label">Género</label>
					<select id="selectgender" class="select" name="selectgender" disabled>
						<?php
						if ($_SESSION['student_gender'] == '') {
							echo '
						<option value="">Seleccione</option>
						<option value="mujer">Femenino</option>
						<option value="hombre">Masculino</option>						
						<option value="nodecirlo">Otro</option>
						';
						} elseif ($_SESSION['student_gender'] == 'mujer') {
							echo '
						<option value="mujer">Femenino</option>
						<option value="hombre">Masculino</option>						
						<option value="nodecirlo">Otro</option>
						';
						} elseif ($_SESSION['student_gender'] == 'hombre') {
							echo '
						<option value="hombre">Masculino</option>
						<option value="mujer">Femenino</option>						
						<option value="nodecirlo">Otro</option>
						';
						} elseif ($_SESSION['student_gender'] == 'nodecirlo') {
							echo '
						<option value="nodecirlo">Otro</option>						 
						<option value="mujer">Femenino</option>
						<option value="hombre">Masculino</option>
						';
						}
						?>
					</select>				
				</div>
				<div class="last">
					<label class="label">Cédula</label>
					<input class="text" type="text" name="txtcurp" value="<?php echo $_SESSION['student_curp']; ?>" disabled />
					<label class="label">Nacionalidad</label>
					<input class="text" type="text" name="txtrfc" value="<?php echo $_SESSION['student_address']; ?>" disabled />
					<label class="label">Número de teléfono</label>
					<input class="text" type="text" name="txtphone" value="<?php echo $_SESSION['student_phone']; ?>" disabled />
					<label class="label">Correo electrónico</label>
					<input class="text" type="text" name="txtaddress" value="<?php echo $_SESSION['student_documentation']; ?>" disabled />					
				</div>
			</div>
			<button id="btnSave" class="btn icon" type="submit" autofocus>done</button>
		</form>
	</div>
</div>
<div class="content-aside">
	<?php include_once "../sections/options-disabled.php"; ?>
</div>
<script src="/js/modules/emprendedor.js" type="text/javascript"></script>