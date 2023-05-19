<?php
// Realiza la conexión a la base de datos (asumiendo que ya tienes un archivo de configuración)
require_once('config.php');

// Verifica si se enviaron los datos del formulario mediante el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtén los datos del formulario
    $id_usuario = $_POST['id_usuario'];
    $contrasena = $_POST['contrasena'];
    $correo = $_POST['correo'];
    $apellidos = $_POST['apellidos'];
    $nombre = $_POST['nombre'];
    $altura = $_POST['altura'];

    // Realiza la actualización del usuario en la base de datos
    $sql = "UPDATE Usuarios SET Contraseña = '$contrasena', Correo = '$correo', Apellidos = '$apellidos', Nombre = '$nombre', Altura = '$altura' WHERE id_usuario = $id_usuario";
    if ($conn->query($sql) === TRUE) {
        // Redirige al usuario a la página "index2.php" si la actualización fue exitosa
        header("Location: index2.php");
        exit;
    } else {
        // Si ocurre un error en la consulta, muestra un mensaje de error
        echo "Error al actualizar el usuario: " . $conn->error;
    }
}

// Obtén el ID del usuario de la URL
$id_usuario = $_GET['id'];

// Prepara la consulta para obtener los detalles del usuario
$sql = "SELECT id_usuario, Contraseña, Correo, Apellidos, Nombre, Altura FROM Usuarios WHERE id_usuario = $id_usuario";
$result = $conn->query($sql);

// Verificar si se obtuvieron resultados
if ($result->num_rows > 0) {
    // Obtener los datos del usuario
    $row = $result->fetch_assoc();
    
    // Mostrar el formulario de edición con los datos recuperados
    echo "<form action='" . $_SERVER["PHP_SELF"] . "' method='POST'>";
    echo "<input type='hidden' name='id_usuario' value='" . $row["id_usuario"] . "'>";
    echo "Contraseña: <input type='text' name='contrasena' value='" . $row["Contraseña"] . "'><br>";
    echo "Correo: <input type='text' name='correo' value='" . $row["Correo"] . "'><br>";
    echo "Apellidos: <input type='text' name='apellidos' value='" . $row["Apellidos"] . "'><br>";
    echo "Nombre: <input type='text' name='nombre' value='" . $row["Nombre"] . "'><br>";
    echo "Altura: <input type='text' name='altura' value='" . $row["Altura"] . "'><br>";
    echo "<input type='submit' value='Guardar cambios'>";
    echo "</form>";
} else {
    echo "No se encontraron resultados.";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
