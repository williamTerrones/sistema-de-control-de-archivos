<?php 

class Conexion {

	public static function Conectar() {
		$con = new mysqli("localhost","root","","sicoa");
		$con->query("SET NAMES 'utf8'");
		return $con;
	}
}

?>