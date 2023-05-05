<?php
session_start();

// Verifica si el usuario ha iniciado sesión.
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirige al usuario al formulario de inicio de sesión si no ha iniciado sesión.
    header('Location: login.php');
    exit;

}
// Si el usuario ha iniciado sesión, muestra el contenido de la página de inicio.
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

/* Estilos para el contenedor de la rutina */
.rutina {
display: flex;
justify-content: space-between;
align-items: center;
background-color: #ffffff;
border-radius: 8px;
box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
padding: 20px;
margin-left: 200px;
margin-right: 200px;
margin-top: 50px;
margin-bottom: -20px;
transition: all 0.3s ease-in-out;
font-size: 30px;
}

.rutina ul{
  list-style: none;
  margin-left: 450px;
  margin-top: 80px;
}

.rutina ul img{
  margin-left: -150px;
  margin-top: -150px; 
}

.rutina:hover {
transform: translateY(-5px);
box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

.rutina a.rutina {
color: #333;
text-decoration: none;
font-weight: bold;
transition: all 0.3s ease-in-out;
}

.rutina a.rutina:hover {
color: #f00;
}

/* Estilos para el contenedor de la calendario */
.calendario {
display: flex;
justify-content: space-between;
align-items: center;
background-color: #ffffff;
border-radius: 8px;
box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
padding: 20px;
margin-left: 200px;
margin-right: 200px;
margin-top: 50px;
margin-bottom: -20px;
transition: all 0.3s ease-in-out;
font-size: 30px;
}

.calendario ul{
  list-style: none;
  margin-left: 450px;
  margin-top: 80px;
}

.calendario ul img{
  margin-left: -150px;
  margin-top: -150px; 
}

.calendario:hover {
transform: translateY(-5px);
box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

.calendario a.calendario {
color: #333;
text-decoration: none;
font-weight: bold;
transition: all 0.3s ease-in-out;
}

.calendario a.calendario:hover {
color: #f00;
}

/* Estilos para el enlace de cerrar sesión */
p a {
color: #333;
text-decoration: none;
font-weight: bold;
transition: all 0.3s ease-in-out;
border: 3px solid black;
padding: 10px;
margin-left: 800px;
}

.btn_cerrar_sesion{
  margin-top: 70px;
}

p a:hover {
color: #f00;
transition: all 0.3s ease-in-out;
}

/* Estilos para la imagen del logo */
img{
width: 300px;
height: 300px;
margin-left: 100px;
}

/* Estilos para el título de la página */
h1 {
font-size: 36px;
text-align: center;
margin-bottom: 30px;
text-transform: uppercase;
letter-spacing: 2px;
}

@media screen and (max-width: 768px) {
/* Estilos para dispositivos móviles */
.rutina, .calendario {
flex-direction: column;
align-items: flex-start;
}

.rutina img, .calendario img {
margin-right: 0;
margin-bottom: 10px;
}
}

	</style>

</head>

<body>

	<h1>Bienvenido, <?php echo $_SESSION['username']; ?>!</h1>

	<div class="rutina">
		<ul>
			<li><a class="rutina" href="rutina.php">RUTINA</a></li>
			<img src="Imagenes/Logo.png">
		</ul>

	</div>

	<div class="calendario">

		<ul>
			
			<li><a class="calendario" href="calendario.php">CALENDARIO</a></li>
			<img src="Imagenes/Logo.png">
		</ul>

	</div>

  <div class="btn_cerrar_sesion">
	<p><a href="login.php">CERRAR SESIÓN</a></p> <!-- HAY QUE REVISAR EL COMO HACER EL CIERRE DE SESIÓN -->
  </div>

</body>
</html>