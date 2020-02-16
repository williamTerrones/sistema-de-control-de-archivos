<?php 

class ExpedientesController {

	public $db, $table="t_expediente", $expedientes;

	public function __construct() {
		$this->db = Conexion::Conectar();
    }
    
    public function obtenerExpedientes() {
        $sql = `SELECT E.id_expediente, E.Id_coodinacion, 
        E.Id_direcciones, E.fechaTransferencia, E.claveExpediente,
        E.descripcionExpediente, E.yearExpediente, E.tiempodeConservacion, E.legajos, E.hojas,
        E.caracter, C.Id_coordinacion, C.nombre, D.Id_direcciones, D.nombre FROM t_expediente as E,
        t_coordinaciones AS C, t_direcciones AS D  WHERE E.Id_coodinacion = C.Id_coordinacion AND E.Id_direcciones = D.Id_direcciones`;
		$consulta = $this->db->query($sql);
		while($dato = $consulta->fetch_assoc()) {
			$this->expedientes[] = $dato;
		}
		return $this->expedientes;
	}


}

?>