<?php
include ('database.php');
$message = '';
$usuarios ="SELECT * FROM inventario";

echo $_GET['ID'];
$id_rubro = $_GET['ID'];

$sql = "DELETE FROM inventario WHERE id_rubro=?";
$stmt= $conn->prepare($sql);
$stmt->execute([$id_rubro]);

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
    <a href="inventario.php" type="button" class="btn btn-info">Volver</a>
    <br>    
    <img src="assets/img/eliminar.png" class="" alt="">
<br>

</body>
</html>