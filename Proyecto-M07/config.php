<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ripperoide";

// Conexión a la base de datos
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Comprobar si la conexión fue exitosa
if (!$conn) {
  die("Conexión fallida: " . mysqli_connect_error());
}
?>
