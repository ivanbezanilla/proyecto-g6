<?php
session_start();
include_once "./bd/base_de_datos.php";

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

$correoUsuario = $_SESSION['correo'];
$tipoUsuario = $_SESSION['tipousuario'];

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
            background-color: #4CAF50;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        /* Estilos para el menú */
        nav {
            background-color: rgba(0, 0, 0, 0.8); /* Fondo negro con opacidad */
            padding: 10px 0;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            text-align: center; /* Centrar elementos del menú */
        }

        nav ul li {
            display: inline-block;
            margin-right: 15px;
        }

        nav ul li a {
            text-decoration: none;
            color: #fff; /* Color del texto del menú */
            padding: 8px 15px;
            border-radius: 5px;
        }

        nav ul li a:hover {
            background-color: rgba(255, 255, 255, 0.2); /* Cambiar color al pasar el cursor */
        }

        form {
            float: right; /* Para alinear a la derecha */
            margin-top: 10px; /* Agrega espacio entre el menú y el formulario */
            margin-right: 20px; /* Margen derecho para separarlo del borde de la página */
        }

        input[type="submit"] {
            padding: 8px 15px;
            border-radius: 5px;
            background-color: #fff;
            border: none;
            cursor: pointer;
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
        <ul>
            <?php
            // Lógica para generar el menú según el tipo de usuario
            function generarMenu($tipoUsuario) {
                $menu = '';
                // Elementos comunes para todos los tipos de usuarios
                $menu .= '<li><a href="principal.php">Inicio</a></li>';
                $menu .= '<li><a href="perfil.php">Perfil</a></li>';
                
                // Elementos específicos para cada tipo de usuario
                if ($tipoUsuario === 'profesor') {
                    $menu .= '<li><a href="consultas/listarclases.php">Clases</a></li>';

                } elseif ($tipoUsuario === 'administrador') {
                    $menu .= '<li><a href="consultas/listarusuarios.php">Usuarios</a></li>';
                    $menu .= '<li><a href="consultas/listarclases.php">Clases</a></li>';
                    $menu .= '<li><a href="consultas/agregar_usuario_clase.php">Agregar alumno a clases</a></li>';

                } elseif ($tipoUsuario === 'alumno') {
                    $menu .= '<li><a href="clase.php">Clases</a></li>';
                }

                return $menu;
            }

            // Generar el menú según el tipo de usuario
            echo generarMenu($tipoUsuario);
            ?>
        </ul>
        <form method="post" action=""> 
            <input type="submit" name="cerrarsesion" value="Cerrar sesión">
        </form>
    </nav>

    <section id="inicio">
        <h2>Bienvenido a nuestra Academia de Pintura</h2>
        <p>Descubre el arte de la pintura con nosotros.</p>
        <img src="imagen.jpg" alt="imagen">
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
