<!-- HTML -->

<!DOCTYPE html>

<html>

<head>

	<title>Página de inicio</title>

	<link rel="icon" type="image/x-icon" href="Imagenes/Logo.png"> <!-- FAVICON --> 

	<style>

/* Estilos generales */
body {
            text-align: center;
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
         }
        
         table {
      border-collapse: collapse;
      width: 80%;
      max-width: 800px;
      background-color: #fff;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      margin: 0 auto; /* Para centrar la tabla en el medio */
    }
    
    table th,
    table td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
    
    table th {
      background-color: #f5f5f5;
    }
    
    table tr:hover {
      background-color: #f9f9f9;
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
  margin-top: 80px;
  margin-left: -850px;
}

p a:hover {
color: #f00;
transition: all 0.3s ease-in-out;
}

#eliminar_btn {
  display: inline-block;
  padding: 10px 20px;
  background-color: #ff0000;
  color: #fff;
  text-decoration: none;
  border-radius: 4px;
  transition: background-color 0.3s ease;
}

#eliminar_btn:hover {
  background-color: #cc0000;
}


#modificar_btn {
  display: inline-block;
  padding: 10px 20px;
  background-color: #007bff;
  color: #fff;
  text-decoration: none;
  border-radius: 4px;
  transition: background-color 0.3s ease;
}

#modificar_btn:hover {
  background-color: #0056b3;
}

#tabla-titulo {
      color: green;
      font-size: 24px;
      font-weight: bold;
      text-align: center;
      margin-top: 50px;
    }


	</style>

</head>

<body>

	<h1>Bienvenido ADMIN!!</h1>




  <?php
session_start();
require_once('config.php');

// Verifica si el usuario ha iniciado sesión.
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirige al usuario al formulario de inicio de sesión si no ha iniciado sesión.
    header('Location: login.php');
    exit;

}

// Realizar la consulta
$sql = "SELECT id_usuario, Contraseña, Correo, Apellidos, Nombre, Altura FROM usuarios";
$result = $conn->query($sql);

// Verificar si se obtuvieron resultados
if ($result->num_rows > 0) {
    // Imprimir la tabla
    echo "<table>";
    echo "<tr><th>ID Usuario</th><th>Contraseña</th><th>Correo</th><th>Apellidos</th><th>Nombre</th><th>Altura</th></tr>";
    
    // Recorrer los resultados y mostrar los datos
    echo '<h1 id="tabla-titulo">TABLA DE USUARIOS</h1>';
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id_usuario"] . "</td>";
        echo "<td>" . $row["Contraseña"] . "</td>";
        echo "<td>" . $row["Correo"] . "</td>";
        echo "<td>" . $row["Apellidos"] . "</td>";
        echo "<td>" . $row["Nombre"] . "</td>";
        echo "<td>" . $row["Altura"] . "</td>";
        echo "<td><a id='eliminar_btn' href='delete.php?id=" . $row["id_usuario"] . "'>Eliminar</a></td>";
        echo "<td><a id='modificar_btn' href='modificar.php?id=" . $row["id_usuario"] . "'>Modificar</a></td>";
        echo "</tr>";
    }
    
    echo "</table>";
} 
else {
    echo "No se encontraron resultados.";
}


// ---------------------------------------------------------------------------------------------------------------------------------------


// Realizar la consulta
$sql = "SELECT id, title, descripcion, color, textColor, start, end FROM eventos";
$result = $conn->query($sql);

// Verificar si se obtuvieron resultados
if ($result->num_rows > 0) {
    // Imprimir la tabla
    echo "<table>";
    echo "<tr><th>ID</th><th>Titulo</th><th>Descripción</th><th>Color</th><th>textColor</th><th>start</th><th>end</th></tr>";
    
    // Recorrer los resultados y mostrar los datos
    echo '<h1 id="tabla-titulo">TABLA DE EVENTOS</h1>';
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["title"] . "</td>";
        echo "<td>" . $row["descripcion"] . "</td>";
        echo "<td>" . $row["color"] . "</td>";
        echo "<td>" . $row["textColor"] . "</td>";
        echo "<td>" . $row["start"] . "</td>";
        echo "<td>" . $row["end"] . "</td>";
        echo "<td><a id='eliminar_btn' href='delete2.php?id=" . $row["id"] . "'>Eliminar</a></td>";
        echo "<td><a id='modificar_btn' href='modificar2.php?id=" . $row["id"] . "'>Modificar</a></td>";
        echo "</tr>";
    }
    
    echo "</table>";
} 
else {
    echo "No se encontraron resultados.";
}

// Cerrar la conexión
$conn->close();
?>


  <div class="btn_cerrar_sesion">
	<p><a href="login.php">CERRAR SESIÓN</a></p> <!-- HAY QUE REVISAR EL COMO HACER EL CIERRE DE SESIÓN -->
  </div>

</body>
</html>