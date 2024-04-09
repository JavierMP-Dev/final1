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

    <!---Logo de la pagina---->
    <link rel="shortcut icon" href="assets/img/edomex-logo.png" type="image/x-icon">

    <meta charset="utf-8">
    <!---Etiqueta obligatoria paras bootstrap-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--estilo bootstrap-->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    

    <title>Bienvenido</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="preload" href="assets/css/style.css" as="style">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-----DATATABLE CON CSS basico----->
    <link rel="stylesheet" type="text/css"  href="assets/datatables/datatables.min.css " >
    <link rel="stylesheet" type="text/css" href="assets/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">

    <!-----jQuery, popper, js, bootstrap js----->
    <script src="assets/jquery-3.3.1.min.js"> </script>
    <script src="assets/popper.min.js"> </script>
    <script src="assets/bootrap/js/bootstrap.min.js"> </script>

    <!-----datatables js----->
    <script type="text/javascript" src="datatables/datatables.min.js" > </script>

    <!-----para usar botones en datatables js----->
    <script src="assets/datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"> </script>
    <script src="assets/datatables/JSZip-2.5.0/jszip.min.js"></script>
    <script src="assets/datatables/pdfmake-0.1.36/pdfmake.min.js"></script>
    <script src="assets/datatables/pdfmake-0.1.36/vfs_fonts.js"> </script>
    <script src="assets/datatables/Buttons-1.5.6/js/buttons.html5.min.js"> </script>

    <!---Link bootstrap en lineas-->
    <!---Link bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</head>
<!---
inicio de header
--->


<!---fin del header--->


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

<div class="posicion_nombre"><strong>Bienvenido &nbsp</strong><a href="datos_Maestro.php" class="estilo_nombre"> <?php echo $user['nombre'];?>.</a>
</div>



<?php
if (count($results) > 0) {
$user = $results;
$admin = "jmontoyap001@alumno.uaemex.mx";
if($user['email'] == $admin){
    ?>




<div id="gridd">
       <!--- <div id="left">
        <a href='signup.php' type="button" class="btn btn-info btn-lg ">Agregar</a><br><br>
        <a href='docente.php' type="button" class="btn btn-info btn-lg">Docentes</a><br><br>
        <a href='alumno.php' type="button" class="btn btn-info btn-lg">Alumnos </a><br><br>
        <a href='escuela.php' type="button" class="btn btn-info btn-lg">Escuela</a><br><br>
        <a href='actividad.php' type="button" class="btn btn-info btn-lg">Act Internas</a><br><br>
        <a href='libros.php' type="button" class="btn btn-info btn-lg">Materiales </a><br><br>
        <a href='materias.php' type="button" class="btn btn-info btn-lg">Asignar Mat  </a><br><br>
        <a href='mensaje.php' type="button" class="btn btn-info btn-lg">Mensaje  </a><br><br>
        <a href='asignar_grupos.php' type="button" class="btn btn-info btn-lg">Asignar G </a><br><br>
        --->
      </div>
    <div id="right">
      <!---Botones--->
      <a class="btn btn-primary" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
  Opciones
</a>

<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Menu Administrador</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <div>
      
  </div>

  <hr>
      <a href="signup.php" type="button" class="btn btn-info">Agregar</a>
      <hr>
      <a href="docente.php" type="button" class="btn btn-info">Docente</a>
      <hr>
      <a href="alumno.php" type="button" class="btn btn-info">Alumnos</a>
      <hr>
      <a href="escuela.php" type="button" class="btn btn-info">Escuela</a>
      <hr>
      <a href="actividad.php" type="button" class="btn btn-info">Act internas</a>
      <hr>
      <a href="libros.php" type="button" class="btn btn-info">Materiales</a>
      <hr>
      <a href="materias.php" type="button" class="btn btn-info">Asignar Mat</a>
      <hr>
      <a href="mensaje.php" type="button" class="btn btn-info">Mensaje</a>
      <hr>
      <a href="asignar_grupos.php" type="button" class="btn btn-info">Asignar G</a>

  </div>
</div>



        <!---Carrousel de imagenes-->
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="assets/img/slider-2/calseonline.jpg" class="d-block w-100 tam-carrousel " alt="..." style="opacity: 20%;">
      
      <div class="carousel-caption d-none d-md-block">
      
        <h5 color-slider>Educacion de calidad</h5>
        <p class="color-slider">Datos representativos de la matricula activa de la escuela.</p>
        <div class="habilidades">
      <h2>Alumnos</h2>
      <p>Indice de aprobados</p>
      <div class="container">
        <div class="skills html">99%</div>
      </div>

      <p>Ciclo escolar en curso</p>
      <div class="container">
        <div class="skills css">70%</div>
      </div>

      <p>Jornadas de limpieza</p>
      <div class="container">
        <div class="skills javascript">50%</div>
      </div>

</div>



      </div>
    </div>
    <div class="carousel-item">
      <img src="assets/img/slider-2/laptop.jpg" class="d-block w-100 tam-carrousel" style="opacity: 20%;" alt="...">
    
      
      <div class="carousel-caption d-none d-md-block">
   
        <h5 color-slider>Control</h5>
        <p class="color-slider">En las siguientes graficas se muestran los numeros en cuanto a inventarios.</p>
 
    
      <div class="habilidades2">
      <h2>Inventario</h2>
      
      <p>Moscos</p>
      <div class="container">
        <div class="skills2 html2">75%</div>
      </div>

      <p>Computadoras</p>
      <div class="container">
        <div class="skills2 css2">95%</div>
      </div>

      <p>Podadoras</p>
      <div class="container">
        <div class="skills2 javascript2">60%</div>
      </div>
    </div>

      </div>
    </div>
    <div class="carousel-item">
      <img src="assets/img/slider-2/escritorio.jpg" class="d-block w-100 tam-carrousel" style="opacity: 20%;" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5 color-slider>Planta docente</h5>
        <p class="color-slider">Contamos con docentes con grados avanzados en Educacion.</p>
        
      <div class="habilidades3">
      <h2>Docentes</h2>

      <p>Grado Doctorado</p>
      <div class="container">
        <div class="skills3 html3">50%</div>
      </div>

      <p>Grado maestria</p>
      <div class="container">
        <div class="skills3 css">75%</div>
      </div>

      <p>Grado Licenciatura</p>
      <div class="container">
        <div class="skills3 javascript3">100%</div>
      </div>
    </div>


    </div>
      
      </div>
    </div>
  </div>

  
  
</div>
<!----Fin carrousel---->

    </div>
        
 </div>
<!----
<div class="parent">
    <div>
        <a href='signup.php' type="button" class="btn btn-info btn-lg">Agregar
        &nbsp</a>
    </div>
    
   <div class="child">
     <a href='docente.php' type="button" class="btn btn-info btn-lg">Docentes</a>
   </div>
    
    <div  class="child">
        <a href='alumno.php' type="button" class="btn btn-info btn-lg">Alumnos &nbsp</a>
    </div>

    <div class="child">
        <a href='escuela.php' type="button" class="btn btn-info btn-lg">Escuela&nbsp&nbsp</a>
    </div>
    
    <div class="child">
        <a href='actividad.php' type="button" class="btn btn-info btn-lg">Act Internas</a>
    </div>
   
    <div class="child">
        <a href='libros.php' type="button" class="btn btn-info btn-lg">Materiales &nbsp&nbsp &nbsp &nbsp</a>
    </div>

    <div class="child">
        <a href='materias.php' type="button" class="btn btn-info btn-lg">Asignar Mat &nbsp </a>
    </div>
    
    <div class="child">
        <a href='mensaje.php' type="button" class="btn btn-info btn-lg">Mensaje  &nbsp </a>
    </div>

    <div class="child">
        <a href='asignar_grupos.php' type="button" class="btn btn-info btn-lg">Asignar grupos &nbsp </a>
    </div>

</div>
---->
<?php 
}
}else 
{


?>
<h1>Prueba boton docente</h1>
<button type="button" class="btn btn-info">Mis grupos</button>
<button type="button" class="btn btn-info">Notificaciones</button>
<button type="button" class="btn btn-info">Adjuntar archivos</button>
<a href="misgrupos.php">Mis grupos</a>
<a href="notificaciones.php">Notificaciones</a>
<a href="adjuntarArchivos.php">Adjuntar archivos</a>



<?php
}
?>
<br><br>
<a href="misgrupos.php" class="btn btn-info">Mis grupos</a>
<a href="notificaciones.php" class="btn btn-info">Notificaciones</a>
<a href="" class="btn btn-info">Materias</a>




 <!---Carrousel de imagenes-->
 <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
   
      <img src="assets/img/slider/imagen1.png" class="d-block w-100" alt="...">
      
      <div class="carousel-caption d-none d-md-block">
        



        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="assets/img/slider/imagen2.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="assets/img/slider/imagen3.png" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<!----Fin carrousel---->


<!----
<br>
<a href="logout.php" class="btn_salir">Cerrar sesion</a>
<br>
<a href="grupo.php" class="btn_grupos">Mis Grupos</a>
--->

<?php else: ?>
<br><br>
<a href="login.php" class="button_index">Iniciar sesion
</a>

<div class="container">
    <div class="servicios">

        <div class="item">
            <article class="card2">
                <img src="assets/img/es.jpeg" alt="" class="card2__img">
                <div class="card2__data">
                    <h2 class="card2__title">ESTIC 0053</h2>
                    <p class="card2__description">Formando futuros en cada aula</p>
                    <a href="#" target="_blank" class="card2__btn">Mas info..</a>
                </div>
            </article>
        </div>

        <div class="item">
            <article class="card2">
                <img src="assets/img/valores2.jpg" alt="" class="card2__img">
                <div class="card2__data">
                    <h2 class="card2__title">Valores</h2>
                    <p class="card2__description">Fomentamos el pleno uso de valores dentro de la institucion</p>
                    <a href="#" target="_blank" class="card2__btn">Mas info..</a>
                </div>
            </article>
        </div>

        <div class="item">
            <article class="card2">
                <img src="assets/img/vi.jpg" alt="" class="card2__img">
                <div class="card2__data">
                    <h2 class="card2__title">Vicente Suarez</h2>
                    <p class="card2__description">Vicente Suárez nació el 3 de abril de 1834</p>
                    <a href="https://www.historia.com/magazine/los-ninos-heroes-asesinados-la-batalla-chapultepec/6/"
                        target="_blank" class="card2__btn">Mas info..</a>
                </div>
            </article>
        </div>

        <div class="item">
            <article class="card2">
                <img src="assets/img/estado.png" alt="" class="card2__img">
                <div class="card2__data">
                    <h2 class="card2__title">EDOMEX</h2>
                    <p class="card2__description">Esta entidad es una de las 32 que integran los Estados Unidos
                        Mexicanos
                    </p>
                    <a href="http://www.elclima.com.mx/origen_y_fundacion_del_estado_de_mexico.htm" target="_blank"
                        class="card2__btn">Mas info..</a>
                </div>
            </article>
        </div>
    </div>
</div>

<br><br><br>
<a href="" class="button_index">ESTIC 0053 "Vicente Suares"</a>

<img src="assets/img/logo.jpg" alt="" class="responsiva">


<!---
      <a href="signup.php">SignUp</a>
       or --->
<?php endif; ?>



</div>


<script src="scroll.js"></script>
</body>



<!-- Site footer -->
<footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <h6>Inicio (Intrucciones)</h6>
            <p class="text-justify">
              <i>Pagina de inicio o principal </i>
               En esta seccion se encuentran una serie de accesos 
              a diferentes paginas en las cuales se pueden encontrar las functiones
              a desempeñar por parte del docente o dependiendo del tipo de cuenta como permisos con 
              los que cuente el usuario.  
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