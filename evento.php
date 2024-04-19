<?php
include ('database.php');
 $message = '';
 $recordatorio ="SELECT * FROM eventos";


if(isset($_POST['AGREGAR_EVENTO'])){
    $sql = "INSERT INTO eventos (evento, fecha) VALUES (:evento, :fecha)"; 
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':evento', $_POST['evento']);
    $stmt->bindParam(':fecha', $_POST['fecha']);
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
        <h2>Eventos</h2>
    </div>

    <a href="inventario.php" class="btn_nav">Inventarios</a>
    <a href="evento.php" class="btn_nav">Eventos</a>
    <a href="gasto.php" class="btn_nav">Gastos</a>



    <h1>Eventos</h1>
    <br>
    <div id="main_container">

        <table class="tabla_dat">
            <thead class="thead_dat">
                <tr>
                    <th>Actividad</th>
                    <th>Fecha</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <?php
              $resultado = mysqli_query($conexion, $recordatorio);
              while($row=mysqli_fetch_assoc($resultado)){   
              ?>
            <tr>
                <td>
                    <div class=""><?php echo $row["evento"]; ?></div>
                </td>
                <td>
                    <div class=""><?php echo $row["fecha"]; ?></div>
                </td>

                <td class="separacion"><input type="submit" class="btn_tabla_eliminar_docente" value="Eliminar"
                        onclick="eliminarid<?= $row['id_evento'];?>()"></td>
            </tr>

            <script>
            function eliminarid<?= $row['id_evento'];?>() {
                var confirmar = confirm("Seguro que quieres borrar el registro?");
                if (confirmar) {
                    top.location.href = "eliminar_evento.php?ID=" + <?= $row['id_evento'];?>;
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


    <h1>Nuevo evento</h1>

    <form action="evento.php" method="POST" class="form_escuelaa sombraa" style="margin: auto; width: 380px;">
        <tr>

            <td width="50%"> <input name="evento" type="text" required placeholder="Evento" class="form-control"> </td>
        </tr>
        <br>
        <tr>

            <td width="50%"><input type="date" class="form-control" name="fecha"></td>
        </tr>
        <br>

        <br>
        <input name="AGREGAR_EVENTO" type="submit" value="Enviar" class="btn_form">
    </form>


</body>

</html>