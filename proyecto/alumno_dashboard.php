<?php
session_start();

if (!isset($_SESSION['user_type'])) {
    header('Location: login.php');
    exit();
}

$user_type = $_SESSION['user_type'];

if ($user_type == 'profesor') {
    echo "Welcome Professor!";
    // Additional professor dashboard content here
} elseif ($user_type == 'alumno') {
    echo "Welcome Student!";
    // Additional student dashboard content here
}
?>  