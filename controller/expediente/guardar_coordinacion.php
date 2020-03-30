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

	$sql="INSERT INTO T_EXPEDIENTE
    VALUES ('','$cbx_coordinacion','$cbx_direccion','$fechaTransferencia','$claveExp','$descripcionExp','$year','$tConservaExp','$noLegajosExp','$noHojasExp','$cbx_caracter')";
	echo mysqli_query($mysqly,$sql);
 ?>