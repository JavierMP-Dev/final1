<?php
include ('database.php');
session_start();


$sql = "INSERT INTO historial (id_docente, nombre) VALUES (:id_docente, :nombre)"; 
/*
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id_docente', $_POST['id_docente']);
$stmt->bindParam(':nombre', $_POST['nombre']);
  */
  var_dump ($_POST ['tema1']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial</title>
</head>
<body>
    <h2>Hola</h2>
</body>
</html>