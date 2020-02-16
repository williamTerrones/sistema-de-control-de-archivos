<?php 
	session_start();
	if (!isset($_SESSION['usuario'])) {
		header('Location: home.php');
	}
?>

<!DOCTYPE html>
<html>
<!------	Titulo	----->
<title>SICOA | Inicio</title>

<?php include ('../adminpages/head.php'); ?>
<body class="hold-transition skin-blue sidebar-mini" >
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
				<p>Ebert </p>
				<!-- Status -->
				<a ><i class="fa fa-circle text-success"></i> Online</a>
			</div>
		</div>
		<br>
		
		<ul class="sidebar-menu" data-widget="tree">
			<li class="header">Menu</li>
			<!-- Optionally, you can add icons to the links -->
			<li class="active"><a href="home.php"><i class="glyphicon glyphicon-home"></i> <span>Inicio</span></a></li>
			<li><a href="areas.php"><i class="glyphicon glyphicon-book"></i> <span>Areas</span></a></li>
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

<div class="content-wrapper" >
  <section class="content-header" id="tituloContent">
		<h1 >Inicio</h1>
  </section>
    <section class="content container-fluid">
			
			<!--------------------------
			| Inicio Page Content Here |
			-------------------------->
			<div class="contentLogos">
				<img class="logo1img" src="../../styles/img/logo.png" alt="">
				<h1>H. AYUNTAMIENTO DE BACALAR <p style="    margin: 16px 0 10px;color: #38342fe0;"> ARCHIVOS EN CONSENTRACIÓN</p></h1>
				<img class="logo2img" src="../../styles/img/logo1.png" alt="">
			
			</div>
			
			
			<div>
				<p style="margin-left: 95px;width: 80%;">
					

				</p>
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