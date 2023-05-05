<!DOCTYPE html>
<html>
<head>
    <title>Calendario con eventos</title>

    <link rel="icon" type="image/x-icon" href="Imagenes/Logo.png"> <!-- FAVICON --> 

    <style>
        /* Estilos generales */

body {
  font-family: Arial, sans-serif;
  color: #444;
  background-color: #f7f7f7;
}

h1 {
  font-size: 32px;
  margin-bottom: 20px;
  text-align: center;
  margin-bottom: 50px;
  margin-top: 100px;
}

p {
  font-size: 18px;
  margin-bottom: 10px;
}

label {
  display: block;
  font-size: 20px;
  margin-bottom: 5px;
}

input[type="text"],
input[type="date"],
input[type="time"],
textarea {
  font-size: 18px;
  padding: 10px;
  border-radius: 5px;
  border: none;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
  margin-bottom: 15px;
  width: 100%;
}

input[type="submit"] {
  background-color: #5e5e5e;
  color: #fff;
  font-size: 20px;
  padding: 10px 20px;
  border-radius: 5px;
  border: none;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #333;
}

/* Estilos específicos del formulario */

form {
  max-width: 600px;
  margin: 0 auto;
  background-color: #fff;
  padding: 40px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

form label {
  font-weight: bold;
}

form input[type="submit"] {
  margin-top: 20px;
}

form textarea {
  height: 100px;
}

p {
  margin-top: 40px;
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

    </style>
    
</head>
<body>
    <h1>Calendario con eventos</h1>

    <?php
    // Conectar a la base de datos
    $pdo = new PDO('mysql:host=localhost;dbname=Base de datos_m7', 'root', '');

    // Si se envió el formulario para agregar un evento, insertar el evento en la base de datos
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $titulo = $_POST['titulo'];
        $fecha = $_POST['fecha'];
        $hora = $_POST['hora'];
        $descripcion = $_POST['descripcion'];

        $stmt = $pdo->prepare('INSERT INTO eventos (titulo, fecha, hora, descripcion) VALUES (?, ?, ?, ?)');
        $stmt->execute([$titulo, $fecha, $hora, $descripcion]);

        echo '<p>Evento agregado correctamente</p>';
    }
    ?>

    <form method="post">
        <label for="titulo">Título del evento:</label>
        <input type="text" name="titulo" id="titulo" required><br>

        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" id="fecha" required><br>

        <label for="hora">Hora:</label>
        <input type="time" name="hora" id="hora" required><br>

        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" id="descripcion"></textarea><br>

        <input type="submit" value="Agregar evento">
    </form>

    <p><a href="index.php">VOLVER AL MENÚ</a></p>

</body>
</html>
