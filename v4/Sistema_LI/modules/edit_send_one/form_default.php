<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');


$sql_cont="SELECT COUNT(user) as total FROM notify";
if ($result_not = $conexion->query($sql_cont)) {
	if ($row = mysqli_fetch_array($result_not)) {
	  $_SESSION['total_not'] = $row['total'];
	}
  }


$sql="SELECT * FROM notify";
	if ($result = $conexion->query($sql)) {
		if ($row = mysqli_fetch_array($result)) {
			$_SESSION['usuario'] = $row['user'];
			$_SESSION['nombre'] = $row['name'];
			$_SESSION['mesage'] = $row['mensaje'];
			$_SESSION['pdf'] = $row['nombrepdf'];
			$_SESSION['state'] = $row['estado'];
			$i += 1;
		}
	}
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
						<th>Cédula</th>
						<th class="center" style="width: 80px;">Fecha de Admisión</th>
						<th class="center"><a class="icon">visibility</a></th>
						
			';
		
		}
		for ($i = 0; $i < $_SESSION['total_users']; $i++) {
			echo '
		    		<tr>
		    			<td>' . $_SESSION["student_id"][$i] . '</td>
						<td>' . $_SESSION["student_name"][$i] . '</td>
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
    for ($i = 0; $i < $_SESSION['total_not']; $i++) {
        mysqli_data_seek($result, $i); // Mueve el puntero al índice $i
        $row = mysqli_fetch_array($result);

        echo '<p class="box-notification-doc">' . $row["name"] . ', ' . $row["mensaje"] . ' ' . $row["nombrepdf"] . '</p>';
    }
    ?>
</div>
</div>


<?php
?>