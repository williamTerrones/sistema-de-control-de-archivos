<?php
require_once '../conexion2.php';

function getDirecciones(){
    $mysqli = getConn();
    $query = 'SELECT * FROM T_DIRECCIONES';
    $result = $mysqli->query($query);
    $direcciones = '<option class="opExp" value="0">Elige una Dirección</option>';
    while($row = $result->fetch_array(MYSQLI_ASSOC)){
        $direcciones .= "<option class='opExp' value='$row[Id_direcciones]'>$row[nombre_direccion]</option>";
    }
    return $direcciones;
    }
    echo getDirecciones();