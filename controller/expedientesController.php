<?php 

class ExpedientesController {

	public $db, $table="t_expediente", $expedientes,$expediente;

	public function __construct() {
		$this->db = Conexion::Conectar();
		$this->expedientes = array();
    }
    
    public function obtenerExpedientes() {
        $sql = "SELECT E.id_expediente, E.Id_coodinacion, 
        E.Id_direcciones, E.fechaTransferencia, E.claveExpediente, E.estatus_expediente,
        E.descripcionExpediente, E.yearExpediente, E.tiempodeConservacion, E.legajos, E.hojas,
        E.caracter, C.Id_coordinacion, C.nombre_coordinacion, D.Id_direcciones, D.nombre_direccion FROM t_expediente as E,
        t_coordinaciones AS C, t_direcciones AS D  WHERE E.Id_coodinacion = C.Id_coordinacion AND E.Id_direcciones = D.Id_direcciones";
		$consulta = $this->db->query($sql);
		while($dato = $consulta->fetch_assoc()) {
			$this->expedientes[] = $dato;
		}
		return $this->expedientes;
	}

	public function obtenerExpediente($id){
		$sql = "SELECT * FROM $this->table WHERE id_expediente = '$id'";
		$sentencia = $this->db->query($sql);
		if($dato = $sentencia->fetch_assoc()) {
			$this->expediente = $dato;
		}
		return $this->expediente;
	}

	public function obtenerExpedientesPendientes() {
        $sql = "SELECT * FROM $this->table WHERE estatus_expediente = 0";
		$consulta = $this->db->query($sql);
		while($dato = $consulta->fetch_assoc()) {
			$this->expedientes[] = $dato;
		}
		return $this->expedientes;
	}


}

?>