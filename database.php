<?php

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'php_login_database';

$conexion=mysqli_connect("localhost", "root", "", "php_login_database");
mysqli_set_charset($conexion, "utf8");

try {
  $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
  die('Connection Failed: ' . $e->getMessage());
}

?>
