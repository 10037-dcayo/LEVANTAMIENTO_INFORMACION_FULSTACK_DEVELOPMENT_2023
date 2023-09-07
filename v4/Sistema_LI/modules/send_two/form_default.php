<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');
include_once '../conexion.php';

$sql = "SELECT descripcion FROM send_two";
if ($resultado = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($resultado)) {
		$_SESSION['send_description'] = $row['descripcion'];
	}
}

?>
<div class="form-gridview">
	<table class="default">
		<?php
		if ($_SESSION['total_send'] != 0) {
			echo '
					<tr>
						<th class="center" style="width: 800px">Nombre del archivo</th>
						<th class="center" style="width: 70px">Descripción</th>
				        <th class="center"><a class="icon">download</a></th>
								<th class="center"><a class="icon">visibility</a></th>								
						
			';
			if ($_SESSION['permissions'] != 'admin') {
				echo '<th class="center"><a class="icon">delete</a></th>';
			}
			echo '	
					</tr>
			';
		}	
			$path = 'sendtwopdf/' . $_SESSION["user"];
                if(file_exists($path)){
                    $directorio= opendir($path);
                    while($archivo=readdir($directorio)){
                        if(!is_dir($archivo)){
                            
													echo '
													<tr>
														<td>' . $archivo . '</td>
														<td>' . $_SESSION["send_description"] . '</td>	
														<td> 
															<div data="' . $path . '/' . $archivo . '"><a href="' . $path . '/' . $archivo . '"
															title="Ver archivo adjunto" class="btnview" target="_blank"><button class="btnview" 
															name="btn" value="form_consult" type="submit"></button></td>
														<td>
															<form action="" method="POST">
																<input style="display:none;" type="text" name="txtuserid" value="'.$archivo.'"/>
																<button class="btnedit" name="btn" value="form_view" type="submit"></button>
															</form>
														</td>
														<td>
														<form action="" method="POST">
															<input style="display:none;" type="text" name="txtuserid" value="' . $archivo . '"/>
															<button class="btndelete" name="btn" value="form_delete" type="submit"></button>
														</form>
													</td>
													
													</tr>';         
                        }
                    }
                }
		?>
	</table>

<br></br>

</div>
<div class="content-aside">
	<?php
	include_once '../notif_info.php';
	include_once "../sections/options-disabled.php";
	?>
</div>