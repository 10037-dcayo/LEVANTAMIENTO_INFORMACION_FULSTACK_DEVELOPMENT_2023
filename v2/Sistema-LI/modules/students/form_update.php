<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

$sql = "SELECT * FROM students WHERE user = '" . $_POST['txtuserid'] . "'";

if ($result = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['user_id'] = $row['user'];
		$_SESSION['student_name'] = $row['name'];
		$_SESSION['student_surnames'] = $row['surnames'];
		$_SESSION['student_sede'] = $row['sede'];
		$_SESSION['student_departamento'] = $row['departamento'];
		$_SESSION['student_date_of_birth'] = $row['date_of_birth'];
		$_SESSION['student_cedula'] = $row['cedula'];
		$_SESSION['email'] = $row['email'];
		$_SESSION['student_pass'] = $row ['pass'];
		$_SESSION['student_id'] = $row['id'];
		$_SESSION['student_phone'] = $row['phone'];
		$_SESSION['student_jerarquia'] = $row['jerarquia'];
		$_SESSION['student_address'] = $row['address'];
		$_SESSION['student_career'] = $row['career'];
		$_SESSION['student_asistencia'] = $row['asistencia'];
		$_SESSION['student_documentation'] = $row['documentation'];
		$_SESSION['student_admission_date'] = $row['admission_date'];
		$_SESSION['student_jornada'] = $row['jornada'];
	}
}
?>
<div class="form-data">
	<div class="head">
		<h1 class="titulo">Actualizar</h1>
	</div>
	<div class="body">
		<form name="form-update-students" action="update.php" method="POST" autocomplete="off" autocapitalize="on">
			<div class="wrap">
				<div class="first">
					<label for="txtuserid" class="label">Usuario</label>
					<input id="txtuserid" style="display: none;" type="text" name="txtuserid" value="<?php echo $_SESSION['user_id']; ?>" maxlength="50">
					<input class="text" type="text" name="txt" value="<?php echo $_SESSION['user_id']; ?>" maxlength="50" disabled />
					<label for="txtusername" class="label">Nombre</label>
					<input id="txtusername" class="text" type="text" name="txtname" value="<?php echo $_SESSION['student_name']; ?>" placeholder="Nombre" autofocus maxlength="30" required />
					<label for="txtusersurnames" class="label">Apellidos</label>
					<input id="txtusersurnames" class="text" type="text" name="txtsurnames" value="<?php echo $_SESSION['student_surnames']; ?>" placeholder="Apellidos" maxlength="60" required />
					<label for="txtuseremail" class="label">Correo</label>
                    <input id="txtuseremail" class="text" type="email" name="txtemailupdate" value="<?php echo $_SESSION['email']; ?>" placeholder="ejemplo@email.com" maxlength="200" autofocus/>
					<label for="dateofbirth" class="label">Fecha de nacimiento</label>
					<input id="dateofbirth" class="date" type="text" name="dateofbirth" value="<?php echo $_SESSION['student_date_of_birth']; ?>" pattern="\d{4}-\d{2}-\d{2}" placeholder="aaaa-mm-dd" maxlength="10" required />
					<label for="selectsede" class="label">Sede</label>
					<select id="selectsede" class="select" name="selectSede" required>
						<?php
						if ($_SESSION['student_sede'] == '') {
							echo '
								<option value="">Seleccione</option>
								<option value="matriz">Matriz</option>
								<option value="latacunga">Latacunga</option>
								
								<option value="stodomingo">Sto. Domingo</option>
							';
						} elseif ($_SESSION['student_sede'] == 'matriz') {
							echo '
								<option value="matriz">Matriz</option>
								<option value="latacunga">Latacunga</option>
								
								<option value="stodomingo">Sto. Domingo</option>
							';
						} elseif ($_SESSION['student_sede'] == 'latacunga') {
							echo '
								<option value="latacunga">Latacunga</option>
								<option value="matriz">Matriz</option>
								
								<option value="stodomingo">Sto. Domingo</option>
							';
						}  elseif ($_SESSION['student_sede'] == 'stodomingo') {
							echo '
								<option value="stodomingo">Sto. Domingo</option>								
								<option value="matriz">Matriz</option>
								<option value="latacunga">Latacunga</option>
							';
						}
						?>
					</select>

					<label for="selectuserdocumentation" class="label">Documentación</label>
					<select id="selectuserdocumentation" class="select" name="selectDocumentation" required>
						<?php
						if ($_SESSION['student_documentation'] == '') {
							echo '
								<option value="">Seleccioné</option>
								<option value="REPROBADO">REPROBADO</option>
								<option value="EN PROCESO">EN PROCESO</option>
								<option value="APROBADO">APROBADO</option>
							';
						} else if ($_SESSION['student_documentation'] == 'REPROBADO') {
							echo
							'
								<option value="REPROBADO">REPROBADO</option>
								<option value="EN PROCESO">EN PROCESO</option>
								<option value="APROBADO">APROBADO</option>
							';
						} elseif ($_SESSION['student_documentation'] == 'EN PROCESO') {
							echo
							'
								<option value="EN PROCESO">EN PROCESO</option>
								<option value="REPROBADO">REPROBADO</option>
								<option value="APROBADO">APROBADO</option>
							';
						}elseif ($_SESSION['student_documentation'] == 'APROBADO') {
							echo
							'   <option value="APROBADO">APROBADO</option>
								<option value="EN PROCESO">EN PROCESO</option>
								<option value="REPROBADO">REPROBADO</option>
							';
						}
						?>
					</select>

				    <label for="selectuserdepartamento" class="label">Departamento</label>
					<select id="selectuserdepartamento" class="select" name="selectDepartamento" required>
						<option value="default"><?php echo $_SESSION['student_departamento']; ?></option>
                        <option value="SOFTWARE - PROWESS EC PÁGINA WEB VENTAS">SOFTWARE - PROWESS EC PÁGINA WEB VENTAS</option>
                        <option value="CONTABILIDAD Y AUDITORIA MAÑANA">CONTABILIDAD Y AUDITORIA MAÑANA</option>
                        <option value="INVESTIGACIÓN">INVESTIGACIÓN</option>
                        <option value="DOCUMENTACIÓN">DOCUMENTACIÓN</option>
                        <option value="ADMINISTRACIÓN DE EMPRESAS - TALLER">ADMINISTRACIÓN DE EMPRESAS - TALLER</option>
                        <option value="MARKETING">MARKETING</option>
                        <option value="CREACIÓN DE CONTENIDO">CREACIÓN DE CONTENIDO</option>
                        <option value="MENTORIAS MATUTINO">MENTORIAS MATUTINO </option>
                        <option value="SOFTWARE - PROWESS BIKE">SOFTWARE - PROWESS BIKE</option>
                        <option value="CONTABILIDAD Y AUDITORÍA/ TARDE">CONTABILIDAD Y AUDITORÍA/ TARDE</option>
                        <option value="SOFTWARE - DESARROLLO PÁGINA WEB PROWESS AGRÍCOLA">SOFTWARE - DESARROLLO PÁGINA WEB PROWESS AGRÍCOLA</option>
                        <option value="SOFTWARE - PROWESS APP AGRÍCOLA">SOFTWARE - PROWESS APP AGRÍCOLA</option>
                        <option value="MODULO CURSOS MOCC">MODULO CURSOS MOCC</option>
                        <option value="MENTORIAS VESPERTINO">MENTORIAS VESPERTINO</option>
                        <option value="LEVANTAMIENTO DE INFORMACIÓN">LEVANTAMIENTO DE INFORMACIÓN</option>
                        <option value="ELABORACIÓN DE MATERIALES DE APOYO">ELABORACIÓN DE MATERIALES DE APOYO</option>
					</select>
				</div>
				<div class="last">
					<label for="txtusercedula" class="label">Cédula</label>
					<input id="txtusercedula" class="text" type="text" name="txtcedula" value="<?php echo $_SESSION['student_cedula']; ?>" placeholder="Cédula de Identidad" pattern="[0-9]{10}" maxlength="10" required />
                    <label for="txtuserpass" class="label">Contraseña</label>
                    <input id="txtuserpass" class="text" type="text" name="txtpass" value="<?php echo $_SESSION ['student_pass']; ?>" placeholder="XXXXXXXXX" pattern="[A-Za-z0-9]{8}" maxlength="8" required />
					<label for="txtuserid" class="label">ID</label>
					<input id="txtuserid" class="text" type="text" name="txtid" value="<?php echo $_SESSION['student_id']; ?>" placeholder="L00XXXXXXX" pattern="[A-Za-z0-9]{9}" maxlength="9" onkeyup="this.value = this.value.toUpperCase()" required />
					<label for="txtuserphone" class="label">Número de teléfono</label>
					<input id="txtuserphone" class="text" type="text" name="txtphone" value="<?php echo $_SESSION['student_phone']; ?>" pattern="[0-9]{10}" title="Ingresa un número de teléfono válido." placeholder="09999XXXXX" maxlength="10" required />


					<label for="selectuserjerarquia" class="label">Jerarquia</label>
					<select id="selectuserjerarquia" class="select" name="selectJerarquia" required>
				
					<?php
						if ($_SESSION['student_jerarquia'] == 'LIDER') {
							echo '
						<option value="">Seleccione</option>
						<option value="LIDER">LIDER</option>
						<option value="COLIDER">COLIDER</option>
						<option value="APOYO1">APOYO 1</option>
						<option value="APOYO2">APOYO 2</option>
						<option value="APOYO3">APOYO 3</option>
						<option value="APOYO4">APOYO 4</option>
						<option value="APOYO5">APOYO 5</option>
						<option value="APOYO6">APOYO 6</option>
						<option value="APOYO7">APOYO 7</option>
						<option value="APOYO8">APOYO 8</option>
						';
						} elseif ($_SESSION['student_jerarquia'] == 'COLIDER') {
							echo '
						<option value="COLIDER">COLIDER</option>
						<option value="LIDER">LIDER</option>
						<option value="APOYO1">APOYO 1</option>
						<option value="APOYO2">APOYO 2</option>
						<option value="APOYO3">APOYO 3</option>
						<option value="APOYO4">APOYO 4</option>
						<option value="APOYO5">APOYO 5</option>
						<option value="APOYO6">APOYO 6</option>
						<option value="APOYO7">APOYO 7</option>
						<option value="APOYO8">APOYO 8</option>

						';
						} elseif ($_SESSION['student_jerarquia'] == 'APOYO1') {
							echo '
						<option value="APOYO1">APOYO 1</option>
						<option value="LIDER">LIDER</option>
						<option value="COLIDER">COLIDER</option>
						<option value="APOYO2">APOYO 2</option>
						<option value="APOYO3">APOYO 3</option>
						<option value="APOYO4">APOYO 4</option>
						<option value="APOYO5">APOYO 5</option>
						<option value="APOYO6">APOYO 6</option>
						<option value="APOYO7">APOYO 7</option>
						<option value="APOYO8">APOYO 8</option>

						';
						} elseif ($_SESSION['student_jerarquia'] == 'APOYO2') {
							echo '
						<option value="APOYO2">APOYO 2</option>
						<option value="LIDER">LIDER</option>
						<option value="COLIDER">COLIDER</option>
						<option value="APOYO1">APOYO 1</option>
						<option value="APOYO3">APOYO 3</option>
						<option value="APOYO4">APOYO 4</option>
						<option value="APOYO5">APOYO 5</option>
						<option value="APOYO6">APOYO 6</option>
						<option value="APOYO7">APOYO 7</option>
						<option value="APOYO8">APOYO 8</option>

						';
						}

						elseif ($_SESSION['student_jerarquia'] == 'APOYO3') {
							echo '
						<option value="APOYO3">APOYO 3</option>
						<option value="COLIDER">COLIDER</option>
						<option value="LIDER">LIDER</option>
						<option value="APOYO1">APOYO 1</option>
						<option value="APOYO2">APOYO 2</option>
						<option value="APOYO4">APOYO 4</option>
						<option value="APOYO5">APOYO 5</option>
						<option value="APOYO6">APOYO 6</option>
						<option value="APOYO7">APOYO 7</option>
						<option value="APOYO8">APOYO 8</option>

						';
						}
						elseif ($_SESSION['student_jerarquia'] == 'APOYO4') {
							echo '
						<option value="APOYO4">APOYO 4</option>
						<option value="COLIDER">COLIDER</option>
						<option value="LIDER">LIDER</option>
						<option value="APOYO1">APOYO 1</option>
						<option value="APOYO2">APOYO 2</option>
						<option value="APOYO3">APOYO 3</option>
						<option value="APOYO5">APOYO 5</option>
						<option value="APOYO6">APOYO 6</option>
						<option value="APOYO7">APOYO 7</option>
						<option value="APOYO8">APOYO 8</option>

						';
						}
						elseif ($_SESSION['student_jerarquia'] == 'APOYO5') {
							echo '
						<option value="APOYO5">APOYO 5</option>
						<option value="COLIDER">COLIDER</option>
						<option value="LIDER">LIDER</option>
						<option value="APOYO1">APOYO 1</option>
						<option value="APOYO2">APOYO 2</option>
						<option value="APOYO3">APOYO 3</option>
						<option value="APOYO4">APOYO 4</option>
						<option value="APOYO6">APOYO 6</option>
						<option value="APOYO7">APOYO 7</option>
						<option value="APOYO8">APOYO 8</option>

						';
						}
						elseif ($_SESSION['student_jerarquia'] == 'APOYO6') {
							echo '
						<option value="APOYO6">APOYO 6</option>
						<option value="COLIDER">COLIDER</option>
						<option value="LIDER">LIDER</option>
						<option value="APOYO1">APOYO 1</option>
						<option value="APOYO2">APOYO 2</option>
						<option value="APOYO3">APOYO 3</option>
						<option value="APOYO4">APOYO 4</option>
						<option value="APOYO5">APOYO 5</option>
						<option value="APOYO7">APOYO 7</option>
						<option value="APOYO8">APOYO 8</option>

						';
						}
						elseif ($_SESSION['student_jerarquia'] == 'APOYO7') {
							echo '
						<option value="APOYO7">APOYO 7</option>
						<option value="COLIDER">COLIDER</option>
						<option value="LIDER">LIDER</option>
						<option value="APOYO1">APOYO 1</option>
						<option value="APOYO2">APOYO 2</option>
						<option value="APOYO3">APOYO 3</option>
						<option value="APOYO4">APOYO 4</option>
						<option value="APOYO5">APOYO 5</option>
						<option value="APOYO6">APOYO 6</option>
						<option value="APOYO8">APOYO 8</option>

						';
						}
						elseif ($_SESSION['student_jerarquia'] == 'APOYO8') {
							echo '
						<option value="APOYO8">APOYO 8</option>
						<option value="COLIDER">COLIDER</option>
						<option value="LIDER">LIDER</option>
						<option value="APOYO1">APOYO 1</option>
						<option value="APOYO2">APOYO 2</option>
						<option value="APOYO3">APOYO 3</option>
						<option value="APOYO4">APOYO 4</option>
						<option value="APOYO5">APOYO 5</option>
						<option value="APOYO6">APOYO 6</option>
						<option value="APOYO7">APOYO 7</option>
						';
						}
						?>
					</select>






					<label for="selectuserjornada" class="label">Jornada</label>
                    <select id="selectuserjornada" class="select" name="selectJornada" required>
                        <?php
						if ($_SESSION['student_jornada'] == '') {
							echo '
						<option value="">Seleccione</option>
                        <option value="Vespertino">Vespertino</option>
                        <option value="Matutino">Matutino</option>
                        <option value="Otra">Otra</option>
						';
						} elseif ($_SESSION['student_jornada'] == 'Vespertino') {
							echo '
						<option value="Vespertino">Vespertino</option>
						<option value="Matutino">Matutino</option>
						<option value="Otra">Otra</option>
						';
						} elseif ($_SESSION['student_jornada'] == 'Matutino') {
							echo '
						<option value="Matutino">Matutino</option>
						<option value="Vespertino">Vespertino</option>	
						<option value="Otro">Otro</option>
						';
						} elseif ($_SESSION['student_jornada'] == 'Otro') {
							echo '
						<option value="Otro">Otro</option> 
						<option value="Matutino">Matutino</option>
						<option value="Vespertino">Vespertino</option>
						';
						}
						?>
                    </select>

					<label for="txtuseraddress" class="label">Domicilio</label>
					<input id="txtuseraddress" class="text" type="text" name="txtaddress" value="<?php echo $_SESSION['student_address']; ?>" placeholder="Domicilio" maxlength="200" required />
					<label for="selectusercareers" class="label">Carrera</label>
					<select id="selectusercareers" class="select" name="selectCareer" required>
						<?php
						$career = $_SESSION['student_career'];

						if ($career == '') {
							echo
							'
								<option value="">Seleccione</option>
							';
						}

						$sql = "SELECT career, name FROM careers";

						if ($result = $conexion->query($sql)) {
							while ($row = mysqli_fetch_array($result)) {
								if ($row['career'] == $career) {
									echo
									'
										<option value="' . $row['career'] . '" selected>' . $row['name'] . '</option>
									';
								} else {
									echo
									'
										<option value="' . $row['career'] . '">' . $row['name'] . '</option>
									';
								}
							}
						}
						?>
					</select>
					<label for="dateuseradmission" class="label">Fecha de admisión</label>
					<input id="dateuseradmission" class="date" type="date" name="dateadmission" value="<?php echo $_SESSION['student_admission_date']; ?>" required />
				</div>
				<div class="description">
                <label for="txtuserdates" class="label">Asistencia</label>
                <input id="txtuserdates" class="textarea" type="text" name="txtuserdates" value="<?php echo $_SESSION['student_asistencia']; ?>" placeholder="Seleccione fechas" maxlength="20000" data-expandable/>
                <button id="addBtn" class="btn icon"><i class="fas fa-plus-circle fa-lg fa-spin"></i></button>
                </div>
                <div class="label" id="dateListContainer">
	            <br>
                <ul id="dateList"></ul>
               </div>
			</div>
			<button id="btnBack" class="btn back icon" type="button">arrow_back</button>
			<button id="btnNext" class="btn icon" type="button">arrow_forward</button>
			<button id="btnSave" class="btn icon" type="submit">save</button>
		</form>
	</div>
</div>
<div class="content-aside">
	<?php include_once "../sections/options-disabled.php"; ?>
</div>
<script>
$(document).ready(function(){
    $("#txtuserdates").datepicker({
        dateFormat: 'yy-mm-dd',
        numberOfMonths: 1,
        onSelect: function(selectedDate) {
        $(this).val(selectedDate); 
    }
});

    // Agregamos cada fecha seleccionada a la lista
    $("#addBtn").click(function(event) {
        event.preventDefault();
        var date = $("#txtuserdates").val();
        if (date != "") {
            $("#dateList").append("<li>" + date + " <button class='removeBtn'><i class='fas fa-times-circle fa-lg fa-spin'></i></button></li>");
            $("#txtuserdates").val("");
        }
    });
    
    // Eliminamos la fecha seleccionada de la lista
    $(document).on("click", ".removeBtn", function() {
        $(this).parent().remove();
    });
    
    // Al hacer submit, guardamos la lista en la variable students_asistencia
    $("form").submit(function() {
        var dates = [];
        $("#dateList li").each(function() {
            dates.push($(this).text().replace(" Eliminar", ""));
        });
        $("#txtuserdates").val(dates.join(", "));
        return true;
    });
});
</script>
<script src="/js/modules/students.js" type="text/javascript"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-0sCz7O9XlHUBlTepQg2tL/j/ZtMInzGRBfKv2n/bGEB1MkXkXpy0eMHvG+vcnBfACpJZl+S6Z5p5r5L5Hy5U2Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />