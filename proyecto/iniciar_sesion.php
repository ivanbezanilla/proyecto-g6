<html>   
   <head>
    <meta charset = "UTF-8">
    <meta http-equiv = "X-UA-Compatible" content = "IE-edge, chrome = 1">
    <meta name = "viewport" content = "width = device-width,initial-scale = 1.0">
    <link rel = "stylesheet" type = "text/css" href = "/css/iniciosesion.css">
    <title>Inventario - Inicio</title>
    </head>
    
        <body>
    
            <main>
    <div id="form">
    <h1>Iniciar sesión</h1>
    <form action = "../bd/compruebausuario.php" method = "POST">
    <label for = "correo">Correo electrónico:</label>
    <input type = "email" id = "correo" name = "correo" required>
    </br /></br />
    <label for = "contrasena">Contraseña:</label>
    <input type = "password" id="passw" name = "passw" required>
    </br /></br />
    <input type = "submit" value="Iniciar sesión" >
    </form>
    <br>
    <br>
    <br>
    </main>
    </body>
</html>