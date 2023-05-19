<?php
session_start();
require_once('config.php');

// Verifica si el usuario ha iniciado sesión.
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirige al usuario al formulario de inicio de sesión si no ha iniciado sesión.
    header('Location: login.php');
    exit;

}
// Si el usuario ha iniciado sesión, muestra el contenido de la página de inicio.
?>

<!-- HTML -->

<!DOCTYPE html>

<html>

<head>

	<title>Página de inicio</title>

	<link rel="icon" type="image/x-icon" href="Imagenes/Logo.png"> <!-- FAVICON --> 

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

  <script src='js/jquery.min.js'></script>
  <script src='js/moment.min.js'></script>

  <link rel="stylesheet" href="css/fullcalendar.min.css">
  <script src="js/fullcalendar.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

  <style>
    .bienvenido-titulo {
  font-size: 24px;
  font-weight: bold;
  color: #333;
  text-align: center;
  margin-top: 20px;
  margin-bottom: 80px;
}

/* Estilos del botón de cerrar sesión */
.btn_cerrar_sesion {
  justify-content: flex-end;
  padding: 10px;
}

.btn_cerrar_sesion p {
  margin-left: 890px;
  margin-top: 30px;
}

.btn_cerrar_sesion a {
  color: #fff;
  background-color: #007bff;
  padding: 10px 20px;
  text-decoration: none;
  border-radius: 4px;
  transition: background-color 0.3s ease;
}

.btn_cerrar_sesion a:hover {
  background-color: #0056b3;
}
  </style>

</head>

<body>

<h1 class="bienvenido-titulo">Bienvenido, <?php echo $_SESSION['username']; ?>!</h1>

  <div class="container">

    <div class="row">

      <div class="col"></div>
      <div class="col-7"> <div id="CalendarioWeb"></div></div>
      <div class="col"></div>

    </div>

  </div>

  <script>

    $(document).ready(function(){

      $('#CalendarioWeb').fullCalendar({
        header:{
          left:'today,prev,next, Miboton',
          center:'title',
          right:'month, basicWeek, basicDay'
        },

        customButtons:{
          Miboton:{
            text:"Botón 1",
            click:function(){
              alert("Acción del botón");
            }
          }
        },

        dayClick:function(date,jsEvent,view){
          $('#txtFecha').val(date.format());
          $("#ModalEventos").modal();
        },
      
        events: 'http://localhost/Proyecto-M07/eventos.php',

        eventClick:function(calEvent, jsEvent, view){
          
          // H2
          $('#tituloEvento').html(calEvent.title);
          // Mostrar información
          $('#txtDescripcion').val(calEvent.descripcion);
          $('#txtId').val(calEvent.id);
          $('#txtTitulo').val(calEvent.title);
          $('#txtColor').val(calEvent.color);

          FechaHora= calEvent.start._i.split(" ");
          $('#txtFecha').val(FechaHora[0]);
          $('#txtHora').val(FechaHora[1]);

          $('#ModalEventos').modal();
        }

      });
    });


  </script>

<!-- MODAL AGREGAR, ELIMINAR, MODIFICAR -->
<div class="modal fade" id="ModalEventos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tituloEvento"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">

        Id: <input type="text" id="txtId" name="txtId"><br/>
        Fecha: <input type="text" id="txtFecha" name="txtFecha" /><br/>
        Título: <input type="text" id="txtTitulo"><br/>
        Hora: <input type="text" id="txtHora" value="10:30" /><br/>
        Descripción del evento: <textarea id="txtDescripcion" rows="3"></textarea><br/>
        Color: <input type="color" value="#ff0000" id="txtColor"><br/>

      </div>

      <div class="modal-footer">

        <button type="button" id="btnAgregar" class="btn btn-success">Agregar</button>
        <button type="button" id="btnModificar" class="btn btn-success">Modificar</button>
        <button type="button" id="btnEliminar" class="btn btn-danger">Borrar</button>
        <button type="button" class="btn btn-default" data-dimiss="modal">Cancelar</button>
    
      </div>

    </div>
  </div>
</div>

<script>

var NuevoEvento;

    $('#btnAgregar').click(function(){
      
      RecolectarDatosGUI();
      EnviarInformacion('agregar',NuevoEvento);

    });

    $('#btnEliminar').click(function(){
      
      RecolectarDatosGUI();
      EnviarInformacion('eliminar',NuevoEvento);

    });

    $('#btnModificar').click(function(){
      
      RecolectarDatosGUI();
      EnviarInformacion('modificar',NuevoEvento);

    });

    function RecolectarDatosGUI(){
      NuevoEvento={
        id:$('#txtId').val(),
        title:$('#txtTitulo').val(),
        start: $('#txtFecha').val()+" "+ $('#txtHora').val(),
        color: $('#txtColor').val(),
        descripcion: $('#txtDescripcion').val(),
        textColor:"#FFFFFF",
        end: $('#txtFecha').val()+" "+$('#txtHora').val()
      };
    }

    function EnviarInformacion(accion,objEvento){
      $.ajax({
        type:'POST', 
        url: 'eventos.php?accion='+accion,
        data:objEvento,
        success:function(msg){
          if(msg){
            $('#CalendarioWeb').fullCalendar('refetchEvents');
            $("#ModalEventos").modal('toggle');
          }
        },
        error:function(){
          alert("Hay un error...");
        }
      });
    }

</script>

  <div class="btn_cerrar_sesion">
	<p><a href="login.php">CERRAR SESIÓN</a></p> <!-- HAY QUE REVISAR EL COMO HACER EL CIERRE DE SESIÓN -->
  </div>

</body>
</html>