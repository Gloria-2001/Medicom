<?php
    include("conexion.php");
?>

<!doctype html>
<html lang="en">
  <head>
  	<title>Consulta Historial Clínico</title>
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
        <h2 class="mb-4">Consulta el Historial Clínico</h2>
        <p>Aquí podrás realizar el seguimiento de los datos más importantes de tus pacientes durante el uso de MediCom, nos aseguramos que solo esta información la tengan personal estrictamente autorizado.</p>
        <p>Ingresa el ID de tu paciente.</p>
        <form action="consultaHistorial.php" method="POST">
            <input type="search" name="historial" id="buscaHistorial">
            <input type="submit" value="Buscar" id="botonBuscar">
        </form>
        <br><br>
        <table border="1">
            <thead>
                <th>ID Paciente</th>
                <th>Nombre Paciente</th>
                <th>Dirección</th>
                <th>Alergias</th>
                <th>Doctores que le han atendido</th>
                <th>Observaciones de seguimiento</th>
            </thead>
            <?php
                //Obtener datos del form
                $idPaciente = $_POST['historial'];
                //Consultar en expediente
                $consulta = "SELECT * FROM expediente WHERE id_Paciente = '$idPaciente'";  
                $result = mysqli_query($conn, $consulta);
                    
                if(!empty($idPaciente)){
                    while($mostrar=mysqli_fetch_array($result)){
                        $consulta2 = "SELECT * FROM paciente WHERE id_Paciente='$idPaciente'";
                        $result2 = mysqli_query($conn,$consulta2);
                        $row = mysqli_fetch_assoc($result2);
                    
                        $direcPac = $row['direccion'];
                        $alergiaPac = $row['Alergias'];
                    
                        $consulta3 = "SELECT * FROM cita WHERE id_Paciente='$idPaciente'";
                        $result3 = mysqli_query($conn,$consulta3);
                    
                        $doctores = array();
                        $cont=0;
                    
                        while($row2 = mysqli_fetch_array($result3)){
                            $doctores[$cont] = $row2['Nombre_Doctor'];
                            $cont++;
                        }
                    
                        foreach($doctores as $element){
                            $doctoresPac = $doctoresPac.", ".$element;
                        }
                    
                        $doctoresPac = ltrim($doctoresPac,", ");
            ?>
            <tr>
                <td><?php echo $mostrar['id_Paciente']?></td>
                <td><?php echo $mostrar['Nombre_Paciente']?></td>
                <td><?php echo $direcPac?></td>
                <td><?php echo $alergiaPac?></td>
                <td><?php echo $doctoresPac?></td>
                <td><?php echo $mostrar['observaciones']?></td>
            </tr>
            <?php
                    }
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