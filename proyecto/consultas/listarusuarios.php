<?php
include "../bd/base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT * FROM usuario;");
$personas = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tabla de usuarios</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            /*height: 100vh;*/
        }

        header {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        header, nav {
            width: 100%;
            display: block;
        }

        nav {
            background-color: rgba(0, 0, 0, 0.8); /* Fondo negro con opacidad */
            padding: 10px 0;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            text-align: center; /* Centrar elementos del menú */
        }

        nav ul li {
            display: inline-block;
            margin-right: 15px;
        }

        nav ul li a {
            text-decoration: none;
            color: #fff; /* Color del texto del menú */
            padding: 8px 15px;
            border-radius: 5px;
        }

        nav ul li a:hover {
            background-color: rgba(255, 255, 255, 0.2); /* Cambiar color al pasar el cursor */
        }

        table {
            border-collapse: collapse;
            width: 80%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-top: 20px; /* Ajusta el margen superior */
        }
        input[type="submit"] {
            padding: 8px 15px;
            border-radius: 5px;
            background-color: #fff;
            border: none;
            cursor: pointer;
        }

    </style>
</head>
<body>
    <header>
        <h1>Academia de Pintura</h1>
    </header>
    <nav>
        <ul>
            <li><a href="../principal.php">Inicio</a></li>
            <li><a href="../">Perfil</a></li>
            <li><a href="listarusuarios.php">Usuarios</a></li>
            <li><a href="listarclases.php">Clases</a></li>
        </ul>
        <form method="post" action=""> 
            <input type="submit" name="cerrarsesion" value="Cerrar sesion">
        </form>
    </nav>
    
    <h1>Tabla de usuarios</h1>
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Email</th>
                <th>Pass</th>
                <th>Tipo</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($personas as $proyecto){ ?>
            <tr>
                <td><?php echo $proyecto->id ?></td>
                <td><?php echo $proyecto->nombre ?></td>
                <td><?php echo $proyecto->apellidos ?></td>
                <td><?php echo $proyecto->email ?></td>
                <td><?php echo $proyecto->pass ?></td>
                <td><?php echo $proyecto->tipo ?></td>
                <td><a href="<?php echo "./editar.php?id=" . $proyecto->id?>">Editar</a></td>
                <td><a href="<?php echo "./eliminar.php?id=" . $proyecto->id?>">Eliminar</a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>