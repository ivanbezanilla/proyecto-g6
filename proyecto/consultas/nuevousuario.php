<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Usuarios</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            width: 50%;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        fieldset {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-size: 18px;
            color: #333;
        }

        input[type="text"],
        input[type="password"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            font-size: 16px;
        }

        select {
            margin-top: 5px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Registrar Usuarios</h1>
    <form method="post" action="nueva.php">
        <fieldset>
            <label for="nombre">Nombre:</label>
            <br>
            <input name="nombre" required type="text" id="nombre" placeholder="Escribe tu nombre">
            <br><br>
            <label for="apellidos">Apellidos:</label>
            <br>
            <input name="apellidos" required type="text" id="apellidos" placeholder="Escribe tus apellidos">
            <br><br>
            <label for="pass">Contraseña:</label>
            <br>
            <input name="pass" required type="password" id="pass" placeholder="Escribe tu contraseña">
            <br><br>
            <label for="email">Email:</label>
            <br>
            <input name="email" required type="text" id="email" placeholder="Escribe tu email">
            <br><br>
            <label for="tipo">Privilegios</label>
            <select name="tipo" required name="tipo" id="tipo">
                <option value="alumno">Alumno</option>
                <option value="profesor">Profesor</option>
                <option value="administracion">Administracion</option>
            </select>
            <br><br><input type="submit" value="Registrar">
        </fieldset>
    </form>
</body>
</html>