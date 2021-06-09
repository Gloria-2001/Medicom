<?php
$hostname="localhost";
$database="id16940318_medicom";
$username="id16940318_medicom123";
$password="z1$RLFCg@aqf}U<h";
$json=array();
	if(isset($_GET["USER"]) && isset($_GET["contrasena"])){
		$USER=$_GET['USER'];
		$contrasena=$_GET['contrasena'];

		$conexion=mysqli_connect($hostname,$username,$password,$database);

		$consulta="INSERT INTO login(id_Paciente,contrasena) VALUES ('{$USER}','{$contrasena}')";
		$resultado=mysqli_query($conexion,$consulta);

		if($consulta){

			$consulta="SELECT * FROM login WHERE id_Paciente='{$USER}'";
		   	$resultado=mysqli_query($conexion,$consulta);

			if($reg=mysqli_fetch_array($resultado)){
				$json['datos'][]=$reg;
			}
			mysqli_close($conexion);
			echo json_encode($json);
		}

		else{
         $results["USER"]='';
			$results["contrasena"]='';
			$json['datos'][]=$results;
			echo json_encode($json);
		}
	}

	else{
         $results["USER"]='';
         $results["contrasena"]='';
			$json['datos'][]=$results;
			echo json_encode($json);
		}
?>