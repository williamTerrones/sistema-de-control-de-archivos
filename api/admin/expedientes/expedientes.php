<?php 

require_once('../../access.php');
require_once('../../../models/conexion.php');
require_once('../../../controller/expedientesController.php');

$expedientesController = new ExpedientesController();

$expedientes = $expedientesController->obtenerExpedientes();

echo json_encode($expedientes);

?>