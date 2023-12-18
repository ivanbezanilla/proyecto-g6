<?php
if(
	!isset($_POST["nombre"]) || !isset($_POST["apellidos"]) || !isset($_POST["email"]) || !isset($_POST["pass"]) || !isset($_POST["tipo"]) || !isset($_POST["id"])
) exit();

include_once "../bd/base_de_datos.php";
$id = $_POST["id"];
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$email = $_POST["email"];
$pass = $_POST["pass"];
$tipo = $_POST["tipo"];

try {
$sentencia = $base_de_datos->prepare("UPDATE usuario SET nombre = ?, apellidos = ?, email = ?, pass = ?, tipo = ? WHERE id = ?;");
$resultado = $sentencia->execute([$nombre, $apellidos, $email, $pass, $tipo, $id]);
echo "Los cambios se han guardado correctamente";
}catch(Exception $e){
    echo "Ocurrio un error:" . $e->getMessage();
}
?>