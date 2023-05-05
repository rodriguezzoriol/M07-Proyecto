<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Base de datos_m7";

// Conexión a la base de datos
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Comprobar si la conexión fue exitosa
if (!$conn) {
  die("Conexión fallida: " . mysqli_connect_error());
}
?>

<?php
if(isset($_POST['registro'])) {
  // Recoger los datos del formulario
  $nombre = $_POST['nombre'];
  $correo = $_POST['correo'];
  $contraseña = $_POST['contraseña'];

  $sql2 = "SELECT MAX(id_usuario) as ultimo_id FROM Usuarios";

  $result = $conn->query($sql2);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    $ultimo_id = $row['ultimo_id'];

    echo"<script>alert('Completado con éxito');</script>";

  }
  else{
    echo "NO ha dejado registrar el usuario correctamente, revise sus datos.";
  }

  $ultimo_id_string = strval($ultimo_id+1);

  // Insertar los datos en la base de datos
  $sql = "INSERT INTO Usuarios (id_usuario, Contraseña, Correo, Apellidos, Nombre, Edad, Altura) VALUES ($ultimo_id_string, '$contraseña', '$correo', '', '$nombre', 12, 1.70)";

  if (mysqli_query($conn, $sql)) {
    echo "Registro exitoso";
  } 
  else {
    echo "Error al registrar: " . mysqli_error($conn);
  }
}
mysqli_close($conn);
?>
