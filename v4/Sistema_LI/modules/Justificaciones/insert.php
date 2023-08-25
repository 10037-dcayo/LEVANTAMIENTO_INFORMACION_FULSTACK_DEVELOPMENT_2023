<?php
include_once '../security.php';
include_once '../conexion.php';
include_once '../notif_info_msgbox.php';

require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

$sql = "SELECT * FROM users WHERE user = '" . $_SESSION['user'] . "'";

if ($result = $conexion->query($sql)) {
    if ($row = mysqli_fetch_array($result)) {
        $_SESSION['user_id'] = $row['user'];
    }
}


$archivopdf = $_FILES["archivo"]["name"]; //$_FILES["archivo"]["name"] Permite obtener el nombre del archivo


$sql = "SELECT archivopdf FROM justificaciones";  //Realizamos la consulta para obtener el nombre del archivo pdf
$resultado = $conexion->query($sql); //Realiza la consulta la base de datos
$row = mysqli_fetch_array($result);//Devuelve los datos de una fila en forma de array
$_SESSION['infoq_archivo']=$row['archivopdf'];//Almacenamos en la sesion el nombre del archivo del campo archivopdf
$nombrePDF=$_SESSION['infoq_archivo'];//Almacenamos su contenido en la variable $nombrePDF
    if ($nombrePDF==$archivopdf) {
        Info('Ya existe un archivo con el nombre.');
        header('Location: /modules/Justificaciones');
        exit();
    } else {

	//Accedemos a los datos enviados mediante $_POST
    $usuario = $_POST['userid'];
	$numeroDePDF = $_POST['num'];
	$descripcion = $_POST['descripcion'];
	$date = date('Y-m-d H:i:s');
	$status="En revisión";
	$mensaje="Sin comentarios";	
	$status="En revisión";
	$mensaje="Sin comentarios";
	//Realizamos la inserción de datos en la base de datos y alojamos el PDF en una carperta que se crea
	//a partir del user
	$sql = "INSERT INTO justificaciones (user, num, archivopdf, descripcion, created_at, updated_at, estado, message) VALUES ('$usuario', '$numeroDePDF', '$archivopdf', '$descripcion', '$date', '$date', '$status', '$mensaje')";
	$resultado = $conexion->query($sql);
    $id = $_SESSION["user_id"];
    echo "Mi id es: " . $id;

	if($_FILES["archivo"]["error"]>0){     //Para recibir archivos
		//echo "Error al cargar el archivo";
		Info ("Error al cargar el archivo");
	}else{
		$permitidos= array("application/pdf"); //Solo recibe pdf
		$limite_kb=4000;//Limite del pdf para ser guardado en la carpeta del estudiante
		if(in_array($_FILES["archivo"]["type"],$permitidos) && $_FILES["archivo"]["size"]<=$limite_kb*1024){
			$ruta = 'justificacionespdf/'. $id . '/'; //Ruta donde se va guardar el archivo
			$archivo=$ruta . $_FILES["archivo"]["name"];
			if(!file_exists($ruta)){  //Creando la ruta en caso de que no exista
				mkdir($ruta);
			}
			if(!file_exists($archivo)){//Verificamos si ya existe el archivo
				$resultado=@move_uploaded_file($_FILES["archivo"]["tmp_name"],$archivo); //Me ayuda a mover el archivo a una ruta indicada
				if($resultado){

                    Info ("Archivo guardado correctamente");
					//echo "Archivo guardado correctamente";

				}else{
                    
                    Info ("Error al guardar el archivo");
					//echo "Error al guardar el archivo";

				}

			}else{

                Info ("El archivo ya existe");
				//echo "Archivo ya existe";
			}
		}else{

			Info ("Archivo no permitido, excede el tamaño");
			//echo "Archivo no permitido, excede el tamaño";
		}
	}

        
        header('Location: /modules/Justificaciones');
        exit();
}


?>
