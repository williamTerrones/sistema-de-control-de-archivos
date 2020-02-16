<?php 
	session_start();
	if (!isset($_SESSION['usuario'])) {
		header('Location: home.php');
	}
	    require_once('../../conexion.php');
		$db=DB::conectar();

		require_once('../../controller/conexion2.php');
		$mysqli = getConn();
	
?>

</style>
<!DOCTYPE html>
<html>

<!------	Titulo	----->
<title>SICOA | Crear Direcciones</title>
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
					<li class="active"><a href="crearDireccion.php">Dirección</a></li>
					<li><a href="crearCoordinacion.php">Coordinación</a></li>
				</ul>
			</li>
		</ul>
	</section>
</aside>
<!-- Fin Sidebar Menu -->

<div class="content-wrapper">
  <section class="content-header" id="tituloContent">
		<h1 >Crear nueva dirección</h1>
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
			if (isset($_POST['enviarDireccion'])) {
				$direccion = $_POST["direc"];

				$select=$db->prepare('SELECT * FROM T_DIRECCIONES WHERE nombre=:nombre');
				$select->bindValue('nombre',$direccion);
				$select->execute();
				$registro=$select->fetch();
				if($registro['nombre']!=NULL){
					$usado=False;
				}else{
					$usado=True;
				}	
				$very = $usado;
				
				
				if ($very != True) {  ?>
					<!-- The Modal -->
					<div id="myModal" class="modal">
						<!-- Modal content -->
						<div class="modal-content">
							<p>Error la dirección <b>" <?php echo $direccion ?> "</b> ya esta ingresada
							   Ingresa Otra Dirección. 
							</p>
							<br>
							<button type="button" id="xModal" class="btn btn-default" >
								<span class="glyphicon glyphicon-remove"></span>
								Cerrar
							</button>
						</div>
					</div>
		<?php	} else {
					$mysqli->query("INSERT INTO t_direcciones VALUES ('','$direccion')"); ?>
					<div id="myModal" class="modal">
						<!-- Modal content -->
						<div class="modal-content" style="border: 1px solid #1070ffeb;">
							<p>Correcto la dirección <b>" <?php echo $direccion ?> "</b>
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
			}
		?>

		<div class="contentDirec">
			<div class="tituloDirec">
				<h2>Crear Dirección</h2>
			</div>
			<form class="formDirec" action="" method="POST">
				<label for="firstName" class="first-name">Dirección</label>
				<input required="" type="text" name="direc">
				<button id="b1231" name="enviarDireccion">Aceptar</button>
			</form>
		</div>			
		<!--------------------------
		| Fin Page Content Here |
		-------------------------->
		<script>
			var modal = document.getElementById('myModal');
			var btn = document.getElementById("xModal");
			if(btn!==null){
				btn.onclick = function() {
					modal.style.display = "none";
				}
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