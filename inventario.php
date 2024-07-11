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
        <h2>Inventarios</h2>
    </div>


    <a href="inventario.php" class="btn btn-info btn-lg">Inventarios</a>
        <a href="evento.php" class="btn btn-info btn-lg">Eventos </a>
        <a href="gasto.php" class="btn btn-info btn-lg">Gastos</a>

<br><br>

    <div>

    
        <button onclick="exportTableToExcel('inventario')" class="buttonDownload">Exportar a Excel</button>
<br>
<br>

        <table class="tabla_dat" id="inventario" >
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
                <td class="separacion"><input type="submit" class="btn btn-outline-danger" value="Eliminar"
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

            <input name="AGREGAR_RUBRO" type="submit" value="Enviar" class="btn btn-info">
        </form>



    </main>


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

  saveAs(new Blob([s2ab(wbout)], {type:"application/octet-stream"}), 'inventario.xlsx');
}

              </script>

<script src="https://cdn.jsdelivr.net/npm/xlsx/dist/xlsx.full.min.js"></script>
<script src="FileSaver.js-master/src/FileSaver.js"></script>




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

  saveAs(new Blob([s2ab(wbout)], {type:"application/octet-stream"}), 'inventario.xlsx');
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
            <h6>Inventario</h6>
            <p class="text-justify">
               En esta seccion se encuentra una tabla con los articulos 
               fisicos de la escuela, mismos que se pueden eliminar y volver a subir a la 
               base de datos mediante el formulario ubicado debajo de la tabla, esta mmisma se puede
               exportar a formato excel con ayuda del boton verde "descargar".
            </p>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Categorias</h6>
            <ul class="footer-links">
              <li><a href="">link 1</a></li>
              <li><a href="">link 2</a></li>
              <li><a href="">link 3</a></li>
              <li><a href="">link 4s</a></li>
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