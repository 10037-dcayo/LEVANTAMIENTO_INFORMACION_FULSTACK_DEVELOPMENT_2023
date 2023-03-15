<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

function unique_id($l = 10)
{
    return substr(md5(uniqid(mt_rand(), true)), 0, $l);
}


$id_generate = 'stdt-' . unique_id(5);
?>
<div class="form-data">
    <div class="head">
        <h1 class="titulo">Agregar</h1>
    </div>
    <div class="body">
        <form name="form-add-students" action="insert.php" method="POST" autocomplete="off" autocapitalize="on">
            <div class="wrap">
                <div class="first">
                    <label for="txtuserid" class="label">Usuario</label>
                    <input id="txtuserid" class="text" style=" display: none;" type="text" name="txtuserid" value="<?php echo $id_generate; ?>" maxlength="50" required />
                    <input class="text" type="text" name="txt" value="<?php echo $id_generate; ?>" required disabled />
                    
                    <label for="txtusername" class="label">Nombre</label>
                    <input id="txtusername" class="text" type="text" name="txtname" value="" placeholder="Nombre" maxlength="30" required autofocus />
                    <label for="txtusersurnames" class="label">Apellidos</label>
                    <input id="txtusersurnames" class="text" type="text" name="txtsurnames" placeholder="Apellidos" value="" maxlength="60" required />
                    <label for="dateofbirth" class="label">Fecha de nacimiento</label>
                    <input id="dateofbirth" class="date" type="text" name="dateofbirth" value="" placeholder="aaaa-mm-dd" pattern="\d{4}-\d{2}-\d{2}" maxlength="10" required />
                    <label for="selectsede" class="label">Sede</label>
                    <select id="selectsede" class="select" name="selectsede" required>     
                        <option value="">Seleccione</option>
                        <option value="matriz">Matriz</option>
                        <option value="latacunga">Latacunga</option>
                        <option value="stodomingo">Sto. Domingo</option>
                    </select>
                    <label for="selectuserdocumentation" class="label">Documentación</label>
                    <select id="selectuserdocumentation" class="select" name="selectDocumentation" required>
                        <option value="">Seleccione</option>
                        <option value="1">Sí</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div class="last">
                    <label for="txtusercedula" class="label">Cédula</label>
                    <input id="txtusercedula" class="text" type="text" name="txtcedula" value="" placeholder="Cédula de Identidad" pattern="[0-9]{10}" maxlength="10"  required />

                    <label for="txtuserpass" class="label">Contraseña</label>
                    <input id="txtuserpass" class="text" type="text" name="txtpass" value="" placeholder="XXXXXXXXX" pattern="[A-Za-z0-9]{8}" required />

                    <label for="txtuserid" class="label">ID</label>
                    <input id="txtuserid" class="text" type="text" name="txtid" value="" placeholder="L00XXXXXXX" pattern="[A-Za-z0-9]{9}" maxlength="9" onkeyup="this.value = this.value.toUpperCase()" required />
                    <label for="txtuserphone" class="label">Número de teléfono</label>
                    <input id="txtuserphone" class="text" type="text" name="txtphone" value="" placeholder="09999XXXXX" pattern="[0-9]{10}" title="Ingresa un número de teléfono válido." maxlength="10" required />
                    <label for="txtuseraddress" class="label">Domicilio</label>
                    <input id="txtuseraddress" class="text" type="text" name="txtaddress" value="" placeholder="Domicilio" maxlength="200" required />
                    <label for="selectusercareers" class="label">Carrera</label>
                    <select id="selectusercareers" class="select" name="selectCareer" required>
                        <option value="">Seleccione</option>
                        <?php
                        $sql = "SELECT career, name FROM careers";

                        if ($result = $conexion->query($sql)) {
                            while ($row = mysqli_fetch_array($result)) {
                                echo
                                '
										<option value="' . $row['career'] . '">' . $row['name'] . '</option>
								';
                            }
                        }
                        ?>
                    </select>
                    <label for="dateuseradmission" class="label">Fecha de admisión</label>
                    <input id="dateuseradmission" class="date" type="date" name="dateadmission" value="<?php echo date('Y-m-d'); ?>" required />
                </div>
            </div>
            <button id="btnBack" class="btn back icon" type="button">arrow_back</button>
            <button id="btnNext" class="btn icon" type="button">arrow_forward</button>
            <button id="btnSave" class="btn icon" type="submit">save</button>
        </form>
    </div>
</div>
<div class="content-aside">
    <?php
    include_once "../sections/options-disabled.php";
    ?>
</div>
<script src="/js/modules/students.js" type="text/javascript"></script>