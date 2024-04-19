<?php
include ('database.php');
 $message = '';
 $usuarios ="SELECT * FROM users";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Actividades</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <!---  <link rel="stylesheet" href="./css/bootstrap.min.css"> -->
<<<<<<< HEAD
    
<!---Logo de la pagina---->
<link rel="shortcut icon" href="assets/img/edomex-logo.png" type="image/x-icon">
=======
    <!---Logo para mostrarse en la pestaña de la pagina-->
    <link rel="shortcut icon" href="assets/img/logo_favi.png" type="image/x-icon">
>>>>>>> rama1
</head>

<body>
    <?php require 'partials/header.php' ?>
    <div>
        <h2>Actividades internas</h2>


        <form action="#" method="post" style="margin: auto; width: 250px;">
            <tr>
             
                <td width="50%">
                    <select name="filtro_docente" class="form-select mt-3" id="">
                        <option value="1">Mostrar todos</option>
                        <option value="2">Mujeres</option>
                        <option value="3">Hombres</option>
                        <option value="4">Turno Matutino</option>
                        <option value="5">Turno Vespertino</option>
                        <option value="6">1° Grado</option>
                        <option value="7">2° Grado</option>
                        <option value="8">3° Grado</option>
                        <option value="9">Orientador</option>
                    </select>
                </td>
            </tr>
            <br>
            <input type="submit" value="Buscar" class="btn btn-success" name="validar">
            <!----filtro--->
<br>
          

        </form>
        <!-----Inicio del form para historial---->
        
        <table class="tabla_act" id="tabla-act-internas" style="margin: auto; width: 250px;">

            <thead class="thead_act">
                <tr>
                    <th></th>
                    <th>Docentes</th>
                    <th>Grado</th>
                </tr>
            </thead>
            <?php
                if(isset($_POST['validar'])){
                  $sql = "";
                  if($_POST['filtro_docente'] == '1'){
                    //echo "Buscar por todos";
                    $sql="SELECT*FROM users ";
                  }else if ($_POST['filtro_docente'] == '2'){
                    //echo "buscar mujer";
                    $sql="SELECT*FROM users where sexo = 'F' ";
                  }else if ($_POST['filtro_docente'] == '3'){
                   // echo "Busca hombre";
                    $sql="SELECT*FROM users where sexo = 'M' ";
                  }else if ($_POST['filtro_docente'] == '4'){
                    //echo "Busca matutino";
                    $sql="SELECT*FROM users where matutino = '1' ";
                  }else if ($_POST['filtro_docente'] == '5'){
                    //echo "Busca vespertino";
                    $sql="SELECT*FROM users where vespertino = '1' ";
                  }else if ($_POST['filtro_docente'] == '6'){
                   // echo "Busca primer grado";
                    $sql="SELECT*FROM users where primero = '1' ";
                  }else if ($_POST['filtro_docente'] == '7'){
                    //echo "Busca segundo grado";
                    $sql="SELECT*FROM users where segundo = '2' ";
                  }else if ($_POST['filtro_docente'] == '8'){
                    //echo "Busca tercer grado";
                    $sql="SELECT*FROM users where tercero = '3' ";
                  }else if ($_POST['filtro_docente'] == '9'){
                    //echo "Busca orientador";
                    $sql="SELECT*FROM users where rol = '3' ";
                  }
                
                  $resultado = mysqli_query($conexion, $sql);
                  $contador =0;
                  while($row=mysqli_fetch_assoc($resultado)){
                    $contador++;
                    ?>

            <form action="https://formspree.io/f/mpznlyao" method="POST">
                <!---form historial---->
                <tr>
                    <!---Check box de filtro de maestros--->
                    <td> <input class="anchos" type="checkbox" value=<?php echo $row["nombre"]; ?> name="Nombre" id="tema1"
                            class="valores"></td>
                    <td class="separacion"><strong>
                            <div><?php echo $row["nombre"]; ?></div>
                        </strong></td>
                    <td class="separacion"><strong>
                            <div><?php 
                   if ($row["rol"]=='1'){
                      echo "Director";
                    }else if ($row["rol"]=='2'){
                      echo "Administrativo";
                    }else if ($row["rol"]=='3'){
                      echo "Orientador";
                    }else if ($row["rol"]=='4'){
                      echo "Docente";
                    }
                     ?></div>
                        </strong></td>
                </tr>
                <?php
                  }
                 // echo "Total seleccionados--->".$contador; 
                }
              ?>
              
            <?php

              $resultado = mysqli_query($conexion, $usuarios);
              while($row=mysqli_fetch_assoc($resultado)){   
              ?>
            <!------->
            <?php
              }
              ?>
        </table>
        <br>
                <input type="text" name="Motivo" id="" Placeholder="Motivo" class="form-control"
                    style="margin: auto; width: 250px;">
                <br>
                <input type="submit" value="Enviar" class="btn btn-info" name="validar">
            </form>
       
        <br>
        <button onclick="exportTableToExcel('tabla-act-internas')" class="buttonDownload">Exportar a Excel</button>

<br>



</body>









              <!--Funcion para exportar la tabla a excel--->
              <script>
                function exportTableToExcel(tableID) {
  var wb = XLSX.utils.table_to_book(document.getElementById(tableID));
  var wbout = XLSX.write(wb, { bookType: 'xlsx', type: 'binary' });

  function s2ab(s) {
    var buf = new ArrayBuffer(s.length);
    var view = new Uint8Array(buf);
    for (var i=0; i<s.length; i++) view[i] = s.charCodeAt(i) & 0xFF;
    return buf;
  }

  saveAs(new Blob([s2ab(wbout)], {type:"application/octet-stream"}), 'tabla-act-internas.xlsx');
}

              </script>

<script src="https://cdn.jsdelivr.net/npm/xlsx/dist/xlsx.full.min.js"></script>
<script src="FileSaver.js-master/src/FileSaver.js"></script>











<!-- Site footer -->
<footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <h6>Actividades internas (Intrucciones)</h6>
            <p class="text-justify">
              <i>Formulario de registro de actividades </i>
               En esta seccion se encuentra un filtro para docentes, asi mismo
               un,una tabla con nombres y un campo a rellenar para que se les pueda 
               asociar a una actividad y se envia via correo electronico
               para guardar el registro a modo de historial</p>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Categories</h6>
            <ul class="footer-links">
              <li><a href="">Agregar</a></li>
              <li><a href="">Docentes</a></li>
              <li><a href="">Alumnos</a></li>
              <li><a href="">Escuela</a></li>
              <li><a href="">Act Internas</a></li>
              <li><a href="">Materiales</a></li>
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

          <div class="col-md-4 col-sm-6 col-xs-12">
            <ul class="social-icons">
              <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
              <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>   
            </ul>
          </div>
        </div>
      </div>
</footer>

</html>