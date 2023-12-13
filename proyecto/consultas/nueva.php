<?php
if(!isset($_POST["nombre"]) || !isset($_POST["apellidos"]) || !isset($_POST["dni"]) || !isset($_POST["sexo"])) exit();

include_once "base_de_datos.php";
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$dni = $_POST["dni"];
$sexo = $_POST["sexo"];

$sentencia = $base_de_datos->prepare("INSERT INTO proyecto(nombre, apellidos, dni, sexo) VALUES (?, ?, ?, ?);");
$resultado = $sentencia->execute([$nombre, $apellidos, $dni, $sexo]);

if($resultado === TRUE) echo "Se ha insertado correctamente";
else echo "No se ha conseguido insertar, intentalo otra vez";
?>