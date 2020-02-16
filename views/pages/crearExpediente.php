<?php 
	session_start();
	if (!isset($_SESSION['usuario'])) {
		header('Location: home.php');
	}
?>

</style>
<!DOCTYPE html>
<html>
<!------	Titulo	----->
<title>SICOA | Crear Expediente</title>

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
            <li ><a href="home.php"><i class="glyphicon glyphicon-home"></i> <span>Inicio</span></a></li>
            <li ><a href="areas.php"><i class="fa fa-link"></i> <span>Areas</span></a></li>
            <li><a href="guarda.php"><i class="glyphicon glyphicon-list-alt"></i> <span>Tiempo de guarda precautoria</span></a></li>
            <li class="treeview active">
                <a href="#"><i class="fa fa-file-o"></i> <span>Crear</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="crearExpediente.php">Expediente</a></li>
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
		<h1 >Crear nuevo expediente</h1>
		
  </section>
    <section class="content container-fluid">
        <br>
        <!--------------------------
        | Inicio Page Content Here |
        -------------------------->
        <form class="containerCrearExp" id="comboExpediente" name="comboExpediente" action="" method="POST">
            <Div class="formExpeCre">
                <label style=" width: 200px;">Selecciona la Dirección : </label>        
                <select class="ExpeSelect" id="cbx_direccion" name="cbx_direccion">
                
                </select>           
            </Div>
            <Div class="formExpeCre">
                <label  style=" width: 200px;" for="formExpeCre">Selecciona la Coordinación : </label>
                <select class="ExpeSelect" id="cbx_coordinacion" name="cbx_coordinacion">
                </select>
            </Div>
            <Div class="formExpeCre">
                <label  style=" width: 200px;" for="formExpeCre">Fecha de transferencia : </label>         
                <input class="ExpeSelect" type="date" name="fechaTransferencia" id="fechaTransferencia">    
            </Div>
            <Div class="formExpeCre">
                <label  style=" width: 200px;" for="formExpeCre">Clave del expediente : </label>        
                <input class="ExpeSelect" type="text" id="claveExp" name="claveExp" >           
            </Div>
            <Div class="formExpeCre">
                <label  style=" width: 200px;" for="formExpeCre">Descripción del expediente : </label>        
                <input class="ExpeSelect" type="text" id="descripcionExp" name="descripcionExp" >           
            </Div>
            <Div class="formExpeCre">
                <?php
                    $cont = date('Y');
                ?>
                <label  style=" width: 200px;" for="formExpeCre">Año del expediente : </label>         
                <select class="ExpeSelect" id="año" name="year">
                    <?php while ($cont >= 2008) { ?>
                    <option class="opExp" value="<?php echo($cont); ?>"><?php echo($cont); ?></option>
                    <?php $cont = ($cont-1); } ?>
                </select>      
            </Div>
            <Div class="formExpeCre" style="text-align: left;">
                <label  style=" margin-right: 0px;margin-left: 70px;" for="formExpeCre">Tiempo de Conservación : </label>        
                <input style="  width: 110px;" class="ExpeSelect" type="text" id="tConservaExp" name="tConservaExp" >
                <label>años</label>           
            </Div>
            <Div class="formExpeCre">
                <label  style=" width: 200px;" for="formExpeCre">No. de Legajos : </label>        
                <input class="ExpeSelect" type="text" id="noLegajosExp" name="noLegajosExp" >           
            </Div>
            <Div class="formExpeCre">
                <label  style=" width: 200px;" for="formExpeCre">No. de Hojas : </label>        
                <input class="ExpeSelect" type="text" id="noHojasExp" name="noHojasExp" >           
            </Div>

            <Div class="formExpeCre">
                <label  style=" width: 200px;" for="formExpeCre">Carácter : </label>        
                <select class="ExpeSelect" id="cbx_caracter" name="cbx_caracter">
                    <option value="0" disabled selected>Selecciona una Caracter: </option>
                        <option class="opExp"value="ADMINISTRATIVO">ADMINISTRATIVO</option>
                        <option class="opExp"value="LEGAL">LEGAL</option>
                        <option class="opExp"value="FISCAL">FISCAL</option>
                </select>           
            </Div>
            
            <button id="EnviarBoton" name="EnviarBoton" class="EnviarBoton2  btn-danger " style="alinig" >Guardar</button>
        
    	</form>

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