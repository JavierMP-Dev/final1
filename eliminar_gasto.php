<?php
include ('database.php');
$message = '';
$usuarios ="SELECT * FROM gastos";

echo $_GET['ID'];
$id_gasto = $_GET['ID'];

$sql = "DELETE FROM gastos WHERE id_gasto=?";
$stmt= $conn->prepare($sql);
$stmt->execute([$id_gasto]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Eliminar Inventarios</title>
</head>
<body>
<?php require 'partials/header.php' ?>

    <h1>Registro eliminado</h1>
    <a href="gasto.php" type="button" class="btn btn-info">Volver</a>
<br>    
    <img src="assets/img/eliminar.png" class="" alt="">
<br>
    <i class="fa-solid fa-trash-check">s</i>
    
</body>
</html>