<?
   include ("conexion.php");
	
	if (strcmp($alergias, "No")==0) {
		$Alergia="Ninguna";

	}
	else{
		$Alergia=$_POST['alergia'];
	}
	$tabla1="login";
	$tabla2="paciente";
	$Pass=$_POST['contrasena'];
	$Pass1=$_POST['contrasena1'];
	if (strcmp($Pass,$Pass1)==0) {
		echo"<script>
    alert('Las contraseñas  coinciden');
    </script>";
    $queryInsert1 = "INSERT INTO $tabla1 (id_Paciente, contrasena) VALUES ('".$_POST['USER']."', '".$_POST['contrasena']."');";
 
         $resultInsert = mysqli_query($link, $queryInsert1); 
 
         if($resultInsert)
         {
            echo "<strong>Se ingresaron los registros con exito</strong>. <br>";
         }
         else
         {
            echo "No se ingresaron los registros. <br>";
         }
   	$queryInsert2="INSERT INTO $tabla2 (id_Paciente,Nombre_Paciente,Apellido_P,Apellido_M,direccion,CP,sexo,CURP,NSS,edo_civil,Peso,Estatura,Alergias,Tel_Paciente,correo,Fecha_Nac) values ('".$_POST['USER']."','".$_POST['Nombre']."','".$_POST['Apellido_P']."','".$_POST['Apellido_M']."','".$_POST['Calle'].",".$_POST['Num'].",".$_POST['Col'].",".$_POST['Del']."','".$_POST['Cp']."','".$_POST['sexo']."','".$_POST['CURP']."','".$_POST['NSS']."','".$_POST['edoCivil']."','".$_POST['Peso']."','".$_POST['Talla']."','".$_POST['alergias']."','".$_POST['Tel']."','".$_POST['email']."','".$_POST['anio']."-".$_POST['mes']."-".$_POST['dia']."');";
   	 $resultInsert2 = mysqli_query($link, $queryInsert2); 
 
         if($resultInsert2)
         {
            echo "<strong>Se ingresaron los registros con exito</strong>. <br>";
         }
         else
         {
            echo "No se ingresaron los registros. <br>";
         }

	}else{
		echo"<script>
    alert('Las contraseñas no coinciden');
    </script>";
    }
?>