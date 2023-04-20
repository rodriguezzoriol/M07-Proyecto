<?php
session_start();

// Verifica si el usuario ha iniciado sesión.
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirige al usuario al formulario de inicio de sesión si no ha iniciado sesión.
    header('Location: proyecto.php');
    exit;
}

// Si el usuario ha iniciado sesión, muestra el contenido de la página de inicio.
?>
<!DOCTYPE html>
<html>
<head>
	<title>Página de inicio</title>
</head>
<body>
	<h1>Bienvenido, <?php echo $_SESSION['username']; ?>!</h1>
	<p>Esta es la página de inicio de la aplicación.</p>
	<p><a href="logout.php">Cerrar sesión</a></p>
</body>
</html>