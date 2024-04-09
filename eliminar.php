<?php
include ('database.php');
$message = '';
$usuarios ="SELECT * FROM users";

echo $_GET['ID'];
echo "";
$id_docente = $_GET['ID'];

$consulta = "SELECT FROM users WHERE ID = 'nombre'";

$sql = "DELETE FROM users WHERE id=?";
$stmt= $conn->prepare($sql);
$stmt->execute([$id_docente]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Eliminar</title>
</head>
<body>
<?php require 'partials/header.php' ?>

    <h1>Registro eliminado</h1>

   <!---
    <td class="separacion"><strong> <div ><?php echo $consulta; ?></div> </strong></td>

    <td class="separacion"><strong> <div ><?php echo $id_docente; ?></div> </strong></td>
    ---->
    <a href="docente.php" class="btn_volver">Volver</a>
</body>
</html>