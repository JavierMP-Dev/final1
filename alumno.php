<?php
 require 'database.php';
$usuarios ="SELECT * FROM alumno";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumno</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
<!---Logo para mostrarse en la pestaña de la pagina-->
<link rel="shortcut icon" href="assets/img/logo_favi.png" type="image/x-icon">
</head>

<body>
    <?php require 'partials/header.php' ?>
    <div>
        <h2>Alumnos</h2>
        <a href="index.php" class="btn_volver">Volver</a>
    </div>
    <div class="container">
        <div class="roww">

            <table class="tabla_nombre_alumnos">
                <thead class="thead_al">
                    <tr>
                        <th class="th_alu">Alumno</th>
                        <th class="th_alu">Informacion</th>
                        <th class="th_alu">Eliminar</th>
                    </tr>
                </thead>

                <?php
              $resultado = mysqli_query($conexion, $usuarios);
              while($row=mysqli_fetch_assoc($resultado)){   
              ?>
                <tr>
                    <td class="td_alu"><strong>
                            <div><?php echo $row["nombre"]; ?></div>
                        </strong></td>
                    <td class="td_alu"><input type="submit" value="Ver mas" class="btn_tabla"
                            onclick="mostrarid<?= $row['id_alumno'];?>()"></td>
                    <td class="separacion"><input type="submit" value="Eliminar" class="btn_tabla_eliminar_docente"
                            onclick="eliminarid<?= $row['id_alumno'];?>()"></td>

                </tr>
                <script>
                function mostrarid<?= $row['id_alumno'];?>() {
                    top.location.href = "datos_alumno.php?ID=" + <?= $row['id_alumno'];?>;
                }

                function eliminarid<?= $row['id_alumno'];?>() {
                    var confirmar = confirm("Seguro que quieres borrar el registro?");
                    if (confirmar) {
                        top.location.href = "eliminar_alumno.php?ID=" + <?= $row['id_alumno'];?>;
                    } else {
                        alert("No se realizaron cambios");
                    }
                }
                </script>

                <?php
              }
              ?>
            </table>

            <a href="registro_alumno.php" class="btn_nav">Nuevo alumno</a>

        </div>
    </div>
</body>

</html>