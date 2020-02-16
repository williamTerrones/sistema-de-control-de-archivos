<?php 
	session_start();
	unset($_SESSION['usuario']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Inicio</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="./styles/login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./styles/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./styles/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./styles/login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="./styles/login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./styles/login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./styles/login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="./styles/login/vendor/daterangepicker/daterangepicker.css">
<!--==============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./styles/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="./styles/login/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(./styles/login/images/bg-02.jpg);">
					<span class="login100-form-title-1">
						H. AYUNTAMIENTO DE BACALAR
						COORDINACION DE ARCHIVO MUNICIPAL
					</span>
				</div>

				<form class="login100-form validate-form" action="controller_login.php" method="POST">
					<div class="wrap-input100 validate-input m-b-26" >
						<span class="label-input100"><b>Usuario</b></span>
							<input class="input100" type="text" autofocus name="usuario" placeholder="Ingresa Usuario" required>
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" >
						<span class="label-input100"><b>Contraseña</b></span>
							<input class="input100" type="password" name="pass" placeholder="Ingresa Contraseña" required>
						<span class="focus-input100"></span>
					</div>				
		
					<div class="container-login100-form-btn">
						<input type="hidden" name="entrar" value="entrar">
						<button class="login100-form-btn">
							Iniciar Sesión
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>

</body>
</html>
