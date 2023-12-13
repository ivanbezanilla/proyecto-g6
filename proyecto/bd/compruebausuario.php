<?php
date_default_timezone_set('Europe/Madrid');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["correo"];
    $password = $_POST["passw"];
    echo "usuario: $usuario <br>";
    echo "password: $password <br>";

    // Conexión a la base de datos usando PDO

    session_start();
    include_once 'base_de_datos.php';

    try {
        // Consulta SQL para buscar el usuario
        $sql = "SELECT * FROM usuario WHERE email = :usuario AND pass = :password";
        $stmt = $base_de_datos->prepare($sql);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION['usuario'] = $row['nombre'];

        $root_path = $_SERVER['DOCUMENT_ROOT'] . '/';
        header("location: /proyecto-g6/proyecto/principal.php");
        exit;
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
