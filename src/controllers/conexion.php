<?php
//$servername = "localhost";
//$username = "root";
//$password = "";
//$dbname = "aleana";

$servername = "162.241.61.205";
$username = "carlupya_roberto";
$password = "i6qOqXp40pA";
$dbname = "carlupya_taller";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>