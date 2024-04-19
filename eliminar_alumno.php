<?php
include ('database.php');
$message = '';
$usuarios ="SELECT * FROM alumno";

echo $_GET['ID'];
$id_alumno = $_GET['ID'];

$sql = "DELETE FROM alumno WHERE id_alumno=?";
$stmt= $conn->prepare($sql);
$stmt->execute([$id_alumno]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Eliminar</title>
    <!---Logo para mostrarse en la pestaña de la pagina-->
    <link rel="shortcut icon" href="assets/img/logo_favi.png" type="image/x-icon">
</head>
<body>
<?php require 'partials/header.php' ?>

    <h1>Registro eliminado</h1>
    <a href="alumno.php" class="btn_volver">Volver</a>
</body>
</html>