<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');
include_once '../conexion.php';

$sql = "SELECT * FROM send_one";

if ($result = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($result)) {
	  $_SESSION['send_estado'] = $row['estado'];
	  $_SESSION['send_created'] = $row['created_at'];
	  $_SESSION['send_updated'] = $row['updated_at'];
	}
  }
// Debes definir el valor de $max antes de usarlo en el cálculo de $tpages
$max = 10; // Aquí debes proporcionar el valor apropiado

$sql = "SELECT COUNT(num) AS total FROM send_one";

if ($result = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($result)) {
		$tpages = ceil($row['total'] / $max);
	}
}
// Aquí debes proporcionar el valor apropiado v2

if (!empty($_POST['search'])) {
	$_POST['search'] = trim($_POST['search']);
	$_POST['search'] = mysqli_real_escape_string($conexion, $_POST['search']);

	$_SESSION['num'] = array();
	$_SESSION['send_archivo'] = array();
	$_SESSION['send_estado'] = array();
	$_SESSION['send_created'] = array();
	$_SESSION['send_updated'] = array();

	$i = 0;

	$sql = "SELECT * FROM send_one WHERE num LIKE '%" . $_POST['search'] . "%' OR archivo LIKE '%" . $_POST['search'] . "%' OR user LIKE '%" . $_POST['search'] . "%' OR descripcion LIKE '%" . $_POST['search'] . "%' ORDER BY num";

	if ($result = $conexion->query($sql)) {
		while ($row = mysqli_fetch_array($result)) {
			$_SESSION['num'][$i] = $row['num'];
			$_SESSION['send_archivo'][$i] = $row['archivopdf'];
			$_SESSION['send_estado'][$i] = $row['estado'];
			$_SESSION['send_created'][$i] = $row['created_at'];
			$_SESSION['send_updated'][$i] = $row['updated_at'];

			$i += 1;
		}
	}
	$_SESSION['total_send'] = count($_SESSION['num']);
} else {
	$_SESSION['num'] = array();
	$_SESSION['send_archivo'] = array();

	$i = 0;

	$sql = "SELECT * FROM send_one WHERE user = '" . $_POST['txtuserid'] . "' ORDER BY num";

	if ($result = $conexion->query($sql)) {
		while ($row = mysqli_fetch_array($result)) {
			$_SESSION['num'][$i] = $row['num'];
			$_SESSION['send_archivo'][$i] = $row['archivopdf'];

			$i += 1;
		}
	}
	$_SESSION['total_send'] = count($_SESSION['num']);
}
?>



<div class="form-gridview">
	<table class="default">
	<h2 class="titlecenter"> Envío 1  </h2>
		<?php 
			echo '<h2 class="textList"> ' .$_POST['txtname'].' </h2>'
		?>
		<?php
		if ($_SESSION['total_send'] != 0) {
			echo '
					<tr>
						<th class="center" style="width: 800px">Nombre del archivo</th>
						<th class="center" style="width: 70px">Estado</th>
						<th class="center" style="width: 300px">Creado</th>
						<th class="center" style="width: 300px">Actualizado</th>
				        <th class="center"><a class="icon">download</a></th>
								<th class="center"><a class="icon">edit</a></th>
								
						
			';
			if ($_SESSION['permissions'] != 'edit') {
				//echo '<th class="center"><a class="icon">delete</a></th>';
			}
			echo '	
					</tr>
			';
		}	
			$path = '../send_one/sendonepdf/' . $_POST["txtuserid"];
                if(file_exists($path)){
                    $directorio= opendir($path);
                    while($archivo=readdir($directorio)){
                        if(!is_dir($archivo)){
                            
													echo '
													<tr>
														<td>' . $archivo . '</td>
														<td>' . $_SESSION["send_estado"] . '</td>
														<td>' . $_SESSION["send_created"] . '</td>
														<td>' . $_SESSION["send_updated"] . '</td>
														<td> 
															<div data="' . $path . '/' . $archivo . '"><a href="' . $path . '/' . $archivo . '"
															title="Ver archivo adjunto" class="btnview" target="_blank"><button class="btnview" 
															name="btn" value="form_consult" type="submit"></button>
														</td>
														<td>
															<form action="" method="POST">
																<input style="display:none;" type="text" name="txtuserid" value="'.$archivo.'"/>
																<button class="btnedit" name="btn" value="form_update" type="submit"></button>
															</form>
														</td>													
													</tr>';         
                        }
                    }
                }
		?>
	</table>
	<?php
	if ($_SESSION['total_send'] == 0) {
		echo '
				<img src="/images/404.svg" class="data-not-found" alt="404">
		';
	}
	if ($_SESSION['total_send'] != 0) {
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
	include_once "../sections/options-disabled.php";
	?>
</div>