<?php 

require_once('../../access.php');
require_once('../../../models/conexion.php');
require_once('../../../controller/pushController.php');
require_once('../../../controller/expedientesController.php');

$expedientesController = new ExpedientesController();
$push = new pushController();

$expedientes = $expedientesController->obtenerExpedientesPendientes();

$anio_actual = (int) date("Y");

foreach ($expedientes as $key => $e) {

	$tiempo = $e['tiempodeConservacion'];

	$anio_expediente = (int) $e['yearExpediente'] + (int) $tiempo;

	if($anio_expediente<$anio_actual){
		//echo json_encode($e);
		$push->sendMessage("El expediente con clave ".$e['claveExpediente']. " de carácter ".$e['caracter']." ha vencido, favor de darle seguimiento");
	}
}

/*
$push = new pushController();

echo json_encode($push->sendMessage("testeando"));
*/

?>