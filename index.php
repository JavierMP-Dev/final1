<?php
  session_start();

  require 'database.php';

  $usuarios ="SELECT * FROM users";

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, nombre, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
      $admin = "jmontoyap001@alumno.uaemex.mx";
      if($user['email'] == $admin){
/*        echo "<div class='pos_btns'>";
        
        echo "<a href='signup.php' class='button_res' >Agregar</a>";
        echo "<a href='docente.php' class='button_res'>Docentes  </a> ";
        echo "<a href='alumno.php' class='button_res'>Alumnos</a> ";
        echo "<a href='escuela.php' class='button_res'>Escuela</a> ";
        echo "<a href='actividad.php' class='button_res'>Act Internas</a> ";
        echo "<a href='utiles.php' class='button_res'>Utiles</a> ";
        echo "<a href='libros.php' class='button_res'>Libros</a> ";
        echo "</div>";
      

<?php*/
      }
    }
  }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <!---Etiqueta obligatoria paras bootstrap-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--estilo bootstrap-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Bienvenido</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="preload" href="assets/css/style.css" as="style">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/img/logo_favi.png" type="image/x-icon">

</head>
<!---
  <body oncontextmenu="return false"> 
    ---->
<!---Ocultando el codigo fuente---->

<!---Jquery primero, despues popper.js y por ultimo bootstrap.js --->
<script src="js/jquery-3.3.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!----Insertar los links de estilos para las tablas--->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.bootstrap4.min.css" />

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<!---Encabezado ---->


<?php if(!empty($user)): ?>
<?php require 'partials/header.php' ?>
<br><br>
<div class="posicion_nombre"><strong>Bienvenido </strong><a href="datos_Maestro.php"> <?php echo $user['nombre'];?>.</a>
</div>
<br>
<br>

<?php
if (count($results) > 0) {
$user = $results;
$admin = "jmontoyap001@alumno.uaemex.mx";
if($user['email'] == $admin){
    ?>

<div class="contenedor_btn">
    <a href='signup.php' class='button_res pos'>Agregar
        &nbsp</a>
    <br><br>
    <a href='docente.php' class='button_res pos'>Docentes</a>
    <br><br>
    <a href='alumno.php' class='button_res pos'>Alumnos &nbsp</a>
    <br><br>
    <a href='escuela.php' class='button_res pos'>Escuela&nbsp&nbsp&nbsp</a>
    <br><br>
    <a href='actividad.php' class='button_res pos'>Act Internas</a>
    <br><br>
    <a href='utiles.php' class='button_res pos'>Utiles &nbsp&nbsp &nbsp &nbsp</a>
    <br><br>
    <a href='libros.php' class='button_res pos'>Libros &nbsp&nbsp &nbsp &nbsp</a>


</div>
<?php 
}
}
?>





<!----
<br>
<a href="logout.php" class="btn_salir">Cerrar sesion</a>
<br>
<a href="grupo.php" class="btn_grupos">Mis Grupos</a>
--->

<?php else: ?>
<br><br>
<a href="login.php" class="button_index">Log in</a>

<div class="container">
    <div class="servicios">

        <div class="item">
            <article class="card">
                <img src="assets/img/es.jpeg" alt="" class="card__img">
                <div class="card__data">
                    <h2 class="card__title">ESTIC 0053</h2>
                    <p class="card__description">Formando futuros en cada aula</p>
                    <a href="#" target="_blank" class="card__btn">Mas info..</a>
                </div>
            </article>
        </div>

        <div class="item">
            <article class="card2">
                <img src="assets/img/docente.jpg" alt="" class="card2__img">
                <div class="card2__data">
                    <h2 class="card2__title">Valores</h2>
                    <p class="card2__description">Fomentamos el pleno uso de valores dentro de la institucion</p>
                    <a href="#" target="_blank" class="card2__btn">Mas info..</a>
                </div>
            </article>
        </div>

        <div class="item">
            <article class="card3">
                <img src="assets/img/vi.jpg" alt="" class="card3__img">
                <div class="card3__data">
                    <h2 class="card3__title">Vicente Suarez</h2>
                    <p class="card3__description">Vicente Suárez nació el 3 de abril de 1834</p>
                    <a href="https://www.historia.com/magazine/los-ninos-heroes-asesinados-la-batalla-chapultepec/6/"
                        target="_blank" class="card3__btn">Mas info..</a>
                </div>
            </article>
        </div>

        <div class="item">
            <article class="card4">
                <img src="assets/img/estado.jpg" alt="" class="card4__img">
                <div class="card4__data">
                    <h2 class="card4__title">Estado de Mexico</h2>
                    <p class="card4__description">Esta entidad es una de las 32 que integran los Estados Unidos
                        Mexicanos
                    </p>
                    <a href="http://www.elclima.com.mx/origen_y_fundacion_del_estado_de_mexico.htm" target="_blank"
                        class="card4__btn">Mas info..</a>
                </div>
            </article>
        </div>
    </div>
</div>

<br><br><br>
<a href="" class="button_index"></a>
<!---
      <a href="signup.php">SignUp</a>
       or --->
<?php endif; ?>




</div>

<script src="scroll.js"></script>
</body>

</html>