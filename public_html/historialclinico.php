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

      <h2 class="mb-4">Historial Clínico</h2>
        <p>Aquí podrás realizar el seguimiento de tus datos más importantes durante el uso de MediCom, nos aseguramos que solo esta información la tengan personal estrictamente autorizado.</p>
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
                //Consultar expediente
                $consulta = "SELECT * FROM expediente WHERE id_Paciente='$id'";  
                $result = mysqli_query($conn, $consulta);
                    
                while($mostrar=mysqli_fetch_array($result)){
                    $consulta2 = "SELECT * FROM paciente WHERE id_Paciente='$id'";
                    $result2 = mysqli_query($conn,$consulta2);
                    $row = mysqli_fetch_assoc($result2);
                    
                    $direcPac = $row['direccion'];
                    $alergiaPac = $row['Alergias'];
                    
                    $consulta3 = "SELECT * FROM cita WHERE id_Paciente='$id'";
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
                <td><?php echo $doctoresPac ?></td>
                <td><?php echo $mostrar['observaciones']?></td>
            </tr>
            <?php
                }
            ?>
        </table>
      </div>
		</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
	<script src="./app.js"></script>

  </body>
</html>