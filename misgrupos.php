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
    <title>Mis grupos</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">

</head>
<?php require 'partials/header.php' ?>
<body>
    <h1>Mis grupos</h1>


<!----Clase de la foto de perfil ---->
<!----

        <div class="circulo">
            <img src="assets/img/perfil.png" class="imagen" alt="">
        </div>
--->
        <?php
   $resultado = mysqli_query($conexion, $usuarios);
              while($row=mysqli_fetch_assoc($resultado)){   
              ?>
              
    <div >

    <br>
        <button onclick="exportTableToExcel('mis_grupos')" class="buttonDownload">Exportar a Excel</button>
<br>
<br>
        <table class=" tabla_nombre_doce"  id="mis_grupos">
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
            <tr>
                <td>Rol</td>
                <td>
                    <div class="table__item"><?php echo $row["rol"]; ?></div>
                </td>
            </tr>
            <tr>
                <td>1°</td>
                <td>
                    <div class="table__item"><?php echo $row["priA"]; ?></div>
                </td>
            </tr>
            <tr>
                <td>1°</td>
                <td>
                    <div class="table__item"><?php echo $row["priB"]; ?></div>
                </td>
            </tr>
            <tr>
                <td>1°</td>
                <td>
                    <div class="table__item"><?php echo $row["priC"]; ?></div>
                </td>
            </tr>
            <tr>
                <td>2°</td>
                <td>
                    <div class="table__item"><?php echo $row["segA"]; ?></div>
                </td>
            </tr>
            <tr>
                <td>2°</td>
                <td>
                    <div class="table__item"><?php echo $row["segB"]; ?></div>
                </td>
            </tr>
            <tr>
                <td>2°</td>
                <td>
                    <div class="table__item"><?php echo $row["segC"]; ?></div>
                </td>
            </tr>
            <tr>
                <td>3°</td>
                <td>
                    <div class="table__item"><?php echo $row["terA"]; ?></div>
                </td>
            </tr>
            <tr>
                <td>3°</td>
                <td>
                    <div class="table__item"><?php echo $row["terB"]; ?></div>
                </td>
            </tr>
            <tr>
                <td>3°</td>
                <td>
                    <div class="table__item"><?php echo $row["terC"]; ?></div>
                </td>
            </tr>
        </table>
    </div>

<br><br>
        <script>
        function mostrarid<?= $row['id_docente'];?>() {
            top.location.href = "datos_maestro.php?ID=" + <?= $row['id_docente'];?>;
        }
        </script>

        <?php
              }
              ?>
    </div>


  
<!-- Site footer -->
<footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <h6>Mis grupos</h6>
            <p class="text-justify">
              
               En esta seccion se encuentran los grupos que le tocara impartir a cada docente durante el ciclo 
               escolar vigente
          
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

  saveAs(new Blob([s2ab(wbout)], {type:"application/octet-stream"}), 'mis_grupos.xlsx');
}

              </script>

<script src="https://cdn.jsdelivr.net/npm/xlsx/dist/xlsx.full.min.js"></script>
<script src="FileSaver.js-master/src/FileSaver.js"></script>











</body>
</html>