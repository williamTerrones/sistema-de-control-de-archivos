$(document).ready(function(){
    // CARGA DIRECCIONES

    $.ajax({
      type: 'POST',
      url: '../../controller/expediente/cargar_direcciones.php'
    })
    .done(function(getDirecciones){
      $('#cbx_direccion').html(getDirecciones)
    })
    .fail(function(){
      alert('Hubo un errror al cargar las Direcciones')
    })
    // FIN CARGA DIRECCIONES
    // CARGA COORDINACIONES
    $('#cbx_direccion').on('change', function(){
      var id = $('#cbx_direccion').val()
      $.ajax({
        type: 'POST',
        url: '../../controller/expediente/cargar_coordinaciones.php',        
        data: {'id': id}
      })
      .done(function(getDirecciones){
        $('#cbx_coordinacion').html(getDirecciones)
      })
      .fail(function(){
        alert('Hubo un errror al cargar las coordinaciones')
      })
    })
    // FIN CARGA COORDINACIONES
    
    // ENVIAR FORMULARIO
    $('#EnviarBoton').on('click', function(){
      
      var datos=$('#comboExpediente').serialize();
      var form = $('#comboExpediente')[0];
      
      console.log("Manda datos ", datos)
      console.log("Manda form ", new FormData(form))
			$.ajax({
				type:"POST",
        url: '../../controller/expediente/guardar_coordinacion.php',        				
        data:new FormData(form),
        processData: false,
        contentType: false,
				success:function(r){
          console.log("Respuesta ", r)
					if(r==1){
            alertify.alert("agregado con exito");
            document.getElementById("comboExpediente").reset();
					}else{
						alert("Fallo el server");
					}
				}
			});

			return false;

    })
    // FIN ENVIAR FORMULARIO
  
  })
  