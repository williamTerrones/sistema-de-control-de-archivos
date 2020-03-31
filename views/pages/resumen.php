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
		<h1 >Expedientes entregados<button class="btnAtras btn btn-success"onclick="history.go(-1)"><span>Volver</span></button></h1>	
	</section>
    <section class="content container-fluid">
		<br>
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
				background-color: #246355;
				border-bottom: solid 5px #0F362D;
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
        $coordinacionTitulo=$_GET['coordinacionTitulo'];
        $Id_Coordinacion=$_GET['coordinacionID'];
		$Id_Direccion=$_GET['direccionID'];

		// $buscarDireccion = "SELECT * FROM T_COORDINACIONES WHERE nombre='$coordinacion'";
		$datos = $mysqli->query("SELECT * FROM T_EXPEDIENTE WHERE Id_coodinacion='$Id_Coordinacion'");
				
		?>
      	<div class="box-header" style="text-align: center;">
			<h4><b> <?php echo $coordinacionTitulo; ?> </b></h4>
		</div>
		<div class="box-body">
			<table id="example2" class="table table-bordered">
				<thead style="color:black;">
					<tr>
						<th>FECHA DE TRANSF.</th>
						<th>AÑO DEL EXPED.</th>
						<th>DESCRIPCIÓN DEL EXPEDIENTE</th>
						<th>No. DE LEGAJOS</th>
						<th>No. DE HOJAS</th>
						<th>CARÁCTER</th>
					</tr>
				</thead>
				<tbody>
				<?php while($row = $datos->fetch_assoc()) { ?>
					<tr>
						<td><?php echo $row['fechaTransferencia']; ?></td>
						<td><?php echo $row['yearExpediente']; ?></td>
						<td><?php echo $row['descripcionExpediente']; ?></td>
						<td><?php echo $row['legajos']; ?></td>
						<td><?php echo $row['hojas']; ?></td>
						<td><?php echo $row['caracter']; ?></td>
					</tr>
				<?php } ?>
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