<?php
	include("conexion.php");
	$nombreDoc=$_POST['doctor'];
	$apD=$_POST['doctor_firstname'];
	$amD=$_POST['doctor_lastname'];
	$nombrePac=$_POST['paciente'];
	$apP=$_POST['paciente_firstname'];
	$amP=$_POST['paciente_lastname'];
	$tabla="receta_medica";
	if($_POST){
	$Consulta="SELECT * FROM doctor WHERE Nombre_Doctor='$nombreDoc' AND Apellido_P='$apD' AND Apellido_M='$amD'";
	$resul=mysqli_query($conn,$Consulta);
	$row=mysqli_fetch_assoc($resul);
	$idDoc=$row['id_Doctor'];
	$Consulta2="SELECT * FROM paciente WHERE Nombre_Paciente='$nombrePac' AND Apellido_P='$apP' AND Apellido_M='$amP'";
	$resul2=mysqli_query($conn,$Consulta2);
	$row2=mysqli_fetch_assoc($resul2);
	$idPac=$row2['id_Paciente'];
}
	if($_POST){
		$queryInsert="INSERT INTO receta (id_Paciente,id_Doctor,Nombre_Paciente,Apellido_Pp,Apellido_Mp,Nombre_Doctor,Apellido_Dp,Apellido_Dm,Cedula,Edad,Talla,Peso,Fecha_Exp,indicaciones,Alergias) VALUES ('".$idPac."','".$idDoc."','".$_POST['paciente']."','".$_POST['paciente_firstname']."','".$_POST['paciente_lastname']."','".$_POST['doctor']."','".$_POST['doctor_firstname']."','".$_POST['doctor_lastname']."','".$_POST['cedula']."','".$_POST['edad']."','".$_POST['talla']."','".$_POST['peso']."','".$_POST['fecha']."','".$_POST['medicinas']."','".$_POST['alergias']."');";

		$resultInsert = mysqli_query($conn, $queryInsert); 

		if($resultInsert)
         {
            echo '<script>
            alert("Se registró con exito su receta");
            </script>';
            
         }
         else
         {
            echo '<script>
            alert("No se registro receta");
            window.location="./generarRecetas.html";
            </script>';
         }
	}
?>