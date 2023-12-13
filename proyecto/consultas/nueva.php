<?php
if(!isset($_POST["nombre"]) || !isset($_POST["apellidos"]) || !isset($_POST["email"]) || !isset($_POST["pass"]) || !isset($_POST["tipo"])) exit();

include_once "../bd/base_de_datos.php";
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$dni = $_POST["email"];
$pass = $_POST["pass"];
$sexo = $_POST["tipo"];

$sentencia = $base_de_datos->prepare("INSERT INTO proyecto(nombre, apellidos, email, pass, tipo) VALUES (?, ?, ?, ?, ?);");
$resultado = $sentencia->execute([$nombre, $apellidos, $email, $pass, $tipo]);

if($resultado === TRUE) echo "Se ha insertado correctamente";
else echo "No se ha conseguido insertar, intentalo otra vez";
?>