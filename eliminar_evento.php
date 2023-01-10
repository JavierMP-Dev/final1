<?php
include ('database.php');
$message = '';
$usuarios ="SELECT * FROM eventos";

echo $_GET['ID'];
$id_evento = $_GET['ID'];

$sql = "DELETE FROM eventos WHERE id_evento=?";
$stmt= $conn->prepare($sql);
$stmt->execute([$id_evento]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Eliminar Eventos</title>
</head>
<body>
<?php require 'partials/header.php' ?>

    <h1>Registro eliminado</h1>
    <a href="evento.php" class="btn_volver">Volver</a>
</body>
</html>