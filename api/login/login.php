<?php 

	//header('Access-Control-Allow-Origin: *');

	require_once('../access.php');
	require_once('../../usuario.php');
	require_once('../../crud_usuario.php');
	require_once('../../conexion.php');

	$usuario=new Usuario();
	$crud=new CrudUsuario();

	$data = file_get_contents("php://input");
	$request = json_decode($data);
	if(!isset($data)){
		echo "No existe post usuario o password";
		return false;
	}

	$usuario=$crud->obtenerUsuario($request->usuario,$request->pas);
	// si el id del objeto retornado no es null, quiere decir que encontro un registro en la base
	if ($usuario->getId()!=NULL) {
		$mensaje = [
			"nombre" => $usuario->getNombre(),
			"id" => $usuario->getId(),
			"codigo" => "1", 
 		];
		echo json_encode($mensaje);
	}else{
		$mensaje = [
			"codigo" => "0",
			"mensaje" => "El usuario no ha sido encontrado",
		];
		echo json_encode($mensaje);
	}
	
?>