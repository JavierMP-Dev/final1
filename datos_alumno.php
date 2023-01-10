<?php
session_start();
include ('database.php');
 $message = '';
 $alumno_id;
 if(isset($_GET['ID'])){
    $alumno_id= $_GET['ID'];
    $_SESSION['ID'] = $_GET['ID']; 
}else{
    $alumno_id = $_SESSION['user_id'];
}
 $usuarios ="SELECT * FROM alumno WHERE id_alumno = '$alumno_id' ";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos Alumno</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>

<body>
    <?php require 'partials/header.php' ?>

    <div class="container">
        <div class="row">

            <div class="jumbotron">
                <h1 class="display-3">Informacion</h1>

                <p class="lead"></p>
                <hr class="my-2">

                </p>
            </div>

        </div>
    </div>

    <div id="main_container">
        <?php
   $resultado = mysqli_query($conexion, $usuarios);
              while($row=mysqli_fetch_assoc($resultado)){   
              ?>
        <table class="tabla_alumno">
            <thead class="thead_al">
                <tr>
                    <th class="th_al">Campo</th>
                    <th class="th_al">Informacion</th>
                </tr>
            </thead>
            <tr>
                <td>Nombre: </td>
                <td>
                    <div class="table__item"><?php echo $row["nombre"]; ?></div>
                </td>
            </tr>
            <tr>
                <td>Sexo:</td>
                <?php
                if($row['sexo']==1){
                    ?>
                <td>
                    <div class="table__item">Masculino</div>
                </td>
                <!---
                       <td><div class="table__item"><?php echo $row["sexo"]; ?></div></td>
                       ---->
                <?php
                }else if($row['sexo']==2){
                    ?>
                <td>
                    <div class="table__item">Femenino</div>
                </td>
                <?php
                    }
                    ?>
            </tr>
            <tr>
                <td>Correo:</td>
                <td>
                    <div class="table__item"><?php echo $row["email"]; ?></div>
                </td>
            </tr>
            <tr>
                <td>CURP:</td>
                <td>
                    <div class="table__item"><?php echo $row["curp"]; ?></div>
                </td>
            </tr>
            <tr>
                <td>Grado:</td>
                <td>
                    <div class="table__item"><?php echo $row["grado"]; ?></div>
                </td>
            </tr>
            <tr>
                <td>Grupo</td>
                <?php
                if($row['grupo']==1){
            ?>
                <td>
                    <div class="table__item">A</div>
                </td>
                <?php
                }else if($row['grupo']==2){
            ?>
                <td>
                    <div class="table__item">B</div>
                </td>
                <?php
                }else if($row['grupo']==3){
            ?>
                <td>
                    <div class="table__item">C</div>
                </td>
                <?php
                }else if($row['grupo']==4){
            ?>
                <td>
                    <div class="table__item">D</div>
                </td>
                <?php
                }else if($row['grupo']==5){
            ?>
                <td>
                    <div class="table__item">E</div>
                </td>
                <?php
                }else if($row['grupo']==6){
            ?>
                <td>
                    <div class="table__item">F</div>
                </td>
                <?php
                }
            ?>
            </tr>
            <tr>
                <td>Procedencia</td>
                <td>
                    <div class="table__item"><?php echo $row["procede"]; ?></div>
                </td>
            </tr>
            <tr>
                <td>Ciudad de origen</td>
                <td>
                    <div class="table__item"><?php echo $row["ciudad_origen"]; ?></div>
                </td>
            </tr>
            <tr>
                <td>Situacion</td>
                <?php
                if($row['situacion']==1){
                        ?>
                <td>
                    <div class="table__item">Regular</div>
                </td>
                <?php
                }else if($row['situacion']==0){
                      ?>
                <td>
                    <div class="table__item">Irregular</div>
                </td>
                <?php
                }
                      ?>


            </tr>
            <tr>
                <td>Estatus</td>
                <?php
                      if($row['estatus']==1){
                        ?>
                <td>
                    <div class="table__item">Alta</div>
                </td>
                <?php
                }else if($row['estatus']==0){
                      ?>
                <td>
                    <div class="table__item">Baja</div>
                </td>
                <?php
                }
                      ?>
            </tr>
            </tr>
            <tr>
                <td>Regularizacion</td>
                <td>
                    <div class="table__item"><?php echo $row["regularizacion"]; ?></div>
                </td>
            </tr>
            </tr>
            <tr>
                <td>Repetidor</td>
                <?php
                      if($row['repetidor']==1){
                        ?>
                <td>
                    <div class="table__item">Si</div>
                </td>
                <?php
                }else if($row['repetidor']==0){
                      ?>
                <td>
                    <div class="table__item">No</div>
                </td>
                <?php
                }
                      ?>
            </tr>
            </tr>
            <tr>
                <td>Hermanos</td>
                <?php
                      if($row['hermanos']==1){
                        ?>
                <td>
                    <div class="table__item">Si</div>
                </td>
                <?php
                }else if($row['hermanos']==0){
                      ?>
                <td>
                    <div class="table__item">No</div>
                </td>
                <?php
                }
                      ?>
            </tr>
            </tr>
            <tr>
                <td>Jornadas</td>
                <td>
                    <div class="table__item"><?php echo $row["jornada"]; ?></div>
                </td>
            </tr>

        </table>



        <script>
        function mostrarid<?= $row['id_alumno'];?>() {
            top.location.href = "datos_alumno.php?ID=" + <?= $row['id_alumno'];?>;
        }
        </script>

        <?php
              }
              ?>
    </div>

    <a href="subir_datos_alumno.php" class="btn_nav">Actualizar</a>

</body>

</html>