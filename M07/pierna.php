<?php
session_start();

// Verifica si el usuario ha iniciado sesión.
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirige al usuario al formulario de inicio de sesión si no ha iniciado sesión.
    header('Location: login.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Videos</title>

  <link rel="icon" type="image/x-icon" href="Imagenes/Logo.png"> <!-- FAVICON --> 

  <style>
    /* Estilos para el cuerpo de la página */
body {
  margin: 0;
  padding: 0;
  font-family: Arial, sans-serif;
}

/* Estilos para el título de la página */
h1 {
  margin: 20px;
  text-align: center;
  font-size: 36px;
}

/* Estilos para el resumen de información de cada div */
p {
  margin-bottom: 20px;
  font-size: 1.2rem;
  text-align: center;
  margin-top: 30px;
}

/* Estilos para el enlace de cada div */
a {
  display: inline-block;
  padding: 10px 20px;
  background-color: #333333;
  color: #ffffff;
  text-decoration: none;
  border-radius: 20px;
  font-size: 1.2rem;
  transition: all 0.3s ease-in-out;
}

/* Estilos para el enlace de cada div al pasar el cursor por encima */
a:hover {
  background-color: #ffffff;
  color: #333333;
  border: 1px solid #333333;
}

.video1 {
  width: 600px;
  border-radius: 10px;
  overflow: hidden;
  box-shadow: 0px 0px 10px rgba(0,0,0,0.3);
  transition: box-shadow 0.3s ease-in-out;
  margin-top: 50px;
  margin-left: 260px;
}


/* Estilos para cada video al pasar el ratón por encima */
.video1:hover {
  box-shadow: 0px 0px 20px rgba(0,0,0,0.5);
}

/* Estilos para el título de cada video */
.video1 h2 {
  padding: 10px;
  font-size: 24px;
  text-align: center;
  background-color: rgba(0,0,0,0.8);
  color: white;
}

.video2 {
  width: 600px;
  border-radius: 10px;
  overflow: hidden;
  box-shadow: 0px 0px 10px rgba(0,0,0,0.3);
  transition: box-shadow 0.3s ease-in-out;
  margin-left: 960px;
  margin-top: -405px;
}


/* Estilos para cada video al pasar el ratón por encima */
.video2:hover {
  box-shadow: 0px 0px 20px rgba(0,0,0,0.5);
}

/* Estilos para el título de cada video */
.video2 h2 {
  padding: 10px;
  font-size: 24px;
  text-align: center;
  background-color: rgba(0,0,0,0.8);
  color: white;
}

.video3 {
  width: 600px;
  border-radius: 10px;
  overflow: hidden;
  box-shadow: 0px 0px 10px rgba(0,0,0,0.3);
  transition: box-shadow 0.3s ease-in-out;
  margin-top: 20px;
  margin-left: 260px;
}


/* Estilos para cada video al pasar el ratón por encima */
.video3:hover {
  box-shadow: 0px 0px 20px rgba(0,0,0,0.5);
}

/* Estilos para el título de cada video */
.video3 h2 {
  padding: 10px;
  font-size: 24px;
  text-align: center;
  background-color: rgba(0,0,0,0.8);
  color: white;
}

.video4 {
  width: 600px;
  border-radius: 10px;
  overflow: hidden;
  box-shadow: 0px 0px 10px rgba(0,0,0,0.3);
  transition: box-shadow 0.3s ease-in-out;
  margin-left: 960px;
  margin-top: -405px;
}


/* Estilos para cada video al pasar el ratón por encima */
.video4:hover {
  box-shadow: 0px 0px 20px rgba(0,0,0,0.5);
}

/* Estilos para el título de cada video */
.video4 h2 {
  padding: 10px;
  font-size: 24px;
  text-align: center;
  background-color: rgba(0,0,0,0.8);
  color: white;
}
  </style>
</head>
<body>
  <h1>Videos</h1>

  <div class="video1">
      <iframe width="100%" height="315" src="Videos/sentadilla.mp4" frameborder="0" allowfullscreen></iframe>
      <h2>Sentadilla</h2>
    </div>

    <div class="video2">
      <iframe width="100%" height="315" src="Videos/bulgara.mp4" frameborder="0" allowfullscreen></iframe>
      <h2>Sentadilla búlgara</h2>
    </div>

    <div class="video3">
      <iframe width="100%" height="315" src="Videos/prensa.mp4" frameborder="0" allowfullscreen></iframe>
      <h2>Prensa</h2>
    </div>

    <div class="video4">
      <iframe width="100%" height="315" src="Videos/cuadriceps.mp4" frameborder="0" allowfullscreen></iframe>
      <h2>Extensión de cuadriceps</h2>
    </div>

  <p><a href="rutina.php">VOLVER A LA SELECCIÓN DE MUSCULOS</a></p>

</body>
</html>

