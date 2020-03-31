<?php 

require_once('../../access.php');
require_once('../../../models/conexion.php');
require_once('../../../controller/expedientesController.php');

$data = file_get_contents("php://input");
$request = json_decode($data);
if(!isset($data)){
	echo "No existe post id_expediente o estatus_expediente";
	return false;
}

$expedientesController = new ExpedientesController();

$expediente = $expedientesController->actualizarEstatusExpediente($request->id_expediente, $request->estatus_expediente);

echo json_encode($expediente);

?>