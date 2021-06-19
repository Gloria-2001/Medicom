<?php
	include("conexion.php");

	$tabla="horario";

	$status=$_POST['estatus'];
	$userForm=$_POST['User'];
	$Consulta="SELECT * FROM doctor WHERE id_Doctor='$userForm'";
	$resul=mysqli_query($conn,$Consulta);
	$row=mysqli_fetch_assoc($resul);

	$doc=$row['id_Doctor'];

	if (strcmp($status,"Disponible")==0) {
		$status="Disponible";
		
	}else{
		$status="No Disponible";
	}
	if(isset($_POST['estatus'])){
		if(strcmp($userForm,$doc)==0){
			echo"<script>
			alert('El doctor si esta registrado');
			window.location='Horario.html';
			 </script>";
		if($_POST)
      {
         $queryInsert1 = "INSERT INTO $tabla (id_Doctor, fechainhabil,estatus) VALUES ('".$_POST['User']."', '".$_POST['anio']."-".$_POST['mes']."-".$_POST['dia']."','".$status."');";
 
         $resultInsert1 = mysqli_query($conn, $queryInsert1); 
 
         if($resultInsert1)
         {
            echo '<script>
            alert("Se registró con exito su Horario");
            window.location="./Horario.html";
            </script>';
         }
         else
         {
            echo '<script>
            alert("No se registro");
            window.location="./Horario.html";
            </script>';
         }
 
      }
  }
  else{
  	echo '<script>
            alert("Doctor no registrado");
            window.location="./Horario.html";
            </script>';
  }
  }

  if(isset($_POST['Modificar'])){
  	if(strcmp($userForm,$doc)==0){
			echo"<script>
			alert('El doctor si esta registrado');
			window.location='Horario.html';
			 </script>";

			 if($_POST){
			 	$queryAlter="UPDATE $tabla set estatus='$status' where id_Doctor='$userForm'";

         $resultAlter1 = mysqli_query($conn, $queryAlter); 
 
         if($resultAlter1)
         {
            echo '<script>
            alert("Se Actualizo con éxito el estatus de tu horario");
            window.location="./Horario.html";
            </script>';
         }
         else
         {
            echo '<script>
            alert("No se registro");
            window.location="./Horario.html";
            </script>';
         }
			 }
			}
			else{
  	echo '<script>
            alert("Doctor no registrado");
            window.location="./Horario.html";
            </script>';
  }
  }

?>