<?php
   include ("conexion.php");

   
   $alergias=$_POST['alergias'];
   
   
   $tabla2="login";
   $tabla1="paciente";
   $Pass=$_POST['contrasena'];
   $Pass1=$_POST['contrasena1'];
   if (strcmp($Pass,$Pass1)==0) {
      echo"<script>
    alert('Las contraseñas  coinciden');
    </script>";
    if($_POST)
      {
         $queryInsert1 = "INSERT INTO $tabla2 (id_Paciente, contrasena) VALUES ('".$_POST['USER']."', '".$_POST['contrasena']."');";
 
         $resultInsert1 = mysqli_query($conn, $queryInsert1); 
 
         if($resultInsert1)
         {
            echo "<strong>Se ingresaron los registros con exito login</strong>. <br>";
         }
         else
         {
            echo "No se ingresaron los registros.log <br>";
         }
 
      }
      
      if (strcmp($alergias, "No")==0) {
       if($_POST)
      {
         $queryInsert = "INSERT INTO $tabla1 (id_Paciente,Nombre_Paciente,Apellido_P,Apellido_M,direccion,CP,sexo,CURP,NSS,edo_civil,Peso,Estatura,Alergias,Tel_Paciente,correo,Fecha_Nac) VALUES ('".$_POST['USER']."','".$_POST['Nombre']."','".$_POST['Apellido_P']."','".$_POST['Apellido_M']."','".$_POST['Calle'].",".$_POST['Num'].",".$_POST['Col'].",".$_POST['Del']."','".$_POST['Cp']."','".$_POST['sexo']."','".$_POST['CURP']."','".$_POST['NSS']."','".$_POST['edoCivil']."','".$_POST['Peso']."','".$_POST['Talla']."','".$_POST['alergias']."','".$_POST['Tel']."','".$_POST['email']."','".$_POST['anio']."-".$_POST['mes']."-".$_POST['dia']."');";
 
         $resultInsert = mysqli_query($conn, $queryInsert); 
 
         if($resultInsert)
         {
            echo "<strong>Se ingresaron los registros con exito paciente</strong>. <br>";
         }
         else
         {
            echo "No se ingresaron los registros.pac <br>";
         }
 
      }

   }
   else{
       if($_POST)
      {
         $queryInsert = "INSERT INTO $tabla1 (id_Paciente,Nombre_Paciente,Apellido_P,Apellido_M,direccion,CP,sexo,CURP,NSS,edo_civil,Peso,Estatura,Alergias,Tel_Paciente,correo,Fecha_Nac) VALUES ('".$_POST['USER']."','".$_POST['Nombre']."','".$_POST['Apellido_P']."','".$_POST['Apellido_M']."','".$_POST['Calle'].",".$_POST['Num'].",".$_POST['Col'].",".$_POST['Del']."','".$_POST['Cp']."','".$_POST['sexo']."','".$_POST['CURP']."','".$_POST['NSS']."','".$_POST['edoCivil']."','".$_POST['Peso']."','".$_POST['Talla']."','".$_POST['alergia']."','".$_POST['Tel']."','".$_POST['email']."','".$_POST['anio']."-".$_POST['mes']."-".$_POST['dia']."');";
 
         $resultInsert = mysqli_query($conn, $queryInsert); 
 
         if($resultInsert)
         {
            echo "<strong>Se ingresaron los registros con exito paciente</strong>. <br>";
         }
         else
         {
            echo "No se ingresaron los registros.pac <br>";
         }
 
      }
   }
      
      
     
   }else{
      echo"<script>
    alert('Las contraseñas no coinciden');
    </script>";
    }
   
          
mysqli_close($conn);
?>