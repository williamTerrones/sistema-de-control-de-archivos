<?php 
	session_start();
	if (!isset($_SESSION['usuario'])) {
		header('Location: home.php');
	}
	include('../../conn.php');
?>

<!DOCTYPE html>
<html>
<!------	Titulo	----->
<title>SICOA | Expedientes</title>

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
				<p>Admin</p>
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
		<h1 >Expedientes<button class="btnAtras btn btn-success"onclick="history.go(-1)"><span>Volver</span></button></h1>	
  </section>
    <section class="content container-fluid">
			<br>
			<!--------------------------
			| Inicio Page Content Here |
			-------------------------->
			<div class="box-header">
				<h4> Expediente DC</h4>
			</div>
			<div class="box-body">
				<table id="example2" class="table table-bordered table-hover">
					<thead>
						<tr>
						<th>Fechas de Transferencia</th>
						<th>Descripcion del Expediente</th>
						<th>Año del Expediente</th>
						<th>Caracter</th>
						<th>Responsable del Area (coordinad@)</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>12-09-2018</td>
							<td>Dictamen de Salud</td>
							<td>2011</td>
							<td><a class="btn btn-danger btn-xs">ADMINISTRATIVO</a></td>
							<td>Ing. Eduardo Ochoa Sánchez</td>
						</tr>
						<tr>
							<td>12-09-2018</td>
							<td>Comprobación de Gastos</td>
							<td>2011</td>
							<td><a class="btn btn-danger btn-xs">ADMINISTRATIVO</a></td>
							<td>Ing. Eduardo Ochoa Sánchez</td>
						</tr>
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