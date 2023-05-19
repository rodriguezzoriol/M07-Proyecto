<?php
// Realiza la conexión a la base de datos (asumiendo que ya tienes un archivo de configuración)
require_once('config.php');

// Verifica si se enviaron los datos del formulario mediante el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtén los datos del formulario
    $id = $_POST['id'];
    $title = $_POST['title'];
    $descripcion = $_POST['descripcion'];
    $color = $_POST['color'];
    $textColor = $_POST['textColor'];
    $start = $_POST['start'];
    $end = $_POST['end'];

    // Realiza la actualización del usuario en la base de datos
    $sql = "UPDATE eventos SET title = '$title', descripcion = '$descripcion', color = '$color', textColor = '$textColor', start = '$start', end = '$end' WHERE id = $id";
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
$id = $_GET['id'];

// Prepara la consulta para obtener los detalles del usuario
$sql = "SELECT id, title, descripcion, color, textColor, start, end FROM eventos WHERE id = $id";
$result = $conn->query($sql);

// Verificar si se obtuvieron resultados
if ($result->num_rows > 0) {
    // Obtener los datos del usuario
    $row = $result->fetch_assoc();
    
    // Mostrar el formulario de edición con los datos recuperados
    echo "<form action='" . $_SERVER["PHP_SELF"] . "' method='POST'>";

    echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
    echo "Title: <input type='text' name='title' value='" . $row["title"] . "'><br>";
    echo "Descripción: <input type='text' name='descripcion' value='" . $row["descripcion"] . "'><br>";
    echo "Color: <input type='text' name='color' value='" . $row["color"] . "'><br>";
    echo "textColor: <input type='text' name='textColor' value='" . $row["textColor"] . "'><br>";
    echo "start: <input type='text' name='start' value='" . $row["start"] . "'><br>";
    echo "end: <input type='text' name='end' value='" . $row["end"] . "'><br>";

    echo "<input type='submit' value='Guardar cambios'>";
    echo "</form>";
} else {
    echo "No se encontraron resultados.";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
