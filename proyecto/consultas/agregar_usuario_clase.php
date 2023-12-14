<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Usuario a Clase</title>
    <!-- Estilos opcionales para mejorar la apariencia -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            padding: 8px 15px;
            border-radius: 5px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Agregar Usuario a Clase</h1>
    <form method="post" action="procesar_agregar_usuario.php">
        <!-- Campo desplegable para seleccionar la clase -->
        <div class="form-group">
            <label for="clase_id">Clase:</label>
            <select name="clase_id" id="clase_id" class="form-control" required>
                <?php
                // Conectar a la base de datos
                include "../bd/base_de_datos.php";
 
                // Consultar la lista de profesores
                $result = $base_de_datos->query("SELECT id, CONCAT(nombre, ' ', fecha, ' - ', hora) AS info_clase FROM clase");
 
                 // Mostrar opciones en el campo desplegable
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='{$row['id']}'>{$row['info_clase']}</option>";
                }
                ?>
            </select>
        </div>
        <!-- Campo desplegable para seleccionar el alumno -->
        <div class="form-group">
            <label for="alumno_id">Alumno:</label>
            <select name="alumno_id" id="alumno_id" class="form-control" required>
                <?php
                // Conectar a la base de datos
                include_once "../bd/base_de_datos.php";
 
                // Consultar la lista de profesores
                $result = $base_de_datos->query("SELECT id, nombre FROM usuario");
 
                 // Mostrar opciones en el campo desplegable
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='{$row['id']}'>{$row['nombre']}</option>";
                }
                ?>
            </select>
        </div>

        <label for="usuario_id">ID del Usuario:</label>
        <input type="number" id="usuario_id" name="usuario_id" required>

        <label for="tipo_usuario">Tipo de Usuario (alumno o profesor):</label>
        <select id="tipo_usuario" name="tipo_usuario" required>
            <option value="alumno">Alumno</option>
            <option value="profesor">Profesor</option>
        </select>

        <input type="submit" value="Agregar a Clase">
    </form>
</body>
</html>
