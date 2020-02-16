<?php 
require_once '../conexion2.php';
function getCoordinacion(){
  $mysqli = getConn();
  $id = $_POST['id'];
  $query = "SELECT * FROM T_COORDINACIONES WHERE Id_direcciones = $id";
  $result = $mysqli->query($query);
  $coordinacion = '<option class="opExp" value="0">Elige una opción</option>';
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $coordinacion .= "<option class='opExp' value='$row[Id_coordinacion]'>$row[nombre]</option>";
  }
  return $coordinacion;
}
echo getCoordinacion();