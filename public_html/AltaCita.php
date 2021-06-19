<?php
	include("conexion.php");

		if (isset($_POST['Registra'])) {
    if (is_array($_POST['especialidades'])) {
        $selected = '';
        $num_esp = count($_POST['especialidades']);
        $current = 0;
        foreach ($_POST['especialidades'] as $key => $value) {
            if ($current != $num_esp-1)
                $selected .= $value.', ';
            else
                $selected .= $value.'.';
            $current++;
        }
    }
    else {
    	echo '<script>
    	alert("Debes seleccionar una especialidad");
    	window.location="./citas.html";
    	</script>';
        $selected = '';
    }
}  
	$tabla="cita";
	$nombreDoc=$_POST['NombreDoc'];
	$APDoc=$_POST['APDoc'];
	$AMDoc=$_POST['AMDoc'];
	$Consulta="SELECT * FROM doctor WHERE Nombre_Doctor='$nombreDoc' AND Apellido_P='$APDoc' AND Apellido_M='$AMDoc'";
	$resul=mysqli_query($conn,$Consulta);
	$row=mysqli_fetch_assoc($resul);
	$id=$row['id_Doctor'];
	$Consulta2="SELECT *FROM horario WHERE id_Doctor='$id'";
	$resul2=mysqli_query($conn,$Consulta2);
	$row2=mysqli_fetch_assoc($resul2);
	$fechain=$row2['fechainhabil'];
	$fechacita=$_POST['Fecha'];
	echo $fechacita;
	if(strcmp($fechacita,$fechain)==0){
		echo '<script>
    	alert("Doctor no disponible, Favor de escoger otra fecha para su cita");
    	window.location="./citas.html";
    	</script>';
	}else{
		if($_POST){
			$queryInsert="INSERT INTO cita(id_Paciente,Nombre_Paciente,Apellido_P,Apellido_M,sexo,clinica,Nombre_Doctor,area,fecha,hora) VALUES ('".$_POST['User']."','".$_POST['Nombre']."','".$_POST['Apellido_P']."','".$_POST['Apellido_M']."','".$_POST['sexo']."','".$_POST['Clinica']."','".$_POST['NombreDoc']." ".$_POST['APDoc']." ".$_POST['AMDoc']."','".$selected."','".$_POST['Fecha']."','".$_POST['Hora']."');";
			$resultInsert = mysqli_query($conn, $queryInsert); 
 
         if($resultInsert)
         {
            echo '<script>
            alert("Se registró con exito su cita");
            </script>';
         }
         else
         {
            echo '<script>
            alert("No se registro");
            window.location="./citas.html";
            </script>';
         }

		}
	}
		$Paciente=$_POST['User'];
	if($_POST){
		$Consulta3="SELECT * FROM cita WHERE id_Paciente='$Paciente'";
		$resul3=mysqli_query($conn,$Consulta3);
		$row3=mysqli_fetch_assoc($resul3);
		$FolioC=$row3['Foli_Cita'];
		$queryInsert2="INSERT INTO agenda_personal(id_Paciente,Foli_Cita) VALUES('".$_POST['User']."','".$FolioC."');";
			$resultInsert2 = mysqli_query($conn, $queryInsert2); 
 
         if($resultInsert2)
         {
            echo '<script>
            alert("Se registró con exito su cita en su agenda personal");
            window.location="./agenda.html";
            </script>';
         }
         else
         {
            echo '<script>
            alert("No se registro");
            window.location="./citas.html";
            </script>';
         }
	}

	 

?>