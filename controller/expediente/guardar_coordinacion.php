<?php 
    require_once '../conexion2.php';
    $mysqly = getConn();

    $cbx_direccion = $_POST['cbx_direccion'];
    $cbx_coordinacion = $_POST['cbx_coordinacion'];

	$fechaTransferencia=$_POST['fechaTransferencia'];
	$claveExp=$_POST['claveExp'];
	$descripcionExp=$_POST['descripcionExp'];
	$year=$_POST['year'];
	$tConservaExp=$_POST['tConservaExp'];
	$noLegajosExp=$_POST['noLegajosExp'];
	$noHojasExp=$_POST['noHojasExp'];
	$cbx_caracter=$_POST['cbx_caracter'];

	$sql="INSERT INTO T_EXPEDIENTE
    VALUES ('','$cbx_coordinacion','$cbx_direccion','$fechaTransferencia','$claveExp','$descripcionExp','$year','$tConservaExp','$noLegajosExp','$noHojasExp','$cbx_caracter')";
	echo mysqli_query($mysqly,$sql);
 ?>