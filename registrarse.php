<!DOCTYPE html>
<html lang="es">
<head>
	<title>Registrarse</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="./login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href=./login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="./login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="./login/vendor/daterangepicker/daterangepicker.css">
<!--==============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./login/css/util.css">
	<link rel="stylesheet" type="text/css" href="./login/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(./login/images/bg-01.png);">
					<span class="login100-form-title-1">
						Registrarte
					</span>
				</div>

				<form class="login100-form validate-form" action="controller_login.php" method="POST">
					<div class="wrap-input100 validate-input m-b-26" >
						<span class="label-input100">Usuario</span>
						<input class="input100" type="text" name="usuario" placeholder="Ingresa Usuario">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" >
						<span class="label-input100">Contraseña </span>
						<input class="input100" type="password" name="pass" placeholder="Ingresa Contraseña">
						<span class="focus-input100"></span>
                    </div>

					<div class="flex-sb-m w-full p-b-30">
						
						<div>
							<a href="index.php" class="txt1">
							Iniciar Sesion
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<input type="hidden" name="registrarse" value="registrarse">
						<button class="login100-form-btn">
							Guardar
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>

</body>
</html>
