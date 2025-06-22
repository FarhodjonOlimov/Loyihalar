<?php
// Fayl: config.php

$host = "localhost";
$username = "root";
$password = "";
$database = "academic_platform";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Bazaga ulanishda xatolik: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");
?>
