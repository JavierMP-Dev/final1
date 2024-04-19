<?php

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'secundaria';

$conexion=mysqli_connect("localhost", "root", "", "secundaria");
mysqli_set_charset($conexion, "utf8");

try {
  $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
  die('Connection Failed: ' . $e->getMessage());
}

?>
