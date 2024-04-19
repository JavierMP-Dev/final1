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
        <h2>Alumnos</h2>
        <a href="index.php" class="btn btn-primary">Volver</a>
    </div>
    <div class="container">
        <div class="roww">

        <br><br>
        <button onclick="exportTableToExcel('alumnos')" class="buttonDownload">Exportar a Excel</button>
<br><br>
        
            <table class="tabla_nombre_alumnos" id="alumnos">
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
                    <td class="td_alu"><input type="submit" value="Ver mas" class="btn btn-outline-info btn-sm"
                            onclick="mostrarid<?= $row['id_alumno'];?>()"></td>
                    <td class="separacion"><input type="submit" value="Eliminar" class="btn btn-outline-danger btn-sm"
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

            <a href="registro_alumno.php" class="btn btn-info btn-lg">Nuevo alumno</a>

        </div>
    </div>








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

  saveAs(new Blob([s2ab(wbout)], {type:"application/octet-stream"}), 'alumnos.xlsx');
}

              </script>

<script src="https://cdn.jsdelivr.net/npm/xlsx/dist/xlsx.full.min.js"></script>
<script src="FileSaver.js-master/src/FileSaver.js"></script>

</body>



<br><br><br><br><br><br><br><br><br><br><br><br><br><br>

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