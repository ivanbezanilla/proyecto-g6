<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "../bd/base_de_datos.php";
try {
    $sentencia = $base_de_datos->prepare("DELETE FROM alumno_clase WHERE Alumno_id = ?;");
    $resultado = $sentencia->execute([$id]);
    echo "Eliminado correctamente";
}catch(Exception $e){
    echo "Ocurrio un error:" . $e->getMessage();
}
?>