<!-- PHP -->

<?php

    session_start();

    require_once('config.php');

    // Comprueba si el usuario ha enviado el formulario.
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Recupera el nombre de usuario y la contraseña del formulario.
        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($username == "admin" && $password == "admin"){
            header('Location: index2.php');
        }

    // Detecta el nombre y si está correcto inicia la sesión correctamente.
    $sql = "SELECT * FROM usuarios WHERE Nombre='$username' AND Contraseña='$password'";

    $result = $conn->query($sql);
   
    if($result->num_rows > 0){
        $_SESSION['username'] = $username;
        $_SESSION['loggedin'] = true;
            header('Location: index.php');
            exit;
        }

        else {
            // Muestra un mensaje de error si el nombre de usuario o la contraseña son incorrectos
            // POPUP.
            echo"<script>
            alert('Nombre de usuario o contraseña incorrectos.');
            </script>";
        }
    }

?>



<!-- HTML -->
<!DOCTYPE html>

<html>

    <!-- HEAD -->
    <head>

        <title>Login</title>

        <link rel="icon" type="image/x-icon" href="Imagenes/favicon.png"> <!-- FAVICON --> 

		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"><!-- BOOTSTRAP -->
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <style>

        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        .main-head{
        height: 150px;
        background: #FFF;

        }

        .sidenav {
        height: 100%;
        background-color: #A9A9A9;
        overflow-x: hidden;
        padding-top: 20px;
        }


        .main {
        padding: 0px 10px;
        }

        @media screen and (max-height: 450px) {
        .sidenav {padding-top: 15px;}
        }

        @media screen and (max-width: 450px) {
        .login-form{
        margin-top: 10%;
        }

        .register-form{
        margin-top: 10%;
        }
        }

        @media screen and (min-width: 768px){
        .main{
        margin-left: 40%; 
        }

        .sidenav{
        width: 40%;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        }

        .login-form{
        margin-top: 80%;
        }

        .register-form{
        margin-top: 20%;
        }
        }

        .login-main-text{
        margin-top: 20%;
        padding: 60px;
        }

        .btn-black{
        background-color: #000 !important;
        color: #fff;
        margin-top: -20px;
        margin-left: 510px;
        }

        .form-group{
            text-align: center;
            margin-top: 10px;
            margin-bottom: 10px;
            font-weight: bold;
            font-size: 18px;
        }
        .form-group label{
            margin-top: -5px;
        }
        .titulo1{
            background-color: #A9A9A9;
            margin-top: 20px;
            text-align: center;
            border-radius: 20px;
        } 
        .titulo2{
            background-color: #A9A9A9;
            margin-top: 40px;
            text-align: center;
            border-radius: 20px;
        } 
        .registrarse {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        width: 400px;
        margin-top: 50px;
        margin-left: 350px;
        }

        .form-group input {
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 10px;
        width: 20%;
        font-size: 16px;
        }

        button[type="submit"] {
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        font-size: 18px;
        cursor: pointer;
        }

        button[type="submit"]:hover {
        background-color: #0062cc;
        }
        .form-group1 input {
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 10px;
        width: 100%;
        font-size: 16px;
        margin-bottom: 10px;
        }

    </style>

</head>

<body>

<!-- LOGIN -->

    <?php if (isset($error)): ?>

        <p><?php echo $error; ?></p>

    <?php endif; ?>

<div class="sidenav">

	<div class="login-main-text">

		<img src="Imagenes/Logo.png" alt="Logo">

	</div>

</div>

<!-- LOGIN -->
<div class="main">
	
	<div class="titulo1">
		<h2>INICIAR SESIÓN</h2>
	</div>

	<form class="iniciar_sesion" method="post" action="login.php"> <!-- ETIQUETA FORM -->

		<div class="form-group">
			<label for="username">Nombre de usuario:</label></br>
			<input type="text" class="username" name="username" placeholder="User Name"><br><br>
		
			<label for="password">Contraseña:</label><br>
			<input type="password" class="password" name="password" placeholder="Password"><br><br>
		</div>

		<button type="submit" class="btn btn-black" value="Iniciar sesión">Login</button>
		
	</form>

</div>

<div class="main">

    <div class="titulo2">

    <h2>REGISTRATE !!</h2>

</div>

           <form class="registrarse" action="registro.php" method="POST">

               <div class="form-group1">

                   <label for="nombre">Nombre:</label>
                   <input type="text" name="nombre" placeholder="Name" required>

                   <label for="correo">Correo electrónico:</label>
                   <input type="email" name="correo" placeholder="Gmail" required>

                   <label for="contraseña">Contraseña:</label>
                   <input type="password" name="contraseña" placeholder="Password" required>

                   <label for="altura">Altura:</label>
                   <input type="number" name="altura" placeholder="Altura (cm)" required>

               </div>

           <button type="submit" name="registro">Registrarse</button>

           </form>
</div>

</body>
</html>