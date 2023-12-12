<?php
// Database configuration
$db_host = "localhost";
$db_name = "paprm";
$db_user = "master";
$db_password = "master";

// PDO Connection
try {
    $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>