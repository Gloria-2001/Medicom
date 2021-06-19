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
            echo'<script>
            alert("Se rgistro con exito");
            </script>';
         }
         else
         {
            echo'<script>
            alert("No se registro ");
            window.location="../forms/client.html";
            </script>';
         }
 
      }
      
      if (strcmp($alergias, "No")==0) {
       if($_POST)
      {
         $queryInsert = "INSERT INTO $tabla1 (id_Paciente,Nombre_Paciente,Apellido_P,Apellido_M,direccion,CP,sexo,CURP,NSS,edo_civil,Peso,Estatura,Alergias,Tel_Paciente,correo,Fecha_Nac) VALUES ('".$_POST['USER']."','".$_POST['Nombre']."','".$_POST['Apellido_P']."','".$_POST['Apellido_M']."','".$_POST['Calle'].",".$_POST['Num'].",".$_POST['Col'].",".$_POST['Del']."','".$_POST['Cp']."','".$_POST['sexo']."','".$_POST['CURP']."','".$_POST['NSS']."','".$_POST['edoCivil']."','".$_POST['Peso']."','".$_POST['Talla']."','".$_POST['alergias']."','".$_POST['Tel']."','".$_POST['email']."','".$_POST['anio']."-".$_POST['mes']."-".$_POST['dia']."');";
 
         $resultInsert = mysqli_query($conn, $queryInsert); 
 
         if($resultInsert)
         {
            echo'<script>
            alert("Se rgistro con exito datos del usuario y contraseña");
            </script>';
            
         }
         else
         {
            echo'<script>
            alert("No se registro ");
            window.location="../forms/client.html";
            </script>';
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
            echo'<script>
            alert("Se rgistro con exito al paciente");
            window.location="sesion.html";
            </script>';
         }
         else
         {
            echo'<script>
            alert("No se registro");
            </script>';
         }
 
      }
   }
      
      
     
   }else{
      echo'<script>
            alert("Se rgistro con exito");
            window.location="../forms/client.html";
            </script>';
    }
   
          
mysqli_close($conn);
?>