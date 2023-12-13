<?php
date_default_timezone_set('Europe/Madrid');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["correo"];
    $password = $_POST["passw"];
    echo "usuario: $usuario <br>";
    echo "password: $password <br>";

    // Conexión a la base de datos usando PDO
    include_once 'base_de_datos.php';

    try {
        // Consulta SQL para buscar el usuario
        $sql = "SELECT * FROM usuario WHERE email = :usuario";
        $stmt = $base_de_datos->prepare($sql);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->execute();

        // Comprobar si el usuario existe en la base de datos
        if ($stmt->rowCount() == 1) {
            // Obtener los datos del usuario
            $fila = $stmt->fetch(PDO::FETCH_ASSOC);
            $nombre = $fila["nombre"];
            $password_encriptada = $fila["contrasena"];
            $idusuario = $fila["id"];
            
            // Comprobar si la contraseña es correcta
            if ($password_encriptada == $password) {
                // Iniciar sesión y redireccionar al usuario a la página de inicio
                session_start();
                
                $root_path = $_SERVER['DOCUMENT_ROOT'] . '/';
                header("location: /index.php");
                exit;
            } else {
                echo "La contraseña es incorrecta";
            }
        } else {
            echo "El usuario no existe";
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    // Cerrar la conexión
    $base_de_datos = null;
}
?>
