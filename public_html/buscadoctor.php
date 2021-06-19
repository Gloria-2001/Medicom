<?php
    include("conexion.php");
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

        <h2 class="mb-4">Busca tu doctor</h2>
        <p>Aquí podrás localizar a tu médico de preferencia.Tienes 3 opciones:</p>
        <ol>
			<li><a href="#nombre">Por su nombre</a></li>
			<li><a href="#especialidad">Por especialidad</a></li>
			<li><a href="#clinica">Por la clínica donde labora</a></li>
		</ol>
		<section id="nombre">
			<h3>Nombre</h3>
			<p>Ingresa el nombre de tu médico</p>
			<form action="buscadoctor.php" method="POST">
			    <input type="search" name="nombreDoc" id="buscaNombre">
			    <input type="submit" value="Buscar">
			</form>
			<br><br>
			<table border="1">
				<thead>
					<th>Nombre Doctor</th>
					<th>Especialidad</th>
					<th>Clínica</th>
				</thead>
				<?php
				    //Obtener datos del form
                    $nombreDoc = $_POST['nombreDoc'];
                    //Consultar por nombre de doctor
                    $consulta = "SELECT * FROM doctor WHERE Nombre_Doctor LIKE '%$nombreDoc%'";  
                    $result = mysqli_query($conn, $consulta);
                    
                    if(!empty($nombreDoc)){
                        while($mostrar=mysqli_fetch_array($result)){
                            $name = $mostrar['Nombre_Doctor'];
                            $ap = $mostrar['Apellido_P'];
                            $am = $mostrar['Apellido_M'];
                            $nombre = $name." ".$ap." ".$am; 
				?>
				<tr>
				    <td><?php echo $nombre ?></td>
				    <td><?php echo $mostrar['Especialidad'] ?></td>
				    <td><?php echo $mostrar['Clinica'] ?></td>
				</tr>
				<?php
                        }
                    }
				?>
			</table>
		</section>
		<br><br>
		<hr>
		<br><br>
		<section id="especialidad">
			<h3>Especialidad</h3>
			<p>Ingresa la especialidad que estás buscando</p>
			<form action="buscadoctor.php" method="POST">
			    <input type="search" name="especialidadDoc" id="buscaEspecialidad">
			    <input type="submit" value="Buscar">
			</form>
			<br><br>
			<table border="1">
				<thead>
					<th>Especialidad</th>
					<th>Nombre Doctor</th>
					<th>Clínica</th>
				</thead>
				<?php
				    //Obtener datos del form
                    $especialidad = $_POST['especialidadDoc'];
                    //Consultar por especialidad
                    $consulta = "SELECT * FROM doctor WHERE Especialidad LIKE '%$especialidad%'";  
                    $result = mysqli_query($conn, $consulta);
                    
                    if(!empty($especialidad)){
                        while($mostrar=mysqli_fetch_array($result)){
                            $name = $mostrar['Nombre_Doctor'];
                            $ap = $mostrar['Apellido_P'];
                            $am = $mostrar['Apellido_M'];
                            $nombre = $name." ".$ap." ".$am; 
				?>
				<tr>
				    <td><?php echo $mostrar['Especialidad'] ?></td>
				    <td><?php echo $nombre ?></td>
				    <td><?php echo $mostrar['Clinica'] ?></td>
				</tr>
				<?php
                        }
                    }
				?>
			</table>
		</section>
		<br><br>
		<hr>
		<br><br>
		<section id="clinica">
			<h3>Clínica</h3>
			<p>Ingresa la clínica que requieres</p>
			<form action="buscadoctor.php" method="POST">
			    <input type="search" name="clinicaDoc" id="buscaClinica">
			    <input type="submit" value="Buscar">
			</form>
			<br><br>
			<table border="1">
				<thead>
					<th>Clínica</th>
					<th>Nombre Doctor</th>
					<th>Especialidad</th>
				</thead>
				<?php
				    //Obtener datos del form
                    $clinica = $_POST['clinicaDoc'];
                    //Consultar por clinica
                    $consulta = "SELECT * FROM doctor WHERE Clinica LIKE '%$clinica%'";  
                    $result = mysqli_query($conn, $consulta);
                    
                    if(!empty($clinica)){
                        while($mostrar=mysqli_fetch_array($result)){
                            $name = $mostrar['Nombre_Doctor'];
                            $ap = $mostrar['Apellido_P'];
                            $am = $mostrar['Apellido_M'];
                            $nombre = $name." ".$ap." ".$am; 
				?>
				<tr>
				    <td><?php echo $mostrar['Clinica'] ?></td>
				    <td><?php echo $nombre ?></td>
				    <td><?php echo $mostrar['Especialidad'] ?></td>
				</tr>
				<?php
                        }
                    }
				?>
			</table>
		</section>
      </div>
		</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>


    
    <script src="./app.js"></script>
  </body>
</html>