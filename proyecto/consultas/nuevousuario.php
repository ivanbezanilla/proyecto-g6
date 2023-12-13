<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Registrar Personas</title>
        <link rel="style" type="text/css" href="style.css">
    </head>
    <body>
        <form method="post" action="nuevao.php">
            <fieldset>
                <label for="nombre">Nombre:</label>
                <br>
                <input name="nombre" required type="text" id="nombre" placeholder="Escribe tu nombre">
                <br><br>
                <label for="apellidos">Apellidos:</label>
                <br>
                <input name="apellidos" required type="text" id="apellidos" placeholder="Escribe tus apellidos">
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