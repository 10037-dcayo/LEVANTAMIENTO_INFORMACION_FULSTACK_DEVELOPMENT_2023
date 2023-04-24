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


$sql = "SELECT archivopdf FROM infoq";  //Realizamos la consulta para obtener el nombre del archivo pdf
$result = $conexion->query($sql); //Realiza la consulta la base de datos
$row = mysqli_fetch_array($result);//Devuelve los datos de una fila en forma de array
$_SESSION['infoq_archivo']=$row['archivopdf'];//Almacenamos en la sesion el nombre del archivo del campo archivopdf
$nombrePDF=$_SESSION['infoq_archivo'];//Almacenamos su contenido en la variable $nombrePDF
    if ($nombrePDF==$archivopdf) {
        Info('Ya existe un archivo con el nombre.');
        header('Location: /modules/Informes_Quincenales');
        exit();
    } else {

	//Accedemos a los datos enviados mediante $_POST
    $usuario = $_POST['userid'];
	$numeroDePDF = $_POST['num'];
	$descripcion = $_POST['descripcion'];
	$date = date('Y-m-d H:i:s');
	
	//Realizamos la inserción de datos en la base de datos y alojamos el PDF en una carperta que se crea
	//a partir del user
	$sql = "INSERT INTO infoq (user, num, archivopdf, descripcion, created_at, updated_at) VALUES ('$usuario', '$numeroDePDF', '$archivopdf', '$descripcion', '$date', '$date')";
	$resultado = $conexion->query($sql);
    $id = $_SESSION["user_id"];
    echo "Mi id es: " . $id;

	if($_FILES["archivo"]["error"]>0){     //Para recibir archivos
		//echo "Error al cargar el archivo";
		Info ("Error al cargar el archivo");
	}else{
		$permitidos= array("application/pdf"); //Solo recibe pdf
		$limite_kb=2000;
		if(in_array($_FILES["archivo"]["type"],$permitidos) && $_FILES["archivo"]["size"]<=$limite_kb*1024){
			$ruta = 'informesquincenalespdf/'. $id . '/'; //Ruta donde se va guardar el archivo
			$archivo=$ruta . $_FILES["archivo"]["name"];
			if(!file_exists($ruta)){  //Creando la ruta en caso de que no exista
				mkdir($ruta);
			}
			if(!file_exists($archivo)){
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

        //$date = date('Y-m-d H:i:s');
        //$sql_insert = "INSERT INTO infoq (user, num, archivopdf, descripcion, created_at, updated_at) VALUES ('" . trim($_POST['txtuserid']) . "', '" . trim($_POST['txtnum']) . "', '" . trim($_POST['archivo']) . "', '" . trim($_POST['txtinfoqdescription']) . "','" . $date . "', '" . $date . "')";

        //if (mysqli_query($conexion, $sql)) {
            //Info('Archivo creado.');
        //} else {
          ///  Error('Error al crear.');
        //}
        
        header('Location: /modules/Informes_Quincenales');
        exit();
}


//Codigo que funciona

    /*$usuario = $_POST['userid'];
	$numeroDePDF = $_POST['num'];
	$archivopdf = $_POST['archivo'];
	$descripcion = $_POST['descripcion'];
	$date = date('Y-m-d H:i:s');
	
	
	$sql = "INSERT INTO infoq (user, num, archivopdf, descripcion, created_at, updated_at) VALUES ('$usuario', '$numeroDePDF', '$archivopdf', '$descripcion', '$date', '$date')";
	$resultado = $conexion->query($sql);
    $id = $_SESSION["user_id"];
    echo "Mi id es: " . $id;

	if($_FILES["archivo"]["error"]>0){     //Para recibir archivos
		echo "Error al cargar el archivo";
	}else{
		$permitidos= array("application/pdf"); //Solo recibe pdf
		$limite_kb=1000;
		if(in_array($_FILES["archivo"]["type"],$permitidos) && $_FILES["archivo"]["size"]<=$limite_kb*1024){
			$ruta = 'informesquincenalespdf/'. $id . '/'; //Ruta donde se va guardar el archivo
			$archivo=$ruta . $_FILES["archivo"]["name"];
			if(!file_exists($ruta)){  //Creando la ruta en caso de que no exista
				mkdir($ruta);
			}
			if(!file_exists($archivo)){
				$resultado=@move_uploaded_file($_FILES["archivo"]["tmp_name"],$archivo); //Me ayuda a mover el archivo a una ruta indicada
				if($resultado){
					echo "Archivo guardado correctamente";

				}else{
					echo "Error al guardar el archivo";

				}

			}else{
				echo "Archivo ya existe";
			}
		}else{
			echo "Archivo no permitido, excede el tamaño";
		}
	}*/


?>

