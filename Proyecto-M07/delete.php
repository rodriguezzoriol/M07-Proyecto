<?php
session_start();
// Verifica si el usuario ha iniciado sesión.

// Verifica si el ID del usuario se proporciona en la URL
if (isset($_GET['id'])) {
    // Obtén el ID del usuario de la URL
    $id_usuario = $_GET['id'];

    // Realiza la conexión a la base de datos (asumiendo que ya tienes un archivo de configuración)
    require_once('config.php');

    // Prepara la consulta para eliminar el usuario
    $sql = "DELETE FROM usuarios WHERE id_usuario = $id_usuario";

    // Ejecuta la consulta
    if ($conn->query($sql) === TRUE) {
        // Redirige al usuario de vuelta a la página anterior o a otra página
        header("Location: index2.php");
        exit;
    } else {
        // Si ocurre un error en la consulta, muestra un mensaje de error
        echo "Error al eliminar el usuario: " . $conn->error;
    }

    // Cierra la conexión a la base de datos
    $conn->close();
} else {
    // Si no se proporciona el ID del usuario en la URL, redirige a alguna página de error o muestra un mensaje de error
    echo "ID de usuario no especificado";
}






?>

