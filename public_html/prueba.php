<!doctype html>
<html lang="en">
  <head>
    <title>Men&uacute;</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="manifest" href="./manifest.json">
    <!--IOS SUPPORT-->
    <link rel="apple-touch-icon" href="./images/icons/icon-96x96.png">
    <meta name="apple-mobile-web-app-status-bar" content="#20b2aa">

    <meta name="theme-color" content="#20b2aa">
  </head>
  <body>
    
    <div class="wrapper d-flex align-items-stretch">
      <nav id="sidebar">
        <div class="custom-menu">
          <button type="button" id="sidebarCollapse" class="btn btn-primary">
            <i class="fa fa-bars"></i>
            <span class="sr-only">Toggle Menu</span>
          </button>
        </div>
        <div class="p-4 pt-5">
          <h1><a href="index.html" class="logo">MediCom</a></h1>
          <ul class="list-unstyled components mb-5">
            <li class="active">
              <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
              <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="Contact.html">Contacto</a>
                </li>
              </ul>
            </li>
            <li>
                <a href="localizacion.html">Localizaci&oacute;n</a>
            </li>
            <li>
              <a href="citas.html">Generar cita</a>
            </li>
            <li>
              <a href="recetas.html">Recetas</a>
            </li>
            <li>
              <a href="historialclinico.html">Historial cl&iacute;nico</a>
            </li>
              <li>
              <a href="buscadoctor.html">Busca tu doctor</a>
            </li>
              <li>
              <a href="agenda.html">Agenda</a>
            </li>
          </ul>

          <div class="footer">
            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="index.html" target="_blank">MediCom</a>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>

        </div>
      </nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">

        <h2 class="mb-4">Agenda</h2>
        <p>En MediCom nos preocupamos por que asistas a tus citas, asi que aquí te mostraremos una agenda y la posibilidad de agregarlo a tu calendario de google.</p>
        <p></p>
      </div>
    </div>
    <?php
/********************************************************************
* Genera url para la creación de un evento en google calendar.      *
*********************************************************************/function getGCalendarUrl($event){
$titulo = urlencode($event['titulo']);
$descripcion = urlencode($event['descripcion']);
$localizacion = urlencode($event['localizacion']);
$start=new DateTime($event['fecha_inicio'].' '.$event['hora_inicio'].' '.date_default_timezone_get());
$end=new DateTime($event['fecha_fin'].' '.$event['hora_fin'].' '.date_default_timezone_get()); $dates = urlencode($start->format("Ymd\THis")) . "/" . urlencode($end->format("Ymd\THis"));
$name = urlencode($event['nombre']);
$url = urlencode($event['url']);
$gCalUrl = "http://www.google.com/calendar/event?action=TEMPLATE&amp;text=$titulo&amp;dates=$dates&amp;details=$descripcion&amp;location=$localizacion&amp;trp=false&amp;sprop=$url&amp;sprop=name:$name";
return ($gCalUrl);
}
// array asociativo con los parametros mecesarios.
$evento = array(
  'titulo' => 'Cita Médica',
  'descripcion' => 'Tienes una cita agendada por parte de MediCom, ingresa a la página para más información',
  'localizacion' => 'Aqui ponemos la dirección donde se celebra el evento',
  'fecha_inicio' => '2014-04-10', // Fecha de inicio de evento en formato AAAA-MM-DD
'hora_inicio'=>'17:30', // Hora Inicio del evento
'fecha_fin'=>'2014-04-12', // Fecha de fin de evento en formato AAAA-MM-DD
'hora_fin'=>'19:00', // Hora final del evento
'nombre'=>'ReviBlog', // Nombre del sitio
'url'=>'www.reviblog.net' // Url de la página
);
?>
<a href="<?php echo getGCalendarUrl($evento); ?>"><img src="http://www.google.com/calendar/images/ext/gc_button6_es.gif" border="0"></a>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

    <script src="./app.js"></script>
  </body>
</html>