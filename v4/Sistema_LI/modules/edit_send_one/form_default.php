<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

?>

<div class="form-gridview">

	<h2 class="textList">Listado</h2>
	<table class="default">
		<?php
		if ($_SESSION['total_users'] != 0) {
			echo '
					<tr>
						<th>id</th>
						<th>Nombre</th>
						<th>Carrera</th>
						<th>Cédula</th>				
						<th class="center" style="width: 80px;">Fecha de Admisión</th>
						<th class="center"><a class="icon">visibility</a></th>
						
			';
		
		}
		for ($i = 0; $i < $_SESSION['total_users']; $i++) {
			echo '
		    		<tr>
						<td>' . $_SESSION["user_id"][$i] . '</td> 
						<td>' . $_SESSION["student_name"][$i] . '</td>
						<td>' . $_SESSION["student_career"][$i] . '</td>
						<td class="tdbreakw">' . $_SESSION["student_cedula"][$i] . '</td>
						<td class="center">' . $_SESSION["student_date"][$i] . '</td>
						<td>
							<form action="" method="POST">
								<input style="display:none;" type="text" id="texuserid" name="txtuserid" value="' . $_SESSION["user_id"][$i] . '"/>
								<input style="display:none;" type="text" id="txtname" name="txtname" value="' . $_SESSION["student_name"][$i] . '"/>
								<button class="btnview" name="btn" value="menu" type="submit"></button>
							</form>
						</td>
					</tr>
				';
		}
		?>
	</table>
	<?php
	if ($_SESSION['total_users'] == 0) {
		echo '
				<img src="/images/404.svg" class="data-not-found" alt="404">
		';
	}
	if ($_SESSION['total_users'] != 0) {
		echo '
				<div class="pages">
					<ul>
		';
		for ($n = 1; $n <= $tpages; $n++) {
			if ($page == $n) {
				echo '<li class="active"><form name="form-pages" action="" method="POST"><button type="submit" name="page" value="' . $n . '">' . $n . '</button></form></li>';
			} else {
				echo '<li><form name="form-pages" action="" method="POST"><button type="submit" name="page" value="' . $n . '">' . $n . '</button></form></li>';
			}
		}
		echo '
					</ul>
				</div>
		';
	}
	?>
</div>
<div class="content-aside">
	<?php
	include_once '../notif_info.php';
	include_once "../sections/options.php";
	?>
</div>





<?php
?>