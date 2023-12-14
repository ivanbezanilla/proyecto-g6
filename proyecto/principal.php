<?php
session_start();
include_once "./bd/base_de_datos.php";
//
$username = $_POST['correo'];
$password = $_POST['passw'];
 
$consulta = $base_de_datos->prepare("SELECT * FROM usuario WHERE email = :username AND pass = :password");
$consulta->bindParam(':username', $username);
$consulta->bindParam(':password', $password);
$consulta->execute();
 
if ($consulta->rowCount() == 1) {
 
    $row = $consulta->fetch(PDO::FETCH_ASSOC);
    $_SESSION['usuario'] = $row['nombre'];
 
} else {
    echo "Usuario o contraseña incorrectos";
    header("Location: index.php");
    exit();
}
//

if (!isset($_SESSION["usuario"])) {
    header("Location: iniciar_sesion.php");
    exit();
}

if (isset($_POST['cerrarsesion'])) {
    // Destruir todas las variables de sesión.
    $_SESSION = array();
 
    // Finalmente, destruir la sesión.
    session_destroy();
 
    header("Location: index.php");
    exit();
}

$correoUsuario = $username;

// Consulta SQL para obtener el tipo de usuario
$consulta = "SELECT tipo FROM usuario WHERE email = '$correoUsuario'";
$resultado = $base_de_datos->query($consulta);

if ($resultado->num_rows > 0) {
    // Si se encuentra el usuario, obtén su tipo
    $fila = $resultado->fetch_assoc();
    $tipoUsuario = $fila['tipo'];
    
    // Aquí puedes almacenar $tipoUsuario en una variable de sesión para su posterior uso en la página principal
} else {
    // Usuario no encontrado o correo incorrecto
     echo "Manejar la situación de inicio de sesión fallida";
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academia de Pintura</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        nav {
            background-color: #444;
            padding: 10px;
            text-align: center;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            padding: 10px;
            margin: 0 10px;
            font-weight: bold;
        }

        nav input {
            color: #fff;
            text-decoration: none;
            padding: 10px;
            margin: 0 10px;
            font-weight: bold;
        }

        section {
            padding: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <header>
        <h1>Academia de Pintura</h1>
    </header>

    <nav>
        <a href="#inicio">Inicio</a>
        <a href="#cursos">Cursos</a>
        <a href="#galeria">Galería</a>
        <a href="#contacto">Contacto</a>
        <form method="post" action=""> 
            <input type="submit" name="cerrarsesion" value="Cerrar sesion">
        </form>
    </nav>

    <section id="inicio">
        <h2>Bienvenido a nuestra Academia de Pintura</h2>
        <p>Descubre el arte de la pintura con nosotros.</p>
        <img src="imagen.jpg" alt="imagen" style="width: 100%; max-width: 600px;">
    </section>
    </section>

    <section id="cursos">
        <h2>Nuestros Cursos</h2>
        <p>Explora nuestros cursos de pintura para todos los niveles.</p>
    </section>

    <section id="galeria">
        <h2>Galería de Obras</h2>
        <p>Admira las creaciones de nuestros talentosos artistas.</p>
    </section>

    <section id="contacto">
        <h2>Contacto</h2>
        <p>¡Contáctanos para obtener más información!</p>
    </section>
</body>
</html>