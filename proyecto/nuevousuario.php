<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Registrar Personas</title>
        <link rel="style" type="text/css" href="style.css">
    </head>
    <body>
        <form method="post" action="Inicio.php">
            <fieldset>
                <label for="nombre">Nombre:</label>
                <br>
                <input name="nombre" required type="text" id="nombre" placeholder="Escribe tu nombre">
                <br><br>
                <label for="apellidos">Apellidos:</label>
                <br>
                <input name="apellidos" required type="text" id="apellidos" placeholder="Escribe tus apellidos">
                <br><br>
                <label for="dni">DNI:</label>
                <br>
                <input name="dni" required type="text" id="dni" placeholder="Escribe el dni">
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