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
<html>
  <head>
    <title>Rutina</title>

    <link rel="icon" type="image/x-icon" href="Imagenes/Logo.png"> <!-- FAVICON --> 
    
    <style>
      /* Estilos generales para la página */
body {
  font-family: Arial, sans-serif;
  background-color: #f7f7f7;
  color: #333333;
  margin: 0;
  padding: 0;
}

h1{
  text-align: center;
}

/* Estilos para los divs de grupos musculares */
div {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  width: 25%;
  padding: 20px;
  margin: 50px 0;
  background-color: #ffffff;
  border-radius: 8px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  transition: all 0.3s ease-in-out;
}

/* Estilos para el título de cada div */
h2 {
  margin: 0;
  font-size: 2.2rem;
  text-align: center;
  margin-bottom: 10px;
}

/* Estilos para el resumen de información de cada div */
p {
  margin: 0;
  font-size: 1.2rem;
  text-align: center;
  margin-bottom: 20px;
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

.brazo{
  margin-left: 400px;
  margin-top: 100px;
}

.espalda{
  margin-left: 950px;
  margin-top: -221px;
}

.pecho{
  margin-left: 400px;
  margin-top: 100px;
}

.pierna{
  margin-left: 950px;
  margin-top: -221px;
}

      </style>
  </head>

  <body>

    <h1>ESCOGE UN MÚSCULO PARA EJERCITAR</h1>

    <div class="brazo">
      <h2>Brazo</h2>
      <p>Información sobre ejercicios para brazos.</p>
      <a href="brazo.php">Ver más</a>
    </div>

    <div class="espalda">
      <h2>Espalda</h2>
      <p>Información sobre ejercicios para la espalda.</p>
      <a href="espalda.php">Ver más</a>
    </div>

    <div class="pecho">
      <h2>Pecho</h2>
      <p>Información sobre ejercicios para el pecho.</p>
      <a href="pecho.php">Ver más</a>
    </div>

    <div class="pierna">
      <h2>Pierna</h2>
      <p>Información sobre ejercicios para las piernas.</p>
      <a href="pierna.php">Ver más</a>
    </div>

    <p><a href="index.php">VOLVER AL MENÚ</a></p>

  </body>
</html>