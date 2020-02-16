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
<title>SICOA | Areas</title>
<?php include ('../adminpages/head.php'); ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php include ('../adminpages/header.php'); ?>
<!-- Sidebar Menu -->
<aside class="main-sidebar">
	<section class="sidebar">
		<div class="user-panel">
			<div class="pull-left image">
				<img src="../../styles/adminlte/dist/img/user8-128x128.jpg" class="img-circle" style=" border-radius: 25%;" alt="User Image">
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
				<li class="active"><a href="areas.php"><i class="glyphicon glyphicon-book"></i> <span>Areas</span></a></li>
				<li><a href="guarda.php"><i class="glyphicon glyphicon-list-alt"></i> <span>Tiempo de guarda precautoria</span></a></li>
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
		<h1 >Áreas y Coordinaciones</h1>
		
  </section>
    <section class="content container-fluid">
			<br>
			<!--------------------------
			| Inicio Page Content Here |
			-------------------------->
			<div class="containerArea">
				<?php
					$query = "SELECT Id_direcciones, nombre_direccion FROM T_DIRECCIONES ORDER BY Id_direcciones";
					$resultado=$mysqli->query($query);
				?>
				<?php while($row = $resultado->fetch_assoc()) { ?>
					<div class="card">
						<div class="cardTitulo">
								<h4><?php echo $row['nombre_direccion']; ?></h4>
						</div>
						<div class="rowTableDC">
							<?php if($row['nombre_direccion'] === $row['nombre_direccion']){ ?>
								<table>
									<?php 
										$query2 = "SELECT Id_coordinacion, nombre_coordinacion FROM T_COORDINACIONES WHERE id_direcciones = {$row['Id_direcciones']}"; 
										$resultado2=$mysqli->query($query2);
										while($row2 = $resultado2->fetch_assoc()) { ?>
											<tr>
												<td> <a href="resumen.php?coordinacionTitulo=<?php echo $row2['nombre_coordinacion']?>&coordinacionID=<?php echo $row2['Id_coordinacion']?>&direccionID=<?php echo $row['Id_direcciones']?>"> <?php echo $row2['nombre_coordinacion']; ?></a></td>
											</tr>                           
									<?php } ?>
								</table> 
							<?php  ;} ?>
						</div>
					</div>
					<?php } ?>
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