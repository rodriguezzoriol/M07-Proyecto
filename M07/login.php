<!-- PHP -->

<?php
session_start();

// Comprueba si el usuario ha enviado el formulario.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// Recupera el nombre de usuario y la contraseña del formulario.
	$username = $_POST['username'];
	$password = $_POST['password'];

	// Verifica si el nombre de usuario y la contraseña son correctos.
	if ($username == 'oriol' && $password == '123') {
		// Inicia sesión y redirige al usuario a la página de inicio.
		$_SESSION['loggedin'] = true;
		$_SESSION['username'] = $username;
		header('Location: index.php');
		exit;
	} else {
		// Muestra un mensaje de error si el nombre de usuario o la contraseña son incorrectos
		$error = 'Nombre de usuario o contraseña incorrectos';
	}
    
}
?>

<!-- HTML -->

<!DOCTYPE html>

<html>

    <head>
        <title>Login</title>
        <link rel="stylesheet" href="proyecto.css">
    </head>

<body>

	<h2>Login</h2>

	<?php if (isset($error)): ?>
		<p><?php echo $error; ?></p>
	<?php endif; ?>

	<form method="post" action="login.php">
		<label for="username">Nombre de usuario:</label>
		<input type="text" id="username" name="username"><br><br>
		<label for="password">Contraseña:</label>
		<input type="password" id="password" name="password"><br><br>
		<input type="submit" value="Login">
	</form>

</body>
</html>