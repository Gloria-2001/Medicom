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

        <h2 class="mb-4">Recetas</h2>
        <p>En este espacio podrás consultar las recetas, las instrucciones y las recomendaciones de tus médicos que debes seguir para poder mejorar en tu salud.</p>
		<table border="1">
			<thead>
				<th>Fecha</th>
				<th>Medicamentos</th>
				<th>Instrucciones</th>
				<th>Médico tratante</th>
			</thead>
			<?php
                //Consultar receta
                $consulta = "SELECT * FROM receta_medica WHERE id_Paciente='$id'";  
                $result = mysqli_query($conn, $consulta);
                    
                while($mostrar=mysqli_fetch_array($result)){
                    $idDoctor = $mostrar['id_Doctor'];
                    $consulta2 = "SELECT * FROM doctor WHERE id_Doctor='$idDoctor'";
                    $result2 = mysqli_query($conn,$consulta2);
                    $row = mysqli_fetch_assoc($result2);
                    
                    $name = $row['Nombre_Doctor'];
                    $ap = $row['Apellido_P'];
                    $am = $row['Apellido_M'];
                    $nombreDoc = $name." ".$ap." ".$am;
			?>
			<tr>
			    <td><?php echo $mostrar['Fecha_Exp']?></td>
			    <td><?php echo $mostrar['Medicamentos']?></td>
			    <td><?php echo $mostrar['indicaciones']?></td>
			    <td><?php echo $nombreDoc?></td>
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