<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin.php');
?>
<div class="form-gridview">
	<!--
	<table class="default">
		<tr>
			<th>Grupo</th>
			<th>Nombre</th>
			<th class="center">Semestre</th>
			<th class="center"><a class="icon">visibility</a></th>
			<th class="center"><a class="icon">edit</a></th>
			<?php
			if ($_SESSION['permissions'] != 'editor') {
				echo '<th class="center"><a class="icon">delete</a></th>';
			}
			?>
    	</tr>
		<?php
		for ($i = 0; $i < $_SESSION['total_groups']; $i++) {
			echo '
		    		<tr>
		    			<td>' . $_SESSION["group"][$i] . '</td>
						<td>' . $_SESSION["group_name"][$i] . '</td>
						<td class="center">' . $_SESSION["group_semester"][$i] . '</td>
						<td>
							<form action="" method="POST">
								<input style="display:none;" type="text" name="txtgroup" value="' . $_SESSION["group"][$i] . '"/>
								<input style="display:none;" type="text" name="txtgroupschoolperiod" value="' . $_SESSION['group_school_period'][$i] . '"/>
								<button class="btnview" name="btn" value="form_consult" type="submit"></button>
							</form>
						</td>
						<td>
							<form action="" method="POST">
								<input style="display:none;" type="text" name="txtgroup" value="' . $_SESSION["group"][$i] . '"/>
								<input style="display:none;" type="text" name="txtgroupschoolperiod" value="' . $_SESSION['group_school_period'][$i] . '"/>
								<button class="btnedit" name="btn" value="form_update" type="submit"></button>
							</form>
						</td>';
			if ($_SESSION['permissions'] != 'editor') {
				echo '
								<td>
									<form action="" method="POST">
										<input style="display:none;" type="text" name="txtgroup" value="' . $_SESSION["group"][$i] . '"/>
										<input style="display:none;" type="text" name="txtgroupschoolperiod" value="' . $_SESSION['group_school_period'][$i] . '"/>
										<button class="btndelete" name="btn" value="form_delete" type="submit"></button>
									</form>
								</td>
							';
			}
			echo '
					</tr>
				';
		}
		?>
	</table>
	<div class="pages">
		<ul>
			<?php
			for ($n = 1; $n <= $tpages; $n++) {
				if ($page == $n) {
					echo '<li class="active"><form name="form-pages" action="" method="POST"><button type="submit" name="page" value="' . $n . '">' . $n . '</button></form></li>';
				} else {
					echo '<li><form name="form-pages" action="" method="POST"><button type="submit" name="page" value="' . $n . '">' . $n . '</button></form></li>';
				}
			}
			?>
	    </ul>
	</div>-->
</div>
<div class="content-aside">
	<?php
	include_once '../notif_info.php';
	include_once "../sections/options.php";
	?>
</div>


<?php

# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠

// Todos los derechos reservados © Quito - Ecuador || Estudiantes TIC's en línea || Levantamiento de Información || ESPE 2022-2023

// Ricardo Alejandro  Jaramillo Salgado, Michael Andres Espinosa Carrera, Steven Cardenas, Luis LLumiquinga

# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠

?>