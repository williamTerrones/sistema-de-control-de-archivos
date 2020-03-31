<?php 
    require_once '../conexion2.php';
    $mysqly = getConn();

    $cbx_direccion = $_POST['cbx_direccion'];
    $cbx_coordinacion = $_POST['cbx_coordinacion'];

	$fechaTransferencia=$_POST['fechaTransferencia'];
	$claveExp=$_POST['claveExp'];
	$descripcionExp=$_POST['descripcionExp'];
	$year=$_POST['year'];
	$noLegajosExp=$_POST['noLegajosExp'];
	$noHojasExp=$_POST['noHojasExp'];
	$cbx_caracter=$_POST['cbx_caracter'];

	if(!empty($_FILES["archivo"]["name"])){
                
        // File path config
        $targetDir = "../../uploads/";
        $fileName = basename($_FILES["archivo"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
                
        if(move_uploaded_file($_FILES["archivo"]["tmp_name"], $targetFilePath)){
			$uploadedFile = $targetFilePath;
		}
    }

	$tConservaExp = 0;

	switch($cbx_caracter){
		case "ADMINISTRATIVO":
			$tConservaExp = 5;
			break;
		case "FISCAL":
			$tConservaExp = 6;
			break;
		case "LEGAL":
			$tConservaExp = 8;
			break;
	}

	if(!empty($uploadedFile) && file_exists($uploadedFile)){
		$url_archivo = "uploads/$fileName";
	} else {
		$url_archivo = null;
	}
	

	$sql="INSERT INTO T_EXPEDIENTE
    VALUES (0,'$cbx_coordinacion','$cbx_direccion','$fechaTransferencia','$claveExp','$descripcionExp','$year','$tConservaExp','$noLegajosExp','$noHojasExp','$cbx_caracter',0,'$url_archivo')";
	if(mysqli_query($mysqly,$sql)){
		echo "1";
	} else {
		echo "0";
	}
 ?>