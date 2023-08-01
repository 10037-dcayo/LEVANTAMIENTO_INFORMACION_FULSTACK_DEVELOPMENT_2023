<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');



?>

<div class="form-gridview">
<table class="default">
		<?php 
			echo '<h2 class="textList"> ' .$_POST['txtname'].' </h2>'
		?>
  </table>  
</div>

<div class="content-aside">
	<?php
	include_once '../notif_info.php';
	include_once "../sections/options.php";
	?>
</div>