<?php
session_start();

include ('database.php');
 $message = '';
 $docente_id;
    if(isset($_GET['ID'])){
        $docente_id= $_GET['ID'];
        $_SESSION['ID'] = $_GET['ID']; 
    }else{
        $docente_id = $_SESSION['user_id'];
    }
 $usuarios ="SELECT * FROM users WHERE id = '$docente_id' ";
//echo $docente_id;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos Docente</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>

<body>

    <?php require 'partials/header.php' ?>

    <div class="container">
        <div class="row">

            <div class="jumbotron">
                <h1 class="display-3">Perfil</h1>

                <p class="lead"></p>
                <hr class="my-2">

                </p>
            </div>

        </div>
    </div>
    <!----Clase de la foto de perfil ---->


    <div id="main_container">
        <div class="circulo">
            <img src="assets/img/perfil.png" class="imagen" alt="">
        </div>
        <?php
   $resultado = mysqli_query($conexion, $usuarios);
              while($row=mysqli_fetch_assoc($resultado)){   
              ?>
        <table class="tabla_doce">
            <thead class="thead_do">
                <tr>
                    <th>Campo</th>
                    <th>Informacion</th>
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
                        if ($row['sexo']=='M'){
                    ?>
                <td>
                    <div class="table__item">Masculino</div>
                </td>
                <?php  
                        } else if ($row['sexo']=='F'){
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
                <td>RFC:</td>
                <td>
                    <div class="table__item"><?php echo $row["rfc"]; ?></div>
                </td>
            </tr>
            <tr>
                <td>Estudios</td>
                <td>
                    <div class="table__item"><?php echo $row["estudios"]; ?></div>
                </td>
            </tr>
            <tr>
                <td>Ingreso</td>
                <td>
                    <div class="table__item"><?php echo $row["ingreso"]; ?></div>
                </td>
            </tr>
            <tr>
                <td>Matutino</td>
                <td>
                    <div class="table__item"><?php echo $row["matutino"]; ?></div>
                </td>
            </tr>
            <tr>
                <td>Vespertino</td>
                <td>
                    <div class="table__item"><?php echo $row["vespertino"]; ?></div>
                </td>
            </tr>
            <tr>
                <td>Grados</td>
                <td>
                    <div class="table__item"><?php echo $row["primero"]; ?>°</div>
                </td>
            </tr>
            </tr>
            <tr>
                <td></td>
                <td>
                    <div class="table__item"><?php echo $row["segundo"]; ?>°</div>
                </td>
            </tr>
            </tr>
            <tr>
                <td></td>
                <td>
                    <div class="table__item"><?php echo $row["tercero"]; ?>°</div>
                </td>
            </tr>
            <!--
              -->
        </table>



        <script>
        function mostrarid<?= $row['id_docente'];?>() {
            top.location.href = "datos_maestro.php?ID=" + <?= $row['id_docente'];?>;
        }
        </script>

        <?php
              }
              ?>
    </div>

    <a href="subir_datos_docente.php" class="btn_nav_datos_doce">Actualizar</a>
</body>

</html>