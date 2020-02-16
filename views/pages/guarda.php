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
<title>SICOA | Guarda Precautoria</title>

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
				<p>Ebert</p>
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
			<li class="active"><a href="guarda.php"><i class="glyphicon glyphicon-list-alt"></i> <span>Tiempo de guarda precautoria</span></a></li>
			<li class="treeview">
				<a href="#"><i class="fa fa-file-o"></i> <span>Crear</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li><a href="crearExpediente.php">Expediente</a></li>
					<li><a href="crearDireccion.php">Dirección</a></li>
					<li><a href="crearCoordinacion.php">Coordinación</a></li>
				</ul>
			</li>
		</ul>
	</section>
</aside>
<!-- Fin Sidebar Menu -->

<div class="content-wrapper">
  <section class="content-header" id="tituloContent">
		<h1 >Tiempo de guarda precautoria</h1>
		
  </section>
    <section class="content container-fluid">
			<!--------------------------
			| Inicio Page Content Here |
			-------------------------->
			<style>
				body{
					background-color: #632432;
					font-family: Arial;
				}

				#main-container{
					margin: 150px auto;
					width: 600px;
				}

				table{
					background-color: white;
					text-align: left;
					border-collapse: collapse;
					width: 100%;
				}

				th, td{
					padding: 20px;
				}

				thead{
					background-color: #193648;
					border-bottom: solid 3px #098fde;
					color: white;
				}

				tr:nth-child(even){
					background-color: #ddd;
				}

				tr:hover td{
					background-color: #369681;
					color: white;
				}

			</style>
			<?php
			$yearActual = date('Y');
			
			$tAdministrativo = 5;
			$tLegal = 8;
			$tFiscal = 6;
			
			$datos = $mysqli->query("SELECT * FROM T_EXPEDIENTE ORDER BY Id_expediente DESC");

			?>
			
			


			<div class="box-body">
				<table id="example2" class="table table-bordered">
					<thead >
						<tr >
							<th >DIRECCIÓN</th>
							<th >COORDINACIÓN</th>
							<th >CLAVE DEL EXPEDIENTE</th>
							<th >DESCRIPCIÓN DEL EXPEDIENTE</th>
							<th >AÑO DEL EXPEDIENTE</th>
							<th >T. DE CONSERVACIÓN</th>
							<th >CARÁCTER</th>
							<th >ESTADO</th>
						</tr>
					</thead>
					<tbody>
					<?php while($row = $datos->fetch_assoc()) { 
						$direccion = $mysqli->query("SELECT nombre_direccion FROM T_DIRECCIONES WHERE Id_direcciones = {$row['Id_direcciones']}");
						$direccionNueva = $direccion->fetch_assoc();
						$coordinacion = $mysqli->query("SELECT nombre_coordinacion FROM T_COORDINACIONES WHERE Id_coordinacion = {$row['Id_coodinacion']}");
						$coordinacionNueva = $coordinacion->fetch_assoc();
						if ($row['caracter'] == 'LEGAL') {
							$T_AL = $yearActual - $row['yearExpediente'];
							if ($T_AL >= $tLegal ) { ?>
								
								<tr>
									<td><?php echo $direccionNueva['nombre_direccion']; ?></td>
									<td><?php echo $coordinacionNueva['nombre_coordinacion']; ?></td>								
									<td><?php echo $row['claveExpediente']; ?></td>
									<td><?php echo $row['descripcionExpediente']; ?></td>
									<td><?php echo $row['yearExpediente']; ?></td>
									<td><?php echo $row['tiempodeConservacion']; ?></td>
									<td><?php echo $row['caracter']; ?></td>
									<td> <span class="btn btn-danger btn-ms">Finalizado</span></td>
								</tr>
							<?php
							}else { ?>
									<tr>
										<td><?php echo $direccionNueva['nombre_direccion']; ?></td>
										<td><?php echo $coordinacionNueva['nombre_coordinacion']; ?></td>
										
										<td><?php echo $row['claveExpediente']; ?></td>
										<td><?php echo $row['descripcionExpediente']; ?></td>
										<td><?php echo $row['yearExpediente']; ?></td>
										<td><?php echo $row['tiempodeConservacion']; ?></td>
										<td><?php echo $row['caracter']; ?></td>
										<td> <span class="btn btn-info btn-ms">Activo</span></td>
									</tr>
					<?php	}
							
						}
						if($row['caracter'] == 'ADMINISTRATIVO'){
							$T_AA = $yearActual - $row['yearExpediente'];

							if ($T_AA >= $tAdministrativo) { ?>
								<tr>
									<td><?php echo $direccionNueva['nombre_direccion']; ?></td>
									<td><?php echo $coordinacionNueva['nombre_coordinacion']; ?></td>								
									<td><?php echo $row['claveExpediente']; ?></td>
									<td><?php echo $row['descripcionExpediente']; ?></td>
									<td><?php echo $row['yearExpediente']; ?></td>
									<td><?php echo $row['tiempodeConservacion']; ?></td>
									<td><?php echo $row['caracter']; ?></td>
									<td> <span class="btn btn-danger btn-ms">Finalizado</span></td>
								</tr>
							<?php
							} else { ?>
									<tr>
										<td><?php echo $direccionNueva['nombre_direccion']; ?></td>
										<td><?php echo $coordinacionNueva['nombre_coordinacion']; ?></td>
										
										<td><?php echo $row['claveExpediente']; ?></td>
										<td><?php echo $row['descripcionExpediente']; ?></td>
										<td><?php echo $row['yearExpediente']; ?></td>
										<td><?php echo $row['tiempodeConservacion']; ?></td>
										<td><?php echo $row['caracter']; ?></td>
										<td> <span class="btn btn-info btn-ms">Activo</span></td>
									</tr>
							<?php
							}
							

						}
						if($row['caracter'] == 'FISCAL'){
							$T_AF = $yearActual - $row['yearExpediente'];
							if ($T_AF >= $tFiscal) { ?>
								<tr>
									<td><?php echo $direccionNueva['nombre_direccion']; ?></td>
									<td><?php echo $coordinacionNueva['nombre_coordinacion']; ?></td>								
									<td><?php echo $row['claveExpediente']; ?></td>
									<td><?php echo $row['descripcionExpediente']; ?></td>
									<td><?php echo $row['yearExpediente']; ?></td>
									<td><?php echo $row['tiempodeConservacion']; ?></td>
									<td><?php echo $row['caracter']; ?></td>
									<td> <span class="btn btn-danger btn-ms">Finalizado</span></td>
								</tr>
							
							<?php
							} else { ?>
								<tr>
									<td><?php echo $direccionNueva['nombre_direccion']; ?></td>
									<td><?php echo $coordinacionNueva['nombre_coordinacion']; ?></td>
									
									<td><?php echo $row['claveExpediente']; ?></td>
									<td><?php echo $row['descripcionExpediente']; ?></td>
									<td><?php echo $row['yearExpediente']; ?></td>
									<td><?php echo $row['tiempodeConservacion']; ?></td>
									<td><?php echo $row['caracter']; ?></td>
									<td> <span class="btn btn-info btn-ms">Activo</span></td>
								</tr>

							<?php
							}
							
						}
						
					} ?>
					</tbody>
				</table>
			</div>       

			<!--------------------------
			| Fin Page Content Here |
			-------------------------->
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