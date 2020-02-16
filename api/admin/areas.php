<?php 

require_once('../access.php');
$mysqli = new mysqli("localhost","root","","sicoa");  // conecta mediante mysqli
// <--- Obtiene todas las direcciones y las ordena segun su Id
$query = "SELECT Id_direcciones, nombre_direccion FROM T_DIRECCIONES ORDER BY Id_direcciones";
$resultado=$mysqli->query($query);
$respuesta = array();
while($row = $resultado->fetch_assoc()) {
	$query2 = "SELECT nombre_coordinacion FROM T_COORDINACIONES WHERE id_direcciones = {$row['Id_direcciones']}"; 
	$cont = 0;
    $resultado2=$mysqli->query($query2);
    while($row2 = $resultado2->fetch_assoc()) {
    	$row['coordinaciones'][$cont] = $row2;
    	$cont++;
    }
    $respuesta[] = $row;
}

echo json_encode($respuesta);