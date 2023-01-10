<?php
include ('database.php');
 $message = '';
 $inventa ="SELECT * FROM inventario";


if(isset($_POST['AGREGAR_RUBRO'])){
    $sql = "INSERT INTO inventario (rubro, cantidad) VALUES (:rubro, :cantidad)"; 
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':rubro', $_POST['rubro']);
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
</head>

<body>

    <?php require 'partials/header.php' ?>
    <div>
        <h2>Inventarios</h2>
    </div>


    <a href="inventario.php" class="btn_nav">Inventarios</a>
    <a href="evento.php" class="btn_nav">Eventos</a>
    <a href="gasto.php" class="btn_nav">Gastos</a>


    <h1>Existencias</h1>

    <br>
    <div>

        <table class="tabla_dat">
            <thead class="thead_dat">
                <tr>
                    <th>Rubro</th>
                    <th>Existencia</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <?php
               $resultado = mysqli_query($conexion, $inventa);
              while($row=mysqli_fetch_assoc($resultado)){   
              ?>
            <tr>
                <td>
                    <div class=""><?php echo $row["rubro"]; ?></div>
                </td>
                <td>
                    <div class=""><?php echo $row["cantidad"]; ?></div>
                </td>
                <!---   <td class="separacion"><input type="submit" value="Actualizar" class="" onclick="mostrarid<?= $row['id'];?>()"></td>
               ---->
                <td class="separacion"><input type="submit" class="btn_tabla_eliminar_docente" value="Eliminar"
                        onclick="eliminarid<?= $row['id_rubro'];?>()"></td>
            </tr>

            <script>
            function eliminarid<?= $row['id_rubro'];?>() {
                var confirmar = confirm("Seguro que quieres borrar el registro?");
                if (confirmar) {
                    top.location.href = "eliminar_inventarios.php?ID=" + <?= $row['id_rubro'];?>;
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



    <h2>Nuevo Rubro</h2>
    <main>
        <form action="inventario.php" method="POST" style="margin: auto; width: 380px;">

            <tr>

                <div class="form-floating mb-3">
                    <input class="form-control" name="rubro" type="text" id="floatingInput" required
                        placeholder="Rubro">
                    <label for="floatingInput"> Rubro</label>
                </div>



                <td>
                    <input class="form-control" type="number" name="cantidad" id="floatingInput" placeholder="Cantidad">

                </td>
                <br>
            </tr>

            <tr>
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Observaciones" id="floatingTextarea"></textarea>
                    <label for="floatingTextarea">Observaciones</label>
                </div>
            </tr>


            <br>

            <input name="AGREGAR_RUBRO" type="submit" value="Enviar" class="btn_form">
        </form>
    </main>



</body>

</html>