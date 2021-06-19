<?php
$servername = "localhost";
$database = "id16940318_medicom";
$username = "id16940318_medicomdb";
$password = "G-12e-34R-56";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
//mysqli_close($conn);
?>