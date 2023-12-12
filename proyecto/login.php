<?php
include 'db.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM profesor WHERE email='$email' AND pass='$password'";
    $result = $conn->query($query);

    if ($result->rowCount() > 0) {
        $_SESSION['user_type'] = 'profesor';
        header('Location: profesor_dashboard.php');
        exit();
    }

    $query = "SELECT * FROM alumno WHERE email='$email' AND pass='$password'";
    $result = $conn->query($query);

    if ($result->rowCount() > 0) {
        $_SESSION['user_type'] = 'alumno';
        header('Location: alumno_dashboard.php');
        exit();
    }

    $error_message = 'Invalid email or password';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <h2>Login</h2>
    <form method="post" action="login.php">
        <label>Email:</label>
        <input type="text" name="email" required><br>
        <label>Password:</label>
        <input type="password" name="password" required><br>
        <button type="submit">Login</button>
    </form>
    <?php if (isset($error_message)) { echo $error_message; } ?>
</body>
</html> 