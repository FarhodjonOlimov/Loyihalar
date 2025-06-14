<?php 
// Ma'lumotlar bazasiga ulanish 
$server = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "login"; 
 
// MySQL ulanishi 
$conn = new mysqli($server, $username, $password, $database); 
 
// Ulanuvchanlikni tekshirish 
if ($conn->connect_error) { 
    die("Bazaga ulanish amalga oshmadi: " . $conn->connect_error); 
} 

?> 


