<?php
    include("conexion.php");
    
    $id = $_COOKIE["userid"];
?>

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
    <script type="text/javascript" src="https://addevent.com/libs/atc/1.6.1/atc.min.js" async defer></script> <!--calendario-->
    <meta name="theme-color" content="#20b2aa">
		<style>
			p{
				text-align: justify;
			}
			th{
				text-align: center;
			}
			#botonBuscar{
  background-color: #5564eb;
  color: white;
  border-color: #5564eb;
  border-radius: 10px;
}
#botonLimpiar{
  background-color: #5564eb;
  color: white;
  border-color: #5564eb;
  border-radius: 10px;
}
		</style>
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
              <a href="recetas.php">Recetas</a>
	          </li>
	          <li>
              <a href="historialclinico.php">Historial cl&iacute;nico</a>
	          </li>
              <li>
              <a href="buscadoctor.php">Busca tu doctor</a>
	          </li>
              <li>
              <a href="agenda.php">Agenda</a>
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
        <p>En MediCom nos preocupamos por que asistas a tus citas, asi que aqu?? te mostraremos una agenda y la posibilidad de agregarlo a tu calendario de google.</p>
        <p></p>
        <table id="calendar" align="center">
  <caption></caption>
  <thead>
    <tr>
      <th>Lun</th><th>Mar</th><th>Mie</th><th>Jue</th><th>Vie</th><th>Sab</th><th>Dom</th>
    </tr>
  </thead>
  <tbody>
  </tbody>
  </table><br>
        <center>
        <div title="Add to Calendar" class="addeventatc">
    Agregar a calendario
    <span class="start">07/03/2021 08:00 AM</span>
    <span class="end">07/03/2021 10:00 AM</span>
    <span class="timezone">America/Los_Angeles</span>
    <span class="title">Cita M??dica</span>
    <span class="description">Tienes una cita m??dica en (NombreLugar) con el doctor (NombreDoctor)</span>
    <span class="location">Location of the event</span>
				</div>
			</center>
        <br><br>
        <table border="1">
            <thead>
                <th>ID Paciente</th>
                <th>Nombre Paciente</th>
                <th>Cl??nica</th>
                <th>Doctor designado</th>
                <th>Especialidad del doctor designado</th>
                <th>Fecha</th>
                <th>Hora</th>
            </thead>
            <?php
            //Consultar citas
                $consulta2 = "SELECT * FROM cita WHERE id_Paciente='$id'";  
                $result2 = mysqli_query($conn, $consulta2);
                    
                while($mostrar=mysqli_fetch_array($result2)){
                    $name = $mostrar['Nombre_Paciente'];
                    $ap = $mostrar['Apellido_P'];
                    $am = $mostrar['Apellido_M'];
                    $nombrePac = $name." ".$ap." ".$am;
            ?>
            <tr>
                <td><?php echo $mostrar['id_Paciente']?></td>
                <td><?php echo $nombrePac?></td>
                <td><?php echo $mostrar['clinica']?></td>
                <td><?php echo $mostrar['Nombre_Doctor']?></td>
                <td><?php echo $mostrar['area']?></td>
                <td><?php echo $mostrar['fecha']?></td>
                <td><?php echo $mostrar['hora']?></td>
            </tr>
            <?php
                }
            ?>
        </table>
      </div>
		</div>
  <script type="text/javascript" src="https://addevent.com/libs/atc/1.6.1/atc.min.js" async defer></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

    <script src="./app.js"></script>
  </body>
</html>
<script>
var actual=new Date();
function mostrarCalendario(year,month)
{
  var now=new Date(year,month-1,1);
  var last=new Date(year,month,0);
  var primerDiaSemana=(now.getDay()==0)?7:now.getDay();
  var ultimoDiaMes=last.getDate();
  var dia=0;
  var resultado="<tr bgcolor='silver'>";
  var diaActual=0;
  console.log(ultimoDiaMes);
 
  var last_cell=primerDiaSemana+ultimoDiaMes;
 
  // hacemos un bucle hasta 42, que es el m??ximo de valores que puede
  // haber... 6 columnas de 7 dias
  for(var i=1;i<=42;i++)
  {
    if(i==primerDiaSemana)
    {
      // determinamos en que dia empieza
      dia=1;
    }
    if(i<primerDiaSemana || i>=last_cell)
    {
      // celda vacia
      resultado+="<td>&nbsp;</td>";
    }else{
      // mostramos el dia
      if(dia==actual.getDate() && month==actual.getMonth()+1 && year==actual.getFullYear())
        resultado+="<td class='hoy'>"+dia+"</td>";
      else
        resultado+="<td>"+dia+"</td>";
      dia++;
    }
    if(i%7==0)
    {
      if(dia>ultimoDiaMes)
        break;
      resultado+="</tr><tr>\n";
    }
  }
  resultado+="</tr>";
 
  var meses=Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
 
  // Calculamos el siguiente mes y a??o
  nextMonth=month+1;
  nextYear=year;
  if(month+1>12)
  {
    nextMonth=1;
    nextYear=year+1;
  }
 
  // Calculamos el anterior mes y a??o
  prevMonth=month-1;
  prevYear=year;
  if(month-1<1)
  {
    prevMonth=12;
    prevYear=year-1;
  }
 
  document.getElementById("calendar").getElementsByTagName("caption")[0].innerHTML="<div>"+meses[month-1]+" / "+year+"</div><div><a onclick='mostrarCalendario("+prevYear+","+prevMonth+")'>&lt;</a> <a onclick='mostrarCalendario("+nextYear+","+nextMonth+")'>&gt;</a></div>";
  document.getElementById("calendar").getElementsByTagName("tbody")[0].innerHTML=resultado;
}
 
mostrarCalendario(actual.getFullYear(),actual.getMonth()+1);
</script>