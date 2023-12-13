<?php
session_start();
date_default_timezone_set('Europe/Madrid');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["correo"];
    $password = $_POST["passw"];
    echo "usuario:$usuario <br>";
    echo "password:$password <br>";

    // Conexión a la base de datos usando PDO
    include_once 'base_de_datos.php';

    try {
        // Consulta SQL para buscar el usuario
        $sql = "SELECT * FROM usuario WHERE email = :usuario AND pass = :password";
        $stmt = $base_de_datos->prepare($sql);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        echo "Correcto";

    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

}
?>
