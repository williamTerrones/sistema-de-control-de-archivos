<?php 

require_once('../../access.php');
require_once('../../../models/conexion.php');
require_once('../../../controller/expedientesController.php');

$data = file_get_contents("php://input");
$request = json_decode($data);
if(!isset($data)){
	echo "No existe post id_expediente";
	return false;
}

$expedientesController = new ExpedientesController();

$expediente = $expedientesController->obtenerExpediente($request->id_expediente);

echo json_encode($expediente);

?>