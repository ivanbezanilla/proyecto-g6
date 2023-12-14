<?php
if(!isset($_POST["nombre"]) || !isset($_POST["fecha"]) || !isset($_POST["hora"]) || !isset($_POST["capacidad"])) exit();

include_once "../bd/base_de_datos.php";
$nombre = $_POST["nombre"];
$fecha = $_POST["fecha"];
$hora = $_POST["hora"];
$capacidad = $_POST["capacidad"];

$sentencia = $base_de_datos->prepare("INSERT INTO clase(Nombre, Fecha, Hora, Capacidad) VALUES (?, ?, ?, ?, ?);");
$resultado = $sentencia->execute([$nombre, $fecha, $hora, $capacidad]);


if($resultado === TRUE) echo "Se ha insertado correctamente";
else echo "No se ha conseguido insertar, intentalo otra vez";
?>