<?php

// Verificar si se ha enviado información por el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Conectar a la base de datos
    include "../bd/base_de_datos.php.php";

    // Recoger los datos del formulario
    $clase_id = $_POST['clase_id'];
    $alumno_id = $_POST['alumno_id'];

    // Verificar si la clase y el usuario existen en la base de datos
    $consulta_clase = $base_de_datos->prepare("SELECT * FROM clase WHERE ID = :clase_id");
    $consulta_clase->bindParam(':clase_id', $clase_id);
    $consulta_clase->execute();

    $consulta_usuario = $base_de_datos->prepare("SELECT * FROM usuario WHERE id = :alumno_id");
    $consulta_usuario->bindParam(':alumno_id', $alumno_id);
    $consulta_usuario->execute();

    if ($consulta_clase->rowCount() == 1 && $consulta_usuario->rowCount() == 1) {
        // Insertar el usuario a la clase correspondiente en la tabla alumno_clase
        $insertar_usuario_clase = $base_de_datos->prepare("INSERT INTO alumno_clase (Alumno_ID, Clase_ID) VALUES (:alumno_id, :clase_id)");
        $insertar_usuario_clase->bindParam(':alumno_id', $alumno_id);
        $insertar_usuario_clase->bindParam(':clase_id', $clase_id);
        $insertar_usuario_clase->execute();

        echo "Usuario agregado correctamente a la clase.";
    } else {
        echo "No se pudo agregar el usuario a la clase. Verifica que la clase y el usuario existan.";
    }
}
?>
