<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>

<h2>Login</h2>

<form action="login.php" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br>

    <label for="usertype">User Type:</label>
    <select id="usertype" name="usertype" required>
        <option value="profesor">Profesor</option>
        <option value="alumno">Alumno</option>
    </select><br>

    <input type="submit" value="Login">
</form>

</body>
</html>