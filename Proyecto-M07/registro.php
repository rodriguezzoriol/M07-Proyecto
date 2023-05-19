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

<?php
if(isset($_POST['registro'])) {
  // Recoger los datos del formulario
  $nombre = $_POST['nombre'];
  $correo = $_POST['correo'];
  $contraseña = $_POST['contraseña'];

  $sql2 = "SELECT MAX(id_usuario) as ultimo_id FROM usuarios";

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
  $sql = "INSERT INTO usuarios (id_usuario, Contraseña, Correo, Nombre, Apellidos, Altura) VALUES ($ultimo_id_string, '$contraseña', '$correo', '$nombre', 1,70)";

  if (mysqli_query($conn, $sql)) {
    echo '<div class="container">
        <p class="registro-exitoso">Registro exitoso</p>
      </div>';
  } 
  else {
    echo "Error al registrar: " . mysqli_error($conn);
  }
}
mysqli_close($conn);
?>

<!-- HTML -->

<!DOCTYPE html>

<html>

<head>

	<title>Página de inicio</title>

	<link rel="icon" type="image/x-icon" href="Imagenes/Logo.png"> <!-- FAVICON --> 

	<style>

/* Estilos generales */

body {
font-family: Arial, sans-serif;
background-color: #f9f9f9;
}

/* Estilos del botón de cerrar sesión */
.btn_cerrar_sesion {
  justify-content: flex-end;
  padding: 10px;
}

.btn_cerrar_sesion p {
  margin-left: 890px;
  margin-top: -20px;
}

.btn_cerrar_sesion a {
  color: #fff;
  background-color: #007bff;
  padding: 10px 20px;
  text-decoration: none;
  border-radius: 4px;
  transition: background-color 0.3s ease;
}

.btn_cerrar_sesion a:hover {
  background-color: #0056b3;
}

.container {
  margin-top: 100px;
  height: 100px;
}

.registro-exitoso {
  color: green;
  font-weight: bold;
  font-size: 24px;
  text-align: center;
  font-size: 40px;
}


@media screen and (max-width: 768px) {
/* Estilos para dispositivos móviles */
.rutina, .calendario {
flex-direction: column;
align-items: flex-start;
}

}

	</style>

</head>

<body>

	

  <div class="btn_cerrar_sesion">
	<p><a href="login.php">VOLVER</a></p>
  </div>

</body>
</html>