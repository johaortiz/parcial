<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jo_blog";
$port = 3307;

$conn = new mysqli($servername, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>