<?php
    include("conexion.php");
    
    //Obtener datos del form
    $userForm = $_POST['user'];
    $passForm = $_POST['password'];
    
    //Consultar en tabla login
    $consulta = "SELECT * FROM logidoc WHERE id_Doctor='$userForm'";  
    $result = mysqli_query($conn, $consulta);
    $row = mysqli_fetch_assoc($result);
    
    //Consultar en tabla pacientes
    $consulta2 = "SELECT * FROM doctor WHERE id_Doctor='$userForm'";
    $result2 = mysqli_query($conn, $consulta2);
    $row2 = mysqli_fetch_assoc($result2);

    //Datos obtenidos
    $user = $row['id_Doctor'];
    $pass = $row['contrasena'];
    $name = $row2['Nombre_Doctor'];
    $ap = $row2['Apellido_P'];
    $nombre = $name." ".$ap;
    setcookie("docid",$user);
    
    if(strcmp($userForm,$user)==0 && strcmp($passForm,$pass)==0){
        echo"<script>
        alert('Bienvenido Dr. $nombre (user: $user)');
        window.location='HomeMedico.html';
        </script>";
    }
    else{
        echo'<script>
        alert("Usuario o contrasena inválidos");
        window.location="sesiondoctor.html";
        </script>';
    }
    mysqli_close($conn);
?>