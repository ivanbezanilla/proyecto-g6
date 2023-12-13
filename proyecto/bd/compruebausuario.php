<?php
date_default_timezone_set('Europe/Madrid');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["correo"];
    $password = md5($_POST["passw"]);

    // Conexión a la base de datos usando PDO
    include_once 'base_de_datos.php';
    $dsn = "mysql:host=nombre_del_host;dbname=nombre_de_la_base_de_datos;charset=utf8mb4";
    $username = "tu_usuario";
    $password_db = "tu_contraseña";

    try {
        $pdo = new PDO($dsn, $username, $password_db);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Consulta SQL para buscar el usuario
        $sql = "SELECT * FROM usuario WHERE email = :usuario";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->execute();

        // Comprobar si el usuario existe en la base de datos
        if ($stmt->rowCount() > 0) {
            // Obtener los datos del usuario
            $fila = $stmt->fetch(PDO::FETCH_ASSOC);
            $nombre = $fila["nombre"];
            $password_encriptada = $fila["contrasena"];
            $idusuario = $fila["id"];
            
            // Comprobar si la contraseña es correcta
            if ($password_encriptada == $password) {
                // Iniciar sesión y redireccionar al usuario a la página de inicio
                session_start();
                $_SESSION["idusuario"] = $idusuario;
                $_SESSION["usuario"] = $usuario;
                $_SESSION["nombre"] = $nombre;
                
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
    $pdo = null;
}
?>
