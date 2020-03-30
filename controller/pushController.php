<?php 

class pushController {

	public $db, $table="t_expediente", $expedientes;
	private $title = 'SICOA';
	private $app_id = '8d7a87f4-88c5-4e96-873a-1b938e7923b2';
	private $autorization = 'MDQ3MDgzMzYtYjA2ZC00NTUwLWI5MGItNTYxMGRkMTlkNjg3';

	public function __construct() {
		$this->db = Conexion::Conectar();
    }

    function sendMessage($contenido) {
    $content      = array(
        "en" => $contenido,
    );
    $headlings      = array(
        "en" => $this->title
    );

    $fields = array(
        'app_id' => $this->app_id,
        'included_segments' => array(
            'All'
        ),
        'data' => array(
            "foo" => "bar"
        ),
        'contents' => $content,
        'headlings' => $headlings,
    );
    
    $fields = json_encode($fields);
    //print("\nJSON sent:\n");
    //print($fields);
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json; charset=utf-8',
        'Authorization: Basic '.$this->autorization,
    ));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    
    $response = curl_exec($ch);
    curl_close($ch);
    
    return $response;
}


}

?>