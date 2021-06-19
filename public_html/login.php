<?php
    include("conexion.php");
    
    //Obtener datos del form
    $userForm = $_POST['user'];
    $passForm = $_POST['password'];
    
    //Consultar en tabla login
    $consulta = "SELECT * FROM login WHERE id_Paciente='$userForm'";  
    $result = mysqli_query($conn, $consulta);
    $row = mysqli_fetch_assoc($result);
    
    //Consultar en tabla pacientes
    $consulta2 = "SELECT * FROM paciente WHERE id_Paciente='$userForm'";
    $result2 = mysqli_query($conn, $consulta2);
    $row2 = mysqli_fetch_assoc($result2);

    //Datos obtenidos
    $user = $row['id_Paciente'];
    $pass = $row['contrasena'];
    $name = $row2['Nombre_Paciente'];
    $ap = $row2['Apellido_P'];
    $nombre = $name." ".$ap;
    setcookie("userid",$user);
    
    if(strcmp($userForm,$user)==0 && strcmp($passForm,$pass)==0){
        echo"<script>
        alert('Bienvenido $nombre (user: $user)');
        window.location='About.html';
        </script>";
    }
    else{
        echo'<script>
        alert("Usuario o contrasena inválidos");
        window.location="sesion.html";
        </script>';
    }
    mysqli_close($conn);
?>