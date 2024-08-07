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
    <!---Logo de la pagina---->
    <link rel="shortcut icon" href="assets/img/edomex-logo.png" type="image/x-icon">
</head>

<body>
    <?php require 'partials/header.php' ?>
    <div>
        <h2>Eventos</h2>
    </div>

    <a href="inventario.php" class="btn btn-info btn-lg">Inventarios</a>
        <a href="evento.php" class="btn btn-info btn-lg">Eventos Proximos</a>
        <a href="gasto.php" class="btn btn-info btn-lg">Gastos</a>



  
    <div id="main_container">

   
        <button onclick="exportTableToExcel('eventos')" class="buttonDownload">Exportar a Excel</button>
<br><br>

        <table class="tabla_dat" id="eventos">
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

                <td class="separacion"><input type="submit" class="btn btn-outline-danger" value="Eliminar"
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

        
        <input name="AGREGAR_EVENTO" type="submit" value="Enviar" class="btn btn-info">
    </form>







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








</body>






<!-- Site footer -->
<footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <h6>Eventos proximos</h6>
            <p class="text-justify">
              
               En esta seccion se encuentran una tabla con la descripcion de 
               los eventos futuros que se acercan para celebrar junto con  
                la fecha en que se llevaran a cabo, asi mismo se pueden eliminar.
                <br>
                Por debajo de la tabla encontramos un formulario en el cual 
                se pueden dar de alta mas eventos junto con una descripcion.
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