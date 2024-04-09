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
    <title>Notificaciones</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">

</head>
<?php require 'partials/header.php' ?>
<body>
    <h1>Notificaciones</h1>

    <?php
   $resultado = mysqli_query($conexion, $usuarios);
              while($row=mysqli_fetch_assoc($resultado)){   
              ?>
              
    <div class="centrar">
        <table class="tabla_notificaciones" style="margin: auto; width: 300px;" >
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
           
            

            
            <tr>
                <td>Mensaje</td>
                <td>
                    <div class="table__item"><?php echo $row["mensaje"]; ?></div>
                </td>
            </tr>
        </table>
     </div>

<br><br><br>
        <script>
        function mostrarid<?= $row['id_docente'];?>() {
            top.location.href = "datos_maestro.php?ID=" + <?= $row['id_docente'];?>;
        }
        </script>

        <?php
              }
              ?>
    </div>



</body>








<br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<!-- Site footer -->
<footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <h6>Notificaciones</h6>
            <p class="text-justify">
              
               En esta seccion se muestran los mensajes envidos del administrador a los docentes
                <br>
             
            </p>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Categorias</h6>
            <ul class="footer-links">
              <li><a href=""></a></li>
              <li><a href=""></a></li>
              <li><a href=""></a></li>
              <li><a href=""></a></li>
              <li><a href=""></a></li>
              <li><a href=""></a></li>
            </ul>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Quick Links</h6>
            <ul class="footer-links">
              <li><a href="">Asignar materias</a></li>
              <li><a href="">Mensaje</a></li>
              <li><a href="">Asignar Grupos</a></li>
              
            </ul>
          </div>
        </div>
        <hr>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-12">
            <p class="copyright-text">Copyright &copy; 2023 All Rights Reserved by 
       
            </p>
          </div>

          
        </div>
      </div>
</footer>








</html>