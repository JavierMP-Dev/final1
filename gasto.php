<?php
include ('database.php');
 $message = '';
 $gastos ="SELECT * FROM gastos";


if(isset($_POST['AGREGAR_GASTO'])){
    $sql = "INSERT INTO gastos (gasto, cantidad) VALUES (:gasto, :cantidad)"; 
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':gasto', $_POST['gasto']);
    $stmt->bindParam(':cantidad', $_POST['cantidad']);
    if ($stmt->execute()) {
        echo "Registro exitoso";
        //$message = 'Registro exitoso!!!';
      } else {
        echo "Fail";
        //$message = 'No registrado';
      }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escuela</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <!---Logo para mostrarse en la pestaña de la pagina-->
    <link rel="shortcut icon" href="assets/img/logo_favi.png" type="image/x-icon">
</head>

<body>
    <?php require 'partials/header.php' ?>
    <div>
        <h2>Gasto</h2>
    </div>

    <a href="inventario.php" class="btn_nav">Inventarios</a>
    <a href="evento.php" class="btn_nav">Eventos</a>
    <a href="gasto.php" class="btn_nav">Gastos</a>


    <h1>Gastos</h1>
    <br>
    <div id="main_container">

        <table class="tabla_dat">
            <thead class="thead_dat">
                <tr>
                    <th>Pagos</th>
                    <th>Cantidad</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <?php
              $resultado = mysqli_query($conexion, $gastos);
              while($row=mysqli_fetch_assoc($resultado)){   
              ?>
            <tr>
                <td>
                    <div class=""><?php echo $row["gasto"]; ?></div>
                </td>
                <td>
                    <div class="">$<?php echo $row["cantidad"]; ?></div>
                </td>

                <td class="separacion"><input type="submit" class="btn_tabla_eliminar_docente" value="Eliminar"
                        onclick="eliminarid<?= $row['id_gasto'];?>()"></td>
            </tr>

            <script>
            function eliminarid<?= $row['id_gasto'];?>() {
                var confirmar = confirm("Seguro que quieres borrar el registro?");
                if (confirmar) {
                    top.location.href = "eliminar_gasto.php?ID=" + <?= $row['id_gasto'];?>;
                } else {
                    alert("No se realizaron cambios");
                }
            }
            </script>

            <?php
              }
              ?>
        </table>
    </div>

    <h1>Nuevo </h1>

    <form action="gasto.php" method="POST" style="margin: auto; width: 380px;">
        <tr>

            <td width="50%"> <input name="gasto" class="form-control" type="text" required placeholder="Gasto"> </td>
        </tr>
        <br>
        <tr>

            <td width="50%"><input type="number" name="cantidad" class="form-control" placeholder="Cantidad"></td>
        </tr>
        <br>

        <br>
        <input name="AGREGAR_GASTO" type="submit" value="Enviar" class="btn_form">
    </form>
</body>

</html>