<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');
include_once '../conexion.php';

$sql = "SELECT descripcion FROM send_one";
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
				        <th class="center"><a class="icon">visibility</a></th>
								<th class="center"><a class="icon">edit</a></th>
						
			';
			if ($_SESSION['permissions'] != 'admin') {
				echo '<th class="center"><a class="icon">delete</a></th>';
			}
			echo '	
					</tr>
			';
<<<<<<< HEAD
		}	
			$path = 'sendonepdf/' . $_SESSION["user"];
                if(file_exists($path)){
                    $directorio= opendir($path);
                    while($archivo=readdir($directorio)){
                        if(!is_dir($archivo)){
                            
                            echo "
                            	<tr>
                            		<td>$archivo</td>
									<td> " . $_SESSION['send_description'] . "</td>	
                            		<td>
									
									<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "'
                                    title='Ver archivo adjunto' class='btnview' target='_blank'><button class='btnview' name='btn' 
									value='form_consult' type='submit'></button>
									
									</td>

                            		<td>
									
                            			<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "'
                                    title='borrar archivo adjunto' class='btndelete' target='_blank'><button class='btndelete' name='btn' 
									value='form_delete' type='submit'></button>
									
									</td>

                                </tr>"
								;                                 
                        }
                    }
                }
=======
		}
		$path = 'sendonepdf/' . $_SESSION["user"];
		if (file_exists($path)) {
			$directorio = opendir($path);
			while ($archivo = readdir($directorio)) {
				if (!is_dir($archivo)) {

					echo '
													<tr>
														<td>' . $archivo . '</td>
														<td>' . $_SESSION["send_description"] . '</td>	
														<td> 
															<div data="' . $path . '/' . $archivo . '"><a href="' . $path . '/' . $archivo . '"
															title="Ver archivo adjunto" class="btnview" target="_blank"><button class="btnview" name="btn" value="form_consult" type="submit"></button></td>
														gi<td>
															<form action="" method="POST">
																<input style="display:none;" type="text" name="txtuserid" value="'.$archivo.'"/>
																<button class="btnedit" name="btn" value="form_update" type="submit"></button>
															</form>
														</td>
													</tr>';
				}
			}
		}
>>>>>>> 35401561437cf40c6b5db08fba849d1c27e272da
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