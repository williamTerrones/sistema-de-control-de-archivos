<?php 
	session_start();
	if (!isset($_SESSION['usuario'])) {
		header('Location: home.php');
	}
	require_once('../../controller/conexion2.php');
	$mysqli = getConn();

  	
	  
?>

<!DOCTYPE html>
<html>
<!------	Titulo	----->
<title>SICOA | Crear Coordinación</title>

<?php include ('../adminpages/head.php'); ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php include ('../adminpages/header.php'); ?>
<!-- Sidebar Menu -->
<aside class="main-sidebar">
	<section class="sidebar">
		<div class="user-panel">
			<div class="pull-left image">
				<img style=" border-radius: 25%;" src="../../styles/adminlte/dist/img/user8-128x128.jpg" class="img-circle" alt="User Image">
			</div>
			<div class="pull-left info">
				<p>Ebert
				</p>
				<!-- Status -->
				<a ><i class="fa fa-circle text-success"></i> Online</a>	
			</div>
		</div>
		<br>
		<ul class="sidebar-menu" data-widget="tree">
			<li class="header">Menu</li>
			<!-- Optionally, you can add icons to the links -->
			<li><a href="home.php"><i class="glyphicon glyphicon-home"></i> <span>Inicio</span></a></li>
			<li><a href="areas.php"><i class="glyphicon glyphicon-book"></i> <span>Areas</span></a></li>
			<li><a href="guarda.php"><i class="glyphicon glyphicon-list-alt"></i> <span>Tiempo de guarda precautoria</span></a></li>
			<li class="treeview active">
				<a href="#"><i class="fa fa-file-o"></i> <span>Crear</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li><a href="crearExpediente.php">Expediente</a></li>
					<li><a href="crearDireccion.php">Dirección</a></li>
					<li class="active"><a href="crearCoordinacion.php">Coordinación</a></li>
				</ul>
			</li>
		</ul>
	</section>
</aside>
<!-- Fin Sidebar Menu -->

<div class="content-wrapper">
  	<section class="content-header" id="tituloContent">
		<h1 >Crear nueva coordinación</h1>
 	</section>
    <section class="content container-fluid">
	<br>
	<!--------------------------
	| Inicio Page Content Here |
	-------------------------->
	<style>
		#modalDirec{
			display: flex;
			border-right: 11px;
			/* width: 55px; */
			background-color: #fefefe;
			margin: auto;
			padding: 20px;
			border: 1px solid #888;
			width: 80%;
			position: fixed;
		}
		/* The Modal (background) */
		.modal {
			display: block; /* Hidden by default */
			position: fixed; /* Stay in place */
			z-index: 1; /* Sit on top */
			padding-top: 15%; /* Location of the box */
			left: 0;
			top: 0;
			width: 100%; /* Full width */
			height: 100%; /* Full height */
			overflow: auto; /* Enable scroll if needed */
			background-color: rgb(0,0,0); /* Fallback color */
			background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
		}

		/* Modal Content */
		.modal-content {
			background-color: #fefefe;
			margin: auto;
			padding: 3%;
			border: 1px solid #f10000;
			width: 45%;
		}

		/* The Close Button */
		.close {
			color: #211f1f;
			float: right;
			font-size: 28px;
			font-weight: bold;
		}

		.close:hover,
		.close:focus {
			color: #000;
			text-decoration: none;
			cursor: pointer;
		}
		#xModal{
			color:red;
			margin-left: 85%;
		}
	
	</style>
<?php   

if (isset($_POST['enviarCoordinacion'])) {
	$coordinacion = $_POST["coordi"];
	$direccion2 = $_POST["direcc"];

	//Procederemos a hacer una consulta que buscara el correo del usuario
	$buscaCoordinacion = "SELECT * FROM T_COORDINACIONES WHERE nombre='$coordinacion'";

	//Realizamos la consulta y anadimos $connection, ya que es la variable que creamos en nuestro archivo connection.php
	$resultado = $mysqli->query($buscaCoordinacion);

	//Usaremos la funcion mysqli_num_rows en la consulta $resultado,
	//esta funcion nos regresa el numero de filas en el resultado
	$contador = mysqli_num_rows($resultado);

	//SI SI EXISTE una fila, quiere decir QUE SI ESTA EL CORREO EN LA BASE DE DATOS
	if($contador == 1) { ?>
		<div id="myModal" class="modal">
			<!-- Modal content -->
			<div class="modal-content">
				<p>Error la coordinación <b>" <?php echo $coordinacion ?> "</b> ya esta ingresada
					Ingresa Otra Coordinacion. 
				</p>
				<br>
				<button type="button" id="xModal" class="btn btn-default" >
					<span class="glyphicon glyphicon-remove"></span>
					Cerrar
				</button>
			</div>
		</div>
<?php	} else {
		$mysqli->query("INSERT INTO T_COORDINACIONES VALUES ('','$direccion2','$coordinacion')"); ?>
		<div id="myModal" class="modal">
			<!-- Modal content -->
			<div class="modal-content" style="border: 1px solid #1070ffeb;">
				<p>Correcto la coordinación <b>" <?php echo $coordinacion ?> "</b>
					se Agrego Correctamente. 
				</p>
				<br>
				<button type="button" id="xModal" class="btn btn-default" style="color:#0826b9;">
					<span class="glyphicon glyphicon-remove"></span>
					Cerrar
				</button>
			</div>
		</div>
<?php	}

	// Inserta Coordinacion
}

?>
<div class="contentDirec">

	<Div class="tituloDirec">
		<h2>Crear Coordinación</h2>
	</Div>

	<form class="formDirec" action="" method="POST">
		<div>
			<!-- <---- Sele asigna el "class=DCselect" para que se vincule con el id de la direccion -->
			<select class="selectCoord" name="direcc"  onChange="valida()">
				<option value="0" disabled selected>Selecciona una Dirección :</option>
				<?php
				// <--- Obtiene todas las direcciones y las ordena segun su Id
				$query = "SELECT Id_direcciones, nombre FROM t_direcciones ORDER BY Id_direcciones"; 
				$resultado=$mysqli->query($query);
				?>
				<?php while($row = $resultado->fetch_assoc()) { ?>
				<option value="<?php echo $row['Id_direcciones']; ?>"><?php echo $row['nombre']; ?></option>
				<?php } ?>
			</select>
		</div>           

		<label for="firstName" class="first-name">Coordinación</label>
		<input id="firstName" type="text" name="coordi" required> 

		<button id="b1231" name="enviarCoordinacion">Aceptar</button>
	</form>

</div>



	<!--------------------------
	| Fin Page Content Here |
	-------------------------->
	<script>
		var modal = document.getElementById('myModal');
		var btn = document.getElementById("xModal");
		btn.onclick = function() {
			modal.style.display = "none";
		}

	</script>
    </section>
  </div>
  <footer class="main-footer">
    <strong>Copyright &copy; 2018 <a href="#">H. Ayuntamiento de Bacalar</a>.</strong> All rights reserved.
  </footer>
  <div class="control-sidebar-bg"></div>
</div>
  <?php include ('../adminpages/script.php'); ?>
</body>
</html>