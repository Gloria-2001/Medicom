<?php

	include("conexion.php");

	if (isset($_POST['Registro'])) {
    if (is_array($_POST['especialidades'])) {
        $selected = '';
        $num_countries = count($_POST['especialidades']);
        $current = 0;
        foreach ($_POST['especialidades'] as $key => $value) {
            if ($current != $num_countries-1)
                $selected .= $value.', ';
            else
                $selected .= $value.'.';
            $current++;
        }
    }
    else {
    	echo '<script>
    	alert("Debes seleccionar una especialidad");
    	window.location="../forms/doctor.html";
    	</script>';
        $selected = '';
    }

    
}    
	 $tabla2="logidoc";
   $tabla1="doctor";
   $Pass=$_POST['contrasena'];
   $Pass1=$_POST['contrasena1'];
   if (strcmp($Pass,$Pass1)==0 && ($selected!='')) {
      echo"<script>
    alert('Las contraseñas  coinciden');
    </script>";
    if($_POST)
      {
         $queryInsert1 = "INSERT INTO $tabla2 (id_Doctor, contrasena) VALUES ('".$_POST['User']."', '".$_POST['contrasena']."');";
 
         $resultInsert1 = mysqli_query($conn, $queryInsert1); 
 
         if($resultInsert1)
         {
            echo '<script>
            alert("Se registró con exito usuario y contraseña");
            </script>';
         }
         else
         {
            echo '<script>
            alert("No se registro");
            window.location="../forms/doctor.html";
            </script>';
         }
 
      }
        if($_POST)
      {	
         $queryInsert = "INSERT INTO $tabla1 (id_Doctor,Nombre_Doctor,Apellido_P,Apellido_M,direccion,CP,sexo,CURP,edo_civil,Fecha_Nac,Cedula_prof,Especialidad,Clinica,Tel_Doctor,correo) VALUES ('".$_POST['User']."','".$_POST['Nombre']."','".$_POST['Apellido_PD']."','".$_POST['Apellido_MD']."','".$_POST['Calle'].",".$_POST['Num'].",".$_POST['Col'].",".$_POST['Del']."','".$_POST['Cp']."','".$_POST['sexo']."','".$_POST['CURP']."','".$_POST['edo_Civil']."','".$_POST['anio']."-".$_POST['mes']."-".$_POST['dia'].",','".$_POST['Ced_Prof']."','".$selected."','".$_POST['Clinica']."','".$_POST['Tel']."','".$_POST['Email']."');";
 
         $resultInsert = mysqli_query($conn, $queryInsert); 
 
         if($resultInsert)
         {
            echo '<script>
            alert("Se registró con exito datos del doctor");
            window.location="sesiondoctor.html";
            </script>';
         }
         else
         {
            echo '<script>
            alert("No se resgistro");
            window.location="../forms/doctor.html";
            </script>';
         }
      }
  }else{
      echo'<script>
    alert("Las contraseñas no coinciden");
    window.location="../forms/doctor.html";
    </script>';
    }
   
          
mysqli_close($conn);



?>