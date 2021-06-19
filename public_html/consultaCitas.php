<?php
    include("conexion.php");
    
    $id = $_COOKIE["docid"];
    
    //Consultar doctor
    $consulta = "SELECT * FROM doctor WHERE id_Doctor='$id'";  
    $result = mysqli_query($conn, $consulta);
    $row = mysqli_fetch_assoc($result);
    $nombreDoc = $row['Nombre_Doctor'];
?>

<!doctype html>
<html lang="en">
  <head>
  	<title>Consulta de Citas</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="sidebar-04/css/style.css">
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
	  		<h1><a href="index.html" class="logo">MediCom</a></h1>
        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="./consultaPacientes.php"><span class="fa fa-home mr-3"></span>Consulta Pacientes</a>
          </li>
          <li>
              <a href="./consultaCitas.php"><span class="fa fa-user mr-3"></span>Consulta Citas</a>
          </li>
          <li>
            <a href="./consultaHistorial.php"><span class="fa fa-sticky-note mr-3"></span>Consulta Historial Clínico</a>
          </li>
          <li>
            <a href="./Horario.html"><span class="fa fa-sticky-note mr-3"></span>Horario</a>
          </li>
          <li>
            <a href="./generarRecetas.html"><span class="fa fa-sticky-note mr-3"></span>Generar recetas</a>
          </li>
        </ul>

    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4">Consulta tus citas</h2>
        <p>Aquí podrás ver las citas que se te asignaron.</p>
        <br><br>
        <table border="1">
            <thead>
                <th>ID Paciente</th>
                <th>Nombre Paciente</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Clínica</th>
            </thead>
            <?php
                //Consultar citas
                $consulta2 = "SELECT * FROM cita WHERE Nombre_Doctor='$nombreDoc'";  
                $result2 = mysqli_query($conn, $consulta2);
                    
                while($mostrar=mysqli_fetch_array($result2)){
                    $name = $mostrar['Nombre_Paciente'];
                    $ap = $mostrar['Apellido_P'];
                    $am = $mostrar['Apellido_M'];
                    $nombrePac = $name." ".$ap." ".$am;
			?>
			<tr>
			    <td><?php echo $mostrar['id_Paciente']?></td>
			    <td><?php echo $nombrePac ?></td>
			    <td><?php echo $mostrar['fecha']?></td>
			    <td><?php echo $mostrar['hora']?></td>
			    <td><?php echo $mostrar['clinica']?></td>
			</tr>
			<?php
                }
			?>
        </table>
      </div>
		</div>

    <script src="./sidebar-04/js/jquery.min.js"></script>
    <script src="./sidebar-04/js/popper.js"></script>
    <script src="./sidebar-04/js/bootstrap.min.js"></script>
    <script src="./sidebar-04/js/main.js"></script>
    <script src="./app.js"></script>
  </body>
</html>